<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['locValue'];
}
$sql = "SELECT *
   FROM car
   INNER JOIN car_loc ON car.car_loc_fk = car_loc.loc_id
   WHERE loc_id=" . $selected_val . "; ";
   
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        <div class="col-lg-5 col-md-12 px-5 p-3 m-auto">
		<h3 class="py-2">Selected Location</h3>
		<table class="table table-sm table-hover table-striped" style="background-color: seashell">

			<tr>
				<th>Longitude</th>
				<th>Latitude</th>
				<th>Cars</th>
				<th>ok</th>
			</tr>

		<?php 
			while($row = mysqli_fetch_assoc($resOffices)) {

				<tr>
					<td><?php echo $row['longitude']; ?></td>
					<td><?php echo $row['latitude']; ?></td>
					<td><?php echo $row['loc_id']; ?></td>

					<?php
						 $resCars = mysqli_query($conn, $queryGetCars);
						 $carsLoc = mysqli_num_rows($resCars);
					?>
					<td><?php echo $carsLoc; ?></td>		
				</tr>
			<?php
				};
			?>	

		</table>
	

    }
    } else {
    echo "No results!";
    }
    $conn->close();
   ?>



</div>