(function($) {

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


			table += '<td><b><font color="#880080"><b>'+numeral(object.selling_price).format('0,0.00')+'</font></b></td>';

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


			salesCollection(orFrom,orTo)
			
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

			table += '<td><b>'+numeral(object.totalsellingprice).format('0,0.00')+'</b></td>';

			var percentage =   object.item_value * object.totalgrams;

			// if(percentage = 0){
			// 	percentage = 0;
			// }

			var percentage2 =   object.totalsellingprice - percentage;	

			if (percentage2 < 0 ){
				percentage2 = 0;
			}		
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



// Get Datas


	var salesCollection = function(orFrom,orTo){


		var orFrom = (typeof orFrom ==='undefined') ? '1': orFrom;
		var orTo = (typeof orTo ==='undefined') ? '100000': orTo;
		var itemType = $('select#itemType').val();
		var id = $('input[name="id"]').val();
		// var id = $('input[name="id"]').val();
		// console.log (itemType);

		if (itemType == 1){
			itemType = '10kDia(1450)';
		}		
		if (itemType == 2){
			itemType = '14k_Reg(1750)';
		}		
		if (itemType == 3){
			itemType = '14k_Sale(1600)';
		}		
		if (itemType == 4){
			itemType = '14k_Dia(2000)';
		}
		if (itemType == 5){
			itemType = '18k_Sp(2050)';
		}		
		if (itemType == 6){
			itemType = '18k_Dia/Ctr(2150)';
		}		
		if (itemType == 7){
			itemType = '18k_Sale/Chi(1900)';
		}
		if (itemType == 8){
			itemType = '21k_Reg(2250)';
		}		
		if (itemType == 9){
			itemType = '21k_Sale(2100)';
		}		
		if (itemType == 10){
			itemType = '21k_Chi(2300)';
		}		
		if (itemType == 11){
			itemType = '24k_Chi(2400)';
		}		
		if (itemType == 12){
			itemType = 'Spdia(5000)';
		}		
		if (itemType == 13){
			itemType = 'Custom(2500)';
		}		
		if (itemType == 14){
			itemType = '18k_Reg(2000)';
		}
		if (itemType == 15){
			itemType = 'Spdia(10000)';
		}	
		// console.log (itemType);



		$.post('backend/controllers/overallsalescollection.php', {type: 'overallsalescollection', id: id, orFrom: orFrom, orTo: orTo, itemType: itemType }, function(data){
			data = JSON.parse(data)
			// console.log(data);

			salesCollectionInput(data);
		});
	}
	

	var totalSalesCollection = function(orFrom,orTo){


		var orFrom = (typeof orFrom ==='undefined') ? '1': orFrom;
		var orTo = (typeof orTo ==='undefined') ? '100000': orTo;
		var itemType = $('select#itemType').val();
		var id = $('input[name="id"]').val();
		// var id = $('input[name="id"]').val();

		if (itemType == 1){
			itemType = '10kDia(1450)';
		}		
		if (itemType == 2){
			itemType = '14k_Reg(1750)';
		}		
		if (itemType == 3){
			itemType = '14k_Sale(1600)';
		}		
		if (itemType == 4){
			itemType = '14k_Dia(2000)';
		}
		if (itemType == 5){
			itemType = '18k_Sp(2050)';
		}		
		if (itemType == 6){
			itemType = '18k_Dia/Ctr(2150)';
		}		
		if (itemType == 7){
			itemType = '18k_Sale/Chi(1900)';
		}
		if (itemType == 8){
			itemType = '21k_Reg(2250)';
		}		
		if (itemType == 9){
			itemType = '21k_Sale(2100)';
		}		
		if (itemType == 10){
			itemType = '21k_Chi(2300)';
		}		
		if (itemType == 11){
			itemType = '24k_Chi(2400)';
		}		
		if (itemType == 12){
			itemType = 'Spdia(5000)';
		}		
		if (itemType == 13){
			itemType = 'Custom(2500)';
		}		
		if (itemType == 14){
			itemType = '18k_Reg(2000)';
		}
		if (itemType == 15){
			itemType = 'Spdia(10000)';
		}	

		// console.log (itemType);
		console.log(itemType);



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
		var id = $('input[name="id"]').val();
		// var id = $('input[name="id"]').val();
		// console.log(itemType);

		if (itemType == 1){
			itemType = '10kDia(1450)';
		}		
		if (itemType == 2){
			itemType = '14k_Reg(1750)';
		}		
		if (itemType == 3){
			itemType = '14k_Sale(1600)';
		}		
		if (itemType == 4){
			itemType = '14k_Dia(2000)';
		}
		if (itemType == 5){
			itemType = '18k_Sp(2050)';
		}		
		if (itemType == 6){
			itemType = '18k_Dia/Ctr(2150)';
		}		
		if (itemType == 7){
			itemType = '18k_Sale/Chi(1900)';
		}
		if (itemType == 8){
			itemType = '21k_Reg(2250)';
		}		
		if (itemType == 9){
			itemType = '21k_Sale(2100)';
		}		
		if (itemType == 10){
			itemType = '21k_Chi(2300)';
		}		
		if (itemType == 11){
			itemType = '24k_Chi(2400)';
		}		
		if (itemType == 12){
			itemType = 'Spdia(5000)';
		}		
		if (itemType == 13){
			itemType = 'Custom(2500)';
		}		
		if (itemType == 14){
			itemType = '18k_Reg(2000)';
		}
		if (itemType == 15){
			itemType = 'Spdia(10000)';
		}	
		// console.log (itemType);



		$.post('backend/controllers/overallsalescollection.php', {type: 'allsalescollection', id: id, orFrom: orFrom, orTo: orTo, itemType: itemType }, function(data){
			data = JSON.parse(data)
			// console.log(data);

			allSalesCollectionInput(data);
		});
	}


	salesCollection();
	totalSalesCollection();
	allSalesCollection();

})(jQuery);
