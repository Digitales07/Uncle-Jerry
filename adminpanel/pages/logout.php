<?php
session_start();
unset($_SESSION["login"]);

   if(session_destroy()) {
      header("Location: login.php");
   }
?>