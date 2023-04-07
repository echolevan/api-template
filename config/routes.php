<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
use Hyperf\HttpServer\Router\Router;

Router::addGroup('/api/open/v4/', function () {
    Router::post('kds/setPush', 'App\Controller\Open\KdsController@setPush', ['middleware' => [\App\Middleware\Open\KdsMiddleware::class, \Hyperf\Validation\Middleware\ValidationMiddleware::class]]);
    Router::post('kds/queryOrders', 'App\Controller\Open\KdsController@queryOrders', ['middleware' => [\App\Middleware\Open\KdsMiddleware::class]]);
    Router::post('kds/queueNumber', 'App\Controller\Open\KdsController@queueNumberV2', ['middleware' => [\App\Middleware\Open\KdsMiddleware::class]]);
    Router::post('kds/queueNumberV2', 'App\Controller\Open\KdsController@queueNumberV2', ['middleware' => [\App\Middleware\Open\KdsMiddleware::class]]);
    Router::post('kds/newOrder', 'App\Controller\Open\PosOrderController@OrderStore', ['middleware' => [\App\Middleware\Open\PosOrderMiddleware::class]]);
    Router::post('kds/keruyun/newOrder', 'App\Controller\Open\PosOrderController@keruyunOrderStore', ['middleware' => [\App\Middleware\Open\PosOrderMiddleware::class]]);
});
