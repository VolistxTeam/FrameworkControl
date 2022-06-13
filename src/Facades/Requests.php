<?php

namespace Volistx\FrameworkControl\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Get(string $url, string $token, array $query)
 * @method static Post(string $url, string $token, array $query)
 * @method static Put(string $url, string $token, array $query)
 * @method static Delete(string $url, string $token, array $query)
 * @method static Patch(string $url, string $token, array $query)
 */
class Requests extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Requests';
    }
}
