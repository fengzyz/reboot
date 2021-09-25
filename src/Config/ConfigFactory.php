<?php

namespace Reboot\Config;

use Symfony\Component\Finder\Finder;

class ConfigFactory
{
    public function __invoke(){
        $basePath = BASE_PATH.'/config';
        $configFile = $this->readConfig($basePath.'/config.php');
        $autoloadCofing = $this->readPath([$basePath.'/autoload']);
        $configs = array_merge_recursive($configFile,$autoloadCofing);
        return new Config($configs);
    }
    protected function readConfig(string $string) :array{
        $config = require $string;
        if(!is_array($config)){
            return [];
        }

        return $config;
    }

    protected function readPath (array $dirs):array
    {
        $finder = new Finder();
        $finder->files()->in($dirs)->name('*.php');
        $config = [];
        foreach ($finder as $fileInfo){
            $key = $fileInfo->getBasename('.php');
            $value = require $fileInfo->getRealPath();
            $config[$key] = $value;
        }
        return $config;
    }
}