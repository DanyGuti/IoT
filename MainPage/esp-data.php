<!DOCTYPE html>
<html><body>
<?php

// Create connection
$conn = new mysqli("localhost", "root", "", "TilapiaTec");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 

$sql = "SELECT id, Sensor, Location, Celsius, Fahrenheit, reading_time FROM SensorData ORDER BY id DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>Sensor</td> 
        <td>Location</td> 
        <td>Celsius</td> 
        <td>Fahrenheit</td>
        <td>Timestamp</td> 
      </tr>';
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row['id'];
        $row_sensor = $row['Sensor'];
        $row_location = $row['Location'];
        $row_value1 = $row['Celsius'];
        $row_value2 = $row['Fahrenheit']; 
        $row_reading_time = $row['reading_time'];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_sensor . '</td> 
                <td>' . $row_location . '</td> 
                <td>' . $row_value1 . '</td> 
                <td>' . $row_value2 . '</td>
                <td>' . $row_reading_time . '</td> 
              </tr>';
    }
    $result->free();
}
$conn->close();
?> 
</table>
</body>
</html>