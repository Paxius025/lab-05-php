<?php
require("../db/connect_db.php");

$course_code_edit = $_POST["course_code_edit"];
$course_code = $_POST["course_code"];
$course_name = $_POST["course_name"];
$credit = $_POST["credit"];

$sql_check_code = "SELECT course_code FROM courses WHERE course_code = '$course_code' AND course_code != '$course_code_edit'";
$result_code = mysqli_query($conn, $sql_check_code);

$sql_check_name = "SELECT course_name FROM courses WHERE course_name = '$course_name' AND course_code != '$course_code_edit'";
$result_name = mysqli_query($conn, $sql_check_name);

if(mysqli_num_rows($result_code) > 0 || mysqli_num_rows($result_name) > 0){
    echo "<script>
        alert('รหัสวิชาหรือชื่อวิชาซ้ำ! กรุณากลับไปแก้ไข.');
        window.history.back(); // กลับไปหน้า edit form
    </script>";
    exit;
}

$sql_update = "UPDATE courses 
               SET course_code='$course_code', course_name='$course_name', credit=$credit 
               WHERE course_code='$course_code_edit'";
mysqli_query($conn, $sql_update);

header("location: course_list.php");
exit(0);
?>