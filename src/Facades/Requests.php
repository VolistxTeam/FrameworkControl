<?php

namespace Volistx\FrameworkControl\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static POST(string $baseUrl, string $token, array $array)
 */
class Requests extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Requests';
    }
}
