<?php
// Include DB connection
include('../config/db.php');

// Replace this with actual student login ID if using login system
$student_id = 1; // Example: logged-in student ID

// Fetch issued books for this student
$query = "SELECT ib.issue_id, b.title, ib.issue_date, ib.due_date, ib.return_date, ib.status
          FROM issued_books ib
          JOIN books b ON ib.book_id = b.book_id
          WHERE ib.student_id = $student_id";

$result = $conn->query($query);
?>

<h2>My Issued Books</h2>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Issue Date</th>
        <th>Due Date</th>
        <th>Return Date</th>
        <th>Status</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= $row['issue_date'] ?></td>
            <td><?= $row['due_date'] ?></td>
            <td><?= $row['return_date'] ?? 'Not Returned' ?></td>
            <td><?= ucfirst($row['status']) ?></td>
        </tr>
    <?php } ?>
</table>