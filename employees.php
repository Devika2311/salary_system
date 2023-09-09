<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Add New Employee</h2>
    <form action="process.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="hire_date">Hire Date:</label>
        <input type="date" id="hire_date" name="hire_date" required><br>

        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" required><br>

        <input type="submit" value="Add Employee">
    </form>
</body>
</html>
