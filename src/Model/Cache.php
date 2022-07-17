<?php
namespace Mention\Cache\Model;

interface Cache
{
    /**
     * Store data in cache
     * @param string $key
     * @param $value
     */
    public function set(string $key, $value): void;

    /**
     * Get data from cache
     * @param string $key
     * @return mixed - value on success or null on failure
     */
    public function get(string $key): mixed;
}