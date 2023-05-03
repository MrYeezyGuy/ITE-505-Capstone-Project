<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit();
}

$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=SPD_Database', 'root', '');

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = 'Successfully created new user';
    } else {
        $message = 'Sorry, there must have been an issue creating your account';
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
        <li><a href="home.php">Home</a></li>
        <li><a href="learningmode.php">Learning Mode</a></li>
        <li id="settings-tab"><a href="Settings.php">Settings</a></li>
    </ul>
</nav>

<main>
    <h2>Welcome to SPD Records System!</h2>
    <p>This is a system for managing police records, allowing officers to easily record and search for information related to incidents, cases, and suspects.</p>
    <p>To get started, please use the navigation menu above.</p>
</main>

<div id="box">
    <form method="post">
        <h2>Signup</h2>
        <label for="username">Username:</label>
        <input id="username" type="text" name="username"><br><br>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password"><br><br>

        <?php if (!empty($message)): ?>
            <p class="error-message"><?= $message; ?></p>
        <?php endif; ?>

        <input id="button" type="submit" value="Signup"><br><br>
    </form>
</div>

<button onclick="document.location='home.php'">Go Back</button>

<footer>
    <p>&copy; 2023 Salem Police Department</p>
</footer>
</body>
</html>
