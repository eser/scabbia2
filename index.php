<?php

if (!file_exists($scabbiaLoader = __DIR__ . '/vendor/autoload.php')) {
    throw new RuntimeException('Unable to load Composer which is required for Scabbia2. Run `php bin/scabbia upgrade`.');
}

$loader = require($scabbiaLoader);
