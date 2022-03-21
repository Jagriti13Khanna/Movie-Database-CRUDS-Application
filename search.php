<?php

$page_title = "Search Movie Fanatics";

include("includes/connect.php");

include("includes/header1.php");

if (isset($_POST['searchButton']))
{
    $search =trim($_POST['search']);
    $search = filter_var($search, FILTER_SANITIZE_STRING);

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

    if(strlen($search) < 3)
    {
        $error = "Please try a longer word";
    }
    else{
        $sql = "SELECT movie_name, pc_website, pc_name, release_date, male_lead, female_lead, child_lead, runtime, movie_desc, genre, category, music, director, imdb, review FROM `movies` WHERE (movie_name LIKE '%$search%' OR pc_website LIKE '%$search%' OR pc_name LIKE '%$search%' OR release_date LIKE '%$search%'  OR male_lead LIKE '%$search%' OR female_lead LIKE '%$search%' OR child_lead LIKE '%$search%' OR runtime LIKE '%$search%' OR movie_desc LIKE '%$search%' OR genre LIKE '%$search%' OR category LIKE '%$search%' OR imdb LIKE '%$search%' OR music LIKE '%$search%' OR director LIKE '%$search%' OR review LIKE '%$search%') AND deletedYN = 'N' ";

        // echo $sql;        

        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                extract($row);
                
                $search_output .= "<div class = 'movie-search-php'>";
                $search_output .= "<h3><u>$movie_name</u></h3>";    
                $search_output .= "<ul>";
                $search_output .= "<li>Production Company's Name: $pc_name </li>";
                $search_output .= "<li>Production Company's Website: <a href='$pc_website' target='_blank'>$pc_website</a></li>";
                $search_output .= "<li>Movie Description: $movie_desc </li>";
                $search_output .= "<li>Runtime: $runtime</li>";
                $search_output .= "<li>Genre: $genre</li>";
                $search_output .= "<li>Category: $category</li>";
                $search_output .= "<li>Release Date (yyyy-mm-dd): $release_date</li>";
                $search_output .= "<li>Male Lead: $male_lead</li>";
                $search_output .= "<li>Female Lead: $female_lead</li>";
                $search_output .= "<li>Child Actor: $child_lead</li>";
                $search_output .= "<li>Music Composer: $music</li>";
                $search_output .= "<li>Director: $director</li>";
                $search_output .= "<li>IMDB Rating: $imdb</li>";
                $search_output .= "<li>Review: $review</li>";    
                $search_output .= "</ul>";
                $search_output .= "</div>";  

            //    echo $search_output;
            }
        }
        else 
        {
            $error = "<p class='error'>No records match your search. Please try again!</p>";
        }
    }
}


?>
<main class="search">
        <form class="search-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            
            <div class="flex-search">
                <label for="search">Add the movie you want to search</label>
                <input type="text" id="search" name="search" value="<?php echo $search; ?>">
            </div>
            <input type="submit" value="Search" name="searchButton">
        </form>
        
        <div class="max-width">
            <?php echo $error; ?>
            <?php echo $search_output; ?>
        </div>

</main>

<?php include("includes/footer.php"); ?>