<?php

include("connect.php");

$sql = "SELECT * from `movies` WHERE deletedYN = 'N'";

$result = $conn->query($sql);

while($row = $result->fetch_assoc())

{
    $movie_id = $row['movie_id'];
    $movie_name = $row['movie_name'];

    echo "<p><a href='movie.php?movie_id=" . (int)$row['movie_id'] . "'>" . htmlentities($movie_name) . "</a></p>";
}


?>