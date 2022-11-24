<?php

		class editingInventory {


				public function editingCustomer(){
				require '../../connection.php';

						$query = mysqli_query($connection, "
						SELECT member.member_id, member.firstname, member.secondname, edit_customername.edit_transaction, edit_customername.request_status, edit_customername.customer_name, edit_customername.date, edit_customername.or_number, edit_customername.reason, edit_customername.status  FROM script2.edit_customername, member where member.member_id = edit_customername.member_id ORDER BY date DESC ;");



						
							
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
                        $result->or_number = $q['or_number'];
                        $result->reason = $q['reason'];
						$result->status = $q['status'];
						$result->request_status = $q['request_status'];


						$results[] = $result;

					}
						return $results;


				}	
				
					// public function editingCustomerRequest($or, $member, $approval, $customer, $adminreason, $requestno){
					// require '../../connection.php';


					// 	if ($adminreason == '') {
					// 		$adminreason = 'ok';
					// 	}

					// 	if ($approval == 'Not Approved'){


					// 		$query = mysqli_query($connection, "
					// 		UPDATE `script2`.`edit_customername` SET  `reason`='$adminreason', `status`='Not Approved', `request_status`='$adminreason' WHERE `edit_transaction` = '$requestno'");


					// 	}

					// 	if ($approval == 'Approved'){


					// 		$query = mysqli_query($connection, "
					// 		UPDATE `script2`.`edit_customername` SET `customer_name`='$customer', `reason`='$adminreason', `status`='Approved', `request_status`='ok' WHERE `edit_transaction` = '$requestno'
							
					// 		");
					// 	}

								
								
					// }

				public function editingGrams(){
                    require '../../connection.php';
    
                            $query = mysqli_query($connection, "
                            SELECT member.member_id, member.firstname, member.secondname, edit_gram.edit_transaction, edit_gram.request_status, edit_gram.grams, edit_gram.date, edit_gram.or_number, edit_gram.reason, edit_gram.status  FROM script2.edit_gram, member where member.member_id = edit_gram.member_id ORDER BY date DESC ;");
    
    
    
                            
                                
                        $results = array();
    
                        // echo date('Y-m', strtotime('2017-06-17'));
    
                        while ($q = mysqli_fetch_array($query)){
                            $result = new stdClass;
                            $result->edit_transaction = $q['edit_transaction'];
                            $result->date = date("F j, Y",strtotime($q['date']));						
                            $result->member_id= $q['member_id'];
                            $result->firstname= $q['firstname'];
                            $result->secondname= $q['secondname'];
                            $result->grams = $q['grams'];
                            $result->or_number = $q['or_number'];
                            $result->reason = $q['reason'];
                            $result->status = $q['status'];
                            $result->request_status = $q['request_status'];
    
    
                            $results[] = $result;
    
                        }
                            return $results;
    
    
            	}


				public function editingsellingprice(){
					require '../../connection.php';
	
								$query = mysqli_query($connection, "
								SELECT member.member_id, member.firstname, member.secondname, edit_sellingprice.edit_transaction, edit_sellingprice.request_status, edit_sellingprice.sellingprice, edit_sellingprice.date, edit_sellingprice.or_number, edit_sellingprice.reason, edit_sellingprice.status  FROM script2.edit_sellingprice, member where member.member_id = edit_sellingprice.member_id ORDER BY date DESC ;");
	
	
	
								
									
							$results = array();
	
							// echo date('Y-m', strtotime('2017-06-17'));
	
							while ($q = mysqli_fetch_array($query)){
								$result = new stdClass;
								$result->edit_transaction = $q['edit_transaction'];
								$result->date = date("F j, Y",strtotime($q['date']));						
								$result->member_id= $q['member_id'];
								$result->firstname= $q['firstname'];
								$result->secondname= $q['secondname'];
								$result->sellingprice = $q['sellingprice'];
								$result->or_number = $q['or_number'];
								$result->reason = $q['reason'];
								$result->status = $q['status'];
								$result->request_status = $q['request_status'];
	
	
								$results[] = $result;
	
							}
								return $results;
	
	
				}

				public function editingitemtype(){
					require '../../connection.php';
	
								$query = mysqli_query($connection, "
								SELECT member.member_id, member.firstname, member.secondname, edit_changeitemtype.edit_transaction, edit_changeitemtype.request_status, edit_changeitemtype.changeitem, edit_changeitemtype.date, edit_changeitemtype.or_number, edit_changeitemtype.reason, edit_changeitemtype.status , edit_changeitemtype.itemvalue, edit_changeitemtype.itemid FROM script2.edit_changeitemtype, member where member.member_id = edit_changeitemtype.member_id ORDER BY date DESC ;");
	
	
	
								
									
							$results = array();
	
							// echo date('Y-m', strtotime('2017-06-17'));
	
							while ($q = mysqli_fetch_array($query)){
								$result = new stdClass;
								$result->edit_transaction = $q['edit_transaction'];
								$result->date = date("F j, Y",strtotime($q['date']));						
								$result->member_id= $q['member_id'];
								$result->firstname= $q['firstname'];
								$result->secondname= $q['secondname'];
								$result->changeitem = $q['changeitem'];
								$result->itemvalue = $q['itemvalue'];
								$result->itemid = $q['itemid'];
								$result->or_number = $q['or_number'];
								$result->reason = $q['reason'];
								$result->status = $q['status'];
								$result->request_status = $q['request_status'];
	
	
								$results[] = $result;
	
							}
								return $results;
	
	
				}
		
				// return echo $Date;

				public function editingshippingfee(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_sf.edit_transaction, edit_sf.sf, edit_sf.date, edit_sf.or_number, edit_sf.reason, edit_sf.status , edit_sf.or_date , edit_sf.existing_sf, edit_sf.sfamount, edit_sf.reference FROM script3.edit_sf, member where member.member_id = edit_sf.member_id  ORDER BY date DESC;");
																	
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
							$result->sf= $q['sf'];
							$result->existing_sf= $q['existing_sf'];
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							$result->sfamount = $q['sfamount'];
							$result->reference = $q['reference'];
	
	
								$results[] = $result;
	
							}
								return $results;
	
	
				}



	}




?>




