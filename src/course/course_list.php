<?php
require("../db/connect_db.php");
require("../navbar.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Course List</title>
</head>

<body>
    <center>
        <table border="1" width="60%">
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit</th>
                <th>Operationt</th>
            </tr>
            <?php
            $sql = "SELECT * FROM courses";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["course_code"]."</td>";
                echo "<td>".$row["course_name"]."</td>";
                echo "<td>".$row["credit"]."</td>";
                echo "<td>";
                echo "<a href='edit_course.php?course_code=".$row["course_code"]."'>Edit</a> ";
                echo "<a href='delete_course.php?course_code=".$row["course_code"]."' onclick=\"return confirm('คุณต้องการลบข้อมูลวิชานี้หรือไม่?');\">delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <a href="add_course.php">Add Course</a>
    </center>
</body>

</html>