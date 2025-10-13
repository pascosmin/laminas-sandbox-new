<?php

declare(strict_types=1);

namespace Application;

use Laminas\EventManager\EventManager;

class Module
{
    function onBootstrap($e): void
    {
        // Bootstrap hook - keep empty or attach real listeners here.
        // Avoid side-effects like var_dump during normal request handling.
    }

    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }
}
