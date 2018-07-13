<?php
	ob_start();
	session_start();
  	include_once 'dbconnect.php';

$getOffices = "
	SELECT *
	FROM office
	
";

$resOffices = mysqli_query($conn, $getOffices);
$res = mysqli_query($conn,$getOffices);


 ?>


<?php include('navbar.php'); ?>


<div class="container-fluid row mx-auto" style="background-color: aquamarine;">
		
	

  <div class="col-lg-7 col-md-12 px-5 p-3 mr-auto">
    <h1>Shopping Car Map</h1>
    <div id="map" style="width:100%;height:32rem;"><?php echo "'".$data['nombre']."'"; ?></div><br>
    <?php
      
    ?>
    <script type="text/javascript">
      var bcn = new google.maps.LatLng(48.209206,16.372778);
      var mapOptions = {
          center: bcn,
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
      map = new google.maps.Map(document.getElementById('map'), mapOptions);
    </script>
      <?php
        while ($data = mysqli_fetch_assoc($res)) { 
      ?>
      <script type="text/javascript">

      	var icon = {
      	    url: 'img/office.png',
      	    scaledSize: new google.maps.Size(50, 50), 
      	    origin: new google.maps.Point(0,0), 
      	    anchor: new google.maps.Point(0, 0) 
      	};

        var marker<?php echo $i;?> = new google.maps.Marker({
          position: new google.maps.LatLng(<?php echo $data['lat']; ?>, <?php echo $data['lng']; ?>),
          map: map,
          title: <?php echo "'".$data['office_name']."'"; ?>,
          icon: icon
        });

        var contentString = `
        <h5>
        	<?php echo "".$data['office_name'].""; ?>
        </h5>
        <p>
	        <b>Address</b><br>
	        <?php echo "".$data['address'].""; ?>
	    </p>
        `

        var infowindow<?php echo $i;?> = new google.maps.InfoWindow({
          content: contentString
        });

        google.maps.event.addListener(marker<?php echo $i;?>, 'click', function() {
          infowindow<?php echo $i;?>.open(map,marker<?php echo $i;?>);
        });
      </script>
      <?php
          $i++;
        }

      ?>
  </div>


  <div class="col-lg-5 col-md-12 px-5 p-3 m-auto" style="overflow-x:auto;">
		<h3 class="py-2 ">Our Offices</h3>
		<table class="table table-sm table-hover table-striped" style="background-color: seashell">

			<tr>
				<th>Number</th>
				<th>Location</th>
				<th>Address</th>
				<th>Cars Available</th>
			</tr>

		<?php 
			while($officeRow = mysqli_fetch_assoc($resOffices)) {

				if ($officeRow['office_id'] == 0) { 
				} 

				else { ?>

				<tr>
					<td><?php echo $officeRow['office_id']; ?></td>
					<td><a name="office" href="cars_list.php?office=<?php echo $officeRow['office_id']; ?>"><?php echo $officeRow['office_name']; ?></a></td>
					<td><?php echo $officeRow['address']; ?></td>

					<?php 
						$queryGetCars = "
							SELECT *
							FROM car
							LEFT JOIN office ON fk_office_id = office_id
							WHERE fk_office_id =". $officeRow['office_id']
						;

						 $resCars = mysqli_query($conn, $queryGetCars);
						 $carsOffice = mysqli_num_rows($resCars);
					?>
					<td><?php echo $carsOffice; ?></td>		
				</tr>
			<?php
				};};
			?>	

		</table>
	</div>


</div>

<!-- footer + </body-html> -->
<?php include('footer.php'); ?>


<?php ob_end_flush(); ?>