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
    <a href="userlist.php">User list</a>
    <a href="index.php">Add user</a>
    </h2>
</nav>
<body>
    <header>
        <h1>Add a new user</h1>
    </header>

<form action="adduserscr.php" method="POST">
<label for="firstname">First Name</label>
<input type="text" title="Letters only." pattern="[a-zA-Z]*" name="firstname" id="firstname" required/>
<br>
<label for="lastname">Last Name</label>
<input type="text" title="Letters only." pattern="[a-zA-Z]*" name="lastname" id="lastname" required/>
<br>
<label for="email">Email</label>
<input type="email" name="email" id="email" required>
<br>
<input type="submit" value="Submit">
</form>




</body>