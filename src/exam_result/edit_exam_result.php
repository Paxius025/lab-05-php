<?php
require("../db/connect_db.php");
$id = $_GET["id"];

$query = "SELECT E.student_code, S.student_name, E.point, E.course_code FROM exam_results as E LEFT JOIN students as S ON S.student_code = E.student_code WHERE E.id = '$id';";

$list_exam_results = mysqli_query($conn, $query);
$exam_result = mysqli_fetch_assoc($list_exam_results);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Exam Result</title>
</head>

<body>
    <h1>Edit Exam Result</h1>
    <form action="save_exam_result.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>" />
        <input type="hidden" name="course_code" value="<?php echo htmlspecialchars($exam_result["course_code"]); ?>" />
        <div>
            <label>Student Code:</label>
            <input type="text" readonly name="student_code" value="<?php echo $exam_result["student_code"]; ?>" />
        </div>
        <div>
            <label>Student Name:</label>
            <input type="text" readonly name="student_name" value="<?php echo $exam_result["student_name"]; ?>" />
        </div>
        <div>
            <label>Point:</label>
            <input type="number" name="point" min="0" max="100" value="<?php echo $exam_result["point"]; ?>" />
        </div>
        <div>
            <input type="submit" value="Submit" />
        </div>
    </form>
</body>

</html>