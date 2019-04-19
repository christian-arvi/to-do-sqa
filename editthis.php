<form name="form1" method="post" action="editTask.php">
    <table border="0">
        <tr>
            <td>Task</td>
            <td><input type="text" name="task" value="<?php echo $task;?>"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" name="date" value="<?php echo $date;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
