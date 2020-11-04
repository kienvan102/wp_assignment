<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'user');
   define('DB_PASSWORD', 'password');
   define('DB_DATABASE', 'online_shop');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if (!$conn) {
      die('Not connected : ' . mysql_error());
   }

   
?>