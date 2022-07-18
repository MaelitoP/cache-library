<?php
namespace Mention\Cache\Utility;

class Serializable
{
    public static function encode(mixed $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR | JSON_FORCE_OBJECT);
    }

    public static function decode(string $data): mixed
    {
        return json_decode($data, JSON_THROW_ON_ERROR);
    }
}