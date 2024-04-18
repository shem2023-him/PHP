<?php
session_start();

require_once "functions.php";
require_once "db.php";

redirectIfNotLoggedIn();

$user_id = $_SESSION["id"];
$sql = "SELECT id, activity, start_time, end_time FROM activities WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$activities = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Time_Management_System</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body> 
       <div class="navbar">
        <a href="index.php">Home</a>
        <a href="add_activity.php">Add Activities</a>
        <a href="view_activities.php">View Activities</a>
        <a href="logout.php" style="float: right;">Logout</a>
    </div>
    <br>
    <div>
        <?php
         include 'liveclock.php'; 
        ?>
    </div>
    <div class="content">
    <?php if (isset($_SESSION["username"])) { ?>
            <h1>Hello, <?php echo $_SESSION["username"]; ?>! Welcome to</h1>
        <?php } else { ?>
            <h1>Welcome!</h1>
        <?php } ?>
        <h1>Time_Management_System</h1>
        <p>Being a student is already hard enough as it is, let us help you manage your time efficiently!</p>
        <p> Just follow the steps below:</p>
        <p>From the navigation bar, click on "add activities" to successfully add an activity</p>
        <p>Also from the navigation bar, click on " view activities" to successfully view an activity</p>
        </div>
        <ul>
            <?php foreach ($activities as $activity) { ?>
                <li><?php echo $activity["activity"]; ?> (<?php echo $activity["start_time"]; ?> - <?php echo $activity["end_time"]; ?>)</li>
            <?php } ?>
        </ul>
    </div>
    <?php
       include 'calendar.php';
    ?>
       <script>
        function toggleActivities() {
            var activitiesDiv = document.getElementById("activities");
            if (activitiesDiv.style.display === "none") {
                activitiesDiv.style.display = "block";
            } else {
                activitiesDiv.style.display = "none";
            }
        }
    </script>
         <div class="custom-text">
            <P>CREATED BY SHEM DDUNGU</P>
        </div>
</body>
</html>
