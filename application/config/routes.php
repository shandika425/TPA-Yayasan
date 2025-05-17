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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['pendaftaran'] = 'pendaftaran/index';
$route['pendaftaran/formulir_pembayaran/(:num)'] = 'pendaftaran/formulir_pembayaran/$1';


$route['auth/login'] = 'auth/login';
$route['auth/do_login'] = 'auth/do_login';
$route['auth/logout'] = 'auth/logout';

$route['admin/kegiatan'] = 'kegiatan/index';
$route['admin/keg_tambah'] = 'kegiatan/keg_tambah';
$route['admin/keg_edit/(:num)'] = 'kegiatan/keg_edit/$1';
$route['admin/keg_hapus/(:num)'] = 'kegiatan/keg_hapus/$1';
$route['admin/set_lunas/(:num)'] = 'admin/set_lunas/$1';

$route['guru'] = 'guru/index';
$route['admin/guru_tambah'] = 'guru/guru_tambah';
$route['admin/proses_tambah'] = 'guru/proses_tambah';
$route['admin/guru_edit/(:num)'] = 'guru/guru_edit/$1';
$route['admin/hapus_guru/(:num)'] = 'guru/hapus_guru/$1';

$route['user/dashboard_user/(:num)'] = 'pendaftaran/dashboard_user/$1';

$route['dashboard/kuker'] = 'dashboard/index/kuker'; // Dashboard proyek kuker
$route['dashboard/yayasan'] = 'dashboard/index/yayasan'; // Dashboard proyek yayasan

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;