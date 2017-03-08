<?php 

define('BASE_PATH', dirname(__DIR__));

include BASE_PATH . '/helpers/init.php';
include BASE_PATH . '/helpers/app.php';
include BASE_PATH . '/helpers/database.php';

if (! isset($_SESSION['user'])) {
    redirect(url('admin/login.php'));
}

$module = isset($_GET['module']) ? $_GET['module'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$subview = BASE_PATH . '/admin/modules/' . $module . '/' . $action . '.php';


include 'layouts/master.php';