<?php 
    require '../models/totalremaininggrams.php';

        // if($_POST['type'] == 'mytotalremaninggrams') {

            $totalgrams = new totalgrams;

            $id = $_POST['id'];

            // $myreturn = 111111;
            
            echo json_encode($totalgrams->totalremaininggrams($id));

          

            // print_r($myreturn); exit;

            
        // }


?>
