
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
     

    <form method="post" action="loginConn.php"> 

    <label id="first"> Username:</label><br/>
    <input type="text" name="username"><br/>

    <label id="second"> Password:</label><br/>
    <input type="text" name="password"><br/>

    <button type="submit" name="login">Login</button>
    </form>

</body>
</html>