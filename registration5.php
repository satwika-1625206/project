<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
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

    .registration-form {
      flex: 1;
      margin-left: 20px;
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
    .form-group input[type="email"],
    .form-group input[type="number"] {
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
</head>
<body>
  <div class="container">
    <div class="image-container">
      <img src="abc.jpg" alt="Registration Image">
    </div>
    <div class="registration-form">
      <h2>Registration Form</h2>
      <form action="connection5.php" method="post">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="text" id="password" name="password" placeholder="Set your password" required>
        </div>
        <div class="form-group">
          <label for="Name">Name:</label>
          <input type="text" id="Name" name="Name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="rollNo">Roll Number:</label>
          <input type="text" id="rollNo" name="rollNo" placeholder="Enter your roll number" required>
        </div>
        <div class="form-group">
          <label for="year">Year of Study:</label>
          <select id="year" name="year" required>
            <option value="">Select year</option>
            <option value="1">1st Year</option>
            <option value="2">2nd Year</option>
            <option value="3">3rd Year</option>
            <option value="4">4th Year</option>
          </select>
        </div>
        <div class="form-group">
          <label for="role">Role:</label>
          <select id="role" name="role" required>
            <option value="">Select role</option>
            <option value="Student">Student</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
