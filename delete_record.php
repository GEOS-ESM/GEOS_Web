<?php
// Connect to the SQLite3 database
$db = new SQLite3('../modeling/experiments.db');

// Get the ExpID value from the AJAX request
$expId = $_POST['expid'];

// Prepare the SQL DELETE statement
$sql = "DELETE FROM experiments WHERE ExpID = '$expId'";

// Execute the SQL statement
$result = $db->exec($sql);
if (!$result) {
    $error = $db->lastErrorMsg();
    echo "Error executing SQL query: $error";
    exit();
}
// Close the database connection
$db->close();
?>