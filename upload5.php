<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to store project details in the database
function storeProjectDetails($name, $rollno, $email, $dept, $year, $technology, $projectTitle, $googleDriveLink) {
    global $conn;

    try {
        // Check if the project already exists
        $checkQuery = "SELECT * FROM project WHERE name = :name AND rollno = :rollno AND projectTitle = :projectTitle";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bindValue(':name', $name);
        $checkStmt->bindValue(':rollno', $rollno);
        $checkStmt->bindValue(':projectTitle', $projectTitle);
        $checkStmt->execute();
        $existingProject = $checkStmt->fetch();

        if ($existingProject) {
            throw new Exception("This project has already been uploaded.");
        }

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO project (name, rollno, email, dept, year, technology, projectTitle, googleDriveLink, uploaded_Date) VALUES (:name, :rollno, :email, :dept, :year, :technology, :projectTitle, :googleDriveLink, :uploaded_Date)");

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':rollno', $rollno);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dept', $dept);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':technology', $technology);
        $stmt->bindParam(':projectTitle', $projectTitle);
        $stmt->bindParam(':googleDriveLink', $googleDriveLink);
        $stmt->bindValue(':uploaded_Date', date("Y-m-d H:i:s"));

        // Validate the googleDriveLink field
        if (empty($googleDriveLink)) {
            throw new Exception("Google Drive Link is required");
        } else {
            // Execute the statement
            $stmt->execute();

            // Optionally, you can return a success message or redirect the user to another page
            echo "Project details stored successfully!";
        }
    } catch(PDOException $e) {
        // Handle any errors that occur during the database operation
        echo "Error: " . $e->getMessage();
    } catch(Exception $e) {
        // Handle validation errors or duplicate uploads
        echo "Error: " . $e->getMessage();
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the project details from the form
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $rollno = isset($_POST['rollno']) ? $_POST['rollno'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $dept = isset($_POST['dept']) ? $_POST['dept'] : "";
    $year = isset($_POST['year']) ? $_POST['year'] : "";
    $technology = isset($_POST['technology']) ? $_POST['technology'] : "";
    $projectTitle = isset($_POST['projectTitle']) ? $_POST['projectTitle'] : "";
    $googleDriveLink = isset($_POST['googleDriveLink']) ? $_POST['googleDriveLink'] : "";

    // Call the function to store the project details in the database
    storeProjectDetails($name, $rollno, $email, $dept, $year, $technology, $projectTitle, $googleDriveLink);
}
?>