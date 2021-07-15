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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'welcome/login';
$route['login/'] = 'welcome/login';
$route['logout'] = 'welcome/logout';
$route['logout/'] = 'welcome/logout';

$route['post_login'] = 'welcome/post_login';
$route['post_login/'] = 'welcome/post_login';

//
// MANAGE SITE ROUTES
//

$route['site/school/add'] = 'site/add_school';
$route['site/student/add'] = 'site/add_student';
$route['site/coordinator/add'] = 'site/add_coordinator';

//
// MANAGE SCHOOL ROUTES
//

$route['admin/school/delete'] = 'admin/delete_school';
$route['admin/school/id'] = 'admin/get_school_data';
$route['admin/school/edit'] = 'admin/edit_school';
$route['admin/school/add'] = 'admin/add_school';
$route['admin/school/activate'] = 'admin/activate_school';

//
//
//

$route['admin/gallery'] = 'gallery/index';

//
// MANAGE STUDENT ROUTES
//

$route['admin/student'] = 'admin/student_index';
$route['admin/student/list'] = 'admin/student_list';
$route['admin/student/deactivate'] = 'admin/deactivate_student';
$route['admin/student/activate'] = 'admin/activate_student';
$route['admin/student/add'] = 'admin/add_student';
$route['admin/student/get_student_data'] = 'admin/get_student_data';
$route['admin/student/edit'] = 'admin/edit_student';
$route['admin/student/delete'] = 'admin/delete_student_record';

//
// STUDENT FEES PAYMENTS ROUTES
//

$route['admin/student/get_payment_history'] = 'admin/get_payment_history';
$route['admin/student/payment/add'] = 'admin/add_payment';
$route['admin/student/payment/edit'] = 'admin/edit_payment';
$route['admin/student/payment/delete'] = 'admin/delete_payment';

//
// MANAGE COORDINTOR ROUTES
//

$route['admin/coordinator'] = 'admin/coordinator_index';
$route['admin/coordinator/list'] = 'admin/coordinator_list';
$route['admin/coordinator/deactivate'] = 'admin/deactivate_coordinator';
$route['admin/coordinator/activate'] = 'admin/activate_coordinator';
$route['admin/coordinator/delete'] = 'admin/delete_coordinator';
$route['admin/coordinator/add'] = 'admin/add_coordinator';
$route['admin/coordinator/get_coordinator_data'] = 'admin/get_coordinator_data';
$route['admin/coordinator/edit'] = 'admin/edit_coordinator';

//
// MANAGE NOTIFICATIONS ROUTES
//

$route['admin/notifications'] = 'admin/notification_index';
$route['admin/notifications/add'] = 'admin/add_notification';
$route['admin/notifications/edit'] = 'admin/edit_notification';
$route['admin/notifications/activate/(:num)'] = 'admin/notification_status/$1';
$route['admin/notifications/deactivate/(:num)'] = 'admin/notification_status/$1';
$route['admin/notifications/delete/(:num)'] = 'admin/delete_notification/$1';

//
// MANAGE EXAMINATIONS
//

$route['admin/examinations/'] = 'examinations/index';
$route['admin/examinations'] = 'examinations/index';
$route['admin/examinations/add/'] = 'examinations/add_examination';
$route['admin/examinations/add'] = 'examinations/add_examination';

$route['admin/examinations/(:num)/questions/add/'] = 'examinations/add_exam_questions/$1';
$route['admin/examinations/(:num)/questions/add'] = 'examinations/add_exam_questions/$1';

$route['admin/examinations/list/'] = 'examinations/get_examinations_list';
$route['admin/examinations/list'] = 'examinations/get_examinations_list';

$route['admin/examinations/get-details/'] = 'examinations/get_examination_detail';
$route['admin/examinations/get-details'] = 'examinations/get_examination_detail';

$route['admin/examinations/edit/'] = 'examinations/edit_examination';
$route['admin/examinations/edit'] = 'examinations/edit_examination';


$route['admin/examinations/(:num)/questions/edit/'] = 'examinations/edit_exam_questions/$1';
$route['admin/examinations/(:num)/questions/edit'] = 'examinations/edit_exam_questions/$1';

$route['admin/examinations/(:num)/questions/save/'] = 'examinations/questions_save/$1';
$route['admin/examinations/(:num)/questions/save'] = 'examinations/questions_save/$1';

$route['admin/examinations/options/delete/'] = 'examinations/delete_option';
$route['admin/examinations/options/delete'] = 'examinations/delete_option';

$route['admin/examination/(:num)/question/(:num)/delete/'] = 'examinations/delete_question/$1/$2';
$route['admin/examination/(:num)/question/(:num)/delete'] = 'examinations/delete_question/$1/$2';
