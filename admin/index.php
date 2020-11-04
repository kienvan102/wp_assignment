

<html>
    <head>
        <title>My first ADMIN PHP Website</title>
    </head>
    <body>
        <h1>ADMIN PHP Website</h1>
        <h2>Login Page</h2>
        
        <form action="check-login-admin.php" method="POST">
           Email: <input type="email" name="email" required="required" /> 
           <br>
           Password: <input type="password" name="password" required="required" /> 
           <br>
           <input type="submit" value="Login"/>
        </form>
    </body>
</html>