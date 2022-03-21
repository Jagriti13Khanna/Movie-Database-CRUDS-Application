<?php

// var_dump($sql);

session_start();

if (!isset($_SESSION['bhjvbdjhnbdjvbn=jagriti'])) {
    header("Location:login.php");
}

include("../includes/connect.php");

$row_to_edit = $_GET['row_to_edit'];

if (isset($_POST['save'])) 
{
    extract($_POST);

    $new_genre = $_POST['genre'];
    $new_category = $_POST['category'];
    $new_child_lead = $_POST['child_lead'];

    $new_movie_name = ucfirst($movie_name);
    $new_pc_name = ucfirst($pc_name);
    $new_movie_desc = ucfirst($movie_desc);
    $new_genre = ucfirst($genre);
    $new_category = ucfirst($category);
    $new_male_lead = ucfirst($male_lead);
    $new_female_lead = ucfirst($female_lead);
    $new_music = ucfirst($music);
    $new_director = ucfirst($director);
    $new_course_desc = ucfirst($course_desc);
    
    // echo "$movie_name $pc_website $runtime $movie_desc $genre $category $imdb $music $director $release_date $review";

    if ($new_movie_name && $new_pc_website && $new_runtime && $new_movie_desc && $new_genre && $new_category && $new_imdb && $new_music && $new_director && $new_review)
    {       

        $update_sql = "UPDATE movies SET movie_name = '$new_movie_name', pc_name = '$new_pc_name', pc_website = '$new_pc_website', movie_desc = '$new_movie_desc', runtime = '$new_runtime', genre = '$new_genre', category = '$new_category', male_lead = '$new_male_lead', female_lead = '$new_female_lead', child_lead = '$new_child_lead', music = '$new_music', director = '$new_director', imdb = '$new_imdb', review = '$new_review' WHERE movie_id = $row_to_edit";

        // echo $sql;

        if ($conn->query($update_sql))
        {
            $message = "Record updated successfuly";
            $movie_name && $pc_website && $pc_name && $release_date && $male_lead && $female_lead && $child_lead && $runtime && $movie_desc && $genre && $category && $music && $director && $imdb && $review  = "";
        }
        else {
            $message = "There was a problem updating: $conn->error";
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
            $pcWebsiteValid = "Please add production company's website";

           
        }
        else
        {
            // $pc_website = filter_var($pc_website , FILTER_SANITIZE_URL);       
            
            if (!filter_var($pc_website, FILTER_VALIDATE_URL))
            {
                $pcWebsiteValid = $pc_website . " is not a valid URL. Try 'https://www.example.com'";
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
$page_title = "Edit Movie";

include("../includes/header2.php");

?>

<div class="flex">
    <div class="edit">
            <h3>Movies in System</h3>
            <?php
            $list_sql = "SELECT movie_name, pc_website, pc_name, release_date, male_lead, female_lead, child_lead, runtime, movie_desc, genre, category, music, director, imdb, review, movie_id FROM `movies` WHERE deletedYN = 'N'";
            // echo $list_sql;
            $list_result = $conn->query($list_sql);
    
            if($list_result->num_rows > 0)
            {
                echo "<ul class='edit'>";
                while($list_row = $list_result->fetch_assoc())
                {
                    extract($list_row);
                    echo "<li>";
                    echo "<a href=\"edit.php?row_to_edit=$movie_id\">";
                    echo "$movie_name";
                    echo "</a>";
                    echo "</li>";
                }
                echo "</ul>";
            }
            ?>
    
    
    </div>
    
    <div class="edit">
    
        <?php if ($row_to_edit): ?>
            <?php
                $row_to_edit_sql = "SELECT movie_name, pc_website, pc_name, release_date, male_lead, female_lead, child_lead, runtime, movie_desc, genre, category, music, director, imdb, review FROM `movies` WHERE movie_id = $row_to_edit";
    
                $row_to_edit_result = $conn->query($row_to_edit_sql);
                $row_to_edit_row = $row_to_edit_result->fetch_assoc();
    
                extract($row_to_edit_row);
    
                // echo $row_to_edit_sql;
    
            ?>
    
        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
    
        <?php echo $message; ?>
    
    
        <div class="iblock">
            <label for="movie_name">Movie Name</label>
            <input type="text" id="movie_name" name="movie_name" value="<?php if($new_movie_name) echo $new_movie_name; else echo $movie_name; ?>">
            <?php if ($movieNameValid) echo $movieNameValid; ?>
        </div>
        <div class="iblock">
            <label for="pc_name">Production Company's Name</label>
            <input type="text" id="pc_name" name="pc_name" value="<?php if($new_pc_name) echo $new_pc_name; else echo $pc_name; ?>">
            <?php if ($pcNameValid) echo $pcNameValid; ?>
        </div>
        <div class="iblock">
            <label for="pc_website">Production Company's Website</label>
            <input type="text" id="pc_website" name="pc_website" value="<?php if($new_pc_website) echo $new_pc_website; else echo $pc_website; ?>">
            <?php if($pcWebsiteValid) echo $pcWebsiteValid; ?>
        </div>
        <div class="iblock">
            <label for="movie_desc">Movie Description</label>
            <textarea id="movie_desc" name="movie_desc"><?php if($new_movie_desc) echo $new_movie_desc; else echo $movie_desc; ?></textarea>
            <?php echo $movieDescValid; ?>
        </div>
        <div class="iblock">
            <label for="runtime">Runtime</label>
            <input type="text" id="runtime" name="runtime" value="<?php if($new_runtime) echo $new_runtime; else echo $runtime; ?>">
            <?php if ($runtimeValid) echo $runtimeValid; ?>
        </div>
        <div class="iblock">
            <label for="genre">Genre</label>
            <select name="genre" id="genre">
            <option value="">Select genre</option><option value="action">Action</option>
                <option value="horror" <?php if(isset($new_genre) && $new_genre == "horror") {echo "selected";} else {echo "selected";}?>>Horror</option>
                <option value="family" <?php if(isset($new_genre) && $new_genre == "family") {echo "selected";} else {echo "selected";}?>>Family</option>
                <option value="children" <?php if(isset($new_genre) && $new_genre == "children") {echo "selected";} else {echo "selected";}?>>Children</option>
                <option value="anime" <?php if(isset($new_genre) && $new_genre == "anime") {echo "selected";} else {echo "selected";}?>>Anime</option>
            </select>
            <?php echo $genreValid; ?>
        </div>
        <div class="iblock">
            <fieldset class="category">
                <legend>Category</legend>
                <input type="radio" name="category" <?php if (isset($new_category) && $new_category == "fictional") echo "checked";  else {echo "checked";}?> value="fictional">
                <label for="fictional">Fictional</label>
                <input type="radio" name="category" <?php if (isset($new_category) && $new_category=="non-fictional") echo "checked";  else {echo "checked";}?> value="non-fictional">
                <label for="non-fictional">Non Fictional</label>
            </fieldset>
            <?php if($categoryValid) echo $categoryValid; ?>
        </div>
        <div class="iblock">
            <label for="release_date">Release date (yyyy-mm-dd)</label>
            <input type="text" id="release_date" name="release_date" value="<?php if($new_release_date) echo $new_release_date; else echo $release_date; ?>"></input>
            <?php if($release_date) echo $releaseDateValid; ?>
        </div>
        <div class="iblock">
            <label for="male_lead">Male Lead</label>
            <input type="text" id="male_lead" name="male_lead" value="<?php if($new_male_lead) echo $new_male_lead; else echo $male_lead; ?>"></input>
            <?php if ($maleLeadValid) echo $maleLeadValid; ?>
        </div>
        <div class="iblock">
            <label for="female_lead">Female Lead</label>
            <input type="text" id="female_lead" name="female_lead" value="<?php if($new_female_lead) echo $new_female_lead; else echo $female_lead; ?>"></input>
            <?php if ($femaleLeadValid) echo $femaleLeadValid; ?>
        </div>
        <div class="iblock">
            <fieldset class="child_lead">
                <legend>Is there any child actor?</legend>
                <input type="radio" name="child_lead" <?php if (isset($new_child_lead) && $new_child_lead == "yes") echo "checked"; else {echo "checked";}?> value="yes">
                <label for="yes">Yes</label>
                <input type="radio" name="child_lead" <?php if (isset($new_child_lead) && $new_child_lead =="no") echo "checked"; else {echo "checked";}?> value="no">
                <label for="no">No</label>
            </fieldset>
            <?php if($childLeadValid)
            echo $childLeadValid; ?>
        </div>
        <div class="iblock">
            <label for="music">Music Composer</label>
            <input type="text" id="music" name="music" value="<?php if($new_music) echo $new_music; else echo $music; ?>"></input>
            <?php if($musicValid)
            echo $musicValid; ?>
        </div>
        <div class="iblock">
            <label for="director">Director</label>
            <input type="text" id="director" name="director" value="<?php if($new_director) echo $new_director; else echo $director; ?>"></input>
            <?php if($directorValid) echo $directorValid; ?>
        </div>
        <div class="iblock">
            <label for="imdb">IMDB</label>
            <input type="text" id="imdb" name="imdb" value="<?php if($new_imdb) echo $new_imdb; else echo $imdb; ?>">
            <?php if($imdbValid) echo $imdbValid; ?>
        </div>
        <div class="iblock">
            <label for="review">Review</label>
            <textarea id="review" name="review"><?php if($new_review) echo $new_review; else echo $review; ?></textarea>
            <?php if($reviewValid) echo $reviewValid; ?>
        </div>
        <input type="submit" value="Update movie record" name="save">
    
        </form>
    
    <?php endif ?>
    </div>
</div>

<?php include("../includes/footer.php"); ?>