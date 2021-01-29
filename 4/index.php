<?php

require 'DB.php';
require 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$limit = 5;

if (isset($_GET['from'])) {
    $count = DB::getInstance()->getCount(DB::TABLE_GOODS);
    $loaded = $_GET['from'] + $limit;
    $all = $loaded >= $count;

    $goods = DB::getInstance()->getPart(DB::TABLE_GOODS, $_GET['from'], $limit);
    echo $twig->render('goods.twig', [
        'goods' => $goods,
        'all' => $all,
    ]);
    exit;
}

$goods = DB::getInstance()->getAllData(DB::TABLE_GOODS);

echo $twig->render('index.twig', [
    'goods' => $goods,
    'limit' => $limit,
]);