<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Learning Mode</title>
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
      <section id="learning-mode">
        <h2>Learning Mode</h2>
        <p>Welcome to the Learning Mode section of our Record Management System.</p>
        <p>Here, you can learn about various aspects of law enforcement and improve your skills and knowledge.</p>
        <p>Please select a category to begin:</p>
        <ul>
          <li><a href="#">Criminal Law</a></li>
          <li><a href="#">Traffic Law</a></li>
          <li><a href="#">Firearms and Weapons</a></li>
          <li><a href="#">Forensics</a></li>
        </ul>
      </section>
      <button onclick="document.location='home.php'">Go Back</button>
    </main>

    <footer>
      <p>&copy; 2023 Salem Police Department</p>
    </footer>
  </body>
</html>
