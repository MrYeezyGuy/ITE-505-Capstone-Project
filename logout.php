<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Record Management System - Logout</title>
    <link rel="stylesheet" type="text/css" href="customize.css">
  </head>
  <body>
    <?php
      session_start();
      session_destroy();
    ?>
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
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="login.php">Login</a></li>
        <li id="settings-tab"><a href="Settings.php">Settings</a></li>
      </ul>
    </nav>

    <main>
      <h2>Logged Out</h2>
      <p>You have been successfully logged out.</p>
      <p><a href="login.php">Click here to login again.</a></p>
    </main>

    <footer>
      <p>&copy; 2023 Salem Police Department</p>
    </footer>

    <script src="app.js"></script>
  </body>
</html>
