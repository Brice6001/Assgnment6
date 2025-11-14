<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>/* Page setup */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container */
.account-container {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Heading */
.account-container h2 {
    margin-bottom: 20px;
    color: #333;
}

/* Form layout */
.account-container form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Labels */
.account-container label {
    text-align: left;
    font-weight: bold;
    font-size: 14px;
    color: #333;
}

/* Input fields */
.account-container input[type="email"],
.account-container input[type="password"] {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

.account-container input[type="email"]:focus,
.account-container input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}

/* Submit button */
.account-container input[type="submit"] {
    padding: 10px;
    font-size: 16px;
    background-color: #28a745; /* green for create */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.account-container input[type="submit"]:hover {
    background-color: #218838;
}

/* Links */
.account-container p {
    margin-top: 15px;
    font-size: 14px;
}

.account-container a {
    color: #007bff;
    text-decoration: none;
}

.account-container a:hover {
    text-decoration: underline;
}

/* Success & error messages */
.success-message {
    color: green;
    margin-bottom: 15px;
    font-weight: bold;
}

.error-message {
    color: red;
    margin-bottom: 15px;
    font-weight: bold;
}
</style>
</head>
<body>

<?php
include 'db.php';
// $conn = mysqli_connect('localhost','root','','customer_db');

if(isset($_POST['create'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];
    if($password === $conf_password){


    $create = mysqli_query($conn,"INSERT INTO users VALUES('$email','$password')");
    if($create){
        echo "<p style='color:green'>User Created!</p>";
    }
    
}else{
    echo "<p style='color:red'>Password not match!</p>";

}
}


?>
<div class="account-container">

    <h2>CREATE ACCOUNT HERE</h2>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email"><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password"><br>
        
        <label for="conf_password">Confirm Password:</label>
        <input type="password" name="conf_password"><br>

        <input type="submit" name="create" value="CREATE ACCOUNT">
        
    </form>
    <p>Already have account ? <a href="login.php">Login</a></p>
</div>
</body>
</html>