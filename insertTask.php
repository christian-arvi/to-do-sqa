<?php
session_start();
include 'conn.php';
include 'func.php';

    if(isset($_POST['insert'])){
        $task = $_POST["task"];
        $date = $_POST["date"];
        $accid = $_SESSION['a'];

        $addTask = addTask($accid,$task,$date);

        if($addTask === true){
            
            header("Location: home.php");
            
        } else{
            echo '<script language="javascript">';
            echo 'alert("Task add Failed!")';
            echo '</script>';
        }

    }
    ?>