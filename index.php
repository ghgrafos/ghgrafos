<?php

require 'public' . DIRECTORY_SEPARATOR . 'index.php';


#!/usr/bin/env php
// bin/doctrine

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

// Adjust this path to your actual bootstrap.php
require 'config/bootstrap.php';

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);