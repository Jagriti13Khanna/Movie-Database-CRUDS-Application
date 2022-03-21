<?php

include("includes/connect.php");



$sql = "SELECT * from `test`";
$result = $conn->query($sql);
// echo "<pre>";
// var_dump($result);
// echo "</pre>";

while ($row = $result->fetch_assoc())
{
    // echo "<pre>";
    // var_dump($row);
    // echo "</pre>";
    $c_id = $row['c_id'];
    $course_code = $row['course_code'];
    $course_name = $row['course_name'];
    $course_desc = $row['course_desc'];
    $deletedYN = $row['deletedYN'];

    $list = "<section class='list'>";
    $list .= "<div>";
    $list .= "<h4>$c_id) $course_code | $course_name</h4>";
    $list .= "<p>$course_desc</p>";
    $list .= "</div>";
    $list .= "</section>";


    echo $list;
}


include("includes/footer.php");

?>