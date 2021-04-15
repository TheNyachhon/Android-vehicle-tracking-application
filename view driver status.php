<!DOCTYPE html >
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
            $sql="SELECT * FROM drivers WHERE Driver_ID='$Driver_ID' and Supervisor_ID='$Supervisor_ID'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($query);
            if($row){
                $sql2="SELECT * FROM vehicles_assigned WHERE Driver_ID='$Driver_ID'";
                $query2 = mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_assoc($query2);
                echo "<br>";
                if(mysqli_num_rows($query2)>0){
                    echo "<table class='center' border='1' style='float:left;margin: 30px;'>
                    <tr>
                    <th><h1>Driver ID</th>
                    <th><h1>Name</h1></th>
                    <th><h1>Contact</h1></th>
                    </tr>";
                    //$row = mysqli_fetch_assoc($query);
                    echo "<tr>";       
                    echo "<td>" . $row['Driver_ID'] . "</td>";          
                    echo "<td>" . $row['Name'] . "</td>";         
                    echo "<td>" . $row['Contact'] . "</td>";                  
                    echo "</tr>";
                    echo "</table>";   
                    //Now the vehicle info
                    echo "<table class='center' border='1' style='margin:30px;'>
                    <tr>
                    <th><h1>Vehicle Number</h1></th>
                    </tr>";
                    echo "<tr>";
                    echo "<td>" .$row2['Vehicle_No'] . "</td>"; 
                    echo "</table>";                 
                }else{
                    echo "<p class='submitMsg'><b>Driver not assigned any vehicle<b></p>";
                }
            }
            else{
                echo "<p class='submitMsg'><b>Searched Driver Not Found!<b></p>";
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
    <h1><center>Map</center></h1>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <body>
    <div id="map"></div>
    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(12.971565, 79.159716),
          zoom: 15
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }
      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4Irb5-DYgI-ec7P0Sq-EMMZStN45mLfE&callback=initMap">
    </script>
  </body>
</html>