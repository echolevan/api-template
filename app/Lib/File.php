<?php

declare(strict_types=1);
/**
 * This file is part of HSL.
 *
 * @link     https://www.hesiling.com
 * @contact  HSL
 */
namespace App\Lib;

use Hyperf\Filesystem\FilesystemFactory;
use Hyperf\Utils\ApplicationContext;

class File
{
    public static function get(string $name = 'local')
    {
        return ApplicationContext::getContainer()->get(FilesystemFactory::class)->get($name);
    }
}
