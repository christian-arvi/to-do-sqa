<?php

include 'conn.php';
include 'func.php';

    if(isset($_POST['login'])){

        $user = $_POST["username"];
        $pass = $_POST["password"];

        $isValidLog = login($user,$pass);

        if($isValidLog === true){
            
            header("Location: home.php");
            
        } else{
            echo '<script language="javascript">';
            echo 'alert("Login Failed!")';
            echo '</script>';
        }
    }
    ?>