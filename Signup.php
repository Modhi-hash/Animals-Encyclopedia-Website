<?php
include("includes/conn.php");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === "" || $email === "" || $password === "") {
        $error = "All fields are required";
    } else {

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password)
                VALUES ('$name', '$email', '$hashed')";

        if (mysqli_query($conn, $sql)) {

            header("Location: Login.php?signup=success");
            exit();

        } else {
            $error = "Database error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>

    <h1>Sign Up</h1>
    
    <?php if ($error != "") { ?>
    <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>


    <div>
        <form name="signupForm" method="POST" action="Signup.php"
          onsubmit="return validateSignup();">

            <label>User Name:</label>
            <input type="text" name="name">

            <label>Email:</label>
            <input type="email" name="email">

            <label>Password:</label>
            <input type="password" name="password">

            <button type="submit">Create Account</button>
        </form>


    </div>

</body>
</html>

