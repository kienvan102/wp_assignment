<?php 
    $emailErr = $passwordErr ="";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST['email'])){
            $emailErr = "Email is required";
        }

        if (empty($_POST['password'])){
            $passwordErr = "Password is required";
        }
    }
?>

<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Login Page</h2>
        <a href="index.php">Click here to go back</a><br/><br/>
        <form action="check-login.php" method="POST">
           Email: <input type="email" name="email" required="required" /> 
           <br>
           Password: <input type="password" name="password" required="required" /> 
           <br>
           <input type="submit" value="Login"/>
        </form>
    </body>
</html> 