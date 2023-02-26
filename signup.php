<?php
session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: home.php');
}

$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
  $pdo = new PDO('mysql:host=localhost;dbname=SPD_Database', 'root@localhost', '');

  $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    header('Location: home.php');
  } else {
    $message = 'Incorrect username or password';
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Signup</title>
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
        <li><a href="reportincident.php">Report Incident</a></li>
        <li><a href="recordingmode.php">Recording Mode</a></li>
        <li><a href="mynotes.php">My Notes</a></li>
        <li><a href="searchhistory.php">Search History</a></li>
        <li><a href="learningmode.php">Learning Mode</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="signup.php">Sign Up</a></li>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
        <li id="settings-tab"><a href="Settings.php">Settings</a></li>
      </ul>
    </nav>

    <main>
      <section id="signup">
        <h2>Signup</h2>
        <?php if(isset($message)): ?>
          <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username">

          <label for="password">Password:</label>
          <input type="password" id="password" name="password">

          <input type="submit" value="Signup">
        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>
      </section>
    </main>

    <footer>
      <p>&copy; 2023 Salem Police Department</p>
    </footer>
  </body>
</html>
