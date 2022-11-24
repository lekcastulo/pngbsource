<?php
	require '../models/getremaininggrams.php';

	


	if($_POST['type'] == 'itemInventory'){

		$itemsInventory = new itemsInventory;

		$id = $_POST['id'];
	

    $itemsinventory = $itemsInventory->itemsFilterInventory($id);
    
    print_r($itemsinventory);
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
				// print_r ($totalRemaining); exit;
			
				$output .= '<tr>';

				
					$output .= '<td><b>'.$item->itemtype.'</b></td>';
		
					

					$output .= '<td><b><font color="blue">'.number_format((float)$item->totalinput, 2, '.', '').'</font></b></td>';
					

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


	if($_POST['type'] == 'getRemainingGrams'){
		$itemsInventory = new remainingGrams;
		echo json_encode($itemsInventory->getRemainingGrams());
	};

?>
