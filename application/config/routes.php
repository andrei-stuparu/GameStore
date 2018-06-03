<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['allOrders']='pages/view/allOrders';
$route['orders']='pages/view/orders';
$route['cart']='pages/view/cart';
$route['update']='pages/update_game/$1';
$route['shop']='pages/view/shop';
$route['create']='pages/view/create';
$route['login']='pages/view/login';
$route['login2']='pages/view/login2';
$route['categories']='pages/gamesByCategory';
$route['catego']='pages/view/categories';
$route['games']='pages/view/games';
$route['default_controller'] = 'pages/view1';
$route['(:any)'] = 'pages/view1/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
