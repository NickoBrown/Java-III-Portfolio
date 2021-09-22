<link rel="stylesheet" href="style.css">

<?php
$name = "Nick";
$age = 19;
$id = "30032159@tafe.wa.edu.au";
date_default_timezone_set("Australia/Perth");
$current_date = date("d:m:Y");
$hobby = "Fishing";

echo "Name: ". $name . "<br>";
echo "Age: ". $age . "<br>";
echo "Contact ID: ". $id . "<br>";
echo "Date: ". $current_date . "<br>";
echo "Hobby: " . $hobby . "<br>";

?>