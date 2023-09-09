<?php
include 'connection.php';
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $hire_date = $_POST["hire_date"]; // No need to sanitize a date
    $salary = $_POST["salary"];

    // Perform basic validation
    $errors = array();

    if (empty($first_name)) {
        $errors[] = "First Name is required.";
    }

    if (empty($last_name)) {
        $errors[] = "Last Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // If there are no errors, insert data into the database
        try {
            // Assuming you have a PDO database connection named $pdo

            // Prepare the SQL statement
            $sql = "INSERT INTO employees (first_name, last_name, email, hire_date,salary) VALUES (:first_name, :last_name, :email, :hire_date, :salary)";
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':hire_date', $hire_date);
            $stmt->bindParam(':salary', $salary);

            // Execute the statement
            $stmt->execute();

            // Display success message
            echo "Employee added successfully!";
        } catch (PDOException $e) {
            // Display error message if something goes wrong with the database operation
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    // If the form was not submitted, show an error message
    echo "Form submission error.";
}
?>
