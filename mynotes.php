<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pdo = new PDO('mysql:host=localhost;dbname=SPD_Database', 'root', '');

  $stmt = $pdo->prepare('INSERT INTO notes (user_id, note_text) VALUES (:user_id, :note_text)');
  $result = $stmt->execute(array(
    ':user_id' => $_SESSION['user_id'],
    ':note_text' => $_POST['note_text']
  ));

  if ($result) {
    $message = 'Note saved successfully.';
  } else {
    $message = 'Error saving note. Please try again.';
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>My Notes</title>
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
      <section id="my-notes">
        <h2>My Notes</h2>
        <?php if(!empty($message)): ?>
          <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form id="note-form" method="post">
          <textarea id="note-text" name="note_text" rows="10"></textarea>
          <button type="submit">Save</button>
        </form>
      </section>
      <button onclick="document.location='home.php'">Go Back</button>
    </main>

    <footer>
      <p>&copy; 2023 Salem Police Department</p>
    </footer>

    <script src="app.js"></script>
  </body>
</html>
