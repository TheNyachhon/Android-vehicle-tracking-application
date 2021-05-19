<?php include('header.php')?>
<?php 
    session_start();
    $incorrect=0;
    if(isset($_POST['ID']))
    {
        $Supervisor_ID = $_POST['ID'];
        $Password=$_POST['Pass'];
        $sql="SELECT * FROM supervisor WHERE Supervisor_ID='$Supervisor_ID'";
        $query=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        if($row){   //if data exists
            $Pass=$row['Password'];
            if($Pass==$Password){
                $sql="SELECT Name FROM supervisor WHERE Supervisor_ID='$Supervisor_ID'";
                $query=mysqli_query($con,$sql);
                $row = mysqli_fetch_array($query);
                $_SESSION['Name'] = $row[0];
                $_SESSION['Supervisor_ID'] = $Supervisor_ID;
                header("Location:supervisor page.php?login=success"); 
            }
            $incorrect=1;  
        }else{
            $incorrect=1;
        }
    }
    if($incorrect==1){
        echo "<p class='submitMsg'><b>Incorrect Password/Username or Account Not Found!<b></p>";
        echo "<br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>AV tracking System</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">            
            <h1>Supervisor Login</h1>
            <form action="supervisor login.php" method="POST">
                <input style="width:250px;" type="text" name="ID" id="ID" placeholder="Enter your ID"  maxlength=12 minlength=12 required>
                <input style="width:250px;" type="password" name="Pass" id="Pass" placeholder="Enter your Password" required>
                <button class="btn">Login</button> 
                <br>
            </form>
        </div>
    </div>

</body>
</html>