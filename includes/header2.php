<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/reset.css"> 
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/styles.css">   
</head>
<body class="<?php echo $body_class; ?>">
    <header>
         <div class="header header2">
             <h2>Movie Fanatics</h2>
             <nav>
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
                    <li><a href="<?php echo BASE_URL; ?>movielist.php">Movies List</a></li>
                    <li><a href="<?php echo BASE_URL; ?>search.php">Search Movies</a></li>
                    <li><a href="<?php echo BASE_URL; ?>admin/insert.php">Insert Movie</a></li>
                    <li><a href="<?php echo BASE_URL; ?>admin/delete.php">Delete Movies</a></li>
                    <li><a href="<?php echo BASE_URL; ?>admin/edit.php">Edit Movies</a></li>
                </ul>
         </nav>
    </header>
    