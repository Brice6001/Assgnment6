
<?php
include 'db.php';

// Protect this page
if (!isset($_SESSION['my_session'])) {
    header('Location: login.php');
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = mysqli_query($conn, "SELECT * FROM customers WHERE id=$id");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    mysqli_query($conn, "UPDATE customers SET 
        name='$name', email='$email', phone='$phone', address='$address' 
        WHERE id=$id");

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Customer</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">

<h2>Edit Customer</h2>

<form method="post">
Name: <input type="text" name="name" value="<?php echo $data['name']; ?>" required><br><br>
Email: <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br><br>
Phone: <input type="text" name="phone" value="<?php echo $data['phone']; ?>" required><br><br>
Address: <textarea name="address"><?php echo $data['address']; ?></textarea><br><br>

<button type="submit" name="update">Update</button>
</form>
</div>
</body>
</html>
<p>Logged in as: <strong><?php echo $_SESSION['my_session']; ?></strong></p>

