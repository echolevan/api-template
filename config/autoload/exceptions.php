<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
return [
    'handler' => [
        'http' => [
            Hyperf\HttpServer\Exception\Handler\HttpExceptionHandler::class,
            App\Exception\Handler\AppExceptionHandler::class,
            App\Exception\Handler\FromValidateExceptionHandler::class,
            \App\Exception\Handler\HslExceptionHandler::class,
        ],
    ],
];
