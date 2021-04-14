<?php 
    include('index.php');
    include('supervisor page.php');
    $incorrect=0;
    $Supervisor_ID=$_SESSION['Supervisor_ID'];
    if(isset($_POST['Number']))
    {
        $Vehicle_No = $_POST['Number'];
        $sql = "SELECT Vehicle_No FROM vehicles WHERE Vehicle_No='$Vehicle_No' AND Supervisor_ID='$Supervisor_ID';";
        $query=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        if($row){   //vehicle of supervisor exists
            $sql="SELECT Status FROM vehicles WHERE Vehicle_No='$Vehicle_No';";
            $query=mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($query);
            if($row['Status']=='Booked'){   //Vehicle is booked
                echo "<p class='submitMsg'><b>Vehicle is currently in use, Deletion unsuccessful!<b></p>";
            }else{
                $sql = "DELETE FROM vehicles WHERE Vehicle_No='$Vehicle_No';";
                $query=mysqli_query($con,$sql);
                if($query == true){
                    echo "<p class='submitMsgD'><b>Vehicle Successfully deleted!<b></p>";        
                }else{
                    echo "<p class='submitMsg'><b>Vehicle deletion unsuccessful!<b></p>";        
                }
            }
        }else{
            echo "<p class='submitMsg'><b>Vehicle does not exists!<b></p>";
        }     
    }
    echo "<br>";
?>
<h1><center>Delete Vehicle</center></h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AV Tracking System</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">            
        <form action="delete vehicle.php" method="POST">
            <input style="width:250px;" type="text" name="Number" id="Number" placeholder="Enter Vehicle Number" required>
            <button class="btn">Delete Vehicle</button> 
            <br>
        </form>
    </div>
</body>
</html>