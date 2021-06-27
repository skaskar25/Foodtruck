
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script type="text/javascript" src="js/googlemap.js"></script>
    <style type="text/css">
		.container {
			height: 630px;
		}
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}
		#data, #allData {
			display: none;
		}
        </style>
</head>
<body>
<div class="container">
		<center><h1>Food Truck Services</h1></center>
		<form method="post" action="actionn.php">
		<label>Select Facility Type:</label>
		<select name="facility type">
		<option>----Food Trucks-----</option>
		<option value="Truck">Truck</option>
		<option value="Push Cart">Push Cart</option>
		</select> 
		<label>Location :</label>
		<input type="text" name="location" placeholder="enter location" >
		<button type="submit" name="submit" value="submit" >Submit</button>
		<br>
		</form>
		<?php 
		
			require 'food.php';
		
			$fooo = new food;
		    $info = $fooo->getbLatLng();
			//print_r($info); exit;
			$info = json_encode($info, true); 
			echo '<div id="data">' . $info . '</div>';

		/*	$facility = $fooo->getFacility();
			$facility = json_encode($facility,true);
			echo '<div id="data">' . $facility . '</div>';*/
		/*	$loc = $fooo->getLoc();
			$loc = json_encode($loc,true);
			echo '<div id="data">' . $loc . '</div>';*/


			$allData = $fooo->getAllinfo();
			$allData = json_encode($allData, true);
			echo '<div id="allData">' . $allData . '</div>';

						
		 ?>
		
		<div id="map"></div>
	</div>
</body>
<script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDG9V4Mdz_RUphX8myW15xebDUIsTNSAEA&callback=loadMap">
</script>
</html>