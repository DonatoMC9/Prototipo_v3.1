<?php
   //iniciamos la sesion
   session_start();
   

   //re dirigimos a la pagina del login
   if(session_destroy()) {
      header("Location: login.html");
   }
?>