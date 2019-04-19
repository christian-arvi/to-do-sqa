<?php
session_start();
include 'conn.php';
include 'func.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])){
// GET id value
$id = $_GET['id'];
}
?>

        <form method="post" action="editTask.php">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

                <input class="form-control" type="text" name="task" value="<?php echo $id ?>" placeholder="Task">

                <input required class="form-control" type="date" name="date" value="<?php echo $date ?>" placeholder="Date">

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
