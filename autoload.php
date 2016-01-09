<?php

// framework/autoload.php

require_once __DIR__.'/vendor/symfony/class-loader/ClassLoader.php';

use Symfony\Component\ClassLoader\ClassLoader;

$loader = new ClassLoader();
$loader->register();
