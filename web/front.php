<?php
/**
 * Web フレームワークをつくろう - Symfony2 コンポーネントの上に (パート 11)
 * http://docs.symfony.gr.jp/symfony2/create-your-framework/part11.html
 */

use Symfony\Component\HttpFoundation\Request;

require __DIR__. '/../vendor/autoload.php';

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$framework = new Simplex\Framework($routes);

$framework->handle($request)->send();
