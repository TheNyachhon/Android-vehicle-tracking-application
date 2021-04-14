<html>
    <?php 
        include('index.php');
        include('supervisor page.php');
        $result=$con->query("SELECT * FROM vehicles");
         if(mysqli_num_rows($result)>0){
             echo "<table class='center' border='1'>
             <tr>
             <th><h1>Employee ID</th>
             <th><h1>Name</h1></th>
             <th><h1>Contact</h1></th>
             <th><h1>Address</h1></th>
             <th><h1>Designation</h1></th>
             <th><h1>Salary</h1></th>
             </tr>";
             while($row = mysqli_fetch_assoc($result))
             {       
                 echo "<tr>";       
                 echo "<td>" . $row['Emp_ID'] . "</td>";          
                 echo "<td>" . $row['Name'] . "</td>";         
                 echo "<td>" . $row['Contact'] . "</td>";                
                 echo "<td>" . $row['Address'] . "</td>"; 
                 echo "<td>" . $row['Designation'] . "</td>"; 
                 echo "<td>INR " . $row['Salary'] . "</td>"; 
                 echo "</tr>";          
             }
             echo "</table>";
         }
    ?>
    <br>
    <br>
    <br>
</html>