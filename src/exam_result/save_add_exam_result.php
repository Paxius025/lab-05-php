<?php
require("../db/connect_db.php");
$course_code = $_POST["course_code"];
$student_code = $_POST["student_code"];
$point = $_POST["point"];
$sql ="INSERT INTO exam_results(course_code, student_code, point) VALUES('$course_code','$student_code', $point)";
mysqli_query($conn, $sql);
header("location: show_exam_result.php?course_code=$course_code");
exit(0);
?>