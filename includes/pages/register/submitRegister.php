<?php

if(isset($_POST['submit'])){
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $gender = $_POST['gender'];

    $date = explode('-', $_POST['date']);
    $birth = $date[2].'-'.$date[1].'-'.$date[0];

    $specialist = $_POST['specialist'];
    $email = $_POST['email'];
    $contact = $_POST['contactNumber'];
    $aboutme = $_POST['aboutme'];

    $isSuccess = $crud->insert($fname, $lname, $gender, $birth, $email, $contact, $specialist, $aboutme);

    if($isSuccess){
        $status = true;
        echo "<h1 class='mt-4 text-center text-success'>Registered Success!</h1>";
        echo "<div class='text-center'>
        <a href='".baseUrl."'><button class='btn btn-secondary'>Kembali</button></a></div>";
    } else {
        echo "<h1 class='text-center text-danger>$isSuccess</h1>";
        $status = false;
    }

}


if(isset($_POST['update']) and $_POST['update']=='update'){
    $id = $_POST['idbiodata'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $gender = $_POST['gender'];

    $date = explode('-', $_POST['date']);
    $birth = $date[2].'-'.$date[1].'-'.$date[0];

    $specialist = $_POST['specialist'];
    $email = $_POST['email'];
    $contact = $_POST['contactNumber'];
    $aboutme = $_POST['aboutme'];

    $isSuccess = $crud->editRegister($fname, $lname, $gender, $birth, $email, $contact,  $aboutme, $specialist, $id);

    if($isSuccess){
        echo "<h1 class='mt-4 text-center text-success'>Update Register Success!</h1>";
        echo "<div class='text-center'>
        <a href='".baseUrl."?page=viewRegister'><button class='btn btn-secondary'>List</button></a></div>";
        $status = true;
    } else {
        echo "<h1 class='text-center text-danger>$isSuccess</h1>";
        $status = false;
    }

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $isSuccess = $crud->deleteRegister($id);

    if($isSuccess){
        header('Location:' . baseUrl.'?page=viewRegister');
    } else {
        echo "<h1 class='text-center text-danger>$isSuccess</h1>";
    }
}