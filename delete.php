<?php
session_start();
include 'conn.php';
include 'func.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])){
// GET id value
$id = $_GET['id'];

// delete the entry

        $deleteTask = deleteTask($id);

        if($deleteTask === true){

          header("Location: home.php");

      } else{
          echo '<script language="javascript">';
          echo 'alert("Task add Failed!")';
          echo '</script>';
      }

  }
    ?>
