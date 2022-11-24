(function($) {
	var dataInput = function(data){

		var table = '';
		var sorting = [];

		$.each(data, function(key, object){

//			 console.log(object);

			table += '<tr>'
			table += '<td><b>'+object.date+'</b></td>';
			// table += '<td><b>'+object.transaction_no+'</b></td>';
                        table += '<td>'+object.contact+'</td>';
			table += '<td>'+object.customer_name+'</td>';
			table += '<td><b><font color="red">'+object.official_receipt+'</font></b></td>';

			table += '<td>'+object.item_type+'</td>';
			// table += '<td>'+object.item_value+'</td>';
			table += '<td>'+numeral(object.grams).format('0,0.00')+'</td>';

			var exact = object.item_value * object.grams;

			table += '<td>'+numeral(exact).format('0,0.00')+'</td>';


			table += '<td><b><font color="#880080">'+numeral(object.selling_price).format('0,0.00')+'</font></b></td>';

			var profit = object.item_value * object.grams   ;
			var profit2 = object.selling_price - profit  ;
			var profit3 = profit2;

			if (profit3 < 0){

				table += '<td><b><font color="blue">'+0+'</font></b></td>';		
			} else{
			table += '<td><b><font color="blue">'+numeral(profit3).format('0,0.00')+'</font></b></td>';
			}

			if (profit3 < 0){
				profit3 = 0;
			}
			table += '<td>'+numeral(object.sf).format('0,0.00')+'</td>';
			
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

//		console.log(allfiles);

		var inserprofit = '<b>Sales Profit<br> Php </b>'+numeral(allfiles).format('0,0.00');


		$("h3[name=totalprofit]").html(inserprofit);
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
