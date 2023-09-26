<?php
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<h1>Welcome back <?= $role ?>, Mr. <?= $username ?></h1>
</body>
</html>