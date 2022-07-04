<?php
namespace Mention\Cache\Model;

use Mention\Cache\Utils\PathUtils;
use Exception;

class FileCache implements CacheInterface
{
    private const CACHE_FILE_PATH = '/tmp/%s.txt';

    public function set(string $key, $value): void
    {
        if (!PathUtils::isValidKey($key))
            throw new Exception('Key name is invalid');

        $file_path = sprintf(self::CACHE_FILE_PATH, $key);
        file_put_contents($file_path, serialize($value));
    }

    public function get(string $key): mixed
    {
        $file_path = sprintf(self::CACHE_FILE_PATH, $key);
        if (!file_exists($file_path) || !is_readable($file_path))
            return NULL;

        $file_contents = file_get_contents($file_path);
        $value = unserialize($file_contents);

        if (!$value) {
            unlink($file_path);
            return NULL;
        }
        return $value;
    }
}