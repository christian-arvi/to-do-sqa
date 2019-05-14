<?php
require 'conn.php';

function register($user,$birthdate,$email,$pass,$confpass){
    global $conn;
        if ($pass == $confpass){

            $checkUser = checkUser($user);

            if($checkUser == true){
            // prepare and bind
            $stmt = $conn->prepare("INSERT INTO accounts (username, birthdate, email, pword) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $user,$birthdate,$email,$pass);
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

function login($username, $password){

    global $conn;
    $query = 'SELECT username,id FROM accounts WHERE username=? AND pword=?';

    if($stmt = $conn->prepare($query)){
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $stmt->store_result();
        $num_row = $stmt->num_rows;
        $stmt->bind_result($username,$id);
        $stmt->fetch();
        $stmt->close();
    }else die("Failed to prepare query!");


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
        $stmt = $conn->prepare("INSERT INTO planner (accid,task,duedate) VALUES (?,?,?)");
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
    $today=date('y-m-d');
    $date = strtotime($today);
    $newDate = date("Y-m-d", strtotime("+1 month", $date));
    // prepare and bind
    $stmt = $conn->prepare("UPDATE planner SET stat=1, expiry = '$newDate' WHERE id=$id");
    $stmt->bind_param("ss", $id);
    $stmt->execute();

    if($stmt){
        $stmt->close();
        $conn->close();
        return true;

    } else{
        return false;
    }

}

function editTask($id, $task, $date)
{

    global $conn;

    // prepare and bind
    $stmt = $conn->prepare("UPDATE planner SET task='$task', duedate='$date' WHERE id=$id");
    $stmt->bind_param("sss", $id, $task, $date);
    $stmt->execute();

    if($stmt){
        $stmt->close();
        $conn->close();
        return true;

    } else{
        return false;
    }

}

function clearHistory($id)
{

    global $conn;

    $stat = 2;
    // prepare and bind
    $stmt = $conn->prepare("UPDATE planner SET stat=$stat WHERE accid=$id AND stat=1");
    $stmt->bind_param("ss", $id,$stat);
    $stmt->execute();

    if($stmt){
        $stmt->close();
        $conn->close();
        return true;

    } else{
        return false;
    }

}

?>
