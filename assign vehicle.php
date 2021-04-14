<?php 
    include('index.php');
    include('supervisor page.php');
    $incorrect=0;
    $Supervisor_ID=$_SESSION['Supervisor_ID'];
    if(isset($_POST['ID']))
    {
        $Driver_ID = $_POST['ID'];
        $Number = $_POST['Number'];
        $sql = "SELECT Driver_ID FROM drivers WHERE Driver_ID='$Driver_ID'";
        $query=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        if($row){   //driver exists
            $sql = "SELECT Status FROM vehicles WHERE Vehicle_No='$Number'";
            $query=mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($query);
            if($row){   //vehicle exists
                if($row['Status']=='Booked'){
                    echo "<p class='submitMsg'><b>Vehicle already assigned!<b></p>";        
                }else{
                    $sql = "INSERT INTO vehicles_assigned VALUES ('$Number','$Driver_ID');";
                    $query = mysqli_query($con,$sql);
                    $failed=false;
                    if($query==true){
                        $sql = "UPDATE vehicles SET Status='Booked' WHERE Vehicle_No='$Number';";
                        $query = mysqli_query($con,$sql);
                        if($query == true){
                            echo "<p class='submitMsgD'><b>Driver successfully assigned vehicle<b></p>"; 
                        }else{
                            $failed=true;
                        }                     
                    }else{
                        $failed=true; 
                    }
                    if($failed==true){
                        echo "<p class='submitMsg'><b>Error in assignment!<b></p>"; 
                    }
                }
            }else{
                echo "<p class='submitMsg'><b>Vehicle does not exist!<b></p>";    
            }
        }else{
            echo "<p class='submitMsg'><b>Driver does not exist!<b></p>";
        }     
    }
    echo "<br>";
?>
<h1><center>Assign Vehicle</center></h1>
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
        <form action="assign vehicle.php" method="POST">
            <input style="width:250px;" type="text" name="ID" id="ID" placeholder="Enter Driver's ID"  maxlength=12 minlength=12 required>
            <input style="width:250px;" type="text" name="Number" id="Number" placeholder="Enter Vehicle Number" required>           
            <button class="btn">Assign Driver</button> 
            <br>
        </form>
    </div>
</body>
</html>