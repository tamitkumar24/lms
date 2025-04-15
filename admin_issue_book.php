<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "library");

// Fetch books and students
$books = $conn->query("SELECT * FROM books WHERE available_copies > 0");
$students = $conn->query("SELECT * FROM students");
?>

<form method="POST" action="issue_book_process.php">
    <label>Select Student:</label>
    <select name="student_id">
        <?php while ($student = $students->fetch_assoc()) { ?>
            <option value="<?= $student['Roll No'] ?>"><?= $student['Username'] ?></option>
        <?php } ?>
    </select><br>

    <label>Select Book:</label>
    <select name="book_id">
SS