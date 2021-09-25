<?php

namespace Reboot\HttpServer;

class Server
{
    public function onRequest($request, $response){
        $response->header('Content-Type', 'text/plain');
        $response->end('Hello World');
    }
}