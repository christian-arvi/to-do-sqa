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
    <?php include_once 'conn.php'; ?>
</head>
<body>
<div class="container is-widescreen">
<div class="columns is-mobile is-centered">
    <div class="column"></div>
    <div class="column">
        <div id="cmyk" class="has-text-centered">
            <h1 id="regCmyk" class="title" style="margin-bottom:0;">CMYK</h1>
                <u>C</u>reate <u>MY</u> tas<u>K</u>
        </div>
        <section id="reg" class="hero is-dark is-centered">
            <div class="hero-body field" style="padding: 2rem 1.5rem;">
                <form method="post" style="padding-left: 30px;"> 

                    <label class="font1"><b>USERNAME</b></label>
                    <div class="control">
                        <input class="input is-primary" style="width:18em;" type="text" name="username" placeholder="" required>
                    </div><br>
                    <label class="font1"><b>PASSWORD</b></label>
                    <div class="control">
                        <input class="input is-primary" style="width:18em;" type="text" name="password" placeholder="" required>
                    </div><br>
                    <label class="font1"><b>CONFIRM PASSWORD</b></label>
                    <div class="control">
                        <input class="input is-primary" style="width:18em;" type="text" name="confpassword" placeholder="" required>
                    </div><br>
                    <div class="control">
                        <button class="button is-warning font1" type="submit" name="save"><b>SIGN UP</b></button>
                    </div>

                    <?php

                        include 'conn.php';
                        include 'func.php';

                        if(isset($_POST['save'])){

                            $user = $_POST["username"];
                            $pass = $_POST["password"];
                            $confpass = $_POST["confpassword"];

                            $isValidReg = register($user,$pass,$confpass);

                            if($isValidReg == true){ ?>
                                <br> Registration done! <br>
                                <a href="index.php"><b>Start now!</b></a>
                            <?php } else{
                                echo '<script language="javascript">';
                                echo 'alert("Please make sure both passwords are the same!")';
                                echo '</script>';
                            }    
                        }
                    ?>

                </form>
            </div>
        </section>
            <div class="control has-text-centered">
                <p class="help is-white">Already registered?</p>
                <a class="signUp font1" href="index.php"><b>SIGN IN</b></a>
            </div>
    </div>
    <div class="column"></div>
</div>
</div>
</body>
</html>