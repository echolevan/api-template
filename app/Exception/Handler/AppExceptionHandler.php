<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
namespace App\Exception\Handler;

use App\Lib\Log;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Contract\RequestInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(Throwable $throwable, ResponseInterface $response): ResponseInterface
    {
        $request = $this->container->get(RequestInterface::class);

        Log::get(env('APP_NAME'), 'error')->error(sprintf('%s[%s] in %s, 错误数据:', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile()), [
            'Auth' => $request->input('Auth') ? $request->input('Auth')->toArray() : '未登录',
            'Header' => $request->getHeaders(),
            'body' => json_decode($request->getBody()->getContents(), true),
            'url' => $request->url(),
        ]);
        return $response->withHeader('Server', env('APP_NAME'))->withStatus(500)->withBody(new SwooleStream(
            env('APP_ENV') == 'prod' ? 'Internal Server Error.' : sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile())
        ));
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
