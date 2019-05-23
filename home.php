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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>CMYK TO-DO LIST</title>
</head>
<body>
<div class="container is-widescreen">
    <div class="columns is-mobile is-centered">
        <div class="column"></div>
        <div class="column">
            <div class="has-text-centered">
                <h1 class="title is-capitalized">Hi, <?php echo $_SESSION['userid'] ?>! </h1><br>
            </div>
    <?php

    include 'conn.php';

    if (!isset($_SESSION['userid'])){
        header('location:index.php');
        }
        $id = $_SESSION['a'];

        $sql = "SELECT task, duedate ,id FROM planner WHERE accid = '$id' AND stat = 0";
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

            <?php while($row = $result->fetch_assoc()) :
                $today=date('Y-m-d');
                $id = $row['id'];
                $duedate =  $row['duedate'];
                $task =  $row['task'];?>
                <tr>
                <?php if ($today >= $duedate):?>
                    <td class="is-danger"><b> <?php echo $task; ?> </b></td>
                    <td class="is-danger"><b> <?php echo $duedate; ?> </b></td>
                <?php else: ?>
                    <td class="is-info"><b> <?php echo $task; ?> </b></td>
                    <td class="is-primary"><b> <?php echo $duedate; ?> </b></td>
                <?php endif; ?>
                    <td>
                        <a data-target="#edit<?php echo $id; ?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm' name="edit"> Edit</button></a>
                    </td>
                    <td>
                        <a href='delete.php?id=<?php echo $row['id']; ?>' id="done">
                        <b>DONE</b></a>
                    </td>
                </tr>

                    <div class="modal fade" id="edit<?php echo $id; ?>">
                        <div class="modal-background">
                            <div class="modal-card" style="margin-top: 200px;">
                                <section class="modal-card-body">
                                    <!-- Modal content-->
                                    <div class="content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <br>
                                            <form method="POST" action="editTask.php">
                                                <div class="columns">
                                                    <div class="column">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <label class="font1"><b>EDIT TASK</b></label>
                                                        <div class="control">
                                                            <input maxlength="35" class="input is-large is-warning" style="width:15em;" type="text" name="task" value="<?php echo $task; ?>" placeholder="to-do.."  id="edit-task"required>
                                                        </div>
                                                    </div>
                                                    <div class="column">
                                                        <label class="font1"><b>DEADLINE</b></label>
                                                        <div class="control">
                                                            <input required class="input is-large is-warning" style="width:15em;" type="date" name="date" value="<?php echo $duedate; ?>" placeholder="dd/mm/yyy" id="edit-date" required>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                </section>
                                    <footer class="modal-card-foot">
                                        <button class="button is-danger font1 is-large" type="submit" name="submit" id="update"><b>UPDATE</b></button>
                                            </form>
                                    </footer>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </tbody>
            </table>
    <?php else : ?>
        <h1 class="is-white font1" style="font-size: 20px; color: white;"><b>No task as of the moment.</b></h1><br>
    <?php endif;
    $conn->close(); ?>
    <br>
        <section id="home" class="hero is-warning is-centered">
            <div class="hero-body">
                <form method="post" action="insertTask.php">
                    <div class="columns">
                        <div class="column">
                            <label class="font1"><b>NEW TASK</b></label>
                            <div class="control">
                                <input maxlength="35" class="input is-large" style="width:15em;" type="text" name="task" id="task" placeholder="to-do.." required>
                            </div>
                        </div>

                        <div class="column">
                            <label class="font1"><b>DEADLINE</b></label>
                            <div class="control">
                                <input class="input is-large" style="width:15em;" type="date" name="date" id="date" placeholder="dd/mm/yyy" required>
                            </div>
                        </div>
                    </div>
                    <div class="control">
                        <button class="button is-danger font1 is-large"type="submit" name="insert" id="insert"><b>ADD</b></button>
                    </div>
                </form>
            </div>
        </section><br>

        <div class="control has-text-centered" style="padding-top: 30px;">
            <a class="font1" href="history.php" style="font-size: 15px; text-decoration: none;" id="history"><b>VIEW HISTORY</b></a>
            <br><br>
            <a class="signUp font1" href="logout.php" id="logout"><b >LOGOUT</b></a>
            
            <br><br>
        </div>

        </div>
        <div class="column"></div>
    </div>
</div>

<script>
'use strict';
    document.addEventListener('DOMContentLoaded', function () {
    // Modals
    var rootEl = document.documentElement;
    var $modals = getAll('.modal');
    var $modalButtons = getAll('.modal-button');
    var $modalCloses = getAll('.modal-close, .modal-card-foot .button');

    if ($modalButtons.length > 0) {
        $modalButtons.forEach(function ($el) {
        $el.addEventListener('click', function () {
            var target = $el.dataset.target;
            var $target = document.getElementById(target);
            rootEl.classList.add('is-clipped');
            $target.classList.add('is-active');
        });
        });
    }

    if ($modalCloses.length > 0) {
        $modalCloses.forEach(function ($el) {
        $el.addEventListener('click', function () {
            closeModals();
        });
        });
    }

    document.addEventListener('keydown', function (event) {
        var e = event || window.event;
        if (e.keyCode === 27) {
        closeModals();
        }
    });

    function closeModals() {
        rootEl.classList.remove('is-clipped');
        $modals.forEach(function ($el) {
        $el.classList.remove('is-active');
        });
    }

    // Functions
    function getAll(selector) {
        return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
    }
    });

</script>
</body>
</html>