<?php
namespace Mention\Cache;

use Mention\Cache\Utility\HashUtility;
use Mention\Cache\Utility\Serializable;

final class File implements CacheInterface
{
    private const CACHE_FILE_PATH = '/tmp/%s.txt';

    public function set(string $key, $value): void
    {
        file_put_contents($this->getFilePath($key), Serializable::encode($value));
    }

    public function get(string $key): mixed
    {
        $filePath = $this->getFilePath($key);
        $value = $this->getCacheValue($filePath);

        if (!$this->isReadable($value))
            unlink($filePath);

        return $value;
    }

    private function getFilePath(string $key): string
    {
        $fileName = HashUtility::getMD5Key($key);
        return sprintf(self::CACHE_FILE_PATH, $fileName);
    }

    private function getCacheValue(string $filePath): mixed
    {
        if (!file_exists($filePath) || !is_readable($filePath))
            return NULL;

        $fileContent = file_get_contents($filePath);
        return Serializable::decode($fileContent);
    }

    private function isReadable(mixed $value): bool
    {
        return $value ? true : false;
    }
}