<?php
require("../db/connect_db.php");

$student_code = $_POST["student_code"];
$student_name = $_POST["student_name"];
$gender = $_POST["gender"];

$check_sql = "SELECT * FROM students WHERE student_code='$student_code'";
$check_result = mysqli_query($conn, $check_sql);
if(mysqli_num_rows($check_result) > 0){
    echo "<script>
        alert('รหัสนักศึกษาซ้ำ! กรุณาตรวจสอบให้ถูกต้อง.');
        window.history.back(); // Go back to the previous page
    </script>";
    exit;
}    
$sql ="INSERT INTO students(student_code, student_name, gender) VALUES('$student_code','$student_name', '$gender')";

mysqli_query($conn, $sql);
header("location: student_list.php");
exit(0);
?>