<?php include('db_connection.php')?>
<?php 
    $Driver_ID = $_POST['ID'];
    $Pass=$_POST['Pass'];

    $sql="SELECT * FROM drivers WHERE Driver_ID='$Driver_ID' AND Password='$Pass'";
    $query=mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
    if($row){   //if data exists
        $name=$row['Name'];
        echo "Login Success!"
        echo "Welcome".$name;
        
    }else{  
        echo "Login Failed, Please Try again";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    HELLO
    </h1>
    
</body>
</html>

