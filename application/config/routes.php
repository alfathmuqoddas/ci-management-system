<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['default_controller'] = 'pages/view';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

$route['input'] = 'input/index';
$route['input/create'] = 'input/create';
$route['input/view/(:any)'] = 'input/view/$1';

$route['manager'] = 'manager/index';
$route['manager/create'] = 'manager/create';
$route['manager/view/(:any)'] = 'manager/view/$1';

$route['developer'] = 'developer/index';
$route['developer/create'] = 'developer/create';
$route['developer/view/(:any)'] = 'developer/view/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
