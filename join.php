<?php
include 'connection.php';
$sql = "SELECT e.first_name, e.last_name, s.salary
        FROM employees e
        JOIN salaries s ON e.id = s.employee_id
        WHERE s.salary = (
            SELECT MAX(salary) FROM salaries
        )";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    echo "Highest Salaried Employee: " . $result['first_name'] . " " . $result['last_name'] . " - $" . $result['salary'];
} else {
    echo "No data found";
}
?>
