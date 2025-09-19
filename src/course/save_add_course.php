<?php
require("../db/connect_db.php");
require("checkDuplicate.php");  
$course_code = $_POST["course_code"];
$course_name = $_POST["course_name"];
$credit = $_POST["credit"];

if (checkDuplicate($conn, $course_code, $course_name)) {
    echo "<script>window.location.href = 'add_course.php';</script>";
    exit();
}
$sql ="INSERT INTO courses(course_code, course_name, credit) VALUES('$course_code','$course_name', $credit)";
mysqli_query($conn, $sql);
header("location: course_list.php");
exit(0);
?>