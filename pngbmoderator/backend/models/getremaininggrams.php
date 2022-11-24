<?php		
class remainingGrams{
		public function getRemainingGrams(){
		        require '../../connection.php';

			$query = mysqli_query($connection, "
				SELECT  member.firstname, member.secondname,  member.member_id, item_inventory.id, 
				ROUND(SUM(input), 2) AS INPUT, ROUND(SUM(output), 2)  AS OUTPUT, ROUND(SUM(input - output), 2) AS totalInput 
				FROM member 
                                INNER JOIN item_inventory WHERE item_inventory.id = member.member_id 
                                GROUP BY member.member_id
				ORDER BY member.firstname ASC

				");
			
			
			$results = array();

			// echo date('Y-m', strtotime('2017-06-17'));

			while ($q = mysqli_fetch_array($query)){
				$result = new stdClass;
				$result->memberFirstname = $q['firstname'];
				$result->memberLastname = $q['secondname'];
				$result->memberId = $q['member_id'];
				$result->id = $q['id'];
				$result->input = $q['INPUT'];
				$result->output = $q['OUTPUT'];
				$result->totalinput = $q['totalInput'];
			        
                                //get total grams sold  
                                $totalgrams = $this->totalgrams($q['member_id']);
                                $totalgrams_member = 0;
                                if (isset($totalgrams[0]->totalgrams)) {
                                    $totalgrams_member = $totalgrams[0]->totalgrams;
                                }
                                $result->totalgrams = $totalgrams_member; 
                                $result->totalgramsremaining =  $result->output - $totalgrams_member;
                                $results[] = $result;
                             

			}
				return $results;


		}	

		public function totalgrams($id){
		require '../../connection.php';

			
                                $query = mysqli_query($connection, "
				SELECT  id,SUM(grams) AS totalgrams 
				FROM sales_report
				WHERE id = '$id'
				GROUP BY id
				");
			
			
			$results = array();

			while ($q = mysqli_fetch_array($query)){
				$result = new stdClass;
				$result->id = $q['id'];
				$result->totalgrams = $q['totalgrams'];

				$results[] = $result;

			}
				return $results;


		}	


					


}




?>


