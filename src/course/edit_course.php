<?php
require("../db/connect_db.php");

require("../navbar.php");
$course_code = $_GET["course_code"];
$sql = "SELECT * FROM courses WHERE course_code='$course_code'";
$result = mysqli_query($conn, $sql);
$course = mysqli_fetch_assoc($result);
?>
<form action="save_course.php" method="post">
    <input type="hidden" name="course_code_edit" value="<?php echo htmlspecialchars($course_code); ?>" />
    <table>
        <tr>
            <td>Course Code:</td>
            <td><input type="text" name="course_code" value="<?php echo htmlspecialchars($course["course_code"]); ?>" />
            </td>
        </tr>
        <tr>
            <td>Course Name:</td>
            <td><input type="text" name="course_name" value="<?php echo htmlspecialchars($course["course_name"]); ?>" />
            </td>
        </tr>
        <tr>
            <td>Credit:</td>
            <td><input type="text" name="credit" value="<?php echo htmlspecialchars($course["credit"]); ?>" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Submit" /></td>
        </tr>
    </table>
</form>