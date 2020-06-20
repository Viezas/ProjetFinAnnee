<?php
require 'models/Product.php';

$news = getLastProducts();
$newsImages = newsImages();
$i =0;
$view = 'views/index.php';
$pageTitle = 'Let\'s Duel !';
$pageDescription = 'Accueil du site';
$style = 'index';