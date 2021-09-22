<?php
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    require("connect.php");
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];     
    $statement = $conn->prepare("INSERT INTO `UserList` (`firstname`, `lastname`, `email`) VALUES (\"$firstname\", \"$lastname\", \"$email\")");
    $statement->execute();
?>