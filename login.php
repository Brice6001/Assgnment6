<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /* General body styling */
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

/* Container for the login form */
.login-container {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Heading */
.login-container h2 {
    margin-bottom: 20px;
    color: #333;
}

/* Form labels */
.login-container label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
    font-weight: bold;
}

/* Input fields */
.login-container input[type="email"],
.login-container input[type="password"] {
    width: 100%;
    padding: 10px;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Submit button */
.login-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-container input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Link to account creation */
.login-container p {
    margin-top: 15px;
    font-size: 14px;
}

.login-container a {
    color: #007bff;
    text-decoration: none;
}

.login-container a:hover {
    text-decoration: underline;
}

/* Error message */
.error-message {
    color: red;
    text-align: center;
    margin-bottom: 15px;
}
</style>
</head>

<body>

<?php
include 'db.php';

//$conn = mysqli_connect('localhost','root','','customer_db');
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
   header('location: add.php');


    $select = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' && password = '$password'");
$num = mysqli_num_rows($select);

    if($num > 0){
        session_start();
        $_SESSION['my_session'] = $_POST['email'];
        
        header('location: add.php');
    }else{
        echo "<p style='color:red; text-align:center;'>Invalid Credentials!</p>";
    }
    

}


?><div class="login-container" style="text-align:center; margin:auto;  background:white; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,.1); font-family: Arial;">
    <h2 style="text-align:center;">Login Here</h2>
    <form action="add.php" method="POST">
        <label for="email" placeholder="email" style="width:100%; padding:8px; margin-bottom:10px;">Email:</label>
        <input type="email" name="email"><br><br>
        
        <label for="password" style="width:100%; padding:8px; margin-bottom:10px;">Password:</label>
        <input type="password" name="password"><br><br>
        

        <input type="submit" name="login" value="Login" style="width:100%; padding:8px; background:#007bff; color:white; border:none;">
        
    </form>
    <p>Don't have an account? <a href="account.php">Create Account</a></p>
</div>
</body>
</html>