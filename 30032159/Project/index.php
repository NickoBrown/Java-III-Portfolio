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
        <h1>Movie Search</h1>
    </header>


<form action="searchscr.php" method="POST">

<h4>Search movies by name:</h4>
<input type="text" name="textsearchterm" id="textsearchterm"/>
<br>




<h4>Search movies by rating:</h4>

<select name="ratings" id="ratings">
    <option value=""></option>
<?php
    require("connect.php");
    $statement = $conn->prepare("SELECT DISTINCT `Rating` FROM `Movies_DVDs`");
    $statement->execute();
    $output = $statement->fetchAll(PDO::FETCH_ASSOC);


    for ($i = 0; true; $i++) {
        echo "<option value=\"" . $output[$i]['Rating'] . "\">" . $output[$i]['Rating'] . "</option>";
        if ($output[$i + 1] == null) {
                break;
        }
}
    ?>
</select>
    
<br>


<h4>Search movies by year:</h4>
<input type="radio" id="Higher_than" name="greater_less_year" value="Higher_than" checked="checked">
<label for="Higher_than">After</label><br>
<input type="radio" id="Lower_than" name="greater_less_year" value="Lower_than">
<label for="Lower_than">Before</label><br>
<input type="radio" id="At_year" name="greater_less_year" value="At_year">
<label for="At_year">Exactly</label><br>
<input type="number" max="2021" min="1888" name="yearsearchterm" id="yearsearchterm"/>
<br>



<h4>Search movies by genre:</h4>
<select name="genres" id="genres">
    <option value=""></option>
    <?php
    require("connect.php");

    $statement = $conn->prepare("SELECT DISTINCT `Genre` FROM `Movies_DVDs`");
    $statement->execute();
    $output = $statement->fetchAll(PDO::FETCH_ASSOC);


    for ($i = 0; true; $i++) {
        echo "<option value=\"" . $output[$i]['Genre'] . "\">" . $output[$i]['Genre'] . "</option>";
        if ($output[$i + 1] == null) {
                break;
        }
}
    ?>
</select>
<br>
<input type="submit" value="Search">
</form>

</body>