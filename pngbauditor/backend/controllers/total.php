<?php
	require '../models/total.php';


		$totals = new totals;

		$items = $totals->TotalItemInventory();


		$output = '';

		// print_r($items[0]->totalinput);
		// exit();
		

		$totalgrams = $totals->totalGrams();
			
			$overallTots = $items[0]->totals - $totalgrams[0]->totalgrams;

			$output .= '<tr>';

				$output .= '<td><b><font color="green">'.number_format((float)$items[0]->totalinput, 2, '.', '').'</font></b></td>';
				$output .= '<td><b><font color="blue">'.number_format((float)$items[0]->totaloutput, 2, '.', '').'</font></b></td>';
				$output .= '<td><b><font color="blue">'.number_format((float)$totalgrams[0]->totalgrams, 2, '.', '').'</font></b></td>';
				$output .= '<td><b><font color="#80080">'.number_format((float)$overallTots, 2, '.', '').' grms.</font></b></td>';


			$output .= '</tr>';



	echo $output;



?>
