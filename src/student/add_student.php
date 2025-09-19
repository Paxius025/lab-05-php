<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>
</head>

<body>
    <?php
require("../db/connect_db.php");
require("../navbar.php");
?>
    <h1>Add Student</h1>
    <form action="save_add_student.php" method="post">
        <div>
            <label>Student Code:</label>
            <input type="text" name="student_code" />
        </div>
        <div>
            <label>Student Name:</label>
            <input type="text" name="student_name" />
        </div>
        <div>
            <label>Gender:</label>
            <select name="gender">
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Submit" />
        </div>
    </form>
</body>

</html>