<?php 

	class zipcodeDirectory {


		public function zipcodematch($location){
		require '../../conn.php';

			if ($location == 'all'){

			$query = mysqli_query($conn, 'SELECT id,region, location, place, zipcode
				from zipcode
				ORDER BY place ASC				
				');
			}

			else {
			$query = mysqli_query($conn, "SELECT id,region, location, place, zipcode
				from zipcode
				where place = '$location'
				ORDER BY place ASC
				");
			}

			$results = array();

			while ($q = mysqli_fetch_array($query)){
				$result = new stdClass;
				$result->id = $q['id'];

				$result->region = $q['region'];
				$result->location = $q['location'];
				$result->place = $q['place'];
				$result->zipcode = $q['zipcode'];

				$results[] = $result;

			}
				return $results;


		}



	}




?>