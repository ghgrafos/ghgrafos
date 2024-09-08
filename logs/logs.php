<?php
require_once "../vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;


    // Create the logger
$logger = new Logger('gh');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__.'/logs', Level::Debug));
$logger->pushHandler(new FirePHPHandler());

// You can now use your logger
$logger->info('meu aerquivo de log esta gravando!');

$stream = new StreamHandler(__DIR__.'/logs.log', Level::Debug);
$firephp = new FirePHPHandler();

