<?php
session_start();
include 'conn.php';
include 'func.php';


    $id = $_SESSION['a'];

    $clearHistory = clearHistory($id);
    echo $id;
    if($clearHistory === true){
      header("Location: history.php");
    }else{
        echo '<script language="javascript">';
        echo 'alert("Clear History Failed!")';
        echo '</script>';
    }
?>
