<?php
/**
 * Web フレームワークをつくろう - Symfony2 コンポーネントの上に (パート 2)
 * http://docs.symfony.gr.jp/symfony2/create-your-framework/part02.html
 */

require_once __DIR__.'/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$input = $request->get('name', 'World');

$response = new Response(sprintf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')));

$response->send();
