<?php
require("../db/connect_db.php");
$course_code = $_GET["course_code"];

// Fetch all students to display in the dropdown
$sql = "SELECT student_code, student_name FROM students";
$result = mysqli_query($conn, $sql);    

echo "<center>";
echo "<form action='save_add_exam_result.php' method='post'>";
echo "<table border=1 width=40%>";
echo "<tr><td>Course Code:</td><td><input type='text' name='course_code' value='$course_code' /></td></tr>";

// Dropdown for Student Code
echo "<tr><td>Student Code:</td><td>";
echo "<select name='student_code'>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<option value='".$row['student_code']."'>".$row['student_code']." - ".$row['student_name']."</option>";
}
echo "</select>";
echo "</td></tr>";

echo "<tr><td>Point:</td><td><input type='text' name='point' /></td></tr>";
echo "<tr><td colspan=2><center><input type='submit' value='Submit' /></center></td></tr>";
echo "</table>";
echo "</form>";
echo "</center>";
?>