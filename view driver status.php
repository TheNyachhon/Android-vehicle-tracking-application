<html>
    <?php 
        include('index.php');
        include('supervisor page.php');
        $Supervisor_ID=$_SESSION['Supervisor_ID'];
        ?>
        <h1><center>Driver Status</center></h1>
        <?php
        if(isset($_POST['Driver_ID']))
	    {
            $Driver_ID = $_POST["Driver_ID"];  
            $sql="SELECT * FROM vehicles_assigned WHERE Driver_ID='$Driver_ID'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($query);
            if($row){
                $sql2="SELECT * FROM drivers WHERE Driver_ID='$Driver_ID' and Supervisor_ID='$Supervisor_ID'";
                $query2 = mysqli_query($con,$sql2);
                echo "<br>";
                if(mysqli_num_rows($query2)>0){
                    echo "<table class='center' border='1' style='float:left;margin: 30px;'>
                    <tr>
                    <th><h1>Driver ID</th>
                    <th><h1>Name</h1></th>
                    <th><h1>Contact</h1></th>
                    </tr>";
                    $row2 = mysqli_fetch_assoc($query2);
                    echo "<tr>";       
                    echo "<td>" . $row2['Driver_ID'] . "</td>";          
                    echo "<td>" . $row2['Name'] . "</td>";         
                    echo "<td>" . $row2['Contact'] . "</td>";                  
                    echo "</tr>";
                    echo "</table>";
                    
                }else{
                    echo "<p class='submitMsg'><b>Searched Driver Not Found!<b></p>";
                }
                echo "<table class='center' border='1' style='margin:30px;'>
                <tr>
                <th><h1>Vehicle Number</h1></th>
                </tr>";
                echo "<tr>";
                echo "<td>" .$row['Vehicle_No'] . "</td>"; 
                echo "</table>";

            }
            else{
                echo "<p class='submitMsg'><b>Driver not assigned any vehicle<b></p>";
            }
        }        
    ?>
    <body>
        <div class="container">
            <form action="view driver status.php" method="POST">
                <input style="width:200px;" type="text" name="Driver_ID" id="Driver_ID" placeholder="Enter Driver ID" maxlength=12 minlength=12 required>
                <button class="btn">View Status</button> 
                <br>
                <br>
            </form>
        </div>
    </body>
</html>