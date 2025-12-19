<?php
session_start();
include("includes/conn.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === "" || $password === "") {
        $error = "Email and password are required";
    } else {

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id']   = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                header("Location:category.html");
                exit();

            } else {
                $error = "Incorrect password";
            }

        } else {
            $error = "User not found";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>

    <h1>Login</h1>
    
    <?php if ($error != "") { ?>
    <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>

    <div>
        <form method="POST" action="Login.php">

            <label>Email:</label>
            <input type="email" name="email">

            <label>Password:</label>
            <input type="password" name="password">

            <button type="submit">Login</button>

        </form>


        </form>
    </div>
</body>
</html>


