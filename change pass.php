<?php 
    include('db_connection.php');
    include('supervisor page.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Driver Credentials</title>
</head>
<body>
    <div class="container"> 
        <h1>Change Password</h1>         
        <form action="add driver.php" method="POST">
            <input style="width:250px;" type="text" name="ID" id="ID" placeholder="Enter Driver's ID"  maxlength=12 minlength=12 required>
            <input style="width:250px;" type="password" name="Pass" id="Pass" placeholder="Enter Password" required>            
            <button class="btn">Change Password</button> 
            <br>
        </form>
    </div>
</body>
</html>