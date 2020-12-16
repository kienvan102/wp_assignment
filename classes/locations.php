<?php 
	
	class locations	{
		private $conn;
		private $tableName = "location";

		public function __construct() {
			require_once('lib/Database.php');
			$conn = new Database;
			$this->conn = $conn;
		}

		public function getLocBlank() {
			$sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL";
            $result = $this->conn->select($sql);
			return $result;
		}

		public function getAllLocations() {
			$sql = "SELECT * FROM $this->tableName";
			$locations = $this->conn->select($sql);
			$result = array();
			while($row = $locations->fetch_assoc()){
				array_push($result,$row);
			}
			return $result;
		}

		public function getLocInDistrict($type){
			$sql = "SELECT * FROM $this->tableName WHERE district = '$type'";
			$locations = $this->conn->select($sql);
			$result = array();
			if($locations){
				while($row = $locations->fetch_assoc()){
					array_push($result,$row);
				}
			}
			else{
				$result=[''];
			}
			return $result;
		}
	}

?>
