<?php

!defined('BASE_PATH') && define('BASE_PATH',dirname(__DIR__,1));
require BASE_PATH."/vendor/autoload.php";

use Symfony\Component\Console\Application;
use Reboot\Config\ConfigFactory;
use Reboot\Command\StartCommand;

$application = new Application();


$config = new ConfigFactory();
$config = $config();
$commands = $config->get('commands');
foreach ($commands as $command){
    if($command == StartCommand::class){
        $application->add(new StartCommand($config));
    }else {
        $application->add(new $command);
    }
}
$application->run();