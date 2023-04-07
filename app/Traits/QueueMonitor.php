<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
namespace App\Traits;

use App\Lib\Log;
use App\Lib\Snowflake;
use Hyperf\Context\Context;
use Hyperf\Redis\RedisFactory;
use Hyperf\Utils\ApplicationContext;

trait QueueMonitor
{
    public function consumeQueue($callback, $args, $topic)
    {
        $snowId = Snowflake::get()->generate();
        $log = Log::get();
        $container = ApplicationContext::getContainer();
        $redis = $container->get(RedisFactory::class)->get('queue');

        $redis->sAdd('queues:lists', json_encode([
            'id' => $snowId,
            'topic' => $topic,
            'params' => $args,
            'time' => time(),
        ]));

        try {
            Context::set('consumeQueueId', $snowId);

            call_user_func($callback, ...array_values($args));
            $redis->hMSet('queues:success', [$snowId => json_encode(['time' => time()])]);
        } catch (\Throwable $e) {
            $error = sprintf('%s[%s] in %s', $e->getMessage(), $e->getLine(), $e->getFile());
            $redis->hMSet('queues:error', [$snowId => json_encode(['time' => time(), 'error' => $error])]);
            $log->error($topic, [
                'snowId' => $snowId,
                'data' => $args,
                'message' => $error,
            ]);
        }
    }
}
