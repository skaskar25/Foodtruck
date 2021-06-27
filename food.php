<?php
 
  class food
    {
        private $locationid;
private $Applicant;
private $FacilityType;
private $cnn;
private $LocationDescription;
private $Address;
private $blocklot;
private $block;
private $lot;
private $permit;
private $Status;
private $FoodItems;
private $X;
private $Y;
private $lat;
private $lng;
private $Schedule;
private $Approved;
private $Received;
private $PriorPermit;
private $ExpirationDate;
private $Location;
private $FirePreventionDistricts;
private $PoliceDistricts;
private $SupervisorDistricts;
private $ZipCodes;
private $Neighborhoods;
private $conn;
private $tableName = "mobile_food_facility_permit";

function setLocationid($locationid) { $this->locationid = $locationid; }
function getLocationid() { return $this->locationid; }
function setApplicant($Applicant) { $this->Applicant = $Applicant; }
function getApplicant() { return $this->Applicant; }
function setFacilityType($FacilityType) { $this->FacilityType = $FacilityType; }
function getFacilityType() { return $this->FacilityType; }
function setCnn($cnn) { $this->cnn = $cnn; }
function getCnn() { return $this->cnn; }
function setLocationDescription($LocationDescription) { $this->LocationDescription = $LocationDescription; }
function getLocationDescription() { return $this->LocationDescription; }
function setAddress($Address) { $this->Address = $Address; }
function getAddress() { return $this->Address; }
function setBlocklot($blocklot) { $this->blocklot = $blocklot; }
function getBlocklot() { return $this->blocklot; }
function setBlock($block) { $this->block = $block; }
function getBlock() { return $this->block; }
function setLot($lot) { $this->lot = $lot; }
function getLot() { return $this->lot; }
function setPermit($permit) { $this->permit = $permit; }
function getPermit() { return $this->permit; }
function setStatus($Status) { $this->Status = $Status; }
function getStatus() { return $this->Status; }
function setFoodItems($FoodItems) { $this->FoodItems = $FoodItems; }
function getFoodItems() { return $this->FoodItems; }
function setX($X) { $this->X = $X; }
function getX() { return $this->X; }
function setY($Y) { $this->Y = $Y; }
function getY() { return $this->Y; }
function setLat($lat) { $this->lat = $lat; }
function getLat() { return $this->lat; }
function setLng($lng) { $this->lng = $lng; }
function getLng() { return $this->lng; }
function setSchedule($Schedule) { $this->Schedule = $Schedule; }
function getSchedule() { return $this->Schedule; }
function setApproved($Approved) { $this->Approved = $Approved; }
function getApproved() { return $this->Approved; }
function setReceived($Received) { $this->Received = $Received; }
function getReceived() { return $this->Received; }
function setPriorPermit($PriorPermit) { $this->PriorPermit = $PriorPermit; }
function getPriorPermit() { return $this->PriorPermit; }
function setExpirationDate($ExpirationDate) { $this->ExpirationDate = $ExpirationDate; }
function getExpirationDate() { return $this->ExpirationDate; }
function setLocation($Location) { $this->Location = $Location; }
function getLocation() { return $this->Location; }
function setFirePreventionDistricts($FirePreventionDistricts) { $this->FirePreventionDistricts = $FirePreventionDistricts; }
function getFirePreventionDistricts() { return $this->FirePreventionDistricts; }
function setPoliceDistricts($PoliceDistricts) { $this->PoliceDistricts = $PoliceDistricts; }
function getPoliceDistricts() { return $this->PoliceDistricts; }
function setSupervisorDistricts($SupervisorDistricts) { $this->SupervisorDistricts = $SupervisorDistricts; }
function getSupervisorDistricts() { return $this->SupervisorDistricts; }
function setZipCodes($ZipCodes) { $this->ZipCodes = $ZipCodes; }
function getZipCodes() { return $this->ZipCodes; }
function setNeighborhoods($Neighborhoods) { $this->Neighborhoods = $Neighborhoods; }
function getNeighborhoods() { return $this->Neighborhoods; }

        
      

        public function __construct() {
            require_once('db/DbConnect.php');
            $conn = new DbConnect;
			$this->conn = $conn->connect();
        }

      public function getbLatLng() {
			$sql = "SELECT * FROM $this->tableName WHERE locationid = 1336777";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
        public function getAllinfo() {
			$sql = "SELECT * FROM $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	   /*public function getFacility() {
			$sql = "SELECT * FROM $this->tableName WHERE FacilityType = Truck";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		/*	public function getLoc() {
			$sql = "SELECT * FROM $this->tableName WHERE Location = loc";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}*/
     public function updateWithLatLng() {
			$sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE locationid = :locationid";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':lat', $this->lat);
			$stmt->bindParam(':lng', $this->lng);
			$stmt->bindParam(':locationid', $this->locationid);

			if($stmt->execute()) {
				return true;
			}else {
				return false;
			}
		}

        
    }

?>