<?php

if(!function_exists('isAuthenticated')){
  function isAuthenticated(){
    /*
    Comprueba que el usuario esté logeado en el sistema.
    */
    if(!isset($_SESSION['login'])){
      return false;
    } else{
      return true;
    }
  }
}

 ?>
