<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'db_connection.php';

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

$searchResults = [];
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];

    $stmt = $conn->prepare("SELECT * FROM Cases WHERE Cas_id LIKE ? OR Cas_time LIKE ? OR Cas_date LIKE ? OR Cas_type LIKE ? OR Cas_location LIKE ? OR Off_id LIKE ? OR cas_description LIKE ?");
    $searchParam = "%" . $searchQuery . "%";
    $stmt->bind_param("sssssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
    $stmt->execute();

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }

    $stmt->close();
}

if (isLoggedIn()) {
    // Handle form submission to add a new case
    if (isset($_POST['add_case'])) {
        $cas_id = $_POST['Case_ID'];
        $cas_time = $_POST['Time'];
        $cas_date = $_POST['Date'];
        $cas_type = $_POST['Case_Type'];
        $cas_location = $_POST['Case_Location'];
        $off_id = $_POST['Officer_ID'];
        $cas_description = $_POST['Case_Description'];

        $stmt = $conn->prepare("INSERT INTO Cases (Cas_id, Cas_time, Cas_date, Cas_type, Cas_location, Off_id, Cas_description) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $cas_id, $cas_time, $cas_date, $cas_type, $cas_location, $off_id, $cas_description);
        $stmt->execute();

        $stmt->close();
    }

    // Handle form submission to update a case
    if (isset($_POST['update_case'])) {
        $cas_id = $_POST['Case_ID'];
        $cas_time = $_POST['Time'];
        $cas_date = $_POST['Date'];
        $cas_type = $_POST['Case_Type'];
        $cas_location = $_POST['Case_Location'];
        $off_id = $_POST['Officer_ID'];
        $cas_description = $_POST['Case_Description'];

        $stmt = $conn->prepare("UPDATE Cases SET Cas_time = ?, Cas_date = ?, Cas_type = ?, Cas_location = ?, Off_id = ?, cas_description = ? WHERE Cas_id = ?");
        $stmt->bind_param("sssssss", $cas_time, $cas_date, $cas_type, $cas_location, $off_id, $cas_description, $cas_id);
        $stmt->execute();

        $stmt->close();
    }
} else {
    if (isset($_POST['add_case']) || isset($_POST['update_case'])) {
        echo "You must be logged in to add or update cases. Please <a href='login.php'>log in</a> first.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="customize.css">
    <script>
        function selectCase(caseData) {
            document.getElementById('update_Cas_id').value = caseData.cas_id;
            document.getElementById('update_Cas_time').value = caseData.cas_time;
            document.getElementById('update_Cas_date').value = caseData.cas_date;
document.getElementById('update_Cas_type').value = caseData.cas_type;
document.getElementById('update_Cas_location').value = caseData.cas_location;
document.getElementById('update_Off_id').value = caseData.off_id;
document.getElementById('update_Cas_description').value = caseData.cas_description;
}
</script>

</head>
<body>
    <header>
        <a href="home.php"><img src="logo.png" alt="Logo"></a>
        <h1>Record Management System</h1>
    </header>
    <nav>
  <ul>
    <li class="active"><a href="home.php">Home</a></li>
    <li><a href="learningmode.php">Learning Mode</a></li>
    <?php if(isset($_SESSION['user_id'])): ?>
        <li><a href="logout.php">Logout</a></li>
    <?php else: ?>
        <li><a href="login.php">Login</a></li>
    <?php endif; ?>
    <li id="settings-tab"><a href="Settings.php">Settings</a></li>
  </ul>
</nav>
    <main>
        <h2>Welcome to SPD Records System!</h2>
        <p>This is a system for managing police records, allowing officers to easily record and search for information related to incidents, cases, and suspects.</p>
        <p>To get started, please use the navigation menu below.</p>
        <section id="Search">
        <h2>Search:</h2>
        <h3>To search for a specific case or cases, type the keyword(s). If looking for all the cases, leave the search field empty. Click on the search bottom.</h3>
        <form method="POST" action="home.php">
            <input type="text" id="search" name="search" value="">
            <input type="submit" value="Search">
        </form>
    </section>
    <section id="SearchHistory">
    <h2>Search History:</h2>
    <table>
        <thead>
            <tr>
                <th>Case ID</th>
                <th>Time</th>
                <th>Date</th>
                <th>Case Type</th>
                <th>Location</th>
                <th>Officer ID</th>
                <th>Case Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($searchResults as $row): ?>
            <tr>
                <td><?php echo $row['Cas_id']; ?></td>
                <td><?php echo $row['Cas_time']; ?></td>
                <td><?php echo $row['Cas_date']; ?></td>
                <td><?php echo $row['Cas_type']; ?></td>
                <td><?php echo $row['Cas_location']; ?></td>
                <td><?php echo $row['Off_id']; ?></td>
                <td><?php echo $row['Cas_description']; ?></td>
                <td>
                    <button type="button" onclick='selectCase(<?php echo json_encode($row); ?>)'>Select</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php if (isLoggedIn()): ?>
<section id="update-entry">
    <h2>Update Case:</h2>

    <form method="POST" action="home.php">

        <label for="Case_ID">Case ID:</label>
        <input type="text" id="update_Cas_id" name="Case_ID" readonly>

        <label for="Time">Time:</label>
        <input type="time" id="update_Cas_time" name="Time">

        <label for="Date">Date:</label>
        <input type="date" id="update_Cas_date" name="Date">

        <label for="Case_Type">Case Type:</label>
        <input type="text" id="update_Cas_type" name="Case_Type">

        <label for="Case_Location">Location:</label>
        <input type="text" id="update_Cas_location" name="Case_Location">

        <label for="Officer_ID">Officer ID:</label>
        <input type="text" id="update_Off_id" name="Officer_ID">

        <label for="Case_Description">Case Description:</label>
        <input type="text" id="update_Cas_description" name="Case_Description">

        <input type="submit" name="update_case" value="Update">
    </form>
</section>

<section id="add-new-entry">
    <h2>Add New Case:</h2>

    <form method="POST" action="home.php">
        <label for="Case_ID">Case ID:</label>
        <input type="text" id="Cas_id" name="Case_ID">

        <label for="Time">Time:</label>
        <input type="time" id="Cas_time" name="Time">

        <label for="Date">Date:</label>
        <input type="date" id="Cas_date" name="Date">

        <label for="Case_Type">Case Type:</label>
        <input type="text" id="Cas_type" name="Case_Type">

        <label for="Case_Location">Location:</label>
        <input type="text" id="Cas_location" name="Case_Location">

        <label for="Officer_ID">Officer ID:</label>
        <input type="text" id="Off_id" name="Officer_ID">

        <label for="Case_Description">Case Description:</label>
        <input type="text" id="Cas_description" name="Case_Description">

        <input type="submit" name="add_case" value="Add">
    </form>
</section>
<?php endif; ?>
</main>
<script>
    document.querySelectorAll('#SearchHistory tbody tr').forEach(row => {
        row.addEventListener('click', () => {
            const cells = row.querySelectorAll('td');
            document.querySelector('#update_Cas_id').value = cells[0].innerText;
            document.querySelector('#update_Cas_time').value = cells[1].innerText;
            document.querySelector('#update_Cas_date').value = cells[2].innerText;
            document.querySelector('#update_Cas_type').value = cells[3].innerText;
            document.querySelector('#update_Cas_location').value = cells[4].innerText;
            document.querySelector('#update_Off_id').value = cells[5].innerText;
            document.querySelector('#update_Cas_description').value = cells[6].innerText;
        });
    });
</script>
</body>
</html>
