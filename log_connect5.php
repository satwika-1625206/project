<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'website');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM registration WHERE email = ? AND password = ? AND role = ?");
    $stmt->bind_param("sss", $email, $password, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows >= 1) {
        // Correct login credentials, determine the role and redirect accordingly
        $row = $result->fetch_assoc();
        $userRole = $row['role'];

        if ($userRole == 'Admin') {
            // Redirect to the admin page
            header("Location: admindashboard.php");
        } elseif ($userRole == 'Student') {
            // Store the email in a session variable
            $_SESSION['email'] = $email;
            
            // Redirect to the student dashboard
            header("Location: studentdashboard.php");
        } else {
            // Invalid role, redirect to the login page
            header("Location: login5.php");
        }
        exit;
    } else {
        // Invalid login credentials, redirect to the login page
        header("Location: login5.php");
    }

    $stmt->close();
    $conn->close();
}
?>