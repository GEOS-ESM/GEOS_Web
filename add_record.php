<!DOCTYPE html>
<html>
<head>
    <title>Add Experiment</title>
    <style>
      label {
        display: inline-block;
        width: 120px; /* Adjust this value as needed */
        text-align: right;
        margin-right: 10px;
      }
    </style>
    <script>
        function setCurrentDate() {
            var today = new Date();
            var year = today.getFullYear();
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var day = String(today.getDate()).padStart(2, '0');
            var formattedDate = year + '-' + month + '-' + day;
            document.getElementById('date').value = formattedDate;
        }
    </script>
</head>
<body onload="setCurrentDate()">
    <h2>Add Experiment</h2>
    <form method="post" action="insert_record.php">
      <label for="exp_id">Exp ID:</label>
      <input type="text" id="exp_id" name="exp_id"><br>
      <label for="user_id">User ID:</label>
      <input type="text" id="user_id" name="user_id"><br>
      <label for="resolution">Resolution:</label>
      <input type="text" id="resolution" name="resolution"><br>
      <label for="date">Date:</label>
      <input type="date" id="date" name="date"><br>
      <label for="cmp_id">Exp ID:</label>
      <input type="text" id="cmp_id" name="cmp_id"><br>
      <label for="description">Description:</label>
      <input type="text" id="description" name="description"><br>
      <input type="submit" value="Submit">
    </form>
</body>
</html>
