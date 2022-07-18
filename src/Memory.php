<?php
namespace Mention\Cache;

class Memory implements CacheInterface
{
    private static array $memory = [];

    public function set(string $key, $value): void
    {
        self::$memory[Hash::getMD5Key($key)] = $value;
    }

    public function get(string $key): mixed
    {
        return self::$memory[Hash::getMD5Key($key)] ?? null;
    }
}