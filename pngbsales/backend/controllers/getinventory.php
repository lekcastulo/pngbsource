<?php
	require '../models/getinventory.php';

	


	if($_POST['type'] == 'itemInventory'){

		$itemsInventory = new itemsInventory;

		$id = $_POST['id'];
		// $dateFrom = $_POST['dateFrom'];
		// $dateTo = $_POST['dateTo'];
		// $itemType = $_POST['itemType'];
				

		// echo json_encode($itemsInventory->itemsFilterInventory($id));

	    $itemsinventory = $itemsInventory->itemsFilterInventory($id);
	    $output ='';
	    if (count($itemsinventory) > 0) {


	    	foreach ($itemsinventory as $item) {


	    		$totalgrams = $itemsInventory->totalgrams($item->id,$item->itemid);

	    		if (count($totalgrams)){
	    			$totalgrams = $totalgrams[0]->totalgrams;
	    		}else{
	    			$totalgrams = 0;
	    		}

	    		$totalRemaining = $item->totalinput - $totalgrams;
	    		// print_r ($totalgrams); exit;
				
					$output .= '<tr>';

					
						$output .= '<td><b>'.$item->itemtype.'</b></td>';
			
						

						$output .= '<td><b><font color="blue">'.number_format((float)$item->input, 2, '.', '').'</font></b></td>';
                                                $output .= '<td><b><font color="blue">'.number_format((float)$item->output, 2, '.', '').'</font></b></td>';

						

						$output .= '<td><b><font color="blue">'.number_format((float)$totalgrams, 2, '.', '').'</font></b></td>';
						$output .= '<td><b><font color="red">'.number_format((float)$totalRemaining, 2, '.', '').'</font></b></td>';
					
				$output .= '</tr>';

	    	}

	    }

	    echo $output;
	}



	if($_POST['type'] == 'itemGrams'){

		$itemsInventory = new itemsInventory;

		$id = $_POST['id'];
		// $dateFrom = $_POST['dateFrom'];
		// $dateTo = $_POST['dateTo'];
		// $itemType = $_POST['itemType'];
				

		// echo json_encode($itemsInventory->totalgrams($id));


	}


	if($_POST['type'] == 'itemInventorySummary'){

		$itemsInventory = new itemsInventory;

		$id = $_POST['id'];
		$dateFrom = $_POST['dateFrom'];
		$dateTo = $_POST['dateTo'];
		// $itemType = $_POST['itemType'];
				

		echo json_encode($itemsInventory->itemInventorySummary($id, $dateFrom, $dateTo));
	};

?>
