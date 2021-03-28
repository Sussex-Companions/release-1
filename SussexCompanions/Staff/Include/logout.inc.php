<?php

 session_start();

   session_unset($_SESSION['username']);

   if(session_destroy())
   {
   	 header('location: ..\index.php');
   }


?>