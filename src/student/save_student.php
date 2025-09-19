<?php
require("../db/connect_db.php");

$student_code_edit = $_POST["student_code_edit"];
$student_code = $_POST["student_code"];
$student_name = $_POST["student_name"];
$gender = $_POST["gender"];

$check_sql = "SELECT * FROM students WHERE student_code='$student_code' AND student_code !='$student_code_edit'";
$check_result = mysqli_query($conn, $check_sql);
if(mysqli_num_rows($check_result) > 0){
    echo "<script>
        alert('รหัสนักศึกษาซ้ำ! กรุณาตรวจสอบให้ถูกต้อง.');
        window.location.href='edit_student.php?student_code=$student_code_edit'; // Go back to the edit page
    </script>";
    exit;
}

$sql ="UPDATE students SET student_code='$student_code', student_name='$student_name',gender='$gender' WHERE student_code='$student_code_edit'";
mysqli_query($conn, $sql);
header("location: student_list.php");
exit(0);
?>