<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit();
}

$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=SPD_Database', 'root', '');

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($_POST['password'], $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username']; // Store the username in the session
        header('Location: home.php');
        exit();
    }
     else {
        $message = 'Incorrect username or password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Record Management System</title>
    <link rel="stylesheet" type="text/css" href="customize.css">
</head>
<body>
<header>
    <a href="home.php"><img src="logo.png" alt="Logo"></a>
    <h1>Record Management System</h1>
</header>

<nav>
    <ul>
        <li><a href="login.php">Login</a></li>
    </ul>
</nav>

<main>
    <h2>Welcome to SPD Records System!</h2>
    <p>This is a system for managing police records, allowing officers to easily record and search for information related to incidents, cases, and suspects.</p>
    <p>To get started, please use the navigation menu above.</p>
</main>

<div id="box">
    <form method="post">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input id="username" type="text" name="username"><br><br>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password"><br><br>

        <?php if (!empty($message)): ?>
            <p class="error-message"><?= $message; ?></p>
        <?php endif; ?>

        <input id="button" type="submit" value="Login"><br><br>

        <a href="signup.php">Click to Signup</a><br><br>
    </form>
</div>

<footer>
    <p>&copy; 2023 Salem Police Department</p>
</footer>
</body>
</html>
