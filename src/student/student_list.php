<?php
require("../navbar.php");
require("../db/connect_db.php");
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student List</title>
</head>

<body>
    <center>
        <h2>Student List</h2>
        <table border="1" width="40%">
            <tr>
                <th>student Code</th>
                <th>student Name</th>
                <th>gender</th>
                <th>Operation</th>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["student_code"]."</td>";
                echo "<td>".$row["student_name"]."</td>";
                echo "<td>".$row["gender"]."</td>";
                echo "<td>
                        <a href='edit_student.php?student_code=".$row["student_code"]."'>Edit</a>
                        <a href='delete_student.php?student_code=".$row["student_code"]."' onclick=\"return confirm('คุณต้องการลบข้อมูลนักศึกษาคนนี้หรือไม่?');\">delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <a href="add_student.php">Add Student</a>
    </center>
</body>

</html>