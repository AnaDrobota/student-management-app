<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management App</title>

    <style>
        * { box-sizing: border-box; }
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* Using the same background image file */
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)),
                        url('bg_universitate.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        body { display: flex; flex-direction: column; }
        header {
            background-color: #004080;
            color: white;
            padding: 20px;
            text-align: center;
        }
        main {
            flex: 1;
            padding: 20px;
            max-width: 960px;
            margin: auto;
            background-color: rgba(255, 255, 255, 1);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        ul { list-style: none; padding-left: 0; }
        li { margin-bottom: 8px; }
        a { text-decoration: none; color: #004080; }
        a:hover { text-decoration: underline; color: #002050; }
    </style>
</head>
<body>
    <header>
        <?php
        // Connect to the new database 'students_db'
        $conn = new mysqli("localhost", "lab_user", "student", "students_db");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>

        <h1>
            <a href="index.php" style="color: white; text-decoration: none;">
                Student Management
            </a>
        </h1>
    </header>

    <main>