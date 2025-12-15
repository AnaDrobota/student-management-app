<?php include("header.php"); ?>

<?php
if (isset($_GET['group_name'])) {
    $group_name = $conn->real_escape_string($_GET['group_name']);

    // Join students with student_groups
    $sql = "SELECT s.id, s.last_name, s.first_name 
            FROM students s
            JOIN student_groups g ON s.group_id = g.id
            WHERE g.group_name = '$group_name'
            ORDER BY s.last_name ASC, s.first_name ASC";

    $result = $conn->query($sql);

    echo "<h2>Students in Group: $group_name</h2>";

    if ($result && $result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            // Display: Last Name First Name
            $fullName = htmlspecialchars($row["last_name"]) . " " . htmlspecialchars($row["first_name"]);
            
            // Link to student_details.php
            echo "<li><a href='student_details.php?id=$id'>$fullName</a></li>";
        }
        echo "</ul>";
    } else {
        echo "No students found in this group.";
    }

} else {
    echo "No group specified.";
}
?>

<?php include("footer.php"); ?>