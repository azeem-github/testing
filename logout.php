<?php
session_start();
session_unset();
print_r($_SESSION);

header('Location: login.php');
?>