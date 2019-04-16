
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
     

    <form method="post" action="signupConn.php"> 

    <label id="first"> Username:</label><br/>
    <input type="text" name="username"><br/>

    <label id="second"> Password:</label><br/>
    <input type="text" name="password"><br/>

    <label id="third"> Confirm Password:</label><br/>
    <input type="text" name="confpassword"><br/>

    <label id="fourth"> First name:</label><br/>
    <input type="text" name="fname"><br/>

    <label id="fifth"> Last name:</label><br/>
    <input type="text" name="lname"><br/>

    <label id="sixth"> Gender:</label><br/>
    <input type="text" name="gender"><br/>
    

    <button type="submit" name="save">save</button>
    </form>

</body>
</html>