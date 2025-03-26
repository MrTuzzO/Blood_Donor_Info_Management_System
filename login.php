<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        p{
            text-align: right;
            margin: 20px 0;
        }
        a{
            padding: 0;
            background-color: transparent;
            color: blue;
            margin: 0;
        }
        a:hover{
            background-color: transparent;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username_or_email">Username or Email</label>
                <input type="text" id="username_or_email" name="username_or_email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <p>Not registered? <a href="add-member.html">Be a donor</a> </p>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
