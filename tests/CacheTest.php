<?php
namespace Mention\Cache\Tests;

use PHPUnit\Framework\TestCase;

use Mention\Cache\File;
use Mention\Cache\Memory;
use Mention\Cache\CacheInterface;

class CacheTest extends TestCase
{
    public function testMemoryCache()
    {
        $memoryCache = new Memory();

        $this->testCachingIntegerObject($memoryCache);
        $this->testCachingArrayObject($memoryCache);
        $this->testCachingAssociativeArrayObject($memoryCache);
        $this->testCachingStringPathname($memoryCache);
    }

    public function testFileCache()
    {
        $fileCache = new File();

        $this->testCachingIntegerObject($fileCache);
        $this->testCachingArrayObject($fileCache);
        $this->testCachingAssociativeArrayObject($fileCache);
        $this->testCachingStringPathname($fileCache);
    }

    private function testCachingIntegerObject(CacheInterface $cache)
    {
        $cache->set('integer', 1234);
        $this->assertEquals(1234, $cache->get('integer'));
    }

    private function testCachingArrayObject(CacheInterface $cache)
    {
        $cache->set('array', array('v1', 'v2', 'v3'));
        $this->assertEquals(['v1', 'v2', 'v3'], $cache->get('array'));
    }

    private function testCachingAssociativeArrayObject(CacheInterface $cache)
    {
        $cache->set('map', array('v1' => 12, 'v2' => 22, 'v3' => 32));
        $this->assertEquals(['v1' => 12, 'v2' => 22, 'v3' => 32], $cache->get('map'));
    }

    private function testCachingStringPathname(CacheInterface $cache)
    {
        $cache->set('./../etc', 'string');
        $this->assertEquals('string', $cache->get('./../etc'));
    }
}