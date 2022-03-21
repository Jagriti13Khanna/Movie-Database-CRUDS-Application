<?php
include ("includes/connect.php");


$sql = "SELECT * from movies WHERE deletedYN = 'N' AND movie_id='".(int)$_GET['movie_id']."'";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc())
{
    $movie_name = $row['movie_name'];
    $pc_name = $row['pc_name'];
    $pc_website = $row['pc_website'];
    $movie_desc = $row['movie_desc'];
    $runtime = $row['runtime'];
    $genre = $row['genre'];
    $category = $row['category'];
    $release_date = $row['release_date'];
    $male_lead = $row['male_lead'];
    $female_lead = $row['female_lead'];
    $music = $row['music'];
    $director = $row['director'];
    $imdb = $row['imdb'];
    $review = $row['review'];

    $movie_name = ucfirst($movie_name);
    $pc_name = ucfirst($pc_name);
    $movie_desc = ucfirst($movie_desc);
    $genre = ucfirst($genre);
    $category = ucfirst($category);
    $male_lead = ucfirst($male_lead);
    $female_lead = ucfirst($female_lead);
    $music = ucfirst($music);
    $director = ucfirst($director);
    $course_desc = ucfirst($course_desc);

}

    // $selected_movie = "<div class = 'movie-php'>";
    // $selected_movie .= "<h3><u>$movie_name</u></h3>";    
    // $selected_movie .= "<ul>";
    // $selected_movie .= "<li>Production Company's Name: $pc_name </li>";
    // $selected_movie .= "<li>Production Company's Website: <a href='$pc_website' target='_blank'>$pc_website</a></li>";
    // $selected_movie .= "<li>Movie Description: $movie_desc </li>";
    // $selected_movie .= "<li>Runtime: $runtime</li>";
    // $selected_movie .= "<li>Genre: $genre</li>";
    // $selected_movie .= "<li>Category: $category</li>";
    // $selected_movie .= "<li>Release Date (yyyy-mm-dd): $release_date</li>";
    // $selected_movie .= "<li>Male Lead: $male_lead</li>";
    // $selected_movie .= "<li>Female Lead: $female_lead</li>";
    // $selected_movie .= "<li>Child Actor: $child_lead</li>";
    // $selected_movie .= "<li>Music Composer: $music</li>";
    // $selected_movie .= "<li>Director: $director</li>";
    // $selected_movie .= "<li>IMDB Rating: $imdb</li>";
    // $selected_movie .= "<li>Review: $review</li>";    
    // $selected_movie .= "</ul>";
    // $selected_movie .= "</div>";
    
//  $pc_website $pc_name $release_date $male_lead $female_lead $child_lead $runtime $movie_desc $genre $category $music $director $imdb $review ";

    // echo $selected_movie;

    
$page_title = $movie_name;

    include("includes/header1.php");

?>

<div class="movie-single">
    <label for="movie_name" name="movie_name"><?php if($movie_name) echo"<h3>$movie_name</h3>"; ?></label>

    <label for="pc_name" name="pc_name"><?php if($pc_name) echo "<li>Production Company's Name: $pc_name</li>"; ?></label>

    <label for="pc_website" name="pc_website"><?php if($pc_website) echo "<li>Production Company's Website: <a href='$pc_website' target='_blank'> $pc_website</a></li>"; ?></label>

    <label for="movie_desc" name="movie_desc"><?php if($movie_desc) echo "<li>Movie Description: $movie_desc</li>"; ?></label>

    <label for="runtime" name="runtime"><?php if($runtime) echo "<li>Runtime: $runtime</li>"; ?></label>

    <label for="genre" name="genre"><?php if($genre) echo "<li>Genre: $genre</li>"; ?></label>

    <label for="category" name="category"><?php if($category) echo "<li>Category: $category</li>"; ?></label>

    <label for="release_date" name="release date"><?php if($release_date) echo "<li>Release date: $release_date</li>"; ?></label>

    <label for="male_lead" name="male_lead"><?php if($male_lead) echo "<li>Male Lead: $male_lead</li>"; ?></label>

    <label for="female_lead" name="female_lead"><?php if($female_lead) echo "<li>Female Lead: $female_lead</li>"; ?></label>

    <label for="child_lead" name="child_lead"><?php if($child_lead) echo "<li>Is there any child actor? : $child_lead</li>"; ?></label>

    <label for="music" name="music"><?php if($music) echo "<li>Music Composer: $music</li>"; ?></label>

    <label for="director" name="director"><?php if($director) echo "<li>Director: $director</li>"; ?></label>

    <label for="imdb" name="imdb"><?php if($imdb) echo "<li>IMDB Rating: $imdb</li>"; ?></label>

    <label for="review" name="review"><?php if($review) echo "<li>Review: $review</li>"; ?></label>
     
</div>

<?php include("includes/footer.php"); ?>