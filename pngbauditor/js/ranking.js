	(function($) {

	var inputData = function(data){

		var ranking = ''

		$.each(data, function(key, object){


			// console.log(object.firstname);

			ranking += '<tr>'

			
				// ranking += '<td><b>'+i+'</b></td>';
				ranking += '<td><b>'+object.firstname+'</b></td>';
				// ranking += '<td><b>'+object.secondname+'</b></td>';
				ranking += '<td><b>'+Number(object.Total_Sales).toFixed(2)+'</font></b></td>';

		});

		$("tbody[name=rankings]").html(ranking);

		};


		 $('button[name="sum"]').click(function() {

			var dateFrom = $('input[name=dateFrom]').val();
			var dateTo = $('input[name=dateTo]').val();
			var dateTo = $('input[name=dateTo]').val();


			loadData(dateFrom,dateTo)
			totalSales(dateFrom,dateTo)
			totalTransaction(dateFrom,dateTo)
			soldItems(dateFrom,dateTo)
			
		});

	var totalSalesInput = function(data){


		var totalSales = data[0].total;

		var more = numeral(totalSales).format('0,0.00');

		// console.log(totalSales);

	

		$("h3[name=totalSales]").html('Total Sales: <b>'+more+'</b>');
		
	};

	var loadData = function(dateFrom,dateTo){

		// var id = $('select#accountnameid').val();
	
		var dateFrom = (typeof dateFrom ==='undefined') ? '2017-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;

		$.post('backend/controllers/ranking.php', {type: 'ranking', dateFrom: dateFrom, dateTo, dateTo }, function(data){
			data = JSON.parse(data);		
		// console.log (data);

			inputData(data);
		});


	};

	var totalSales = function(dateFrom, dateTo) {

		var dateFrom = (typeof dateFrom ==='undefined') ? '2017-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		
		$.post('backend/controllers/ranking.php', {type: 'salesTotal', dateFrom: dateFrom, dateTo, dateTo }, function(data){
			data = JSON.parse(data);		
		// console.log (data);

			totalSalesInput(data);
		});

	};	


	var totalTransaction = function(dateFrom, dateTo){




		var dateFrom = (typeof dateFrom ==='undefined') ? '2017-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		
		$.post('backend/controllers/ranking.php', {type: 'totalTransaction', dateFrom: dateFrom, dateTo, dateTo }, function(data){
		// console.log (data);
			data = JSON.parse(data);		

			$.each(data, function(key, object){

				// console.log(object);
				$("h3[name=totalTransaction]").html('Total transaction: <b>'+object.transaction+'</b>');

			});

			// totalSalesInput(data);
		});

	};




     var soldItems = function(dateFrom, dateTo){

  		var dateFrom = (typeof dateFrom ==='undefined') ? '2017-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;

		$.post('backend/controllers/ranking.php', {type: 'soldItem', dateFrom: dateFrom, dateTo, dateTo }, function(data){
			console.log (data);
			data = JSON.parse(data);		

			// totalSalesInput(data);

			var itemsSold = ''


			$.each(data, function(key, object){
			
			itemsSold += '<tr>'
				// console.log(object);

			
				// itemsSold += '<td><b>'+i+'</b></td>';
				itemsSold += '<td><b>'+object.item_type+'</b></td>';
				itemsSold += '<td><b>'+object.transaction+'</b></td>';
				itemsSold += '<td><b><font color="red">'+numeral(object.grams).format('0,0.00')+'</font></b></td>';
				itemsSold += '<td><b><font color="blue">'+numeral(object.total).format('0,0.00')+'</font></b></td>';
			});


			$("tbody[name=itemsSold]").html(itemsSold);

		});

	 };

		loadData();
		totalSales();
		soldItems();
		totalTransaction();
	
	})(jQuery);
