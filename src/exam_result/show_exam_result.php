<?php
require("../db/connect_db.php");
require("../navbar.php");
$course_code = $_GET["course_code"];

$query_courses = "SELECT * FROM courses WHERE course_code='$course_code'";
$result = mysqli_query($conn, $query_courses);
$course = mysqli_fetch_assoc($result);

$sql = "SELECT E.*, S.student_name FROM exam_results AS E";
$sql .= " INNER JOIN students AS S ON E.student_code=S.student_code";
$sql .= " WHERE E.course_code='$course_code'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Exam Result</title>
</head>

<body>
    <center>
        <h1>Exam Result <?php echo $course["course_name"]." (".$course["course_code"].")"; ?></h1>
        <table border="1" width="40%">
            <tr>
                <th>Student Code</th>
                <th>Student Name</th>
                <th>Point</th>
                <th>Operation</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row["student_code"]; ?></td>
                <td><?php echo $row["student_name"]; ?></td>
                <td><?php echo $row["point"]; ?></td>
                <td>
                    <a href='edit_exam_result.php?student_code=<?php echo $row["student_code"]; ?>'>Edit</a>
                    <a href='delete_exam_result.php?id=<?php echo $row["id"];?>&course_code=<?php echo $course_code; ?>'
                        onclick="return confirm('คุณต้องการลบคะแนนนักศึกษาคนนี้หรือไม่?');">delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <a href='add_exam_result.php?course_code=<?php echo $course_code; ?>'>Add Exam Result</a>
    </center>
</body>

</html>