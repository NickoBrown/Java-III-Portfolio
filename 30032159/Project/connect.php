<?php
$username = "adminer";
$password = "P@ssw0rd";


$conn = new PDO('mysql:host=localhost;dbname=Movies', $username, $password);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>