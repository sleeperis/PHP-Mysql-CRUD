<?php
$cookie_name = "user";
$cookie_value = "Alex Porter";
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/");
     header("location: sistem");
     exit;
//     echo $_COOKIE[$cookie_name];
?>