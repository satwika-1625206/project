<?php
// Check if the form is submitted and the project ID is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $projectId = $_POST['id'];
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $technology = $_POST['technology'];
    $projectTitle = $_POST['projectTitle'];
    $googleDriveLink = $_POST['googleDriveLink'];

    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "website";

    // Create a new PDO instance
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement to update the project details
        $stmt = $conn->prepare("UPDATE project SET name = :name, rollno = :rollno, technology = :technology, projectTitle = :projectTitle, googleDriveLink = :googleDriveLink WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':rollno', $rollno);
        $stmt->bindParam(':technology', $technology);
        $stmt->bindParam(':projectTitle', $projectTitle);
        $stmt->bindParam(':googleDriveLink', $googleDriveLink);
        $stmt->bindParam(':id', $projectId);
        $stmt->execute();

        // Close the database connection
        $conn = null;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Redirect to the profile page after updating the project
header("Location: myprofile.php");
exit;
?>