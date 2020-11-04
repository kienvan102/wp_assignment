<?php
    include("config.php");

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $userType ="";

    $correctEmail = $correctPassword = "";

    $sql ="SELECT * from user where email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
        $correctEmail = $row['email'];
        $correctPassword = $row['password'];
        $userType = $row['user_type'];
    } else {
        echo "Not found user!";
    }
    

    
    setcookie($email,$password, time() + (86400 * 31), "/");
    

    if($email == $correctEmail && $password == $correctPassword && $userType='user'){
        if (!isset($_COOKIE[$email])){
            echo "Hello $email !!! Stupid password \n";
            echo "Welcome to my channel!";
            
            
        }
        else{
            echo "Welcome back bro!!! Enjoy my channel!!!";
            echo "Email" . $_COOKIE[$email];
        }

        include('session.php');

        $_SESSION['login'] = true;
        header("Location: index.php");
    }
    else{
        echo "Wrong password bro!!!";
    }
    

?>