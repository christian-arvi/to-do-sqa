<?php


require 'conn.php';


function register($user,$pass,$confpass,$fname,$lname,$gender){
    global $conn;
        if ($pass == $confpass){

            $checkUser = checkUser($user);

            if($checkUser == true){
            // prepare and bind
            $stmt = $conn->prepare("INSERT INTO accounts (username,password,firstname,lastname,gender) VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssss", $user,$pass,$fname,$lname,$gender);
            $stmt->execute();
            $stmt->close();
                return true;
            } else{

                return false;
            }


        } else {
            return false;
        }
}

function login($username, $password)
{

    global $conn;
    $query = 'SELECT username,id FROM accounts WHERE username=? AND password=?';

    if($stmt = $conn->prepare($query)){
      $stmt->bind_param('ss', $username, $password);
      $stmt->execute();
      $stmt->store_result();
      $num_row = $stmt->num_rows;
      $stmt->bind_result($username,$id);
      $stmt->fetch();
      $stmt->close();
    }else die("Failed to prepare query");


    if( $num_row === 1 ) {
        session_start();
        $_SESSION['userid'] = $username;
        $_SESSION['a'] = $id;
      return true;
    }

    return false;

}

function checkUser($username)
{

    global $conn;
    $query = 'SELECT username FROM accounts WHERE username=?';

    if($stmt = $conn->prepare($query)){
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $stmt->store_result();
      $num_row = $stmt->num_rows;
      $stmt->bind_result($username);
      $stmt->fetch();
      $stmt->close();
    }else die("Failed to prepare query");


    if( $num_row === 1 ) {
      return false;
    }

    return true;

}

function addTask($accid,$task,$date)
{

    global $conn;
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO planner (accid,task,date) VALUES (?,?,?)");
        $stmt->bind_param("sss", $accid,$task,$date);
        $stmt->execute();

        if($stmt){
            $stmt->close();
            $conn->close();
            return true;

        } else{
            return false;
        }

}

function deleteTask($id)
{

    global $conn;

    // prepare and bind
    $stmt = $conn->prepare("DELETE FROM planner WHERE id=$id");
    $stmt->bind_param("sss", $id);
    $stmt->execute();

    if($stmt){
        $stmt->close();
        $conn->close();
        return true;

    } else{
        return false;
    }

}

function editTask($id)
{

    global $conn;

    // prepare and bind
    $stmt = $conn->prepare("SELECT * FROM planner WHERE id = '$id'");
    $stmt->bind_param("sss", $id);
    $stmt->execute();

    if($stmt)
{   $stmt = $conn->prepare("UPDATE branches SET
    task='$task',
    date='$date'
    WHERE id='$id' ");
    $stmt->bind_param("sss", $id);
    $stmt->execute();
        $stmt->close();
        $conn->close();
        return true;

    } else{
        return false;
    }

}



?>
