<?php
session_start();
include 'func.php';
// $name = name($username);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="$1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>CMYK TO-DO LIST</title>
</head>
<body>
<div class="container is-widescreen">
    <div class="columns is-mobile is-centered">
        <div class="column"></div>
        <div class="column">
            <div class="has-text-centered">
                <h1 class="title">Hi, ! </h1><br>
            </div>
    <?php

    if (!isset($_SESSION['userid'])){
        header('location:index.php');
        }
        $id = $_SESSION['a'];

        $sql = "SELECT task, duedate ,id FROM planner WHERE accid = '$id'";
        $result = $conn->query($sql); 

        if ($result->num_rows > 0) : ?>

            <table class="table is-hoverable is-centered is-dark font1">
            <tbody class="has-text-centered">
            <tr>
                <th class="is-warning">Task</th>
                <th class="is-warning">Date</th>
                <th class="is-warning"></th>
                <th class="is-warning"></th>
            </tr>

            <?php while($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td class="is-info"><b> <?php echo $row['task']; ?> </b></td>
                        <td class="is-primary"><b> <?php echo $row['duedate']; ?> </b></td>
                        <td> 
                            <a href='editthis.php?id=<?php echo $row['id']; ?>'>
                            <b>EDIT</b></button></a>
                        </td>
                        <td> 
                            <a href='delete.php?id=<?php echo $row['id']; ?>'>
                            <b>DONE</b></button></a>
                        </td>
                    </tr>
            <?php endwhile; ?>
            </tbody>
            </table>
    <?php else : ?>
        <h1 class="is-white font1"><b>No task as of the moment.</b></h1><br>
    <?php endif; 

    $conn->close(); ?>
        
        <section id="home" class="hero is-warning is-centered">
            <div class="hero-body">
                <form method="post" action="insertTask.php">
                    <div class="columns">
                        <div class="column">
                            <label class="font1"><b>NEW TASK</b></label>
                            <div class="control">
                                <input class="input is-medium" style="width:15em;" type="text" name="task" placeholder="to-do.." required>
                            </div>
                        </div>

                        <div class="column">
                            <label class="font1"><b>DEADLINE</b></label>
                            <div class="control">
                                <input class="input is-medium" style="width:15em;" type="date" name="date" placeholder="dd/mm/yyy" required>
                            </div>
                        </div>
                    </div>
                    <div class="control">
                        <button class="button is-danger font1"type="submit" name="insert"><b>ADD</b></button>
                    </div>
                </form>
            </div>
        </section><br>

        <div class="control has-text-centered">
            <a class="signUp font1" href="logout.php"><b>LOGOUT</b></a>
        </div>

        </div>
        <div class="column"></div>
    </div>
</div>

</body>
</html>