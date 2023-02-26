<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Report Incident</title>
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
      <section id="report-incident">
        <h2>Report Incident</h2>
        <form action="YOUR_SERVER_SIDE_SCRIPT_HERE" method="POST">
          <label for="case-number">Case Number:</label>
          <input type="text" id="case-number" name="case-number">

          <label for="date">Date:</label>
          <input type="date" id="date" name="date">

          <label for="location">Location:</label>
          <input type="text" id="location" name="location">

          <label for="description">Description:</label>
          <textarea id="description" name="description"></textarea>

          <input type="submit" value="Report Incident">
        </form>
      </section>
      <button onclick="document.location='home.php'">Go Back</button>
    </main>

    <footer>
      <p>&copy; 2023 Salem Police Department</p>
    </footer>
  </body>
</html>
