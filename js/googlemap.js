var map;
var geocoder;

function loadMap() {
   var pune = {lat: 37.78788970, lng: -122.4005353};
   map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: pune
      });
      var marker = new google.maps.Marker({
          position: pune,
          map: map
      });
    
      var idata = JSON.parse(document.getElementById('data').innerHTML);
      geocoder = new google.maps.Geocoder();
      codeAddress(idata);
      
      var allData = JSON.parse(document.getElementById('allData').innerHTML);
      showAllinfo(allData)
  
}

function showAllinfo(allData) {
	var infoWind = new google.maps.InfoWindow;
	Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('content');
		var strong = document.createElement('strong');
		strong.textContent = data.Applicant;
		content.appendChild(strong);
   
		var small = document.createElement('small');
    small.textContent = data.FacilityType;
    small.style.fontWeight = '500';
    small.style.fontSize = '12px';
    small.style.backgroundColor = 'cyan';
		content.appendChild(small);

		var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map
	    });

	   marker.addListener('mouseover', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })
	})
}

function codeAddress(idata) {        
    Array.prototype.forEach.call(idata, function(data){ 
         var address = data.name + ' ' + data.address;
         //var address = document.getElementById('address').nodeValue;
         geocoder.geocode( { 'address': address}, function(results, status) { 
           if (status == 'OK') {
             map.setCenter(results[0].geometry.location);
          
             var points = {};
             points.id = data.locationid;
             points.lat = map.getCenter().lat();
             points.lng = map.getCenter().lng();
             updateWithLatLng(points);
           } else {
             alert('Geocode was not successful for the following reason: ' + status);
           }
         });
     });
 }
 
 function updateWithLatLng(points) {
     $.ajax({
         url:"action.php",
         method:"post",
         data: points,
         success: function(res) {
             console.log(res)
         }
     })
    }

   