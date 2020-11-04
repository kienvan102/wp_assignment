

<?php
    //echo $_SESSION['userType'];
    include("session.php");
    //session_start();
    echo $_SESSION['userType'] .'<br>';
    
    $sessionId = session_id();

    $cookie_name = "guest_session";
                    
    setcookie($cookie_name, $sessionId, time() + (86400 * 15), "/");

    
?>




<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <?php
            include("config.php");

            if(!isset($_COOKIE[$cookie_name])){ //guest first visit 
            
                $_SESSION["lastAccesDate"] = $lastAccesDate = date("Y-m-d H:i:s");
                $_SESSION["expiredDate"] = $expiredDate = date("Y-m-d H:i:s" ,strtotime(date("Y-m-d H:i:s"). "+ 15 days"));
                $_SESSION["userType"] = 'guest';
                $sql = "INSERT INTO session (session_id, last_access_date, expired_date)
                VALUES ('$sessionId', '$lastAccesDate', '$expiredDate')";

                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            else{  // guest from second visit
                
                $sql ="SELECT * from session where session_id = '$_COOKIE[$cookie_name]'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                echo 'your session id: ' . $row['session_id'];
                echo 'expired date: ' . $row['expired_date'];
                setcookie($cookie_name,  $row['session_id'], time() + (86400 * 15), "/");
                
                //$_SESSION["userType"] = 'guest';
            }
            
        ?>
        <?php
            
            echo "<p>Hello World!</p>";
            echo "role: " . $_SESSION['userType'];
        ?>
        <a href="login.php"> Click here to login </a>
        <br>
        <a href="register.php"> Click here to register</a> 
    </body>
</html>