<?php

		class editingInventory {


				public function editingCustomer(){
					require '../../connection.php';

						$query = mysqli_query($connection, "
						SELECT member.member_id, member.firstname, member.secondname, edit_customername.edit_transaction, edit_customername.customer_name, edit_customername.existing_customername, edit_customername.date, edit_customername.or_number, edit_customername.reason, edit_customername.status , edit_customername.or_date FROM script3.edit_customername, member where member.member_id = edit_customername.member_id and edit_customername.status = 'For Edit' ORDER BY date DESC;");



						
							
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
                        $result = new stdClass;
                        $result->edit_transaction = $q['edit_transaction'];
						$result->date = date("F j, Y",strtotime($q['date']));	
						$result->ordate = date("F j, Y",strtotime($q['or_date']));						
						$result->member_id= $q['member_id'];
						$result->firstname= $q['firstname'];
						$result->secondname= $q['secondname'];
						$result->customer_name = $q['customer_name'];
						$result->existing_customername = $q['existing_customername'];
                        $result->or_number = $q['or_number'];
                        $result->reason = $q['reason'];
						$result->status = $q['status'];
						


						$results[] = $result;

					}
						return $results;


				}	
				
				public function editingCustomerRequest($or, $member, $approval, $customer, $adminreason, $requestno){
					require '../../connection.php';


						if ($adminreason == '') {
							$adminreason = 'ok';
						}

						if ($approval == 'Not Approved'){


							$query = mysqli_query($connection, "
							UPDATE `script3`.`edit_customername` SET  `status`='Not Approved', `request_status`='$adminreason' WHERE `edit_transaction` = '$requestno'");


						}

						if ($approval == 'Approved'){


							$query = mysqli_query($connection, "
							UPDATE `script3`.`edit_customername` SET `customer_name`='$customer',  `status`='Approved', `request_status`='ok' WHERE `edit_transaction` = '$requestno'
							
							");
						}

								
								
				}

				public function backtrackCustomers(){
					require '../../connection.php';

						$query = mysqli_query($connection, "
						SELECT member.member_id, member.firstname, member.secondname, edit_customername.edit_transaction, edit_customername.customer_name, edit_customername.date, edit_customername.or_number, edit_customername.reason, edit_customername.status, edit_customername.existing_customername FROM script3.edit_customername, member where member.member_id = edit_customername.member_id ORDER BY date DESC;");



						
							
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
                        $result = new stdClass;
                        $result->edit_transaction = $q['edit_transaction'];
						$result->date = date("F j, Y",strtotime($q['date']));						
						$result->member_id= $q['member_id'];
						$result->firstname= $q['firstname'];
						$result->secondname= $q['secondname'];
						$result->customer_name = $q['customer_name'];
						$result->existing_customername = $q['existing_customername'];
                        $result->or_number = $q['or_number'];
                        $result->reason = $q['reason'];
						$result->status = $q['status'];
						


						$results[] = $result;

					}
						return $results;


				}					

				public function editingGrams(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_gram.edit_transaction, edit_gram.grams, edit_gram.date, edit_gram.or_number, edit_gram.existing_grams, edit_gram.reason, edit_gram.or_date, edit_gram.status  FROM script3.edit_gram, member where member.member_id = edit_gram.member_id and edit_gram.status = 'For Edit' ORDER BY date DESC;");
	
	
	
							
								
						$results = array();
	
						// echo date('Y-m', strtotime('2017-06-17'));
	
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
							$result->edit_transaction = $q['edit_transaction'];
							$result->date = date("F j, Y",strtotime($q['date']));	
							$result->ordate = date("F j, Y",strtotime($q['or_date']));					
							$result->member_id= $q['member_id'];
							$result->firstname= $q['firstname'];
							$result->secondname= $q['secondname'];
							$result->grams= $q['grams'];
							$result->existing_grams= $q['existing_grams'];
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							
	
	
							$results[] = $result;
	
						}
							return $results;
	
	
				}	

				public function editingGramsRequest($or, $member, $approval, $grams, $adminreason, $requestno){
						require '../../connection.php';
		
		
							if ($adminreason == '') {
								$adminreason = 'ok';
							}
		
							if ($approval == 'Not Approved'){
		
		
								$query = mysqli_query($connection, "
								UPDATE `script3`.`edit_gram` SET   `status`='Not Approved', `request_status`='$adminreason' WHERE `edit_transaction` = '$requestno'");
		
		
							}
		
							if ($approval == 'Approved'){
		
		
								$query = mysqli_query($connection, "
								UPDATE `script3`.`edit_gram` SET `grams`='$grams',  `status`='Approved', `request_status`='ok' WHERE `edit_transaction` = '$requestno'
								
								");
							}
		
									
									
				}

				public function backtrackGrams(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_gram.edit_transaction, edit_gram.grams, edit_gram.date, edit_gram.or_number, edit_gram.reason, edit_gram.existing_grams, edit_gram.status  FROM script3.edit_gram, member where member.member_id = edit_gram.member_id  ORDER BY date DESC;");
	
	
	
							
								
						$results = array();
	
						// echo date('Y-m', strtotime('2017-06-17'));
	
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
							$result->edit_transaction = $q['edit_transaction'];
							$result->date = date("F j, Y",strtotime($q['date']));						
							$result->member_id= $q['member_id'];
							$result->firstname= $q['firstname'];
							$result->secondname= $q['secondname'];
							$result->grams= $q['grams'];
							$result->existing_grams= $q['existing_grams'];
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							
	
	
							$results[] = $result;
	
						}
							return $results;
	
	
				}		

				public function editingSellingprice(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_sellingprice.edit_transaction, edit_sellingprice.sellingprice, edit_sellingprice.date, edit_sellingprice.or_number, edit_sellingprice.reason, edit_sellingprice.status , edit_sellingprice.or_date , edit_sellingprice.existing_sellingprice FROM script3.edit_sellingprice, member where member.member_id = edit_sellingprice.member_id and edit_sellingprice.status = 'For Edit' ORDER BY date DESC;");
																	
						$results = array();
	
						// echo date('Y-m', strtotime('2017-06-17'));
	
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
							$result->edit_transaction = $q['edit_transaction'];
							$result->date = date("F j, Y",strtotime($q['date']));
							$result->ordate = date("F j, Y",strtotime($q['or_date']));							
							$result->member_id= $q['member_id'];
							$result->firstname= $q['firstname'];
							$result->secondname= $q['secondname'];
							$result->sellingprice= $q['sellingprice'];
							$result->existing_sellingprice= $q['existing_sellingprice'];
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							
	
	
							$results[] = $result;
	
						}
							return $results;
	
	
				}	

				public function editingSellingpriceRequest($or, $member, $approval, $sellingprice, $adminreason, $requestno){
					require '../../connection.php';
	
	
						if ($adminreason == '') {
							$adminreason = 'ok';
						}
	
						if ($approval == 'Not Approved'){
	
	
							$query = mysqli_query($connection, "
							UPDATE `script3`.`edit_sellingprice` SET   `status`='Not Approved', `request_status`='$adminreason' WHERE `edit_transaction` = '$requestno'");
	
	
						}
	
						if ($approval == 'Approved'){
	
	
							$query = mysqli_query($connection, "
							UPDATE `script3`.`edit_sellingprice` SET `sellingprice`='$sellingprice',  `status`='Approved', `request_status`='ok' WHERE `edit_transaction` = '$requestno'
							
							");
						}
	
								
								
				}

				public function backtrackSellingprice(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_sellingprice.edit_transaction, edit_sellingprice.sellingprice, edit_sellingprice.date, edit_sellingprice.or_number, edit_sellingprice.reason, edit_sellingprice.status , edit_sellingprice.existing_sellingprice FROM script3.edit_sellingprice, member where member.member_id = edit_sellingprice.member_id ORDER BY date DESC;");
																	
						$results = array();
	
						// echo date('Y-m', strtotime('2017-06-17'));
	
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
							$result->edit_transaction = $q['edit_transaction'];
							$result->date = date("F j, Y",strtotime($q['date']));						
							$result->member_id= $q['member_id'];
							$result->firstname= $q['firstname'];
							$result->secondname= $q['secondname'];
							$result->sellingprice= $q['sellingprice'];
							$result->existing_sellingprice= $q['existing_sellingprice'];
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							
	
	
							$results[] = $result;
	
						}
							return $results;
	
	
				}	

				public function editingItemType(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_changeitemtype.edit_transaction, edit_changeitemtype.changeitem, edit_changeitemtype.itemvalue, edit_changeitemtype.itemid, edit_changeitemtype.date, edit_changeitemtype.or_number, edit_changeitemtype.reason, edit_changeitemtype.status , edit_changeitemtype.or_date , edit_changeitemtype.existing_itemtype FROM script3.edit_changeitemtype, member where member.member_id = edit_changeitemtype.member_id and edit_changeitemtype.status = 'For Edit' ORDER BY date DESC;");
																	
						$results = array();
	
						// echo date('Y-m', strtotime('2017-06-17'));
	
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
							$result->edit_transaction = $q['edit_transaction'];
							$result->date = date("F j, Y",strtotime($q['date']));	
							$result->ordate = date("F j, Y",strtotime($q['or_date']));					
							$result->member_id= $q['member_id'];
							$result->firstname= $q['firstname'];
							$result->secondname= $q['secondname'];
							$result->itemid= $q['itemid'];
							$result->itemvalue= $q['itemvalue'];
							$result->changeitem= $q['changeitem'];
							$result->existing_itemtype= $q['existing_itemtype'];
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							
	
	
							$results[] = $result;
	
						}
							return $results;
	
	
				}

				public function editingItemTypeRequest($or, $member, $approval, $changeitem, $itemvalue, $itemid, $adminreason, $requestno){
					require '../../connection.php';
	
	
						if ($adminreason == '') {
							$adminreason = 'ok';
						}
	
						if ($approval == 'Not Approved'){
	
	
							$query = mysqli_query($connection, "
							UPDATE `script3`.`edit_changeitemtype` SET   `status`='Not Approved', `request_status`='$adminreason' WHERE `edit_transaction` = '$requestno'");
	
	
						}
	
						if ($approval == 'Approved'){
	
	
							$query = mysqli_query($connection, "
							UPDATE `script3`.`edit_changeitemtype` SET `changeitem`='$changeitem',  `status`='Approved', `request_status`='ok' WHERE `edit_transaction` = '$requestno'
							
							");
						}
	
								
								
				}				

				public function backtrackItemType(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_changeitemtype.edit_transaction, edit_changeitemtype.changeitem, edit_changeitemtype.itemvalue, edit_changeitemtype.itemid, edit_changeitemtype.date, edit_changeitemtype.or_number, edit_changeitemtype.reason, edit_changeitemtype.status , edit_changeitemtype.or_date , edit_changeitemtype.existing_itemtype  FROM script3.edit_changeitemtype, member where member.member_id = edit_changeitemtype.member_id ORDER BY date DESC;");
																	
						$results = array();
	
						// echo date('Y-m', strtotime('2017-06-17'));
	
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
							$result->edit_transaction = $q['edit_transaction'];
							$result->date = date("F j, Y",strtotime($q['date']));	
							$result->ordate = date("F j, Y",strtotime($q['or_date']));					
							$result->member_id= $q['member_id'];
							$result->firstname= $q['firstname'];
							$result->secondname= $q['secondname'];
							$result->itemid= $q['itemid'];
							$result->itemvalue= $q['itemvalue'];
							$result->changeitem= $q['changeitem'];
							$result->existing_itemtype= $q['existing_itemtype'];
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							
	
	
							$results[] = $result;
	
						}
							return $results;
	
	
				}

		}




?>





