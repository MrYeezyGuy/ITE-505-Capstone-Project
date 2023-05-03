<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Learning Mode</title>
    <link rel="stylesheet" type="text/css" href="customize.css">
    <link rel="stylesheet" type="text/css" href="learningmode.css">
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
        <?php if(isset($_SESSION['user_id'])): ?>
        <?php else: ?>
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
          <li><a href="https://www.mass.gov/info-details/massachusetts-law-about-criminal-law-and-procedure" target="_blank">Criminal Laws</a></li>
          <li><a href="https://www.mass.gov/info-details/massachusetts-law-about-traffic-violations" target="_blank">Traffic Laws/Violations</a></li>
          <li><a href="https://www.mass.gov/info-details/massachusetts-law-about-guns-and-other-weapons" target="_blank">Firearms/Weapons Laws</a></li>
          <li><a href="https://www.mass.gov/orgs/trial-court-law-libraries" target="_blank">Trial Court Law Libraries</a></li>
        </ul>
      </section>
      <button onclick="document.location='home.php'">Go Back</button>
    </main>

    <footer>
      <p>&copy; 2023 Salem Police Department</p>
    </footer>

    <script>
      // Set active tab in navigation bar
      document.querySelector('nav ul li:nth-child(2) a').classList.add('active');
    </script>
  </body>
</html>
