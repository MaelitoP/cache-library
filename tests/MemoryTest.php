<?php
namespace Mention\Cache\Tests;

use PHPUnit\Framework\TestCase;
use Mention\Cache\Memory;

final class MemoryTest extends TestCase
{
    public function testMemory()
    {
        $memCache = new Memory();

        $memCache->set('integer', 1234);
        $this->assertEquals(1234, $memCache->get('integer'), "save and get Integer to memory cache");

        $memCache->set('array', array('v1', 'v2', 'v3'));
        $this->assertEquals(['v1', 'v2', 'v3'], $memCache->get('array'), "save and get Array to memory cache");

        $memCache->set('map', array('v1' => 12, 'v2' => 22, 'v3' => 32));
        $this->assertEquals(['v1' => 12, 'v2' => 22, 'v3' => 32], $memCache->get('map'), "save and get HashMap to memory cache");

        $memCache->set('/etc', 'string');
        $this->assertEquals('string', $memCache->get('/etc'), "save and get String to memory cache");
    }
}