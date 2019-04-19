<?php
// including the database connection file
session_start();
include 'conn.php';
include 'func.php';

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $task = $_POST["task"];
    $date = $_POST["date"];

        //updating the table
        $result = mysqli_query($mysqli, "UPDATE planner SET task='$task',date='$date' WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: home.php");
    }

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM planner WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
  $task = $_POST["task"];
  $date = $_POST["date"];
}
?>
