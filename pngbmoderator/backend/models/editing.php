<?php

		class editingInventory {

				public function backtrackCustomers(){
					require '../../connection.php';

						$query = mysqli_query($connection, "
						SELECT member.member_id, member.firstname, member.secondname, edit_customername.edit_transaction, edit_customername.customer_name, edit_customername.date, edit_customername.or_number, edit_customername.reason, edit_customername.status  FROM script2.edit_customername, member where member.member_id = edit_customername.member_id ORDER BY date DESC;");



						
							
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
						


						$results[] = $result;

					}
						return $results;


				}					

				public function backtrackGrams(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_gram.edit_transaction, edit_gram.grams, edit_gram.date, edit_gram.or_number, edit_gram.reason, edit_gram.status  FROM script2.edit_gram, member where member.member_id = edit_gram.member_id  ORDER BY date DESC;");
	
	
	
							
								
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
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							
	
	
							$results[] = $result;
	
						}
							return $results;
	
	
				}		

				public function backtrackSellingprice(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_sellingprice.edit_transaction, edit_sellingprice.sellingprice, edit_sellingprice.date, edit_sellingprice.or_number, edit_sellingprice.reason, edit_sellingprice.status  FROM script2.edit_sellingprice, member where member.member_id = edit_sellingprice.member_id ORDER BY date DESC;");
																	
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
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							
	
	
							$results[] = $result;
	
						}
							return $results;
	
	
				}	

				public function backtrackItemType(){
					require '../../connection.php';
	
							$query = mysqli_query($connection, "
							SELECT member.member_id, member.firstname, member.secondname, edit_changeitemtype.edit_transaction, edit_changeitemtype.changeitem, edit_changeitemtype.itemvalue, edit_changeitemtype.itemid, edit_changeitemtype.date, edit_changeitemtype.or_number, edit_changeitemtype.reason, edit_changeitemtype.status  FROM script2.edit_changeitemtype, member where member.member_id = edit_changeitemtype.member_id ORDER BY date DESC;");
																	
						$results = array();
	
						// echo date('Y-m', strtotime('2017-06-17'));
	
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
							$result->edit_transaction = $q['edit_transaction'];
							$result->date = date("F j, Y",strtotime($q['date']));						
							$result->member_id= $q['member_id'];
							$result->firstname= $q['firstname'];
							$result->secondname= $q['secondname'];
							$result->itemid= $q['itemid'];
							$result->itemvalue= $q['itemvalue'];
							$result->changeitem= $q['changeitem'];
							$result->or_number = $q['or_number'];
							$result->reason = $q['reason'];
							$result->status = $q['status'];
							
	
	
							$results[] = $result;
	
						}
							return $results;
	
	
				}

		}




?>




