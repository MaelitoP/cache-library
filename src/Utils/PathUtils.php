<?php
namespace Mention\Cache\Utils;

class PathUtils
{
    public static function isValidKey(string $key): bool
    {
        $path_fix = preg_match('#^(.+)/([^/]+)#', $key);
        if ($path_fix === 1)
            return false;
        return true;
    }
}
