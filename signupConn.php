<?php

include 'conn.php';
include 'func.php';

if(isset($_POST['save'])){

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $confpass = $_POST["confpassword"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];

    $isValidReg = register($user,$pass,$confpass,$fname,$lname,$gender);

    if($isValidReg == true){
        echo '<script language="javascript">';
        echo 'alert("Data inserted!")';
        echo '</script>';
        header("Location: login.php");
    } else{
        echo '<script language="javascript">';
        echo 'alert("Please make sure both passwords are the same!")';
        echo '</script>';
    }
    
}





    ?>