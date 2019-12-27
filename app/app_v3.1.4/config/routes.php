<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home/home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//tin tuc
$route['tin-tuc.html'] = 'news/news/index';
$route['([a-zA-Z0-9-_]+)-tt([0-9]+).html'] = 'news/news/detail/$1/$2';
$route['tim-kiem-tin-tuc.html'] = 'news/news/search';

//giai tri
$route['goc-thu-gian.html'] = 'funs/funs/index';
$route['([a-zA-Z0-9-_]+)-gtg([0-9]+).html'] = 'funs/funs/detail/$1/$2';
$route['tim-kiem-thu-gian.html'] = 'funs/funs/search';

//tai lieu
$route['tai-lieu.html'] = 'document/document/index';
$route['([a-zA-Z0-9-_]+)-document([0-9]+).html'] = 'document/document/detail/$1/$2';
$route['tim-kiem-tai-lieu.html'] = 'document/document/search';

//sach
$route['sach.html'] = 'book/book/index';
$route['([a-zA-Z0-9-_]+)-book([0-9]+).html'] = 'book/book/detail/$1/$2';
$route['tim-kiem-sach.html'] = 'book/book/search';

//lien he
$route['lien-he.html'] = 'contact/contact/index';

$route['ajax_add_contact'] = 'contact/contact/ajax_add_contact';

//gioi thieu
$route['gioi-thieu.html'] = 'intro/intro/index';

//tai xuong
$route['download-([a-z]+)-([0-9]+)'] = 'taixuong/taixuong/index/$1/$2';