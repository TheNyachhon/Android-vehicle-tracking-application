<html>
    <?php 
        include('index.php');
        include('supervisor page.php');
        $Supervisor_ID=$_SESSION['Supervisor_ID'];
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
                    echo "<table class='center' border='1'>
                    <tr>
                    <th><h1>Driver ID</th>
                    <th><h1>Name</h1></th>
                    <th><h1>Contact</h1></th>
                    <th><h1>Address</h1></th>
                    <th><h1>Password</h1></th>
                    </tr>";
                    $row = mysqli_fetch_assoc($query2);
                    echo "<tr>";       
                    echo "<td>" . $row['Driver_ID'] . "</td>";          
                    echo "<td>" . $row['Name'] . "</td>";         
                    echo "<td>" . $row['Contact'] . "</td>";                
                    echo "<td>" . $row['Address'] . "</td>"; 
                    echo "<td>" . $row['Password'] . "</td>"; 
                    echo "</tr>";
                    echo "</table>";
                }else{
                    echo "<p class='submitMsg'><b>Searched Driver Not Found!<b></p>";
                }
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
            </form>
        </div>
    </body>
</html>