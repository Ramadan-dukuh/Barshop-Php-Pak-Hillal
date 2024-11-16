<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['level'] == "admin") {
        header("location:AdminDashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Barshop</title>
    <style>
         :root {
            --primary-color: #4a98f7;
            --primary-dark: #3a7dd4;
            --secondary-color: #ffffff;
            --background-color: #f3f4f6;
            --text-color: #333333;
            --border-color: #e1e5eb;
         }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f4f6f9;
        }
        .login-container {
            width: 100%;
            max-width: 350px;
            padding: 2rem;
            background-color: transparent;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);            
            border-radius: 8px;
            text-align: center;
        }
        .login-container h3 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: #333;
        }
        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transition: all 0.2s ease-in-out;
            font-weight: 700;
            text-shadow: 0 0 8px var(--secondary-color);
        }       
    </style>
</head>
<body>
    <div class="login-container">
        <h3>Welcome Back</h3>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="text" name="Username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="Password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn-primary" name="Submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
