
<?php
    session_start();
    echo "<p>Hello World!</p>";
    echo "role: " . $_SESSION['userType'];
?>