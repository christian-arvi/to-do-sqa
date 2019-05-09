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
                <h1 class="title">Hi, ! </h1><br>
            </div>
    <?php

    include 'conn.php';

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

            <?php while($row = $result->fetch_assoc()) :
              $id = $row['id'];
              $duedate =  $row['duedate'];
              $task =  $row['task'];?>


                    <tr>
                        <td class="is-info"><b> <?php echo $task; ?> </b></td>
                        <td class="is-primary"><b> <?php echo $duedate; ?> </b></td>
                        <td>


                            <a data-target="#edit<?php echo $id; ?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'> Edit</button></a>
                        </td>
                        <td>
                            <a href='delete.php?id=<?php echo $row['id']; ?>'>
                            <b>DONE</b></button></a>
                        </td>
                    </tr>


                    <div class="container">
                     <!-- Button to Open the Modal -->
                     <!-- <div id="edit">
                    <input type="image" src="/thesis/bootstrap/images/icon2.png" class="img-fluid image" data-target="#registeremp"></a>
                     </div> -->



                           <div class="modal fade" id="edit<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="editTask.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input class="input is-medium is-warning" style="width:10em;" type="text" name="task" value="<?php echo $task; ?>" placeholder="to-do..">
            <input required class="input is-medium is-warning" style="width:10em;" type="date" name="date" value="<?php echo $duedate; ?>" placeholder="dd/mm/yyy">
            <button class="button is-danger font1" type="submit" name="submit"><b>UPDATE TASK</b></button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

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
