<?php
namespace Mention\Cache\Tests;

use PHPUnit\Framework\TestCase;
use Mention\Cache\File;

final class FileTest extends TestCase
{
    public function testFile()
    {
        $fileCache = new File();

        $fileCache->set('integer', 1234);
        $this->assertEquals(1234, $fileCache->get('integer'), "save and get Integer to file cache");

        $fileCache->set('array', array('v1', 'v2', 'v3'));
        $this->assertEquals(['v1', 'v2', 'v3'], $fileCache->get('array'), "save and get Array to file cache");

        $fileCache->set('map', array('v1' => 12, 'v2' => 22, 'v3' => 32));
        $this->assertEquals(['v1' => 12, 'v2' => 22, 'v3' => 32], $fileCache->get('map'), "save and get HashMap to file cache");

        $fileCache->set('/etc', 'string');
        $this->assertEquals('string', $fileCache->get('/etc'), "save and get String to file cache");
    }
}