<?php
   session_start();
   
   header("Location: login.php");
   session_destroy();
   break;
?>
