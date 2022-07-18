<?php
namespace Mention\Cache\Utility;

class HashUtility
{
    public static function getMD5Key(string $key): string
    {
        return hash('md5', $key);
    }
}