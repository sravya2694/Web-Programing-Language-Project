<?php
session_start();
if(!empty($_POST["email"]))
{
  $_SESSION['email'] = $_POST["email"];

}

?>
