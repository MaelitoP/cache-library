<?php
namespace Mention\Cache;

class File implements CacheInterface
{
    private const CACHE_FILE_PATH = '/tmp/%s.txt';

    public function set(string $key, $value): void
    {
        file_put_contents($this->getFilePath($key), serialize($value));
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
        $fileName = Hash::getMD5Key($key);
        return sprintf(self::CACHE_FILE_PATH, $fileName);
    }

    private function getCacheValue(string $filePath): mixed
    {
        if (!file_exists($filePath) || !is_readable($filePath))
            return NULL;

        $fileContents = file_get_contents($filePath);
        return unserialize($fileContents);
    }

    private function isReadable(mixed $value): bool
    {
        if ($value)
            return true;
        return false;
    }
}