<?php
function checkDuplicate($conn, $course_code, $course_name) {
    $sql = "SELECT * FROM courses WHERE course_code='$course_code' OR course_name='$course_name'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Course code or course name already exists. Please go back and enter a different one.');</script>";
        return true; // Duplicate found
    }
}
?>