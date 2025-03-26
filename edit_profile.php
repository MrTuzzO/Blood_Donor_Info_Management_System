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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $bloodgroup = $_POST['bloodgroup'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    $update_query = "UPDATE donors SET Name = '$fullname', DOB = '$dob', Gender = '$gender', BloodGroup = '$bloodgroup', Mobile = '$phone', Email = '$email', City = '$city' WHERE ID = $user_id";
    $con->query($update_query);
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        #save_change_btn{
            display: inline;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Profile</h2>
        <form action="edit_profile.php" method="post">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['Name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($user['DOB']); ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="Male" <?php if ($user['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($user['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if ($user['Gender'] == 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bloodgroup">Blood Group</label>
                <select id="bloodgroup" name="bloodgroup" required>
                    <option value="A+" <?php if ($user['BloodGroup'] == 'A+') echo 'selected'; ?>>A+</option>
                    <option value="A-" <?php if ($user['BloodGroup'] == 'A-') echo 'selected'; ?>>A-</option>
                    <option value="B+" <?php if ($user['BloodGroup'] == 'B+') echo 'selected'; ?>>B+</option>
                    <option value="B-" <?php if ($user['BloodGroup'] == 'B-') echo 'selected'; ?>>B-</option>
                    <option value="O+" <?php if ($user['BloodGroup'] == 'O+') echo 'selected'; ?>>O+</option>
                    <option value="O-" <?php if ($user['BloodGroup'] == 'O-') echo 'selected'; ?>>O-</option>
                    <option value="AB+" <?php if ($user['BloodGroup'] == 'AB+') echo 'selected'; ?>>AB+</option>
                    <option value="AB-" <?php if ($user['BloodGroup'] == 'AB-') echo 'selected'; ?>>AB-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['Mobile']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($user['City']); ?>" required>
            </div>
            <a href="dashboard.php" class="cancel-btn">Cancel</a>
            <button type="submit" id="save_change_btn">Save Changes</button>            
        </form>
    </div>
</body>
</html>
