<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->post('/login', 'LoginController::authenticate');
$routes->get('/login', 'LoginController::index');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/home', 'HomeController::index');

$routes->get('/schools', 'SchoolController::index');
$routes->get('/schools/new', 'SchoolController::new');
$routes->post('/schools/create', 'SchoolController::create');
$routes->get('/schools/delete/(:segment)', 'SchoolController::delete/$1');

$routes->get('/users', 'UserController::index');
$routes->get('/users/new', 'UserController::new');
$routes->get('/users/edit/(:segment)', 'UserController::edit/$1');
$routes->post('/users/update/(:segment)', 'UserController::update/$1');
$routes->post('/users/create', 'UserController::create');
$routes->get('/users/delete/(:segment)', 'UserController::delete/$1');

$routes->get('/courses', 'CourseController::index');
$routes->get('/courses/new', 'CourseController::new');
$routes->post('/courses/create', 'CourseController::create');
$routes->get('/courses/edit/(:segment)', 'CourseController::edit/$1');
$routes->post('/courses/update/(:segment)', 'CourseController::update/$1');
$routes->get('/courses/delete/(:segment)', 'CourseController::delete/$1');

$routes->get('/courses/(:segment)/assignments/', 'AssignmentController::index/$1');
$routes->get('/courses/(:segment)/assignments/new', 'AssignmentController::new/$1');
$routes->post('/courses/(:segment)/assignments/create', 'AssignmentController::create/$1');
$routes->get('/courses/(:segment)/assignments/(:segment)', 'AssignmentController::edit/$1/$2');
$routes->post('/courses/(:segment)/assignments/(:segment)/update', 'AssignmentController::update/$1/$2');
$routes->get('/courses/(:segment)/assignments/(:segment)/delete', 'AssignmentController::delete/$1/$2');

$routes->get('/courses/(:segment)/assignments/(:segment)/submissions', 'SubmissionController::index/$1/$2');
$routes->post('/submissions/(:segment)/qualify', 'SubmissionController::update/$1');

$routes->get('/students', 'SchoolController::index');
$routes->get('/schools/edit/(:segment)', 'SchoolController::edit/$1');
$routes->post('/schools/update/(:segment)', 'SchoolController::update/$1');
$routes->get('/schools/(:segment)/students', 'StudentController::read/$1');

$routes->get('/students/new/(:segment)', 'StudentController::new/$1');
$routes->post('/students/create/(:segment)', 'StudentController::create/$1');
$routes->get('/students/(:segment)/(:segment)', 'StudentController::readByID/$1/$2');
$routes->post('/students/update/(:segment)/(:segment)', 'StudentController::update/$1/$2');

$routes->get('/assignments', 'AssignmentController::my_assignments');
$routes->post('/submission/(:segment)/new', 'SubmissionController::create/$1');

