<?php
/**
 * Web フレームワークをつくろう - Symfony2 コンポーネントの上に (パート 8)
 * http://docs.symfony.gr.jp/symfony2/create-your-framework/part08.html
 */

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new HttpKernel\Controller\ControllerResolver();

$framework = new Simplex\Framework($matcher, $resolver);
$response = $framework->handle($request);

$response->send();
