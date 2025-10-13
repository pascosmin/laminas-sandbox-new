<?php

declare(strict_types=1);

namespace Application;

use Laminas\EventManager\EventManager;

class Module
{
    function onBootstrap($e): void
    {
        //var_dump("we are in");
        $events = new EventManager();
        $events->attach('hack_detected', function ($e) {
            //send email
            var_dump('Hack has been detected');
        });



        $params = []; // define parameters if needed, or adjust as necessary
        $events->trigger('hack_detected', null);
    }

    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }
}
