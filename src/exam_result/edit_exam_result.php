<?php
require("../db/connect_db.php");
$student_code = $_GET["student_code"];

$query = "SELECT E.student_code, S.student_name, E.point, E.course_code FROM exam_results as E LEFT JOIN students as S ON S.student_code = E.student_code WHERE E.student_code = '$student_code';";

$list_exam_results = mysqli_query($conn, $query);
$exam_result = mysqli_fetch_assoc($list_exam_results);

echo "<center>";
echo "<form action=save_exam_result.php method=post>";
echo "<table border=1 width=40%>";
echo "<input type=hidden name=student_code_edit value=$student_code />";
echo "<input type=hidden name=course_code_edit value=".$exam_result["course_code"]." />";

echo "<tr><td>Student Code:</td><td><input type=text name=student_code value=".$exam_result["student_code"]."
/></td></tr>";
echo "<tr><td>Student Name:</td><td><input type=text name=student_name value=".$exam_result["student_name"]."
/></td></tr>";
echo "<tr><td>point:</td><td><input type=text name=point value=".$exam_result["point"]." /></td></tr>";
echo "<tr><td colspan=2><center><input type=submit value=Submit /></center></td></tr>";
echo "</table>";
echo "</form>";
echo "</center>";
?>