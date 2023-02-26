<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Home</title>
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
      <section id="Search">
        <h2>Search Options:</h2>
        <table>
          <thead>
            <tr>
              <th>Cases</th>
              <th>Officer</th>
              <th>Victim</th>
              <th>Criminal</th>
            </tr>
          </thead>

          <tbody>
            <!-- database entries will be displayed here -->
          </tbody>
        </table>
      </section>
      <h2>Welcome to SPD Records System!</h2>
      <p>This is a system for managing police records, allowing officers to easily record and search for information related to incidents, cases, and suspects.</p>
      <p>To get started, please use the navigation menu below.</p>
      <section id="search">
        <h2>Search</h2>
        <form>
          <label for="search-query">Search Query:</label>
          <input type="text" id="search-query" name="search-query">

          <input type="submit" value="Search">
        </form>
      </section>

      <section id="add-new-entry">
        <h2>Add New Entry</h2>
        <form>
          <label for="Case ID">Case ID:</label>
          <input type="text" id="Case ID" name="Case ID">

          <label for="Officer(s)">Officer(s):</label>
          <input type="text" id="Officer(s)" name="Officer(s)">
          
          <label for="Victim(s)">Victim(s):</label>
          <input type="text" id="Victim(s)" name="Victim(s)">
          
          <label for="Criminal(s)">Criminal(s):</label>
          <input type="text" id="Criminal(s)" name="Criminal(s)">          

          <input type="submit" value="Add">
        </form>
      </section>