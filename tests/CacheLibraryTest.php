<?php
namespace Mention\Cache\Tests;

use PHPUnit\Framework\TestCase;
use Mention\Cache\Service\CacheService;

final class CacheLibraryTest extends TestCase
{
    public function testCacheLibrary()
    {
        $cache = new CacheService();

        $cache->getFileCache()->set('integer', 1234);
        $cache->getMemCache()->set('integer', 1234);
        $this->assertEquals(1234, $cache->getFileCache()->get('integer'), "save and get Integer to file cache");
        $this->assertEquals(1234, $cache->getMemCache()->get('integer'), "save and get Integer to memory cache");

        $cache->getFileCache()->set('array', array('v1', 'v2', 'v3'));
        $cache->getMemCache()->set('array', array('v1', 'v2', 'v3'));
        $this->assertEquals(['v1', 'v2', 'v3'], $cache->getFileCache()->get('array'), "save and get Array to file cache");
        $this->assertEquals(['v1', 'v2', 'v3'], $cache->getMemCache()->get('array'), "save and get Array to memory cache");

        $cache->getFileCache()->set('map', array('v1' => 12, 'v2' => 22, 'v3' => 32));
        $cache->getMemCache()->set('map', array('v1' => 12, 'v2' => 22, 'v3' => 32));
        $this->assertEquals(['v1' => 12, 'v2' => 22, 'v3' => 32], $cache->getFileCache()->get('map'), "save and get HashMap to file cache");
        $this->assertEquals(['v1' => 12, 'v2' => 22, 'v3' => 32], $cache->getMemCache()->get('map'), "save and get HashMap to memory cache");

        $cache->getFileCache()->set('/etc', 'string');
        $cache->getMemCache()->set('/etc', 'string');
        $this->assertEquals('string', $cache->getFileCache()->get('/etc'), "save and get String to file cache");
        $this->assertEquals('string', $cache->getMemCache()->get('/etc'), "save and get String to memory cache");

        $this->expectException(\Exception::class);
        $cache->getFileCache()->set('../etc', 'string_path');

        $this->expectException(\Exception::class);
        $cache->getMemCache()->set('../etc', 'string_path');
    }
}