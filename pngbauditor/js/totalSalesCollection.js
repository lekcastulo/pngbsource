$( document ).ready(function() {

      var inputdata = function(data){

          var clients = [];

            $.each(data, function(key, object){


                   var exact = object.item_value * object.grams;
 

                   var profit = object.item_value * object.grams   ;
                   var profit2 = object.selling_price - profit  ;
                   var profit3 = profit2 ;

                   var overall = object.selling_price - exact;

                   if (overall > 0){
                    overall = '0';
                   }

                   if (profit3 < 0){
                    profit3 = 0;
                   }


                   var allData =  { 
                   "TN": object.transaction_no, 
                   "Date": object.date, 
                   "Customer": object.customer_name, 
                   "OR-number": object.official_receipt, 
                   "Item Type": object.item_type ,  
                   "Gram/s Sold": object.grams,  
                   "Expected Price": exact, 
                   "Selling Price": object.selling_price,
                   "Sales Profit": profit3,
                   "Discount": overall, };

                   var transaction = object.transaction_no;

                    clients.push(allData);

                    // console.log(transaction);

             });


            // $("#grid").jsGrid("deleteItem", transaction);
         
            var countries = [
                { Name: "", Id: 0 },
                { Name: "United States", Id: 1 },
                { Name: "Canada", Id: 2 },
                { Name: "United Kingdom", Id: 3 }
            ];
         	
       
              $(".jsGrid").jsGrid({
                width: "100%",
                height: "400px",
         
                // inserting: true,
                editing: true,
                sorting: true,
                // paging: true,
         
                data: clients,
         
                fields: [
                    { name: "TN", type: "text",  validate: "required" },
                    { name: "Date", type: "text",  validate: "required" },
                    { name: "Customer", type: "text",  validate: "required" },
                    { name: "OR-number", type: "text",  validate: "required" },
                    { name: "Item Type", type: "text",  validate: "required",  items: [{Name:"Animal"}, {Name:"Car"}, {Name:"Fruit"}] },       
                    { name: "Gram/s Sold", type: "text",  validate: "required" },
                    { name: "Expected Price", type: "text",  validate: "required" },
                    { name: "Selling Price", type: "text",  validate: "required" },
                    { name: "Sales Profit", type: "text",  validate: "required" },
                    { name: "Discount", type: "text",  validate: "required" },
                    { type: "control" }
                ],

                onItemUpdated: function(args) {

                  var  TN = args.item.TN;
                  var Date = args.item['Date'];
                  var itemType = args.item['Item Type'];
                  var Customer = args.item['Customer'];
                  var or = args.item['OR-number'];
                  var grams = args.item['Gram/s Sold'];
                  var sPrice = args.item['Selling Price'];

                  // var Date = new Date("MM/dd/yyyy");
                  console.log(or);

                  // var Date = new Date();
                  // var formattedDate = moment(Date).format(YYYYMMDD);
          

                  // console.log(formattedDate);
                  
                  $.post('backend/controllers/zipcode.php', { type: 'saveProject', TN: TN, Date: Date, 
                    Customer: Customer, or: or, itemType: itemType, grams: grams, sPrice: sPrice}, function(data) {
                    loadData();
                  });
                },


                onItemDeleted: function(args) {

                  var  TN = args.item.TN;
                  $.post('backend/controllers/zipcode.php', { type: 'deleteProject', TN: TN }, function(data) {
                    loadData();

                  });

                }


            });

	        $('button[name="sum"]').click(function() {

				var orFrom = $('input[name=orFrom]').val();
				var orTo = $('input[name=orTo]').val();


				salesCollection(orFrom,orTo)
				
			});		        

			$('button[name="refresh"]').click(function() {

				var orFrom = $('input[name=orFrom]').val();
				var orTo = $('input[name=orTo]').val();


				salesCollection(orFrom,orTo)
				
			});	
      };




	var salesCollectionInput = function(data) {

		var table = '';

		var sorting = [];

		$.each(data, function(key, object){
			// console.log(object);

			table += '<tr>'
			table += '<td><b>'+object.date+'</b></td>';
			// table += '<td><b>'+object.transaction_no+'</b></td>';
			table += '<td>'+object.customer_name+'</td>';
			table += '<td><b><font color="red">'+object.official_receipt+'</font></b></td>';
			table += '<td>'+object.item_type+'</td>';
			// table += '<td>'+object.item_value+'</td>';
			table += '<td>'+numeral(object.grams).format('0,0.00')+'</td>';

			var exact = object.item_value * object.grams;

			table += '<td>'+numeral(exact).format('0,0.00')+'</td>';


			table += '<td><b><font color="#800080">'+numeral(object.selling_price).format('0,0.00')+'</font></b></td>';

			var profit = object.item_value * object.grams   ;
			var profit2 = object.selling_price - profit  ;
			var profit3 = profit2 ;

			if (profit3 < 0){

				table += '<td><b><font color="blue">'+0+'</font></b></td>';		
			} else{
			table += '<td><b><font color="blue">'+numeral(profit3).format('0,0.00')+'</font></b></td>';
			}

			if (profit3 < 0){
				profit3 = 0;
			}

			
			

			sorting.push(profit3);




			

				
			// console.log(sumprofit);


			var overall =   object.selling_price - exact;

			if (overall > 0 ){

				table += '<td><b><font color="green">Good</font></b></td>';
			}
			else{
				
			table += '<td><b><font color="red">'+numeral(overall).format('0,0.00')+'</font></b></td>';
			}
		});


		
		var allfiles = sorting.reduce(add, 0);

		function add(a, b) {
		    return a + b;
		}

		console.log(allfiles);

		var inserprofit = '<b>Sales Profit<br> Php </b>'+numeral(allfiles).format('0,0.00');


		$("h3[name=totalprofit]").html(inserprofit);

		$("tbody[name=metroData]").html(table);
		
	


		$('button[name="sum"]').click(function() {

			var orFrom = $('input[name=orFrom]').val();
			var orTo = $('input[name=orTo]').val();


			salesCollection(orFrom,orTo);

			
		});	

	}

	var totalSalesCollectionInput = function(data) {

		var table = '';



		$.each(data, function(key, object){

			// console.log(object);

			table += '<tr>'
			table += '<td><b>'+object.date+'</b></td>';
			table += '<td><b>'+object.item_type+'</b></td>';
			table += '<td><b>'+numeral(object.totalgrams).format('0,0.00')+' grams</b></td>';	

			// var 

			table += '<td><b><font color="#800080">'+numeral(object.totalsellingprice).format('0,0.00')+'</font></b></td>';

			var percentage =   object.item_value * object.totalgrams;

			// if(percentage = 0){
			// 	percentage = 0;
			// }

			// alert(percentage);

			var percentage2 =   object.totalsellingprice - percentage;	

			percentage2 = percentage2 < 0 ? 0 : percentage2;

			var percentage3 = percentage2;

			// console.log(object.totalsellingprice);

			// if (percentage3 < 0 ) {
			// table += '<td><b>'+0+'</b></td>';
			// }
			// else {
			// 	table += '<td><b><font color="blue">'+numeral(percentage3).format('0,0.00')+'</font></b></td>';
			// }

	

			var shortage =  object.totalsellingprice - object.expectedprice  ;

			if (shortage < 0 ){
				table += '<td><b><font color="red">'+numeral(shortage).format('0,0.00')+'</font></b></td>';		
			}else {
					table += '<td><b><font color="green">Good</font></b></td>';	
			}

		});


		$("tbody[name=totalSales]").html(table);
		
	


		$('button[name="sum"]').click(function() {

			var orFrom = $('input[name=orFrom]').val();
			var orTo = $('input[name=orTo]').val();


			allSalesCollection(orFrom,orTo)
			
		});	

	}	


	var allSalesCollectionInput = function(data){

		$.each(data, function(key, object){
			// console.log(object);
			var totalSales = '<b>Overall Sales <br> Php </b>'+numeral(object.total_sales).format('0,0.00');
			$("h3[name=overallsales]").html(totalSales);
		});

		$('button[name="sum"]').click(function() {

			var orFrom = $('input[name=orFrom]').val();
			var orTo = $('input[name=orTo]').val();


			totalSalesCollection(orFrom,orTo)
			
		});	

	}


		$('select#itemType').change(function(){
			salesCollection();
			totalSalesCollection();
			allSalesCollection();
		});	

	 	$('select#accountnameid').change(function(){
			salesCollection();
			totalSalesCollection();
			allSalesCollection();
		});	

// Get Datas


	var salesCollection = function(orFrom,orTo){

		// console.log(orFrom);
		// console.log(orTo);

		var orFrom = (typeof orFrom ==='undefined') ? '1': orFrom;
		var orTo = (typeof orTo ==='undefined') ? '100000': orTo;
		var itemType = $('select#itemType').val();
		var id = $('select#accountnameid').val();
		// var id = $('input[name="id"]').val();
		// var id = $('input[name="id"]').val();
		// console.log (itemType);

		if (itemType == 1){
			itemType = '10kDiamond';
		}		
		if (itemType == 2){
			itemType = '14k_Regular';
		}		
		if (itemType == 3){
			itemType = '14k_Sale(';
		}		
		if (itemType == 4){
			itemType = '14k_Diamond';
		}
		if (itemType == 5){
			itemType = '18k_Special';
		}		
		if (itemType == 6){
			itemType = '18k_Dia/Ctr';
		}		
		if (itemType == 7){
			itemType = '18k_Sale/Chinese';
		}
		if (itemType == 8){
			itemType = '21k_Regular';
		}		
		if (itemType == 9){
			itemType = '21k_Sale';
		}		
		if (itemType == 10){
			itemType = '21k_Chi(2300)';
		}		
		if (itemType == 11){
			itemType = '24k_Chinese';
		}		
		if (itemType == 12){
			itemType = 'Spdia(5000)';
		}		
		if (itemType == 13){
			itemType = 'Custom(2500)';
		}		
		if (itemType == 14){
			itemType = '18k_Regular';
		}
		if (itemType == 15){
			itemType = 'Spdia(10000)';
		}	
		
	        if (itemType == 16){
			itemType = 'Spdia(20000)';
		}

		// console.log (itemType);



		$.post('backend/controllers/overallsalescollection.php', {type: 'overallsalescollection', id: id, orFrom: orFrom, orTo: orTo, itemType: itemType }, function(data){
			// console.log(data);
			data = JSON.parse(data)

			salesCollectionInput(data);
			inputdata(data);
			
		});
	}
	

	var totalSalesCollection = function(orFrom,orTo){


		var orFrom = (typeof orFrom ==='undefined') ? '1': orFrom;
		var orTo = (typeof orTo ==='undefined') ? '100000': orTo;
		var itemType = $('select#itemType').val();
		var id = $('select#accountnameid').val();
		// var id = $('input[name="id"]').val();
		// var id = $('input[name="id"]').val();

			if (itemType == 1){
			itemType = '10kDiamond';
		}		
		if (itemType == 2){
			itemType = '14k_Regular';
		}		
		if (itemType == 3){
			itemType = '14k_Sale(';
		}		
		if (itemType == 4){
			itemType = '14k_Diamond';
		}
		if (itemType == 5){
			itemType = '18k_Special';
		}		
		if (itemType == 6){
			itemType = '18k_Dia/Ctr';
		}		
		if (itemType == 7){
			itemType = '18k_Sale/Chinese';
		}
		if (itemType == 8){
			itemType = '21k_Regular';
		}		
		if (itemType == 9){
			itemType = '21k_Sale';
		}		
		if (itemType == 10){
			itemType = '21k_Chi(2300)';
		}		
		if (itemType == 11){
			itemType = '24k_Chinese';
		}		
		if (itemType == 12){
			itemType = 'Spdia(5000)';
		}		
		if (itemType == 13){
			itemType = 'Custom(2500)';
		}		
		if (itemType == 14){
			itemType = '18k_Regular';
		}
		if (itemType == 15){
			itemType = 'Spdia(10000)';
		}


		if (itemType == 16){
			itemType = 'Spdia(20000)';
		}
		// console.log (itemType);
		// console.log(itemType);



		$.post('backend/controllers/overallsalescollection.php', {type: 'totaloverallsalescollection', id: id, orFrom: orFrom, orTo: orTo, itemType: itemType }, function(data){
			data = JSON.parse(data)
			// console.log(data);

			totalSalesCollectionInput(data);
		});
	}
	

	var allSalesCollection = function(orFrom,orTo){


		var orFrom = (typeof orFrom ==='undefined') ? '1': orFrom;
		var orTo = (typeof orTo ==='undefined') ? '100000': orTo;
		var itemType = $('select#itemType').val();
		var id = $('select#accountnameid').val();
		// var id = $('input[name="id"]').val();
		// var id = $('input[name="id"]').val();
		// console.log(itemType);

			if (itemType == 1){
			itemType = '10kDiamond';
		}		
		if (itemType == 2){
			itemType = '14k_Regular';
		}		
		if (itemType == 3){
			itemType = '14k_Sale(';
		}		
		if (itemType == 4){
			itemType = '14k_Diamond';
		}
		if (itemType == 5){
			itemType = '18k_Special';
		}		
		if (itemType == 6){
			itemType = '18k_Dia/Ctr';
		}		
		if (itemType == 7){
			itemType = '18k_Sale/Chinese';
		}
		if (itemType == 8){
			itemType = '21k_Regular';
		}		
		if (itemType == 9){
			itemType = '21k_Sale';
		}		
		if (itemType == 10){
			itemType = '21k_Chi(2300)';
		}		
		if (itemType == 11){
			itemType = '24k_Chinese';
		}		
		if (itemType == 12){
			itemType = 'Spdia(5000)';
		}		
		if (itemType == 13){
			itemType = 'Custom(2500)';
		}		
		if (itemType == 14){
			itemType = '18k_Regular';
		}
		if (itemType == 15){
			itemType = 'Spdia(10000)';
		}


		if (itemType == 16){
			itemType = 'Spdia(20000)';
		}
		// console.log (itemType);


		// console.log(id);
		$.post('backend/controllers/overallsalescollection.php', {type: 'allsalescollection', id: id, orFrom: orFrom, orTo: orTo, itemType: itemType }, function(data){
	
			data = JSON.parse(data)

			allSalesCollectionInput(data);
		});
	}


	salesCollection();
	totalSalesCollection();
	allSalesCollection();

})(jQuery);
