<?php
namespace Mention\Cache\Model;

interface CacheInterface
{
    /**
     * Store data in memory
     */
    public function set(string $key, $value): void;

    /**
     * Get data from memory
     * @return mixed - value on success or null on failure
     */
    public function get(string $key): mixed;
}