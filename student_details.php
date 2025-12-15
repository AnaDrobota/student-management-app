<?php include("header.php"); ?>

<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT s.*, g.group_name 
            FROM students s
            JOIN student_groups g ON s.group_id = g.id
            WHERE s.id = $id";

    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        
        $fullName = htmlspecialchars($row["last_name"]) . " " . htmlspecialchars($row["first_name"]);

        echo "<h2>Details for: $fullName</h2>";
        
        echo "<ul>";
        echo "<li><strong>Enrollment Nr:</strong> " . htmlspecialchars($row["enrollment_nr"]) . "</li>";
        echo "<li><strong>Phone:</strong> " . htmlspecialchars($row["phone"]) . "</li>";
        echo "<li><strong>Email:</strong> " . htmlspecialchars($row["email"]) . "</li>";
        echo "<li><strong>Study Year:</strong> " . htmlspecialchars($row["study_year"]) . "</li>";
        echo "<li><strong>Group:</strong> " . htmlspecialchars($row["group_name"]) . "</li>";
        echo "</ul>";
        
        // Add a back button for better UX
        echo "<br><a href='javascript:history.back()'>&laquo; Back</a>";

    } else {
        echo "Student not found.";
    }

} else {
    echo "Missing Student ID.";
}
?>

<?php include("footer.php"); ?>