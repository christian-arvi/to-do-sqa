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
                <h1 class="title is-capitalized">Task History</h1><br>
            </div>
    <?php

    include 'conn.php';

     if (!isset($_SESSION['userid'])){
        header('location:index.php');
        }
        $id = $_SESSION['a'];

        $sql = "SELECT task, duedate ,id, expiry FROM planner WHERE accid = '$id' AND stat = 1";
        $result = $conn->query($sql);
        $now = date('Y-m-d');

        if ($result->num_rows > 0) : ?>

            <table class="table is-hoverable is-centered is-dark font1">
            <tbody class="has-text-centered">
            <tr>
                <th class="is-warning">Task</th>
                <th class="is-warning">Date</th>
            </tr>

            <?php while($row = $result->fetch_assoc()) :
              if($row['expiry'] > $now):

              $id = $row['id'];
              $duedate =  $row['duedate'];
              $task =  $row['task'];?>
                <tr>
                    <td class="is-info"><b> <?php echo $task; ?> </b></td>
                    <td class="is-primary"><b> <?php echo $duedate; ?> </b></td>
                    <td>
                        <a href='undo.php?id=<?php echo $row['id']; ?>'>
                        <b>Mark as undone</b></a>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endwhile; ?>
            </tbody>
            </table>
    <?php else : ?>
        <h1 class="is-white font1" style="font-size: 25px; color: white;"><b>No task as of the moment.</b></h1><br>
    <?php endif;
    $conn->close(); ?>

<br>

        <div class="control has-text-centered">

            <a class="signUp font1" href="home.php"><b>HOME</b></a><br>
            <a class="signUp font1" href="clearhistory.php"><b>CLEAR HISTORY</b></a><br>
            <a class="signUp font1" href="logout.php"><b>LOGOUT</b></a>

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
