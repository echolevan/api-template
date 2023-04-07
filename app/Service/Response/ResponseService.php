<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
namespace App\Service\Response;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

class ResponseService implements ResponseServiceInterface
{
    /**
     * @Inject
     */
    protected ResponseInterface $response;

    public function success($data = [], $message = '操作成功', $code = 200): Psr7ResponseInterface
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function error(string $message): Psr7ResponseInterface
    {
        return $this->response->json([
            'code' => 400,
            'message' => $message,
        ]);
    }

    public function download(string $path, string $name): Psr7ResponseInterface
    {
        return $this->response->download($path, $name);
    }

    public function keruyunSuccess($messageUuid, $message, $code, $data = []): Psr7ResponseInterface
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message,
            'messageUuid' => $messageUuid,
            'data' => $data,
        ]);
    }
}
