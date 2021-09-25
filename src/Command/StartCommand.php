<?php

namespace Reboot\Command;

use Reboot\Config\Config;
use Reboot\Server\ServerFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StartCommand extends Command
{
    /**
     * @var Config
     */
    protected $config;

    protected function configure()
    {
        $this->setName('start')->setDescription('启动服务');
    }

    public function __construct($config)
    {
        parent::__construct();
        $this->config = $config;
    }

    protected function execute(InputInterface $input, OutputInterface $output):int
    {

        $config = $this->config;
        $configs = $config->get('server');
        $serverFactory = new ServerFactory();
        $serverFactory->configure($configs);
        $serverFactory->getServer()->start();
        return 1;
    }
}