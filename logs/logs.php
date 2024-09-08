<?php
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

    // Create the logger
$logger = new Logger('/logs');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__.'/logs', Level::Debug));
$logger->pushHandler(new FirePHPHandler());

// You can now use your logger
$logger->info('My logger is now ready');
