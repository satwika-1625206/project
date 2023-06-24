<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            width: 30%;
        }
    </style>
</head>
<body>
    <?php
    // Start the session
    session_start();

    // Check if the user is logged in (email stored in session)
    if (!isset($_SESSION['email'])) {
        // Redirect to the login page
        header("Location: loginform.php");
        exit;
    }

    // Retrieve the email from the session
    $email = $_SESSION['email'];

    // Function to fetch project details for a specific student
    function fetchStudentProjectDetails($email) {
        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "website";

        // Create a new PDO instance
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the SQL statement to fetch project details for the student
            $stmt = $conn->prepare("SELECT * FROM project WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Fetch all the project details for the student
            $studentProjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Close the database connection
            $conn = null;

            return $studentProjects;
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Fetch project details for the logged-in student
    $studentProjects = fetchStudentProjectDetails($email);
    ?>

    <div class="container">
        <h1>My Profile</h1>
        <h2>Email: <?php echo $email; ?></h2>

        <h3>My Projects:</h3>
        <?php if ($studentProjects && count($studentProjects) > 0) { ?>
            <table>
                <tr>
                    <th>Name</th>
                    <td><?php echo $studentProjects[0]['name']; ?></td>
                </tr>
                <tr>
                    <th>Roll No</th>
                    <td><?php echo $studentProjects[0]['rollno']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $studentProjects[0]['email']; ?></td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td><?php echo $studentProjects[0]['dept']; ?></td>
                </tr>
                <tr>
                    <th>Year</th>
                    <td><?php echo $studentProjects[0]['year']; ?></td>
                </tr>
                <?php for ($i = 0; $i < count($studentProjects); $i++) { ?>
                    <?php if ($i === 0) { ?>
                        <tr>
                            <th>Technology</th>
                            <td><?php echo $studentProjects[0]['technology']; ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th>Project Title</th>
                        <td><?php echo $studentProjects[$i]['projectTitle']; ?></td>
                    </tr>
                    <tr>
                        <th>Google Drive Link</th>
                        <td><?php echo $studentProjects[$i]['googleDriveLink']; ?></td>
                    </tr>
                    <tr>
                        <th>Uploaded Date</th>
                        <td><?php echo $studentProjects[$i]['uploaded_Date']; ?></td>
                    </tr>
                    <?php if ($i > 0) { ?>
                        <tr>
                            <th>Technology</th>
                            <td><?php echo $studentProjects[$i]['technology']; ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2">
                        <a href="editproject.php?id=<?php echo $studentProjects[$i]['id']; ?>">Edit</a>

                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No projects found.</p>
        <?php } ?>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>