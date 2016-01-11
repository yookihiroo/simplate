<?php
/**
 * Web フレームワークをつくろう - Symfony2 コンポーネントの上に (パート 11)
 * http://docs.symfony.gr.jp/symfony2/create-your-framework/part11.html
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;
use Symfony\Component\EventDispatcher\EventDispatcher;

require __DIR__. '/../vendor/autoload.php';

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new HttpKernel\Controller\ControllerResolver();
$stack = new Symfony\Component\HttpFoundation\RequestStack();
$stack->push($request);

$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher, $stack));

$listener = new HttpKernel\EventListener\ExceptionListener('Calendar\\Controller\\ErrorController::exceptionAction');
$dispatcher->addSubscriber($listener);
$dispatcher->addSubscriber(new HttpKernel\EventListener\ResponseListener('UTF-8'));
$dispatcher->addSubscriber(new HttpKernel\EventListener\StreamedResponseListener());
$dispatcher->addSubscriber(new Simplex\StringResponseListener());

$framework = new Simplex\Framework($dispatcher, $resolver, $stack);

$response = $framework->handle($request);
$response->send();
