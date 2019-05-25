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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>CMYK TO-DO LIST</title>
    <?php include 'conn.php'; ?>
</head>
<body>

<div class="container is-widescreen">
<div class="columns is-mobile is-centered">
    <div class="column"></div>
    <div class="column">
        <div id="cmyk" class="has-text-centered" style="">
            <h1 class="title" style="margin-bottom:0;">CMYK</h1>
                <u>C</u>reate <u>MY</u> tas<u>K</u>
        </div>
        <div class="columns">
        <div class="column font1 has-text-right funky is-3">
            <p class="is-white">YOUR FUNKY<br>
            TASK PLANNER.</p>
        </div>
        <div class="column">
        <section id="splash" class="hero is-warning is-centered">
            <div class="hero-body field">
                <form method="post" class="font1">
                    <label class="font1"><b>USERNAME</b></label>
                    <div class="control">
                        <input maxlength="25" class="input is-medium" style="width:15em;" type="text" name="username" placeholder="I'm feeling happy.." required>
                    </div><br>
                    <label class="font1"><b>PASSWORD</b></label>
                    <div class="control">
                        <input class="input is-medium" style="width:15em;" type="password" name="password" placeholder="Secret" required>
                    </div>
                    

                    <?php
                    
                    include 'func.php';

                    if (isset($_SESSION['userid'])){
                        header('location:home.php');
                        }
                    
                    if(isset($_POST['login'])) :
                        $user = $_POST["username"];
                        $pass = $_POST["password"];
                        $isValidLog = login($user,$pass);

                        if($isValidLog === true):
                            header("Location: home.php");
                        else: ?>
                            <br>The account you're trying to access does not exist. Please try again.
                        <?php endif; 
                    endif;?>
                    <br><br>
                    <div class="control has-text-centered">
                        <button class="button is-danger font1" type="submit" name="login"><b>SIGN IN</b></button>
                    </div>
                </form>
            </div>
        </section>
        </div>
        <div class="column">
            <p id="mini" class="has-text-left font1 is-white is-2">
                CYAN<br>MAGENTA<br>YELLOW<br>BLACK
            </p>
        </div>
        </div>            
            <div class="control has-text-centered">
                <p class="help is-white">Haven't registered yet?</p>
                <a class="signUp font1" href="register.php"><b>SIGN UP</b></a>
            </div>
    </div>
    <div class="column"></div>
</div>
</div>
</body>
</html>
