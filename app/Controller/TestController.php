<?php

declare(strict_types=1);
/**
 * This file is part of LZQ.
 *
 * @link     https://www.leiziqin.com
 * @contact  LZQ
 */
namespace App\Controller;

use App\Service\Response\ResponseServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\Middlewares;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * @Controller(prefix="/api/test/v1")
 * @Middlewares({
 *     @Middleware(\App\Middleware\Auth\AuthV7Middleware::class),
 *     @Middleware(\Hyperf\Validation\Middleware\ValidationMiddleware::class),
 * })
 */
class TestController
{
    /**
     * @Inject
     */
    protected ResponseServiceInterface $responseService;

    /**
     * @RequestMapping(path="", methods="get")
     * @param mixed $type
     */
    public function weightRanking(RequestInterface $request, $type)
    {
        return $this->responseService->success();
    }
}
