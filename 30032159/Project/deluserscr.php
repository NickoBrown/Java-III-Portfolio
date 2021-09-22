<?php
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    require("connect.php");
    $id = $_POST["id"];    
    echo $id;
    $statement = $conn->prepare("DELETE FROM UserList WHERE id = " . $id);
    $statement->execute();
?>