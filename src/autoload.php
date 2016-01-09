<?php

// framework/autoload.php

$app_dir = realpath(__DIR__. '/../');

require_once $app_dir.'/vendor/symfony/class-loader/Psr4ClassLoader.php';

use Symfony\Component\ClassLoader\Psr4ClassLoader;

//PSR-0準拠のClassLoaderだとうまくいかないのでこちらを使う
$loader = new Psr4ClassLoader();
$loader->register();

$loader->addPrefix('Symfony\\Component\\HttpFoundation', $app_dir.'/vendor/symfony/http-foundation');
