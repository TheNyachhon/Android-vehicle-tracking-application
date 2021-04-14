<html>
    <br>
    <div class="wrapper"><div class="container">
        <body>
            <nav>
            <a href="supervisor page.php"><u><h1>Supervisor portal</h1></u></a>
            <a href="home.php?logout=success"><button class="btn2"><p style="text-align:right;">Log out?</p></button></a>
            <?php
                session_start();
                $record2=$_SESSION['Name'];
                $Supervisor_ID=$_SESSION['Supervisor_ID'];
                echo"<h1>Welcome $record2 !</h1>";
            ?>
            </nav>
            </body>
        </div>
    </div>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor portal</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <br>
    <div class="container">
        <nav>
            <a href="view drivers.php"><button class="btn" style="width: 280px">View Drivers list</button></a>  
            <a href="view driver status.php"><button class="btn">View Driver Status</button></a>
            <a href="add driver.php"><button class='btn' style="width: 204px">Add Driver</button></a>   
            <a href="delete driver.php"><button class="btn" style="width: 235px">Delete Driver</button></a>
            <br>
            <br>
            <a href="view vehicles.php" ><button class='btn'>View Vehicles list</button></a>
            <a href="assign vehicle.php"><button class="btn" style="width: 290px">Assign Vehicle</button></a>
            <a href="add vehicle.php"><button class="btn">Add Vehicle</button></a>
            <a href="delete vehicle.php"><button class="btn">Delete Vehicle</button></a>
            <a href="remove assignment.php"><button class="btn">Remove Vehicle Assignment</button></a>
            <br>
            <br>
        </nav>
    </div>
    <div class="footer">
    <h4>Copyright 2021 AV Tracking System | All rights reserved.</h4>
    </div>
</body>
</html>