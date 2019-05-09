<?php
session_start();
include 'conn.php';
include 'func.php';

  if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $task = $_POST["task"];
    $date = $_POST["date"];

    $editTask = editTask($id, $task, $date);

    if($editTask === true){
      header("Location: home.php");
    }else{
        echo '<script language="javascript">';
        echo 'alert("Task add Failed!")';
        echo '</script>';
    }
  }
?>
