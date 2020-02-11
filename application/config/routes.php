<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']   = 'dashboard/list';
$route['login']                = 'user/login';
$route['logout']               = 'user/logout';
$route['suplayer']               = 'suplayer/list';
$route['barang']               = 'barang/list';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
