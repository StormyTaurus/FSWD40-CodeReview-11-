<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['locValue'];  // Storing Selected Value In Variable
}
$sql = "SELECT COUNT(DISTINCT car_id ) AS v1
FROM car_data
INNER JOIN loc_data ON car_data.fk_loc_id = loc_data.loc_id 
WHERE loc_id=" . $selected_val . "; ";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='card cars_card'>";
        echo "  <div class='card-body'>";
        echo "    <p class='card-text'>Amount of cars: <b> ". $row['v1'] . "</p>";
        echo "  </div>";
        echo "  </div>";
        echo "</div>";
    }
    } else {
    echo "0 results";
    }
    $conn->close();
 
?>