<?php

require("../db/connect_db.php");
if (isset($_GET['student_code'])) {
    $student_code = $_GET['student_code'];

    $stmt = $conn->prepare("DELETE FROM exam_results WHERE student_code = ?");
    $stmt->bind_param("s", $student_code);

    if ($stmt->execute()) {
        header("location: exam_result.php");
        exit();
    } else {
        echo "Error deleting exam result.";
    }

    $stmt->close();
} else {
    echo "Student code not provided.";
}
?>