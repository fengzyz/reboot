<?php

namespace Reboot\Config;

use Reboot\Contract\ConfigInterface;

class Config implements ConfigInterface
{
    /**
     * @var array
     */
    protected $configs = [];

    public function __construct(array $configs)
    {
        $this->configs = $configs;
    }

    public function get(string $key, $default = null)
    {
       return $this->configs[$key] ? : $default;
    }

    public function has(string $keys)
    {
        return isset($this->configs[$keys]);
    }

    public function set(string $key, $value)
    {
        return $this->configs[$key] = $value;
    }
}