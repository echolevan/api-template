<?php

declare(strict_types=1);
/**
 * This file is part of LZQ.
 *
 * @link     https://www.leiziqin.com
 * @contact  LZQ
 */
namespace App\Middleware\Auth;

use App\Traits\JwtAuth;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthV7Middleware implements MiddlewareInterface
{
    use JwtAuth;

    protected ContainerInterface $container;

    protected HttpResponse $response;

    public function __construct(ContainerInterface $container, HttpResponse $response)
    {
        $this->container = $container;
        $this->response = $response;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request->withParsedBody(
            array_merge($request->getParsedBody(), ['Auth' => []])
        ));
    }

    public function err($err): ResponseInterface
    {
        return $this->response->json([
            'code' => 401,
            'message' => $err,
        ])->withStatus(401);
    }
}
