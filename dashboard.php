<?php
session_start();
include 'connectDB.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM donors WHERE ID = $user_id";
$result = $con->query($query);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($user['Name']); ?></h2>
        <table>
            <tr><td>Full Name:</td><td><?php echo htmlspecialchars($user['Name']); ?></td></tr>
            <tr><td>Date of Birth:</td><td><?php echo htmlspecialchars($user['DOB']); ?></td></tr>
            <tr><td>Gender:</td><td><?php echo htmlspecialchars($user['Gender']); ?></td></tr>
            <tr><td>Blood Group:</td><td><?php echo htmlspecialchars($user['BloodGroup']); ?></td></tr>
            <tr><td>Phone:</td><td><?php echo htmlspecialchars($user['Mobile']); ?></td></tr>
            <tr><td>Email:</td><td><?php echo htmlspecialchars($user['Email']); ?></td></tr>
            <tr><td>City:</td><td><?php echo htmlspecialchars($user['City']); ?></td></tr>
        </table>
        <a href="edit_profile.php">Edit Profile</a> <a href="logout.php">Logout</a>
    </div>
</body>
</html>
