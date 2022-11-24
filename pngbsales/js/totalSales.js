(function($) {

	// document.body.innerHTML = number.toLocaleString();


	var overSalesInput = function(data){
			$.each(data, function(key, object){
			// console.log(object.total_sales);
					
					$("h3[name=overallsales]").html('Overall Sales: <b><br>Php '+numeral(object.total_sales).format('0,0.00')+'</b>');
					
		});

	}

	var dataInput = function(data){

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
			var percentage3 = percentage2 * .20;

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
		};

		$('select#itemType').change(function(){
			loadData();
			overallSales();
		});		


		 $('button[name="sum"]').click(function() {

			var dateFrom = $('input[name=dateFrom]').val();
			var dateTo = $('input[name=dateTo]').val();


			loadData(dateFrom,dateTo)
			overallSales(dateFrom,dateTo)
			
		});

	var loadData = function(dateFrom,dateTo){

		
		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		

			// console.log(dateFrom);
			// console.log(dateTo);
		// alert('123');

		var itemType = $('select#itemType').val();
		var id = $('input[name="id"]').val();
		// console.log(id);
		$.post('backend/controllers/totalsales.php', {type: 'totalSales', id: id, itemType: itemType,  dateFrom: dateFrom, dateTo: dateTo }, function(data){

			data = JSON.parse(data);
			// console.log(data);


			dataInput(data);


		});
	};


	
	var overallSales = function(dateFrom,dateTo){




		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		var itemType = $('select#itemType').val();
		var id = $('input[name="id"]').val();

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

		var id = $('input[name="id"]').val();
		$.post('backend/controllers/overallsales.php', {type: 'overallsales', id: id, itemType: itemType,  dateFrom: dateFrom, dateTo: dateTo }, function(data){
			data = JSON.parse(data);
			// console.log(data);

			overSalesInput(data);
		});
	}
	


	loadData();
	overallSales();
})(jQuery);