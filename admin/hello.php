<?php 
        session_start();
        if ($_SESSION['userType'] !== 'admin'){
            throw new Exception('403: Forbidden');
        }
        echo $_SESSION['userType'];
?>

<html>
<body>
    
    <h1>hello</h1>
    
</body>
</html>