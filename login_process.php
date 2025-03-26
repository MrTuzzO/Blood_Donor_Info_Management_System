<?php
session_start();
include 'connectDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $con->real_escape_string($_POST['username_or_email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM donors WHERE Username = '$username_or_email' OR Email = '$username_or_email'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password === $user['Password']) {
            $_SESSION['user_id'] = $user['ID'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>
                alert('Invalid username/email or password.');
                window.history.back();
              </script>";
        }
    } else {
        echo "<script>
                alert('Invalid username/email or password.');
                window.history.back();
              </script>";
    }
}
?>
