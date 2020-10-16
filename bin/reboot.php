<?php

require 'vendor/autoload.php';

use Symfony\Component\Console\Application;
use Reboot\Command\StartCommand;

$application = new Application();
$application->add(new StartCommand());

$application->run();