<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Form Example</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f1f1f1;
    }
    
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      width: 100%;
    }
    
    .box {
      width: 400px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    
    form {
      padding: 20px;
    }
    
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    
    label {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      font-weight: bold;
    }
    
    label span {
      flex-shrink: 0;
      width: 120px;
      padding-right: 10px;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="url"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    select {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      display: block;
      width: 100%;
      margin-top: 20px;
      padding: 10px;
      font-size: 16px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="box">
      <form action="upload5.php" method="POST" enctype="multipart/form-data">
        <h1>Student Project Details</h1>

        <label for="name">
          <span>Name:</span>
          <input type="text" id="name" name="name" required>
        </label><br><br>

        <label for="rollno">
          <span>Roll Number:</span>
          <input type="text" id="rollno" name="rollno" required>
        </label><br><br>

        <label for="email">
          <span>Email:</span>
          <input type="email" id="email" name="email" required>
        </label><br><br>

        <label for="dept">
          <span>Department:</span>
          <input type="text" id="dept" name="dept" required>
        </label><br><br>

        <label for="year">
          <span>Year:</span>
          <input type="text" id="year" name="year" required>
        </label><br><br>
        
        <label for="technology">
          <span>Technology:</span>
          <select id="technology" name="technology" required>
            <option value="" selected disabled>Select a technology</option>
            <option value="Java">Java</option>
            <option value="Python">Python</option>
            <option value="JavaScript">JavaScript</option>
            <option value="C++">C++</option>
            <option value="C#">C#</option>
            <!-- Add more programming languages as options -->
          </select>
        </label><br><br>

        <label for="projectTitle">
          <span>Project Title:</span>
          <input type="text" id="projectTitle" name="projectTitle" required>
        </label><br><br>

        <label for="googleDriveLink">
          <span>Google Drive Link:</span>
          <input type="url" id="googleDriveLink" name="googleDriveLink" required>
        </label><br><br>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</body>
</html>