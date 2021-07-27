<?php

session_start();
session_destroy();
echo " <script> alert('Anda telah melakukan Logout!') </script>";
header('location: index.php');

?>