<?php
include "db.php";
$search = "";
if (isset($_GET["search"])) {
    $search = trim($_GET["search"]);
}
$safe_search = mysqli_real_escape_string($conn, $search);
if (!empty($safe_search)) {
    $sql = "SELECT * FROM students
            WHERE name LIKE '%$safe_search%'
            OR email LIKE '%$safe_search%'
            OR course LIKE '%$safe_search%'
            OR city LIKE '%$safe_search%'
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM students ORDER BY id DESC";
}
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Students</title>
</head>
<body>
    <h2>Search Students</h2>
    <form method="GET">
        <input type="text" name="search" placeholder="Search here"
               value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>
    <br>
    <table border="1" cellpadding="8">
        <tr>
            <th>Name</th><th>Email</th><th>Course</th><th>City</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row["name"]); ?></td>
            <td><?php echo htmlspecialchars($row["email"]); ?></td>
            <td><?php echo htmlspecialchars($row["course"]); ?></td>
            <td><?php echo htmlspecialchars($row["city"]); ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>