<?php
namespace Mention\Cache;

use Mention\Cache\Utility\HashUtility;

class Memory implements CacheInterface
{
    private static array $memory = [];

    public function set(string $key, $value): void
    {
        self::$memory[HashUtility::getMD5Key($key)] = $value;
    }

    public function get(string $key): mixed
    {
        return self::$memory[HashUtility::getMD5Key($key)] ?? null;
    }
}