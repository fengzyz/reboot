<?php

use Reboot\Server\Server;
return [
    'type' => Server::class,
    'mode' => SWOOLE_PROCESS,
    'servers' => [
        [
            'name' => 'http',
            'type' => Server::SERVER_HTTP,
            'host' => '0.0.0.0',
            'port' => 9501,
            'sock_type' => SWOOLE_SOCK_TCP,
            'callbacks' => [
                'request' => [Reboot\HttpServer\Server::class, 'onRequest'],
            ],
        ],
    ],
    'settings' => [
        'enable_coroutine' => true,
        'worker_num'=> 1,
    ],
    'callbacks' => [
        'worker_start' => [Hyperf\Framework\Bootstrap\WorkerStartCallback::class, 'onWorkerStart'],
        ]
];