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
// Global Routes
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;
	$route['send-email'] = 'email controller';
	$route['email'] = 'email controller/send';

// Employee Controller Routes
	$route['default_controller'] = 'employee2';
	$route['form-report-hazard'] = 'employee2';
	$route['report-hazard'] = 'employee2/report_hazard';
	$route['show-data-dropdown'] = 'employee2/show_chained';

// Admin System Controller Routes
	$route['login-admin'] = 'loginadminsystem';
	$route['check-login-admin'] = 'loginadminsystem/login_action';
	$route['admin'] = 'adminsystem';
	$route['admin-data-in'] = 'adminsystem/incoming_data';
	$route['admin-data-pending'] = 'adminsystem/pending_data';
	$route['admin-progress-data'] = 'adminsystem/data_in_progress';
	$route['admin-data-complete'] = 'adminsystem/data_complete';
	$route['admin-history-data'] = 'adminsystem/history_data';
	$route['admin-data-request'] = 'adminsystem/request_data';
	$route['admin-logout'] = 'adminsystem/logout';

// Admin Unit ST Controller Routes
	$route['login-admin-st'] = 'loginadminst';
	$route['admin-st'] = 'adminst';
	$route['logout-admin-st'] = 'adminst/logout';

// Employee Unit ST Controller Routes
	$route['login-unit-st'] = 'loginunitst';
	$route['unit-st'] = 'unitst';
	$route['logout-unit-st'] = 'unitst/logout';