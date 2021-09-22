<!--
Nicholas Brown
30032159
Activity 3
-->



<head>
        <link rel="stylesheet" href="style.css">
</head>
<nav>
        <h2>
        <a href="topten.php">Top 10</a>        
        <a href="index.php">Movie Search</a>
                
        </h2>
</nav>

<body>

        <header>
                <h1>Movie List</h1>
        </header>



        <table border="1">
                <tr>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Rating</th>
                        <th>Release Year</th>
                        
                </tr>

                <?php
                $title = $_POST["textsearchterm"];
                $genre = $_POST["genres"];
                $releaseyear = (int)$_POST["yearsearchterm"];
                $rating = $_POST["ratings"];
                $yearoperator = $_POST["greater_less_year"];


                require("connect.php");


                if($yearoperator == "Higher_than"){
                        $results = $conn->query("SELECT Title, Genre, ReleaseYear, Rating FROM `Movies_DVDs` WHERE (`Title` LIKE \"%$title%\" AND `Genre` LIKE \"%$genre%\" AND `Rating` LIKE \"%$rating%\" AND (`ReleaseYear` > $releaseyear))")->fetchAll(PDO::FETCH_ASSOC);
                }
                if($yearoperator == "Lower_than"){
                        $results = $conn->query("SELECT Title, Genre, ReleaseYear, Rating FROM `Movies_DVDs` WHERE (`Title` LIKE \"%$title%\" AND `Genre` LIKE \"%$genre%\" AND `Rating` LIKE \"%$rating%\" AND (`ReleaseYear` < $releaseyear))")->fetchAll(PDO::FETCH_ASSOC);
                }
                if($yearoperator == "At_year"){
                        $results = $conn->query("SELECT Title, Genre, ReleaseYear, Rating FROM `Movies_DVDs` WHERE (`Title` LIKE \"%$title%\" AND `Genre` LIKE \"%$genre%\" AND `Rating` LIKE \"%$rating%\" AND (`ReleaseYear` = $releaseyear))")->fetchAll(PDO::FETCH_ASSOC);
                }
                


                for ($i = 0; true; $i++) {

                        echo "<td>" . $results[$i]['Title'] . "</td>";

                        echo "<td>" . $results[$i]['Genre'] . "</td>";

                        echo "<td>" . $results[$i]['Rating'] . "</td>";

                        echo "<td>" . $results[$i]['ReleaseYear'] . "</td>";
                        
                        $id = $results[$i]['id'];
                        
                        echo "<tr>";

                        if ($results[$i + 1] == null) {
                                break;
                        }
                }
                ?>

        </table>
        
</body>