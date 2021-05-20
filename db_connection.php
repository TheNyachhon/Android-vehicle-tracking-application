<?php
    $servername = "sql6.freesqldatabase.com";
    $username = "sql6412598";
    $password = "p8xl7mppFZ";
    $dbname = "sql6412598";       //database name
    //making an connection
    $con = mysqli_connect($servername,$username,$password,$dbname);
    if(!$con){          //if $con does not return true
        die("Connection failed due to ".mysqli_connect_error());
    }else{
    //    echo "Connection successful <br><br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="img/Logo.svg">
</head>

</html>