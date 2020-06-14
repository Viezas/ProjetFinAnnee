<?php
require ('helpers.php');

if(isset($_GET['page'])){
    switch ($_GET['page']){
        case'index' :
            require 'controllers/indexController.php';
            break;

        case'users' :
            require 'controllers/usersController.php';
            break;

        case'categories' :
            require 'controllers/categoriesController.php';
            break;

        case'products' :
            require 'controllers/productsController.php';
            break;

        case'orders' :
            require 'controllers/ordersController.php';
            break;

        default :
            require 'controllers/indexController.php';
    }
}
else{
    require 'controllers/indexController.php';
}

require ('views/layout.php');

if(isset($_SESSION['messages'])){
    unset($_SESSION['messages']);
}
if(isset($_SESSION['old_inputs'])){
    unset($_SESSION['old_inputs']);
}