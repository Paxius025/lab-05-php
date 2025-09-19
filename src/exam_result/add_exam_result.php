<?php
require("../db/connect_db.php");
require("../navbar.php");
$course_code = $_GET["course_code"];

// Fetch all students to display in the dropdown
// TODO : Fetch only students not already enrolled in the course
$sql = "SELECT student_code, student_name FROM students WHERE student_code NOT IN (SELECT student_code FROM exam_results WHERE course_code = '$course_code')";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Exam Result</title>
</head>

<body>
    <form action="save_add_exam_result.php" method="post">
        <table border="1" width="40%">
            <tr>
                <td>Course Code:</td>
                <td>
                    <input type="text" name="course_code" readonly value="<?php echo $course_code; ?>" />
                </td>
            </tr>
            <tr>
                <td>Student Code:</td>
                <td>
                    <select name="student_code">
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row['student_code']; ?>">
                            <?php echo $row['student_code'] . " - " . $row['student_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Point:</td>
                <td>
                    <input type="number" name="point" min="0" max="100" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>