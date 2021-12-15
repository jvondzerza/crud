<?php
declare(strict_types=1);

//include all your model files here

//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/StudentController.php';
require 'Controller/TeacherController.php';
require 'Controller/SchoolClassController.php';
require 'Controller/EditController.php';
require 'Controller/DetailedViewController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'student') {
    $controller = new StudentController();
}
if(isset($_GET['page']) && $_GET['page'] === 'teacher') {
    $controller = new TeacherController();
}
if(isset($_GET['page']) && $_GET['page'] === 'class') {
    $controller = new SchoolClassController();
}
if(isset($_GET['page']) && $_GET['page'] === 'edit') {
    $controller = new EditController();
}
if(isset($_GET['page']) && $_GET['page'] === 'details') {
    $controller = new DetailedViewController();
}
$controller->render($_GET, $_POST);