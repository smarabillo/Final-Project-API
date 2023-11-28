<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    include_once 'class/user-class.php';
    include 'config/config.php';

    $page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
    $subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
    $action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
    $id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

    $user = new Users();

    if(!$user->get_session()){
        header("location: login.php");
    }
?>

<h1>Hello World</h1>
<button><a href="logout.php">Logout</a></button>
