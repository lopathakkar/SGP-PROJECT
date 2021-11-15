<?php
// Initialize the session
session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1>Hi, </b>. Welcome to our site.</h1>
    Your Name : <?php echo htmlspecialchars($_SESSION["name"]); ?><br><br>
    Your DOB : <?php echo htmlspecialchars($_SESSION["DOB"]); ?><br><br>
    Your Address : <?php echo htmlspecialchars($_SESSION["address"]); ?><br><br>
    Your Car Name : <?php echo htmlspecialchars($_SESSION["carname"]); ?><br><br>
    Your Company Name : <?php echo htmlspecialchars($_SESSION["companyname"]); ?><br><br>
    Your Car Number : <?php echo htmlspecialchars($_SESSION["carnumber"]); ?><br><br>
    Your Email : <?php echo htmlspecialchars($_SESSION["email"]); ?><br>
</body>
</html>
