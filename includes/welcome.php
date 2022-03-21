<?php


$page_title = "Welcome to Movie Fanatics";

include("../includes/connect.php");

include("../includes/header2.php");


?>

<main class='welcome'>
    <h3>Welcome!</h3>
    <p>You may now insert, edit or delete movies.</p>
    <p class="logout">Click here to<a href="<?php echo BASE_URL; ?>admin/logout.php"> LOGOUT</a>.</p>
</main>

<?php include("../includes/footer.php"); ?>