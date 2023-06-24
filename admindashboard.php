<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboard5.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <style>
    
    .dropdown {
      display: none;
    }

    .more:hover .dropdown {
      display: block;
    }

    
  </style>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li>
          <a href="#" class="logo">
            <span class="nav-item">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#" id="event-button" class="admin-only">
            <i class="fas fa-calendar-alt"></i>
            <span class="nav-item">Events</span>
          </a>
        </li>
        <li>
          <a href="project.php">
            <i class="fas fa-tasks"></i>
            <span class="nav-item">Projects</span>
          </a>
        </li>
        <li>
          <a href="htmlform.php" target="_blank">
            <i class="fas fa-cloud-upload-alt"></i>
            <span class="nav-item">Upload</span>
          </a>
        </li>
        <li class="more">
          <a href="#">
            <i class="fas fa-ellipsis-h"></i>
            <span class="nav-item">More</span>
          </a>
          <ul class="dropdown">
            <li>
              <a href="#">
                <i class="fas fa-user"></i>
                <span class="nav-item">My Profile</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fas fa-bell"></i>
                <span class="nav-item">Notification</span>
              </a>
            </li>
            <li>
              <a href="#" class="logout" id="logout-link">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Logout</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="image-container">
      <img src="abc.jpeg"  class="image2" />
  </div>
  </div>
  
  <script>
    // Check if the user is an admin or not (replace with your authentication logic)
    var user = {
      email: "21wh1a12b8@bvrit.com" // Replace with the email of the authorized user
    };

    // Disable event button for non-admin users and open Google Doc in appropriate mode
    var eventButton = document.getElementById('event-button');
    if (!isAdminUser(user.email)) {
      eventButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        window.open("https://docs.google.com/document/d/1hKWCPP1ZNdoWWYwFBJmA10rUgqNsHJzyFT3sgrYYhjU/view", "_blank");
      });
    } else {
      eventButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        window.open("https://docs.google.com/document/d/1hKWCPP1ZNdoWWYwFBJmA10rUgqNsHJzyFT3sgrYYhjU/edit", "_blank");
      });
    }

    // Toggle the dropdown menu on clicking the More button
    var moreButton = document.querySelector('.more');
    moreButton.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      this.querySelector('.dropdown').classList.toggle('active');
    });

    // Get the logout link element
    var logoutLink = document.getElementById('logout-link');

    // Add a click event listener to the logout link
    logoutLink.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      // Perform logout logic here
      window.location.href = "login5.php"; // Redirect to the logout page
    });

    // Function to check if the user is an admin
    function isAdminUser(email) {
      // Replace with your authentication logic to determine if the user is an admin
      return email === "example@gmail.com";
    }
  </script>
</body>
</html>