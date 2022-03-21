<?php

// var_dump($sql);

session_start();

if (!isset($_SESSION['bhjvbdjhnbdjvbn=jagriti'])) {
    header("Location:login.php");
}

include("../includes/connect.php");

$page_title = "Insert Movie";

include("../includes/header2.php");

if (isset($_POST['submit']))
{
    // var_dump($_POST);

    // $movie_name = $_POST['movie_name'];
    // $movie_desc = $_POST['movie_desc'];
    $genre = $_POST['genre'];
    $category = $_POST['category'];
    $child_lead = $_POST['child_lead'];
    // $pc_website = $_POST['pc_website'];
    // $runtime = $_POST['runtime'];
    // $music = $_POST['music'];
    // $director = $_POST['director'];
    // $review = $_POST['review'];
    
    extract($_POST);
    
    // echo "$movie_name $pc_website $runtime $movie_desc $genre $category $imdb $music $director $release_date $review";

    if ($movie_name && $pc_website && $runtime && $movie_desc && $genre && $category && $imdb && $music && $director && $release_date && $review)
    {
        
        $sql = "INSERT into `movies` (movie_name, pc_website, pc_name, release_date, male_lead, female_lead, child_lead, runtime, movie_desc, genre, category, music, director, imdb, review) VALUES ('$movie_name', '$pc_website', '$pc_name', '$release_date', '$male_lead', '$female_lead', '$child_lead', '$runtime', '$movie_desc', '$genre', '$category', '$music', '$director', '$imdb', '$review')";

        // echo $sql;

        if ($conn->query($sql))
        {
            $message = "<p>Record inserted successfuly</p>";
            $movie_name = $pc_website = $pc_name = $release_date = $male_lead = $female_lead = $child_lead = $runtime = $movie_desc = $genre = $category = $music = $director = $imdb = $review  = "";
        }
        else {
            $message = "<p>There was a problem inserting: $conn->error</p>";
        }
    }

    //Validation
    else {
        //Movie Name
        if ($movie_name == "") {
			$movieNameValid = "<p class='msg'>Please add the name of the movie.</p>";
	    }
        else {
            $movie_name = filter_var($movie_name, FILTER_SANITIZE_STRING);
        }

        //Company Name
        if ($pc_name == "") {
			$pcNameValid = "<p class='msg'>Please add the name of the movie.</p>";
	    }
        else 
        {
            $pc_name = filter_var($pc_name, FILTER_SANITIZE_STRING);
        }
        
        //Website
        if ($pc_website  == "")
        {
            $pcWebsiteValid = "<p class='msg'>Please add production company's website</p>";

           
        }
        else
        {
            // $pc_website = filter_var($pc_website , FILTER_SANITIZE_URL);       
            
            if (!filter_var($pc_website, FILTER_VALIDATE_URL))
            {
                $pcWebsiteValid = "<p class='msg'>$pc_website" . "is not a valid URL. Try 'https://www.example.com'</p>";
            }
        }

        //Description
        if ($movie_desc == "") {
			$movieDescValid = "<p class='msg'>Please add the description of the movie.</p>";
        }
        else
        {
            $movie_desc = filter_var($movie_desc, FILTER_SANITIZE_STRING);

            if ((strlen($movie_desc) < 10) )
            {
                $movieDescValid = "<p class='msg'>Movie description is too short. Please add more.</p>"; 
            }           
        }

        //Runtime
        if ($runtime == "")
        {
            $runtimeValid = "<p class='msg'>Please add the runtime of the movie.</p>"; 
        }
        else
        {           
            if(!is_numeric($runtime))
            {
                $runtimeValid = "<p class='msg'>Runtime format is incorrect. Try (180).</p>";
            }
        }

        //Genre
        if($genre == "")
        {
            $genreValid = "<p class='msg'>Please select a genre.</p>"; 
        }

        //Category
        if($category == "")
        {
            $categoryValid = "<p class='msg'>Please select a category.</p>"; 
        }

        //Release date
        if($release_date != "")
        {
            if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$release_date))
            {
                $releaseDateValid = "<p class='msg'>Format of release date is incorrect. Try 'yyyy-mm-dd'.</p>"; 
            }            
        }
        else
        {
            $releaseDateValid = "<p class='msg'>Please add movie release Date.</p>";             
        }    

        //Male lead
        if ($male_lead == "")
        {
			$maleLeadValid = "<p class='msg'>Please add the name of the male lead.</p>";
	    }
        else {
            $male_lead = filter_var($male_lead, FILTER_SANITIZE_STRING);
        }

        //Female Lead
        if($female_lead == "")
        {
            $femaleLeadValid = "<p class='msg'>Please add the name of female lead.</p>"; 
        }
        else
        {
            $female_lead = filter_var($female_lead, FILTER_SANITIZE_STRING);
        }

        //Child Lead
        if($child_lead == "")
        {
            $childLeadValid = "<p class='msg'>Please select 'YES' if there is any child actor and 'NO' if there isn't.</p>"; 
        }

        //IMDB
        if ($imdb == "")
        {
            $imdbValid = "<p class='msg'>Please add the imdb of the movie.</p>"; 
        }
        else
        {           
            $imdb = filter_var($imdb , FILTER_VALIDATE_FLOAT);
            
            if(!is_numeric($imdb))
            {
                $imdbValid = "<p class='msg'>IMDB format is incorrect. Try '5' OR '5.09'.</p>";
            }
        }

        //Music Composer
        if($music == "")
        {
            $musicValid = "<p class='msg'>Please add the name of music composer.</p>"; 
        }
        else{
            $music = filter_var($music, FILTER_SANITIZE_STRING);
        }

        //Director
        if($director == "")
        {
            $directorValid = "<p class='msg'>Please add the name of director.</p>"; 
        }
        else
        {
            $director = filter_var($director, FILTER_SANITIZE_STRING);
        }

        //Review
        if($review == "")
        {
            $reviewValid = "<p class='msg'>Please add movie review.</p>"; 
        }
        else
        {
            $review = filter_var($review, FILTER_SANITIZE_STRING);

            if ((strlen($review) < 10) )
            {
                $reviewValid = "<p class='msg'>Review description is too short. Please add more.</p>"; 
            }  
        }

        
    }



}

