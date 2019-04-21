<?php
session_start();
?>
<!doctype html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="$1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include_once 'conn.php';
    ?>

</head>
<body>

<?php
    if (!isset($_SESSION['userid'])){
        header('location:index.php');
        }
        $id = $_SESSION['a'];

$sql = "SELECT task,date,id FROM planner WHERE accid = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "
    <table>
      <tr>
        <th>Task</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                  <td>".$row["task"]."</td>
                  <td>".$row["date"]."</td>
                  <td><a href='editthis.php?id=". $row["id"] . "'><button class='btn btn-danger'>Edit</button></a></td>
                  <td><a href='delete.php?id=". $row["id"] . "'><button class='btn btn-danger'>Done</button></a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>


    <form method="post" action="insertTask.php">

    <label id="first"> Task:</label><br/>
    <input type="text" name="task"><br/>

    <label id="second"> Date:</label><br/>
    <input type="date" name="date"><br/>

    <button type="submit" name="insert">Create Task</button>

    </form>
    <a href="logout.php"><button>Logout</button></a>

</body>
</html>
