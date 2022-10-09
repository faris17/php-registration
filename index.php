<?php
require_once 'config/const.php';
require_once 'config/db/connect.php';

$title = 'Index';
$page = $_GET['page'];

require_once 'includes/layouts/header.php';

//content here
    if(isset($page)){
        if($page == 'submitRegister'){
            include "includes/pages/register/submitRegister.php";
        }
        else if($page == 'viewRegister'){
            include "includes/pages/register/viewRegister.php";
        }
        else if($page == 'viewDetail'){
            include "includes/pages/register/viewDetail.php";
        }
        else if($page == 'viewSearch'){
            include "includes/pages/register/viewSearch.php";
        }
        else if($page == 'editRegister'){
            include "includes/pages/register/formEditRegister.php";
        }
        else if($page == 'login'){
            if($_SESSION['id'] != null){
                header('Location: '.baseUrl.'?page=viewRegister');
            }
            include "includes/pages/login/login.php";
        }
        else if($page == 'logout'){
            session_destroy();
            header('Location: '.baseUrl.'/?page=login');
        }
        else {
            echo 'no Page';
        }
       
    }else {
        include "includes/pages/register/formRegister.php";
    }
//endcontent

require_once 'includes/layouts/footer.php';
?>