?>


    <?php echo $message; ?>

    <div class="insert">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="no-flex">
                <div class="iblock">
                    <label for="movie_name">Movie Name</label>
                    <input type="text" id="movie_name" name="movie_name" value="<?php echo $movie_name; ?>">
                    <?php if ($movieNameValid) echo $movieNameValid; ?>
                </div>
                <div class="iblock">
                    <label for="pc_name">Production Company's Name</label>
                    <input type="text" id="pc_name" name="pc_name" value="<?php echo $pc_name; ?>">
                    <?php if ($pcNameValid) echo $pcNameValid; ?>
                </div>
                <div class="iblock">
                    <label for="pc_website">Production Company's Website</label>
                    <input type="text" id="pc_website" name="pc_website" value="<?php echo $pc_website; ?>">
                    <?php if($pcWebsiteValid) echo $pcWebsiteValid; ?>
                </div>
                <div class="iblock">
                    <label for="movie_desc">Movie Description</label>
                    <textarea id="movie_desc" name="movie_desc"><?php echo $movie_desc; ?></textarea>
                    <?php echo $movieDescValid; ?>
                </div>
                <div class="iblock">
                    <label for="runtime">Runtime (minutes)</label>
                    <input type="text" id="runtime" name="runtime" value="<?php echo $runtime; ?>">
                    <?php if ($runtimeValid) echo $runtimeValid; ?>
                </div>
                <div class="iblock">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre">
                    <option value="">Select genre</option>
                    <option value="action">Action</option>
                    <option value="horror" <?php if(isset($genre) && $genre == "horror") {echo "selected";} ?>>Horror</option>
                    <option value="thriller" <?php if(isset($genre) && $genre == "thriller") {echo "selected";} ?>>thriller</option>
                    <option value="adventure" <?php if(isset($genre) && $genre == "adventure") {echo "selected";} ?>>Adventure</option>
                    <option value="romance" <?php if(isset($genre) && $genre == "romance") {echo "selected";} ?>>romance</option>
                    <option value="crime" <?php if(isset($genre) && $genre == "crime") {echo "selected";} ?>>crime</option>
                    <option value="comedy" <?php if(isset($genre) && $genre == "comedy") {echo "selected";} ?>>comedy</option>
                    <option value="drama" <?php if(isset($genre) && $genre == "drama") {echo "selected";} ?>>drama</option>
                    <option value="scifi" <?php if(isset($genre) && $genre == "scifi") {echo "selected";} ?>>Scifi</option>
                    <option value="documentary" <?php if(isset($genre) && $genre == "documentary") {echo "selected";} ?>>Documentary</option>
                    <option value="family" <?php if(isset($genre) && $genre == "family") {echo "selected";} ?>>Family</option>
                    <option value="children" <?php if(isset($genre) && $genre == "children") {echo "selected";} ?>>Children</option>
                    <option value="anime" <?php if(isset($genre) && $genre == "anime") {echo "selected";} ?>>Anime</option>
                    </select>
                    <?php echo $genreValid; ?>
                </div>
                <div class="iblock">
                        <fieldset class="category">
                            <legend>Category</legend>
                            <input type="radio" name="category" <?php if (isset($category) && $category == "fictional") echo "checked";?> value="fictional">
                            <label for="fictional">Fictional</label>
                            <input type="radio" name="category" <?php if (isset($category) && $category=="non-fictional") echo "checked";?> value="non-fictional">
                            <label for="non-fictional">Non Fictional</label>
                        </fieldset>
                    <?php if($categoryValid) echo $categoryValid; ?>
                </div>
                <div class="iblock">
                    <label for="release_date">Release date (yyyy-mm-dd)</label>
                    <input type="text" id="release_date" name="release_date" value="<?php echo $release_date; ?>"></input>
                    <?php if($release_date) echo $releaseDateValid; ?>
                </div>
                <div class="iblock">
                    <label for="male_lead">Male Lead</label>
                    <input type="text" id="male_lead" name="male_lead" value="<?php echo $male_lead; ?>"></input>
                    <?php if ($maleLeadValid) echo $maleLeadValid; ?>
                </div>
                <div class="iblock">
                    <label for="female_lead">Female Lead</label>
                    <input type="text" id="female_lead" name="female_lead" value="<?php echo $female_lead; ?>"></input>
                    <?php if ($femaleLeadValid) echo $femaleLeadValid; ?>
                </div>
                <div class="iblock">
                        <fieldset class="child_lead">
                            <legend>Is there any child actor?</legend>
                            <input type="checkbox" name="child_lead" <?php if (isset($child_lead) && $child_lead == "yes") echo "checked";?> value="yes">
                            <label for="yes">Yes</label>
                              <input type="checkbox" name="child_lead" <?php if (isset($child_lead) && $child_lead =="no") echo "checked";?> value="no">
                              <label for="no">No</label>
                        </fieldset>
                    <?php if($childLeadValid)
                    echo $childLeadValid; ?>
                </div>
                <div class="iblock">
                    <label for="music">Music Composer</label>
                    <input type="text" id="music" name="music" value="<?php echo $music; ?>"></input>
                    <?php if($musicValid)
                    echo $musicValid; ?>
                </div>
                <div class="iblock">
                    <label for="director">Director</label>
                    <input type="text" id="director" name="director" value="<?php echo $director; ?>"></input>
                    <?php if($directorValid) echo $directorValid; ?>
                </div>
                <div class="iblock">
                    <label for="imdb">IMDB</label>
                    <input type="text" id="imdb" name="imdb" value="<?php echo $imdb; ?>">
                    <?php if($imdbValid) echo $imdbValid; ?>
                </div>
                    <div class="iblock">
                    <label for="review">Review</label>
                    <textarea id="review" name="review"><?php echo $review; ?></textarea>
                    <?php if($reviewValid) echo $reviewValid; ?>
                </div>
                <input type="submit" value="Insert movie record" name="submit">
            </div>
        </form>
    </div>


    <?php include("../includes/footer.php"); ?>
