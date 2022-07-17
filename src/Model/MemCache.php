<?php
namespace Mention\Cache\Model;

use Mention\Cache\Utils\Hash;
use Exception;

class MemCache implements Cache
{
    private static array $memory = [];

    function set(string $key, $value): void
    {
        self::$memory[Hash::getMD5Key($key)] = $value;
    }

    function get(string $key): mixed
    {
        return self::$memory[Hash::getMD5Key($key)] ?? null;
    }
}