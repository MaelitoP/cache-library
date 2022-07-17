<?php
namespace Mention\Cache\Utils;

class Hash
{
    public static function getMD5Key(string $key): string
    {
        return hash('md5', $key);
    }
}
