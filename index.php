<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer List</title>
</head>
<body style="font-family:Arial; background:#f2f2f2; padding:20px;">
    
<h2 style="text-align:center;">Customer List</h2>
<div style="text-align:center; margin-bottom:15px;">
<a href="add.php"
style="text-decoration:none; background:#28a745; padding:10px 15px; color:white; border-radius:5px;">Add New Customer</a>
</div>

<tr style="background:#333; color:white;">
<!-- <a href="add.php">Add Customer</a><br><br> -->

<table border="1" cellpadding="8" table border="1" cellpadding="8" cellspacing="0" style="width:100%; background:white; border-collapse:collapse;">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Actions</th>
</tr>

<?php
$sql = "SELECT * FROM customers";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['name']."</td>
        <td>".$row['email']."</td>
        <td>".$row['phone']."</td>
        <td>".$row['address']."</td>
        <td>
            <a href='edit.php?id=".$row['id']."'>Edit</a> |
            <a href='delete.php?id=".$row['id']."'>Delete</a>
        </td>
    </tr>";
}
?>
</table>

<p style="text-align:center;">Logged in as: <strong><?php echo $_SESSION['my_session']; ?></strong></p>

<div style="text-align:center; margin-bottom:15px;">
<a href="logout.php" style="background:#28a745; padding:10px 14px; border-radius:5px; color:white; text-decoration:none;">Logout</a>


</body>
</html>
