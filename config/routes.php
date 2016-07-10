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
|	http://codeigniter.com/user_guide/general/routing.html
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
//$route['default_controller'] = 'welcome';
//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;
//$route['application'] = 'pages/application';
$route['myadmin/application/detail/(:any)'] = 'prend/detail/$1';
$route['myadmin/application'] = 'prend';
$route['myadmin/application/(:any)/(:any)'] = 'prend/view/$1/$2';
$route['myadmin/application/(:any)'] = 'prend/view/$1';



$route['applications'] = 'pages/all_form';
$route['all_form'] = 'pages/all_form';
$route['myadmin/delete_subpage/(:any)'] = 'myadmin/delete_subpage/$1';

$route['prend/print/(:any)'] = 'prend/print_detail/$1';
$route['putme/print/(:any)'] = 'putme/print_detail/$1';

$route['myadmin/send_link'] = 'myadmin/send_link';

$route['myadmin/open_prend_application'] = 'myadmin/open_prend_application';
$route['myadmin/open_putme_application'] = 'myadmin/open_putme_application';

$route['myadmin/gallery'] = 'myadmin/list_events';
$route['myadmin/create_event'] = 'myadmin/create_event';
$route['myadmin/delete_event/(:any)'] = 'myadmin/delete_event/$1';
$route['myadmin/edit_event/(:any)'] = 'myadmin/edit_event/$1';


$route['myadmin/documents'] = 'myadmin/list_documents';
$route['myadmin/create_document'] = 'myadmin/create_document';
$route['myadmin/delete_document/(:any)'] = 'myadmin/delete_document/$1';
$route['myadmin/edit_document/(:any)'] = 'myadmin/edit_document/$1';

$route['myadmin/banners'] = 'myadmin/list_banners';
$route['myadmin/create_banner'] = 'myadmin/create_banner';
$route['myadmin/delete_banner/(:any)'] = 'myadmin/delete_banner/$1';
$route['myadmin/edit_banner/(:any)'] = 'myadmin/edit_banner/$1';
//$route['myadmin/delete_banner/(:any)'] = 'myadmin/delete_banner//$1';

$route['prend'] = 'pages/prend';
//$route['gallery'] = 'pages/gallery';


$route['myadmin/prend/detail/(:any)'] = 'prend/detail/$1';
$route['myadmin/prend'] = 'prend';
$route['myadmin/prend/(:any)'] = 'prend/view/$1';
$route['form/(:any)'] = 'form/view/$1';
$route['myadmin/forms/(:any)'] = 'form/detail/$1';
$route['process_form'] = 'form/process_form';


$route['pages/send_mail'] = 'pages/send_mail';
$route['postutme'] = 'pages/postutme';


$route['myadmin/postutme/detail/(:any)'] = 'putme/detail/$1';
$route['myadmin/postutme'] = 'putme';
$route['myadmin/postutme/(:any)'] = 'putme/view/$1';

$route['myadmin/logout'] = 'myadmin/logout';
$route['myadmin/login'] = 'myadmin/login';

$route['myadmin/create_page'] = 'myadmin/create_page';
$route['myadmin/edit_page'] = 'myadmin/edit_page';

$route['myadmin/create_subpage'] = 'myadmin/create_subpage';
$route['myadmin/edit_subpage/(:any)/(:any)'] = 'myadmin/edit_subpage/$1/$2';
$route['myadmin/edit_subpage'] = 'myadmin/edit_subpage';

$route['myadmin/create_form'] = 'myadmin/create_form';
$route['myadmin/edit_form'] = 'myadmin/edit_form';

$route['myadmin/delete_department/(:any)'] = 'myadmin/delete_department/$1';
$route['myadmin/create_school'] = 'myadmin/create_school';
$route['myadmin/edit_school'] = 'myadmin/edit_school';
$route['myadmin/schools'] = 'myadmin/list_schools';
$route['myadmin/forms'] = 'myadmin/list_forms';

$route['myadmin/create_department'] = 'myadmin/create_department';
$route['myadmin/edit_department/(:any)/(:any)'] = 'myadmin/edit_department/$1/$2';
$route['myadmin/edit_department'] = 'myadmin/edit_department';
/*
$route['myadmin/edit_news'] = 'myadmin/edit_news';
$route['myadmin/create_news'] = 'myadmin/create_news';
$route['myadmin/news'] = 'myadmin/list_news';
*/

$route['myadmin/create_news'] = 'myadmin/create_news';
$route['myadmin/delete_news/(:any)'] = 'myadmin/delete_news/$1';
$route['myadmin/edit_news/(:any)'] = 'myadmin/edit_news/$1';
$route['myadmin/news'] = 'myadmin/list_news';

$route['myadmin/list_all_dept/(:any)'] = 'myadmin/list_all_dept/$1';
$route['myadmin/pages'] = 'myadmin/list_pages';
//$route['myadmin/home'] = 'myadmin/list_pages';

$route['myadmin/(:any)'] = 'myadmin/view/$1';
$route['myadmin/search_user'] = 'myadmin/search_user';

$route['myadmin/process_entitlement'] = 'users/process_entitlement';
$route['myadmin/entitlements'] = 'users/list_entitlements';
$route['myadmin/process_entitlement/(:any)'] = 'users/process_entitlement/$1';
$route['myadmin/users/get_entitlement/(:any)'] = 'users/process_entitlement/$1';


$route['myadmin'] = 'myadmin/list_users';


$route['myadmin/add_user'] = 'myadmin/add_user';
$route['myadmin/edit_user'] = 'myadmin/edit_user';

$route['myadmin/add_pcategory'] = 'myadmin/add_pcategory';
$route['myadmin/edit_pcategory'] = 'myadmin/edit_pcategory';

$route['myadmin/add_product'] = 'myadmin/add_product';
$route['myadmin/product'] = 'myadmin/list_products';

$route['myadmin/add_acategory'] = 'myadmin/add_acategory';
$route['myadmin/amount_category'] = 'myadmin/list_acategory';

$route['myadmin/outlets'] = 'myadmin/list_outlets';
$route['myadmin/add_outlet'] = 'myadmin/add_outlet';

$route['success'] = '';
$route['add_company'] = 'outlets/add_company';
$route['request_entitlement'] = 'users/request_entitlement';

$route['outlet/get_state'] = 'outlets/get_state';
$route['outlet/get_lga/(:any)'] = 'outlets/get_lga/$1';

$route['myadmin/users'] = 'myadmin/list_users';
$route['myadmin/partnership_requests'] = 'outlets/list_partnership_request';
$route['myadmin/entitlement_requests'] = 'users/list_entitlement_requests';

$route['myadmin/pcategory'] = 'myadmin/list_pcategory';

$route['user_login'] = 'users/user_login';
$route['products/(:any)'] = 'products/view/$1';

$route['users/changepass'] = 'users/changepass';

$route['products/(:any)'] = 'products/view/$1';
$route['products'] = 'products/view';

$route['outlets'] = 'outlets/get_outlets';
$route['outlets/(:any)'] = 'outlets/view/$1';

$route['logout'] = 'pages/logout';
$route['referral/(:any)'] = 'users/refer/$1';


$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';

$route['(:any)'] = 'pages/view/$1';
$route['detail/(:any)'] = 'pages/detail/$1';

$route['pages/(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
