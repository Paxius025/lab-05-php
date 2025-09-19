<?php
require("../db/connect_db.php");
require("../navbar.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Course (Wireframe)</title>
</head>

<body>
    <form action="save_add_course.php" method="post">
        <table>
            <tr>
                <td>Course Code:</td>
                <td><input type="text" name="course_code" maxlength="8" /></td>
            </tr>
            <tr>
                <td>Course Name:</td>
                <td><input type="text" name="course_name" maxlength="50" /></td>
            </tr>
            <tr>
                <td>Credit:</td>
                <td><input type="text" name="credit" maxlength="1" /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
    <script>
    // require all fields to be filled
    document.querySelector("form").addEventListener("submit", function(event) {
        var courseCode = document.querySelector("input[name='course_code']").value;
        var courseName = document.querySelector("input[name='course_name']").value;
        var credit = document.querySelector("input[name='credit']").value;
        if (!courseCode || !courseName || !credit) {
            alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
            event.preventDefault();
        }
    });
    </script>
</body>

</html>