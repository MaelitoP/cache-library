<?php
namespace Mention\Cache\Service;

use Mention\Cache\Model\MemCache;
use Mention\Cache\Model\FileCache;

class CacheService
{
    private MemCache $memCache;
    private FileCache $fileCache;

    public function __construct()
    {
        $this->fileCache = new FileCache();
        $this->memCache = new MemCache();
    }

    public function getMemCache()
    {
        return $this->memCache;
    }

    public function getFileCache()
    {
        return $this->fileCache;
    }
}
