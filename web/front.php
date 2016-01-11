<?php
/**
 * Web フレームワークをつくろう - Symfony2 コンポーネントの上に (パート 9)
 * http://docs.symfony.gr.jp/symfony2/create-your-framework/part09.html
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;
use Symfony\Component\EventDispatcher\EventDispatcher;

require_once __DIR__.'/../vendor/autoload.php';

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new Simplex\ContentLengthListener());
$dispatcher->addSubscriber(new Simplex\GoogleListener());

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new HttpKernel\Controller\ControllerResolver();

$framework = new Simplex\Framework($dispatcher, $matcher, $resolver);
$response = $framework->handle($request);
$framework = new HttpKernel\HttpCache\HttpCache($framework, new HttpKernel\HttpCache\Store(__DIR__.'/../cache'));

$framework->handle($request)->send();
