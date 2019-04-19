
<?php

session_start();
include 'conn.php';
include 'func.php';


if(isset($_POST['submit'])){

  $task = $_POST["task"];
  $date = $_POST["date"];
  $id = $_POST['id'];

  $editTask = editTask($id, $task, $date);

  if($editTask === true){

    header("Location: home.php");

} else{
    echo '<script language="javascript">';
    echo 'alert("Task add Failed!")';
    echo '</script>';
}

}
// $result = mysqli_query($conn, "UPDATE planner SET task='$task',date='$date' WHERE id=$id");
// // $stmt = $conn->prepare("UPDATE planner SET name='$task',age='$date' WHERE id=$id");
// echo "hi";
// echo "$id";
// echo "$date";
// echo "$task";
//
// }
?>
