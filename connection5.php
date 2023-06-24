<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requiredFields = ['email', 'password', 'Name', 'rollNo', 'role'];
    $errors = [];

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "Please fill in the '{$field}' field.";
        }
    }
    if (empty($errors)) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Name = $_POST['Name'];
        $rollNo = $_POST['rollNo'];
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $role = $_POST['role']; // Retrieve the role value from the form

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'website');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO registration(email, password, Name, rollNo, year, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $email, $password, $Name, $rollNo, $year, $role);
        $execval = $stmt->execute();

        if ($execval === false) {
            echo "Error: " . $stmt->error;
        } else {
            header('location: studentdashboard.php');
            exit();
        }

        $stmt->close();
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>