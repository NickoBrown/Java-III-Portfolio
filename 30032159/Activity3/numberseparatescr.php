<head>
<link rel="stylesheet" href="style.css">
</head>
<header>
<h2>Your numbers are:</h2>
</header>

<body>

<?php
$number = $_POST["inputnumber"];
$digits = str_split($number);
$total = 0;
foreach ($digits as $digit){
    echo $digit;
	echo " ";
    $total += $digit;
}

echo "<h3>The total is:</h3>";
echo $total;
?>

</body>