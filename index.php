<?php
/**
 * Web フレームワークをつくろう - Symfony2 コンポーネントの上に (パート 3)
 * http://docs.symfony.gr.jp/symfony2/create-your-framework/part03.html
 */

require_once __DIR__.'/init.php';

$input = $request->get('name', 'World');

$response->setContent(sprintf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')));
$response->send();
