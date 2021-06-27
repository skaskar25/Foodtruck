<?php 
	require 'food.php';
	$fooo = new food;
	$fooo->setLocationid($_REQUEST['locationid']);
	$fooo->setLat($_REQUEST['lat']);
	$fooo->setLng($_REQUEST['lng']);
	
	//$fooo->setFaciltyType($_REQUEST['Truck']);
	//$fooo->setLocation($_REQUEST['loc']);
	$status = $fooo->updateWithLatLng();
	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}
	
	
 ?>