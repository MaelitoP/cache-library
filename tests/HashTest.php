<?php
namespace Mention\Cache\Tests;

use Mention\Cache\Utils\Hash;
use PHPUnit\Framework\TestCase;

final class HashTest extends TestCase
{
    public function testHash()
    {
        $this->assertEquals(Hash::getMD5Key('../root/'), '507bc2341dabf8ee17ca1544c726617e', "save and get Integer to file cache");
    }
}