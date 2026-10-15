<?php
include "db.php";

$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

?>

<html>
<body>
<a herf="inser.php">Add students</a><br><br>


<table border="1" cellpadding="5">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Course</th>
<th>Phone</th>
<th>City</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo htmlspecialchars($row["id"]);?></td>
<td><?php echo htmlspecialchars($row["name"]);?></td>
<td><?php echo htmlspecialchars($row["email"]);?></td>
<td><?php echo htmlspecialchars($row["course"]);?></td>
<td><?php echo htmlspecialchars($row["phone"]);?></td>
<td><?php echo htmlspecialchars($row["city"]);?></td>
</tr>
<?php } ?>
</table>
</body>
</html>