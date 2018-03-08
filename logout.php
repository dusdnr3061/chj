<?php
session_start();

unset($_SESSION["userid"]);
unset($_SESSION["pw"]);
setcookie("userid","");



header("Location:http://ec2-52-78-54-133.ap-northeast-2.compute.amazonaws.com/index.php");
?>