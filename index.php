<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "8567";
    // $dbname = "vehicle_tracking";       //database name
    // //making an connection
    // $con = mysqli_connect($servername,$username,$password,$dbname);
    // if(!$con){          //if $con does not return true
    //     die("Connection failed due to ".mysqli_connect_error());
    // }else{
    //     //echo "Connection successful <br><br>";
    // }
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
