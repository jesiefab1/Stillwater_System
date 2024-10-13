<<?php 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Logout System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .login-container, .logout-container {
            display: none;
            margin-top: 50px;
            text-align: center;
        }
        .active {
            display: block;
        }
    </style>
</head>
<body>

    <div class="login-container active" id="loginContainer">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" placeholder="Enter your username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" placeholder="Enter your password"><br><br>
        <button onclick="login()">Login</button>
    </div>

    <div class="logout-container" id="logoutContainer">
        <h2>Welcome, <span id="userDisplay"></span>!</h2>
        <button onclick="logout()">Logout</button>
    </div>

    <script>
        function login() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            if (username === "admin" && password === "password") {
                document.getElementById("loginContainer").classList.remove("active");
                document.getElementById("logoutContainer").classList.add("active");
                document.getElementById("userDisplay").innerText = username;
            } else {
                alert("Invalid login credentials!");
            }
        }

        function logout() {
            document.getElementById("loginContainer").classList.add("active");
            document.getElementById("logoutContainer").classList.remove("active");
            document.getElementById("username").value = '';
            document.getElementById("password").value = '';
        }
    </script>

</body>
</html>

 ?>