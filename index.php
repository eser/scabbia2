<?php

if (!file_exists($scabbiaLoader = __DIR__ . '/vendor/autoload.php')) {
    throw new RuntimeException('Unable to load Composer which is required for Scabbia2. Run `php scabbia upgrade`.');
}

$loader = require($scabbiaLoader);

if (defined('SCABBIA2_PATH') && SCABBIA2_PATH !== false) {
    $loader->set('Scabbia', SCABBIA2_PATH);
} elseif (file_exists($scabbia2Path = __DIR__ . '/../scabbia2-dev/src')) {
    $loader->set('Scabbia', $scabbia2Path);
}

use Scabbia\Framework\Framework;

// it's only initializes framework with the spl autoloader.
Framework::load($loader);

// read project.yml and cache its output into cache/project.yml.php
Framework::runProjectConfig('project.yml');
