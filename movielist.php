<?php

$page_title = "Movie Fanatics List";

include("includes/connect.php");

include("includes/header1.php");


$sql = "SELECT * from `movies` WHERE deletedYN = 'N'";
$result = $conn->query($sql);
// echo "<pre>";
// var_dump($result);
// echo "</pre>";

while ($row = $result->fetch_assoc())
{
    // echo "<pre>";
    // var_dump($row);
    // echo "</pre>";
    $movie_id = $row['movie_id'];
    $movie_name = $row['movie_name'];
    $movie_desc = $row['movie_desc'];
    $pc_name = $row['pc_name'];
    $pc_website = $row['pc_website'];
    $runtime = $row['runtime'];
    $genre = $row['genre'];
    $category = $row['category'];
    $release_date = $row['release_date'];
    $male_lead = $row['male_lead'];
    $female_lead = $row['female_lead'];
    $child_lead = $row['child_lead'];
    $music = $row['music'];
    $director = $row['director'];
    $imdb = $row['imdb'];
    $review = $row['review'];

    $list = "<section class = 'movie-php'>";
    $list .= "<div class='movie-php-div'>";
    $list .= "<ul>";
    $list .= "<li class='movieName'><strong>$movie_name</strong></li>";   
    $list .= "<li><u>Production Company's Name:</u> $pc_name </li>";
    $list .= "<li><u>Production Company's Website:</u> <a href='$pc_website' target='_blank'>$pc_website</a></li>";
    $list .= "<li><u>Movie Description:</u> $movie_desc </li>";
    $list .= "<li><u>Runtime:</u> $runtime</li>";
    $list .= "<li><u>Genre:</u> $genre</li>";
    $list .= "<li><u>Category:</u> $category</li>";
    $list .= "<li><u>Release Date (yyyy-mm-dd):</u> $release_date</li>";
    $list .= "<li><u>Male Lead:</u> $male_lead</li>";
    $list .= "<li><u>Female Lead:</u> $female_lead</li>";
    $list .= "<li><u>Child Actor:</u> $child_lead</li>";
    $list .= "<li><u>Music Composer:</u> $music</li>";
    $list .= "<li><u>Director:</u> $director</li>";
    $list .= "<li><u>IMDB Rating:</u> $imdb</li>";
    $list .= "<li><u>Review:</u> $review</li>";    
    $list .= "</ul>";
    $list .= "</div>";  
    $list .= "</section>"; 


    echo $list;
}




?>