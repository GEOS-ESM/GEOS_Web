<?php

// Connect to the SQLite3 database
$db = new SQLite3('../modeling/experiments.db');

// Get the form data
$exp_id = isset($_POST['exp_id']) ? $db->escapeString($_POST['exp_id']) : '';
$user_id = isset($_POST['user_id']) ? $db->escapeString($_POST['user_id']) : '';
$resolution = isset($_POST['resolution']) ? $db->escapeString($_POST['resolution']) : '';
$date = isset($_POST['date']) ? $db->escapeString($_POST['date']) : '';
$cmp_id = isset($_POST['cmp_id']) ? $db->escapeString($_POST['cmp_id']) : '';
$description = isset($_POST['description']) ? $db->escapeString($_POST['description']) : '';

// Prepare the SQL INSERT statement
$sql = "INSERT INTO experiments (ExpID, UserID, Resolution, Date, CmpID, Description) VALUES ('$exp_id', '$user_id', '$resolution', '$date', '$cmp_id', '$description')";

// Execute the SQL statement
$result = $db->exec($sql);
if (!$result) {
    $error = $db->lastErrorMsg();
    echo "Error executing SQL query: $error";
    exit();
}

// Close the database connection
$db->close();

// Redirect back to the main page (index.php)
header("Location: index.php");
exit();

?>