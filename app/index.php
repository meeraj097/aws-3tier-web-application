<?php
$host = "enterprise-mysql-db.cvimmyc4ym5w.us-west-1.rds.amazonaws.com";
$user = "<DB-USERNAME>";
$password = "<DB-Password>";
$database = "employee_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Database</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            margin: 40px;
        }

        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            background: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }
    </style>
</head>

<body>

<h1>Employees from Amazon RDS</h1>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Department</th>
<th>Salary</th>
</tr>

<?php
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['department']."</td>";
    echo "<td>".$row['salary']."</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>
