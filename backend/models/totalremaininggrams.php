<?php 
   

   class totalgrams{
       public function  totalremaininggrams($id){
           require '../../connection.php';

           $query = mysqli_query($connection, "
           select round(sum(input),2) as input , round(sum(output),2) as output, 
           round(sum(input - output),2) as totalgrams from item_inventory where id = $id
               ");
           
           
           $results = '';
       
           // echo date('Y-m', strtotime('2017-06-17'));
       
           while ($q = mysqli_fetch_array($query)){
               $result = new stdClass;
       
               $result = $q['totalgrams'];
       
       
               $results = $result;
       
           }
       
       
           $query = mysqli_query($connection, "
           SELECT round(sum(grams),2) as grams FROM sales_report where id = $id
               ");
       
       
           $results2;
       
               while ($q = mysqli_fetch_array($query)){
                   $input = new stdClass;
           
                   $input = $q['grams'];
           
           
                   $results2 = $input;
           
               }
       
               $total = $results - $results2;

            // $total[] = 10000;

           $totalgrams =  number_format((float)$total, 2, '.', '');  // Outputs -> 105.00
       
               return $totalgrams;

       }
   }


?>
