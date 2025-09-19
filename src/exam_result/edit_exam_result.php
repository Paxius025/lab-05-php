<?php
require("../db/connect_db.php");
$student_code = $_GET["student_code"];

$query = "SELECT E.student_code, S.student_name, E.point, E.course_code FROM exam_results as E LEFT JOIN students as S ON S.student_code = E.student_code WHERE E.student_code = '$student_code';";

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
        <input type="hidden" name="student_code_edit" value="<?php echo $student_code; ?>" />
        <input type="hidden" name="course_code_edit" value="<?php echo $exam_result["course_code"]; ?>" />
        <div>
            <label>Student Code:</label>
            <input type="text" name="student_code" value="<?php echo $exam_result["student_code"]; ?>" />
        </div>
        <div>
            <label>Student Name:</label>
            <input type="text" name="student_name" value="<?php echo $exam_result["student_name"]; ?>" />
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