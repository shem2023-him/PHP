<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["confirm_logout"])) {
        
        $_SESSION = array();

        session_destroy();

        header("Location: login.php");
        exit;
    } else {
        
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <style>
        
        .confirmation-box {
            background-color: #00ff00.;
            color: #000000;
            padding: 20px;
            margin-bottom: 10px;
            border: 5px solid;
            border-radius: 10px;
            text-align: center;
        }

      
        .confirmation-box button {
            margin: 0 10px;
            padding: 5px 10px;
            border: 2px solid;
            border-radius: 5px;
            background-color: #ff00ff;
            cursor: pointer;
        }
    </style>
    <script>
        
        function cancelLogout() {
            window.location.href = "index.php";
        }
    </script>
</head>
<body>
    <div class="confirmation-box">
        Are you sure you want to logout?
        <form method="post" action="">
            <input type="submit" name="confirm_logout" value="Yes">
            <button type="button" onclick="cancelLogout()">No</button>
        </form>
    </div>

</body>
</html>
