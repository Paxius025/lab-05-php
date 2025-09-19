<?php
require("../db/connect_db.php");
require("../navbar.php");
$student_code = $_GET["student_code"];
$sql = "SELECT * FROM students WHERE student_code='$student_code'";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Student</title>
</head>

<body>
    <h2 align="center">Edit Student</h2>
    <form action="save_student.php" method="post">
        <input type="hidden" name="student_code_edit" value="<?php echo $student_code; ?>" />
        <table border="1" width="40%" align="center">
            <tr>
                <td>Student Code:</td>
                <td>
                    <input type="text" name="student_code" value="<?php echo $student["student_code"]; ?>" />
                </td>
            </tr>
            <tr>
                <td>Student Name:</td>
                <td>
                    <input type="text" name="student_name" value="<?php echo $student["student_name"]; ?>" />
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="text" name="gender" value="<?php echo $student["gender"]; ?>" />
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