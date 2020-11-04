<?php
   //include('config.php');
   session_start();
   
   if (!(isset($_SESSION['login']) && $_SESSION['login'] != false)) {

      $_SESSION['userType'] = 'guest';
      
   }else{
      $_SESSION['userType'] = 'user';
   }
?>