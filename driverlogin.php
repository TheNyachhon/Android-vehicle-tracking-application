<?php include('db_connection.php')?>
<?php 
    $Driver_ID = $_POST['ID'];
    $Pass=$_POST['Pass'];

    $sql="SELECT * FROM drivers WHERE Driver_ID='$Driver_ID' AND Password='$Pass'";
    $query=mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
    if($row){   //if data exists
        $name=$row['Name'];
        echo "Login Success!";
        echo "Welcome".$name;
        
    }else{  
        echo "Login Failed, Please Try again";
    }
?>

