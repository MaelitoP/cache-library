<?php
namespace Mention\Cache\Model;

use Mention\Cache\Utils\PathUtils;
use Exception;

class MemCache implements CacheInterface
{
    private static array $memory = [];

    function set(string $key, $value): void
    {
        if (!PathUtils::isValidKey($key))
            throw new Exception('Key name is invalid');
        self::$memory[$key] = $value;
    }

    function get(string $key): mixed
    {
        return self::$memory[$key] ?? null;
    }
}