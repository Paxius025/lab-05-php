<?php

require("../db/connect_db.php");
if (isset($_GET['id']) && isset($_GET['course_code'])) {
    // echo "ID: " . $_GET['id'] . "<br>";
    // echo "Course Code: " . $_GET['course_code'] . "<br>";
    $course_code = $_GET['course_code'];
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM exam_results WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("location: show_exam_result.php?course_code=$course_code");
        exit();
    } else {
        echo "Error deleting exam result.";
    }

    $stmt->close();
} else {
    echo "ID not provided.";
}
?>