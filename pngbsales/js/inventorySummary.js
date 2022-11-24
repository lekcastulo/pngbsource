(function($) {




	var dataInput = function(data){

		var summary = '';

			$.each(data, function(key, object){

				summary += '<tr>'
				summary += '<td><b>'+object.transactionNumber+'</b></td>';
				summary += '<td><b>'+object.date+'</b></td>';
				summary += '<td><b>'+object.itemtype+'</b></td>';
				summary += '<td><b>'+object.input+'</b></td>';
				summary += '<td><b>'+object.output+'</b></td>';

				// console.log(object);

			});

			$("tbody[name=itemsSummary]").html(summary);
	};

		 



	 $('button[name="sum"]').click(function() {

		var dateFrom = $('input[name=dateFrom]').val();
		var dateTo = $('input[name=dateTo]').val();


		loadData(dateFrom,dateTo)
		
	});

	 	$('select#accountnameid').change(function(){
			loadData();
		});

	
	var loadData = function(dateFrom,dateTo){

		var id = $('input[name=accountnameid]').val();

		// console.log(id);
		
		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		

			// console.log(dateFrom);
			// console.log(dateTo);
		// alert('123');

		// var itemType = $('select#itemType').val();
		// var id = $('input[name="id"]').val();
		$.post('backend/controllers/getinventory.php', {type: 'itemInventorySummary', dateFrom: dateFrom, dateTo: dateTo, id: id }, function(data){

			data = JSON.parse(data);


			dataInput(data);


		});
	};
	

	


	loadData();

})(jQuery);