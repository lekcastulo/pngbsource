(function($) {




	var dataInput = function(data){

		var table = '';



		$.each(data, function(key, object){

			// console.log(object);

			table += '<tr>'
			table += '<td><b>'+object.date+'</b></td>';
			// table += '<td><b>'+object.transaction_no+'</b></td>';
			table += '<td>'+object.customer_name+'</td>';
			table += '<td>'+object.official_receipt+'</td>';
			table += '<td>'+object.item_type+'</td>';
			// table += '<td>'+object.item_value+'</td>';
			table += '<td>'+Number(object.grams).toFixed(1)+'</td>';

			var exact = object.item_value * object.grams;

			table += '<td>'+Number(exact).toFixed(2)+'</td>';


			table += '<td>'+Number(object.selling_price).toFixed(2)+'</td>';

			var profit = object.item_value * object.grams   ;
			var profit2 = object.selling_price - profit  ;
			var profit3 = profit2 * .20  ;

			if (profit3 < 0){

				table += '<td><b><font color="blue">'+0+'</font></b></td>';		
			} else{
			table += '<td><b><font color="blue">'+Number(profit3).toFixed(2)+'</font></b></td>';
			}


			var overall =   object.selling_price - exact;

			if (overall > 0 ){

				table += '<td><b><font color="green">Good</font></b></td>';
			}
			else{
			table += '<td><b><font color="red">'+overall+'</font></b></td>';
			}


		});

		$("tbody[name=metroData]").html(table);
		
		};

		

		$('select#itemType').change(function(){
			loadData();
		});		

	// var tables = function(){


	

				  

		 $('button[name="sum"]').click(function() {

			var dateFrom = $('input[name=dateFrom]').val();
			var dateTo = $('input[name=dateTo]').val();


			loadData(dateFrom,dateTo)
			
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
		$.post('backend/controllers/zipcode.php', {type: 'sales', itemType: itemType, id: id, dateFrom: dateFrom, dateTo: dateTo }, function(data){

			// console.log(data);
			data = JSON.parse(data);


			dataInput(data);


		});
	};
	

	


	loadData();

})(jQuery);