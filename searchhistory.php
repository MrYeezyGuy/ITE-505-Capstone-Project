<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search History</title>
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
      <section id="search-history">
        <h2>Search History</h2>
        <table>
          <thead>
            <tr>
              <th>Date</th>
              <th>Search Query</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2023-02-01</td>
              <td>John Doe</td>
            </tr>
            <tr>
              <td>2023-01-29</td>
              <td>Robbery</td>
            </tr>
          </tbody>
        </table>
      </section>
      <button onclick="document.location='home.php'">Go Back</button>
    </main>

    <footer>
      <p>&copy; 2023 Salem Police Department</p>
    </footer>

    <script src="app.js"></script>
  </body>
</html>
