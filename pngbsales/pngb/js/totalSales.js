(function($) {

	// document.body.innerHTML = number.toLocaleString();




	var dataInput = function(data){

		var table = '';



		$.each(data, function(key, object){

			// console.log(object);

			table += '<tr>'
			table += '<td><b>'+object.date+'</b></td>';
			table += '<td><b>'+object.item_type+'</b></td>';
			table += '<td><b>'+Number(object.totalgrams).toFixed(1)+' grams</b></td>';	

			// var 

			table += '<td><b>'+Number(object.totalsellingprice).toFixed(2)+'</b></td>';

			var percentage =   object.item_value * object.totalgrams;
			var percentage2 =   object.totalsellingprice - percentage;			
			var percentage3 = percentage2 * .20;

			if (percentage3 < 0 ) {
			table += '<td><b>'+0+'</b></td>';
			}
			else {
				table += '<td><b><font color="blue">'+Number(percentage3).toFixed(2)+'</font></b></td>';
			}

	

			var shortage =  object.totalsellingprice - object.expectedprice  ;

			if (shortage < 0 ){
				table += '<td><b><font color="red">'+Number(shortage).toFixed(2)+'</font></b></td>';		
			}else {
					table += '<td><b><font color="green">Good</font></b></td>';	
			}

		});


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
	

	


	loadData();

})(jQuery);