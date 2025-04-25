<?php
// Include your database connection
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['ids'])) {
        // Get selected student IDs
        $ids = explode(',', $_POST['ids']);

        // Convert array to comma-separated values for SQL
        $idsString = implode(',', array_map('intval', $ids));

        // Prepare the delete query
        $query = "DELETE FROM students WHERE id IN ($idsString)";

        if (mysqli_query($conn, $query)) {
            // Redirect back with success message
            header("Location: students.php?message=Students deleted successfully");
            exit();
        } else {
            // Redirect back with error message
            header("Location: students.php?error=Error deleting students");
            exit();
        }
    } else {
        // Redirect if no IDs were selected
        header("Location: students.php?error=No students selected");
        exit();
    }
}
