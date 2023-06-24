<!DOCTYPE html>
<html>
<head>
  <title>Login and Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 800px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
    }

    .login-form {
      flex: 1;
      margin-right: 20px;
    }

    h2 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 5px;
      font-size: 16px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .form-group select {
      width: 100%;
      padding: 5px;
      font-size: 16px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 3px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
    }

    .image-container {
      flex: 1;
    }

    .image-container img {
      max-width: 100%;
      height: auto;
    }
  </style>
  <script>
    function openRegistrationForm() {
      window.location.href = "registration5.php";
    }
  </script>
</head>
<body>
  <div class="container">
    <div class="image-container">
      <img src="xyz.jpeg" alt="Login Image">
    </div>
    <div class="login-form">
      <h2>Student Login</h2>
      <form method="POST" action="log_connect5.php">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="form-group">
          <label for="role">Role:</label>
          <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="student">Student</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit">Login</button>
        </div>
        <div class="form-group">
          <button type="button" onclick="openRegistrationForm()">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
