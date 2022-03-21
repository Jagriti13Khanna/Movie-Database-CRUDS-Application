<?php

// var_dump($sql);

session_start();

if (!isset($_SESSION['bhjvbdjhnbdjvbn=jagriti'])) {
    header("Location:login.php");
}

include("../includes/connect.php");

$row_to_edit = $_GET['row_to_edit'];

if ($row_to_edit && is_numeric($row_to_edit))
{
    $update_sql = "UPDATE movies SET deletedYN ='Y' WHERE movie_id = $row_to_edit";
    if($conn->query($update_sql))
    {
        $message = "<p onclick='myFunction()'>Record deleted</p>";
    }
    else
    {
        $message = "<p>There was a problem deleting that course: $conn->error</p>";
    }
}

$page_title = "Delete Movie";

include("../includes/header2.php");

?>

<div class="delete-main">
    <div class="delete">
            <h3>Movies in System</h3>
            <?php
            $list_sql = "SELECT movie_name, pc_website, pc_name, release_date, male_lead, female_lead, child_lead, runtime, movie_desc, genre, category, music, director, imdb, review, movie_id FROM `movies` WHERE deletedYN = 'N'";
            // echo $list_sql;
            $list_result = $conn->query($list_sql);
    
            if($list_result->num_rows > 0)
            {
                echo "<ul class='edit-li'>";
                while($list_row = $list_result->fetch_assoc())
                {
                    extract($list_row);
                    echo "<li>";
                    echo "<a onclick='deleteRecord()' class='delete-links' href='delete.php?row_to_edit=$movie_id'>";
                    echo "$movie_name";
                    echo "</a>";
                    echo "</li>";
                }
                echo "</ul>";
            }
            ?>
    
    <!-- <script src="../js/main.js"></script> -->
    </div>
</div>

<?php include("../includes/footer.php"); ?>
