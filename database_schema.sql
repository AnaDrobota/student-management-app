-- Create database
CREATE DATABASE IF NOT EXISTS students_db;
USE students_db;

-- Drop tables if they exist (clean slate)
DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS student_groups;

-- Create table: student_groups
-- Note: 'group' is a reserved keyword in SQL, so we use 'student_groups'
CREATE TABLE student_groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_name VARCHAR(10) UNIQUE
);

-- Insert groups
INSERT INTO student_groups (group_name) VALUES
('123A'), ('124B'), ('125C'), ('126D'), ('127E'), ('128F');

-- Create table: students
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(50),      -- Nume
    first_name VARCHAR(50),     -- Prenume
    group_id INT,
    enrollment_nr VARCHAR(20),  -- Nr Matricol
    phone VARCHAR(20),
    email VARCHAR(100),
    study_year INT,
    FOREIGN KEY (group_id) REFERENCES student_groups(id)
);

-- Populate students table
-- Group 123A (id = 1)
INSERT INTO students (last_name, first_name, group_id, enrollment_nr, phone, email, study_year) VALUES
('Popescu', 'Andrei', 1, '123A001', '0711000001', 'andrei.popescu@example.com', 2),
('Ionescu', 'Maria', 1, '123A002', '0711000002', 'maria.ionescu@example.com', 2),
('Georgescu', 'Paul', 1, '123A003', '0711000003', 'paul.georgescu@example.com', 2);

-- Group 124B (id = 2)
INSERT INTO students (last_name, first_name, group_id, enrollment_nr, phone, email, study_year) VALUES
('Enache', 'Vlad', 2, '124B001', '0711000011', 'vlad.enache@example.com', 2),
('Marin', 'Oana', 2, '124B002', '0711000012', 'oana.marin@example.com', 2);

-- Create user if not exists
CREATE USER IF NOT EXISTS 'lab_user'@'localhost' IDENTIFIED BY 'student';
GRANT ALL PRIVILEGES ON students_db.* TO 'lab_user'@'localhost';
FLUSH PRIVILEGES;