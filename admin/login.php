<?php

$page_title = "Login";

include("/home/jkhanna1/data/data.php");

include("../includes/connect.php");

include("../includes/header1.php");
// echo "$valid_user $encrypted_pass";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // echo "$username $password";

    if ( $username == $valid_user && password_verify($password, $encrypted_pass)) {

        // echo "its all good";

        session_start();
        $_SESSION['bhjvbdjhnbdjvbn=jagriti'] = session_id();    
        $_SESSION['username'] = $username;  
        header("Location:../includes/welcome.php");
    }
    else {
        $message = "Invalid login. Please try again!";
    }


}




?>
 

<main>
    <h2>Please log in.</h2>
    <form class="login" action="" method="POST">
        <div class="login-noflex">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
        </div>        
  
        <input type="submit" class="submit-login" value="Login!" name="login">  
        
        <?php 
            if($message) {
                echo "<p class='msg-bad'>$message</p>";;
            }
        ?>
    </form>
</main>

<?php include("../includes/footer.php"); ?>