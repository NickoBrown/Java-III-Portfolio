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
                <h1>User List</h1>
        </header>



        <table>

                <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>ID</th>
                </tr>


                <?php

                include("connect.php");

                $statement = $conn->prepare("SELECT * FROM `UserList`");
                $statement->execute();

                $user = $statement->fetchAll(PDO::FETCH_ASSOC);


                for ($i = 0; true; $i++) {

                        echo "<td>" . $user[$i]['firstname'] . "</td>";

                        echo "<td>" . $user[$i]['lastname'] . "</td>";

                        echo "<td>" . $user[$i]['email'] . "</td>";

                        echo "<td>" . $user[$i]['id'] . "</td>";
                        
                        $id = $user[$i]['id'];
                        
                        if($id != null){
                        echo "<td>" .

                        "<form action=\"deluserscr.php\" method=\"post\">
                        <input value=\"$id\" type=\"hidden\" name=\"id\">
                        <input type=\"submit\" value=\"Delete User\">
                        </form> </td>";
                        }
                        else echo "<h2>No users found.</h2>";

                        echo "<tr>";

                        if ($user[$i + 1] == null) {
                                break;
                        }
                }
                ?>

        </table>
        
</body>