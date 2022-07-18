<?php
namespace Mention\Cache\Tests;

use PHPUnit\Framework\TestCase;
use Mention\Cache\Hash;

final class HashTest extends TestCase
{
    public function testHash()
    {
        $this->assertEquals(Hash::getMD5Key('../root/'), '507bc2341dabf8ee17ca1544c726617e', "check MD5 hash result");
    }
}