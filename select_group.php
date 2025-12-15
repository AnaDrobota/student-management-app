<?php include("header.php"); ?>

<h2>Select a Group:</h2>

<form action="view_students.php" method="get">
    <label for="group_name">Group:</label>
    
    <select name="group_name" id="group_name" required>
        <?php
        $sql = "SELECT id, group_name FROM student_groups ORDER BY group_name ASC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $gName = htmlspecialchars($row['group_name']);
                echo "<option value='$gName'>$gName</option>";
            }
        } else {
            echo "<option value=''>No groups found</option>";
        }
        ?>
    </select>

    <input type="submit" value="Show Students">
</form>

<?php include("footer.php"); ?>