<?php
require("../db/connect_db.php");

if (isset($_GET['student_code'])) {
    $student_code = $_GET['student_code'];

    $stmt = $conn->prepare("DELETE FROM students WHERE student_code = ?");
    $stmt->bind_param("s", $student_code);

    if ($stmt->execute()) {
        header("location: ./student_list.php");
        exit();
    } else {
        echo "Error deleting student.";
    }

    $stmt->close();
} else {
    echo "student code not provided.";
}
?>