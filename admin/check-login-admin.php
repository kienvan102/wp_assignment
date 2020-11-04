<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'user');
   define('DB_PASSWORD', 'password');
   define('DB_DATABASE', 'online_shop');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
<?php
    //include("../config.php");
    session_start();
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $correctEmail = $correctPassword = "";

    $sql ="SELECT * from user where email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
        $correctEmail = $row['email'];
        $correctPassword = $row['password'];
        $userType = $row['user_type'];
    } else {
        echo "Not found admin!";
    }
    

    
    setcookie($email,$password, time() + (86400 * 31), "/");
    

    if($email == $correctEmail && $password == $correctPassword && $userType = 'admin'){
        if (!isset($_COOKIE[$email])){
            echo "Hello $email !!! Stupid password \n";
            echo "Welcome to my channel!";
            
            
        }
        else{
            echo "Welcome back bro!!! Enjoy my channel!!!";
            echo "Email" . $_COOKIE[$email];
        }
        $_SESSION['userType'] = 'admin';
        header("Location: admin.php");
    }
    else{
        echo "Wrong password bro!!!";
    }
    

?>