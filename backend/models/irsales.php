
	<?php

class irsalesinventory {		

        

        public function irsales($dateFrom, $dateTo, $accountname){
        require '../../connection.php';

            

            $query = mysqli_query($connection, "
            SELECT customer_name, TRUNCATE(sum(grams),2)  as grams_sold 
            FROM `sales_report`                             
            WHERE customer_name LIKE '$accountname%'                            
            AND date                             
            BETWEEN '$dateFrom'                             
            AND '$dateTo' 
            ORDER BY `sales_report`.`customer_name` ASC                             
            LIMIT 0 , 5000 
                ");
            
            
            $results = array();

            // echo date('Y-m', strtotime('2017-06-17'));

            while ($q = mysqli_fetch_array($query)){
                $result = new stdClass;

                $result = $q['grams_sold'];
     

                $results = $result;

            }
                return $results;


        }	

}



?>