<?php 
session_start(); 
var_dump($_SESSION);
foreach ($_SESSION as $key => $value) {
  unset($_SESSION[$key]);
}
var_dump($_SESSION);
header('Location: ../');
?>