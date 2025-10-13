<?php

declare(strict_types=1);

use Laminas\Mvc\Application;
use Laminas\Stdlib\ArrayUtils;

// Build application configuration, merging development settings if present.
$appConfig = require __DIR__ . '/application.config.php';
if (file_exists(__DIR__ . '/development.config.php')) {
    /** @var array $devConfig */
    $devConfig = require __DIR__ . '/development.config.php';
    $appConfig = ArrayUtils::merge($appConfig, $devConfig);
}

$application = Application::init($appConfig);

return $application->getServiceManager();
