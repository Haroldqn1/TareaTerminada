<?php

session_start();


 session_destroy();
  
// Redirige al usuario a la página de inicio de sesión
header("Location:../index.php");
exit();


?>