<?php
	require '../models/totalitems.php';


 	// if($_POST['type'] == 'inhousereselling'){
		$totalItems = new totalItems;

			// $id = $_POST['id'];
			// $dateFrom = $_POST['dateFrom'];
			// $dateTo = $_POST['dateTo'];
			// $itemType = $_POST['itemType'];
			   // $limit = $_POST['limit'];

		$Items = $totalItems->totalInput();
		// print_r($Items);
		// exit;

	if (count($Items) > 0) {

				$output = '';
	    	foreach ($Items as $item) {

	    		// print_r($item);
	    		// exit;


	    		$totalgrams = $totalItems->totalgrams($item->item_id);

	    		if (count($totalgrams)){
	    			$totalgrams = $totalgrams[0]->totalgrams;
	    		}else{
	    			$totalgrams = 0;
	    		}

	    		$totalRemaining = $item->totaloutput - $totalgrams;
	    		// print_r ($item); exit;
				
					$output .= '<tr>';

					
						$output .= '<td><b>'.$item->itemtype.'</b></td>';
			
						

						$output .= '<td><b><font color="blue">'.number_format((float)$item->input, 2, '.', '').'</font></b></td>';
						$output .= '<td><b><font color="blue">'.number_format((float)$item->output, 2, '.', '').'</font></b></td>';
						

						$output .= '<td><b><font color="blue">'.number_format((float)$totalgrams, 2, '.', '').'</font></b></td>';
						$output .= '<td><b><font color="red">'.number_format((float)$totalRemaining, 2, '.', '').'</font></b></td>';
					
				$output .= '</tr>';

	    	}

	    

	    echo $output;
	}



		
	// }


?>