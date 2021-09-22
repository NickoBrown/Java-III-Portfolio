<!--
Nicholas Brown
30032159
Activity 3
-->

<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Quote of the Day:</h1>
    </header>

    <div>
    <h3>
        <?php

        include("connect.php");

        $statement = $conn->prepare("SELECT quote FROM `quotes`");
        $statement->execute();

        $quotes = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
    	

    
        $random = rand(0, 9);


        for($i = 0; $i <= 9; $i++){
            if($i == $random){
                echo $quotes[$i];
            }
            
            
        }

    ?>
    </h3>

<form action="index.php">
    <input type="submit" value="Show me another!">
</form>

    </div>
</body>