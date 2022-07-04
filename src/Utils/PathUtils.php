<?php
namespace Mention\Cache\Utils;

class PathUtils
{
    public static function isFilepath(string $path): bool
    {
        $path_fix = preg_match('#^(.+)/([^/]+)#', $path);
        if ($path_fix === 1)
            return false;

        return true;
    }
}
