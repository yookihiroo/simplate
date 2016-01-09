<?php
/**
 * Web フレームワークをつくろう - Symfony2 コンポーネントの上に (パート 2)
 * http://docs.symfony.gr.jp/symfony2/create-your-framework/part02.html
 */

$input = isset($_GET['name']) ? $_GET['name'] : 'World';

header('Content-Type: text/html; charset=utf-8');

printf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));
