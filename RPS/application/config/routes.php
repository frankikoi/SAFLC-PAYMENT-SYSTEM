<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home/login';
// $route['default_controller'] = 'home';
$route['students'] = 'home/dispstud';
$route['transaction'] = 'home/transaction';
$route['enroll'] = 'home/enrollStudent';
$route['payment']='home/payment';
$route['view'] = 'home/viewUserTransaction';
$route['login_validation'] = 'home/login_validation';
$route['index']= 'home';

$route['check'] = 'home/checkdb';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
