<?php
include('config.php');
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, role FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid login credentials.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            background-image: url('assets/img/bg.png'); /* Ganti dengan nama file gambar Anda */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #663a72;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;

        }
        .textbox {
            margin-bottom: 15px;
            text-align: left;
        }
        .textbox label {
            display: block;
            margin-bottom: 5px;
        }

        .textbox input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        .buttons button {
            padding: 10px 20px;
            border: none;
            background-color: #c871c1;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            width: 48%;
        }

        .buttons button:hover {
            background-color: #ff1493;
        }
    </style>
</head>
<body>
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="">
                <div class="textbox">
                    <label for="username">User Name:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="textbox">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="buttons">
                    <button type="submit">OK</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        </div>
    </div>
</body>
</html>
