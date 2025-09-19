<?php
require("../db/connect_db.php");
require("../navbar.php");

$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);
echo "<center>";
echo "<table border=1 width=60%>";
echo "<tr><th>Course Code</th><th>Course Name</th><th>Credit</th><th>Operationt</th></tr>";
while($row = mysqli_fetch_assoc($result)){
echo
"<tr><td>".$row["course_code"]."</td><td>".$row["course_name"]."</td><td>".$row["credit"]."</td>";
echo "<td><a href=edit_course.php?course_code=".$row["course_code"].">Edit</a>";

echo "<a href='delete_course.php?course_code=".$row["course_code"]."' onclick=\"return confirm('คุณต้องการลบข้อมูลวิชานี้หรือไม่?');\"> delete</a></td>";

}
echo "</table>";
echo "<br><a href=add_course.php>Add Course</a>";
echo "</center>";
?>