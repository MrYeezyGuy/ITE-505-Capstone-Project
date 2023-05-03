<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Settings</title>
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
    <?php if(isset($_SESSION['user_id'])): ?>
    <?php else: ?>
      <li><a href="login.php">Login</a></li>
    <?php endif; ?>
    <li id="settings-tab" class="active"><a href="settings.php">Settings</a></li>
  </ul>
</nav>

<main>
  <section id="Settings">
    <h2>Settings</h2>
    <form method="POST" action="settings_action.php">
      <h3>General Settings</h3>
      <label for="theme">Theme:</label>
      <select id="theme" name="theme">
        <option value="light">Light</option>
        <option value="dark">Dark</option>
      </select>

      <h3>Language Settings</h3>
      <label for="language">Language:</label>
      <select id="language" name="language">
        <option value="en">English</option>
        <option value="es">Español</option>
        <option value="fr">Français</option>
        <option value="de">Deutsch</option>
      </select>

      <h3>Notification Settings</h3>
      <label for="email-notifications">Email Notifications:</label>
      <input type="checkbox" id="email-notifications" name="email-notifications" checked>

      <input type="submit" value="Save">
    </form>

  </section>
</main>
<button onclick="document.location='home.php'">Go Back</button>
<footer>
  <p>&copy; 2023 Salem Police Department</p>
</footer>
</body>
</html>