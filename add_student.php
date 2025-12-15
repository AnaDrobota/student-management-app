<?php include("header.php"); ?>

<h2>Add New Student</h2>

<form action="add_student.php" method="post">
    Last Name: <input type="text" name="last_name" required><br>
    First Name: <input type="text" name="first_name" required><br>
    Enrollment Nr: <input type="text" name="enrollment_nr" required><br>
    Phone: <input type="text" name="phone"><br>
    Email: <input type="email" name="email"><br>
    Study Year: <input type="number" name="study_year" min="1" max="6"><br>

    Group: 
    <select name="group_id">
        <?php
        $sql = "SELECT id, group_name FROM student_groups ORDER BY group_name ASC";
        $rez = $conn->query($sql);

        while ($gr = $rez->fetch_assoc()) {
            echo "<option value='{$gr['id']}'>{$gr['group_name']}</option>";
        }
        ?>
    </select><br><br>

    <input type="submit" value="Add Student">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lname = $conn->real_escape_string($_POST['last_name']);
    $fname = $conn->real_escape_string($_POST['first_name']);
    $nr = $conn->real_escape_string($_POST['enrollment_nr']);
    $tel = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $year = intval($_POST['study_year']);
    $gid = intval($_POST['group_id']);

    $sql = "INSERT INTO students (last_name, first_name, enrollment_nr, phone, email, study_year, group_id) 
            VALUES ('$lname', '$fname', '$nr', '$tel', '$email', $year, $gid)";
    
    if ($conn->query($sql)) {
        echo "<p style='color:green;'>Student added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
?>

<?php include("footer.php"); ?>