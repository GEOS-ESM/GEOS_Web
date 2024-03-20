<!DOCTYPE html>

<?php
// Connect to the SQLite3 database
$db = new SQLite3('../experiments.db');

// Get the filtering criteria from the GET parameters
$filterUserId = isset($_GET['UserID']) ? $_GET['UserID'] : null;
$filterResolution = isset($_GET['Resolution']) ? $_GET['Resolution'] : null;

// Build the SQL query with the filtering criteria
$query = 'SELECT * FROM experiments';

$whereClause = '';

if ($filterUserId !== null) {
    $whereClause .= ' UserID = \'' . $db->escapeString($filterUserId) . '\'';
}

if ($filterResolution !== null) {
    if ($whereClause !== '') {
        $whereClause .= ' AND';
    }
    $whereClause .= ' Resolution = \'' . $db->escapeString($filterResolution) . '\'';
}

if ($whereClause !== '') {
    $query .= ' WHERE' . $whereClause;
}

// Query the database table
$result = $db->query($query);

// Get the column names from the result set
$columnNames = array();
for ($i = 0; $i < $result->numColumns(); $i++) {
    $columnNames[] = $result->columnName($i);
}

// Start building the HTML table
$html = '<table>';

// Add table header
$html .= '<tr>';
foreach ($columnNames as $column) {
    $html .= '<th>' . $column . '</th>';
}
$html .= '</tr>';

// Add table rows
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $html .= '<tr>';
    foreach ($row as $key => $value) {
        if($key === "ExpID" || $key === "CmpID"){
          $truncatedValue = strlen($value) > 30 ? substr($value, 0, 30) . '...' : $value;
          $html .= '<td><a href="expfront.php?expid=' . $value . '">' . $truncatedValue . '</a></td>';
        } elseif ($key === "UserID" || $key === "Resolution") {
          $html .= '<td><a href="index.php?' . $key . '=' . $value . '">' . $value . '</a></td>';
        } else {
          $html .= '<td>' . $value . '</td>';
        }
    }
    $html .= '</tr>';
}

$html .= '</table>';

// Close the database connection
$db->close();
?>

<html>
<head>
    <title>Experiments</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 5px;
            border-bottom: 1px solid #ddd;
	    border-left: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
  <h1>GMAO GEOS Model Development</h1>
  <a href="index.php">Clear filtering</a>
  <?php echo $html; ?>
</body>
</html>
