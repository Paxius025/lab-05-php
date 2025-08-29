<?php

require("../db/connect_db.php");
if (isset($_GET['course_code'])) {
    $course_code = $_GET['course_code'];

    $stmt = $conn->prepare("DELETE FROM courses WHERE course_code = ?");
    $stmt->bind_param("s", $course_code);

    if ($stmt->execute()) {
        header("location: course_list.php");
        exit();
    } else {
        echo "Error deleting course.";
    }

    $stmt->close();
} else {
    echo "Course code not provided.";
}
?>