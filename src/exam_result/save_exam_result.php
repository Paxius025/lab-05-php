<?php
require("../db/connect_db.php");

$student_code_edit = $_POST["student_code_edit"];
$course_code_edit = $_POST["course_code_edit"];
$student_code = $_POST["student_code"];
$student_name = $_POST["student_name"];
$point = $_POST["point"];

$sql = "UPDATE exam_results AS E
        LEFT JOIN students AS S ON S.student_code = E.student_code
        SET E.student_code='$student_code', 
            S.student_name='$student_name', 
            E.point=$point
        WHERE E.student_code='$student_code_edit'";

mysqli_query($conn, $sql);

header("location: show_exam_result.php?course_code=$course_code_edit");
exit(0);
?>