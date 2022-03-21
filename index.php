<?php

$page_title = "Movie Fanatics";

include("includes/connect.php");

include("includes/header1.php");

?>


    <main>
        <?php
        
            $sql = "SELECT * from `movies` WHERE deletedYN = 'N'";            
            $result = $conn->query($sql);
            
            while($row = $result->fetch_assoc())            
            {
                $movie_id = $row['movie_id'];
                $movie_name = $row['movie_name'];
                echo "<div class='index'><h3><a href='movie.php?movie_id=" . (int)$row['movie_id'] . "'>" . htmlentities($movie_name) . "</a></h3>
                </div>";
            }
        ?>
    </main>
    

<?php include("includes/footer.php"); ?>
