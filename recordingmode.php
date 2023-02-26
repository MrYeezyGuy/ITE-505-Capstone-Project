<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Recording Mode</title>
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
      <section id="recording-mode">
        <h2>Recording Mode</h2>
        <div id="recording-controls">
          <button id="start-recording-btn">Start Recording</button>
          <button id="stop-recording-btn">Stop Recording</button>
        </div>
      </section>
      <button onclick="document.location='home.php'">Go Back</button>
    </main>

    <footer>
      <p>&copy; 2023 Salem Police Department</p>
    </footer>
    
    <script src="app.js"></script>
  </body>
</html>
