(function($) {

	// document.body.innerHTML = number.toLocaleString();

	var overSalesInput = function(data){
			$.each(data, function(key, object){
			// console.log(object.total_sales);
					
					$("h3[name=overallsales]").html('Overall Sales: <b>Php '+numeral(object.total_sales).format('0,0.00')+'</b>');
					
		});

				 $('button[name="sum"]').click(function() {

			var dateFrom = $('input[name=dateFrom]').val();
			var dateTo = $('input[name=dateTo]').val();


			loadData(dateFrom,dateTo)
			overallSales(dateFrom,dateTo)
			
		});


	}

		$('select#itemType').change(function(){
			loadData();
			overallSales();
		});	


		// alert('bingo');

	var dataInput = function(data){

		// console.log(data);

		var table = '';
		var sorting = [];



		$.each(data, function(key, object){

			

			table += '<tr>'
			// table += '<td><b>'+object.date+'</b></td>';
			table += '<td><b>'+object.item_type+'</b></td>';
			table += '<td><b>'+numeral(object.totalgrams).format('0,0.00')+'</b></td>';	

			// var 

			table += '<td><b><font color="#800080">'+numeral(object.totalsellingprice).format('0,0.00')+'</font></b></td>';

			var percentage =   object.item_value * object.totalgrams;
			var percentage2 =   object.totalsellingprice - percentage;			
			var percentage3 = percentage2;

			// if (percentage3 < 0 ) {
			// table += '<td><b>'+0+'</b></td>';
			// }
			// else {
			// 	table += '<td><b><font color="blue">'+numeral(percentage3).format('0,0.00')+'</font></b></td>';
			// }

			// if (profit3 < 0){
			// 	profit3 = 0;
			// }

				

			// sorting.push(profit3);
	

			var shortage =  object.totalsellingprice - object.expectedprice  ;

			// console.log(object);

			if (shortage < 0 ){
				table += '<td><b><font color="red">'+numeral(shortage).format('0,0.00')+'</font></b></td>';		
			}else {
					table += '<td><b><font color="green">Good</font></b></td>';	
			}

		});


		var allfiles = sorting.reduce(add, 0);

		function add(a, b) {
		    return a + b;
		}

		// console.log(allfiles);

		var inserprofit = '<b>Sales Profit<br> Php </b>'+numeral(allfiles).format('0,0.00');


		$("h3[name=totalprofit]").html('Sales Profit: <b>Php '+numeral(inserprofit).format('0,0.00')+'</b>');

		$("tbody[name=totalSales]").html(table);
		};

		$('select#itemType').change(function(){
			loadData();
		});		


		 $('button[name="sum"]').click(function() {

			var dateFrom = $('input[name=dateFrom]').val();
			var dateTo = $('input[name=dateTo]').val();


			loadData(dateFrom,dateTo)
			
		});


	 	$('select#accountnameid').change(function(){
			loadData();
			overallSales();
		});	
		 

	var loadData = function(dateFrom,dateTo){

		var id = $('select#accountnameid').val();

		
		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		

			// console.log(dateFrom);
			// console.log(dateTo);
		// alert('123');

		var itemType = $('select#itemType').val();
		// var id = $('input[name="id"]').val();
		// var id = accountnameid;
		// console.log(id);
		$.post('backend/controllers/totalsales.php', {type: 'totalSales', id: id, itemType: itemType,  dateFrom: dateFrom, dateTo: dateTo }, function(data){

			data = JSON.parse(data);
			// alert('bingo');

			
			dataInput(data);


		});
	};
	
		
	var overallSales = function(dateFrom,dateTo){




		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		var itemType = $('select#itemType').val();
		var id = $('select#accountnameid').val();

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

		// var id = $('input[name="id"]').val();
		$.post('backend/controllers/overallsales.php', {type: 'overallsales', id: id, itemType: itemType,  dateFrom: dateFrom, dateTo: dateTo }, function(data){
			// console.log(id);
			data = JSON.parse(data);

			overSalesInput(data);
		});
	}
	


	loadData();
	overallSales();
	// overSalesInput();

})(jQuery);

