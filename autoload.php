<?php

// framework/autoload.php

require_once __DIR__.'/vendor/symfony/class-loader/Psr4ClassLoader.php';

use Symfony\Component\ClassLoader\Psr4ClassLoader;

//PSR-0準拠のClassLoaderだとうまくいかないのでこちらを使う
$loader = new Psr4ClassLoader();
$loader->register();

$loader->addPrefix('Symfony\\Component\\HttpFoundation', __DIR__.'/vendor/symfony/http-foundation');
