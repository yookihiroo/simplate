<?php
/**
 * Web フレームワークをつくろう - Symfony2 コンポーネントの上に (パート 11)
 * http://docs.symfony.gr.jp/symfony2/create-your-framework/part11.html
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

require __DIR__. '/../vendor/autoload.php';

$sc = include __DIR__.'/../src/container.php';

$sc->setParameter('charset', 'UTF-8');
$sc->setParameter('routes', include __DIR__.'/../src/app.php');

//Requestの登録
$request = Request::createFromGlobals();
$sc->set('request', $request);
$stack = new RequestStack();
$stack->push($request);
$sc->set('request.stack', $stack);

$response = $sc->get('framework')->handle($request);

$response->send();
