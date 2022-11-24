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

				

			});

			$("tbody[name=itemsSummary]").html(summary);
	};

		 



	 $('button[name="datef"]').click(function() {

		var dateFrom = $('input[name=dateFrom]').val();
		var dateTo = $('input[name=dateTo]').val();


		loadData(dateFrom,dateTo)
		
	});

	 	$('select#accountnameid').change(function(){
			loadData();
		});

		$('select#itemid').change(function(){
			loadData();
		});	


		

	
	var loadData = function(dateFrom,dateTo){

		console.log(dateFrom,dateTo);

		var id = $('select#accountnameid').val();
		var itemid = $('select#itemid').val();
	

	
		
		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;	

		// var dateFrom =  dateFrom;
		// var dateTo =  dateTo;
		

		// console.log(itemid);
		$.post('backend/controllers/getinventory.php', {type: 'itemInventorySummary', dateFrom: dateFrom, dateTo: dateTo, id: id, itemid: itemid }, function(data){

			data = JSON.parse(data);

			// console.log(data);


			dataInput(data);


		});
	};
	

	


	loadData();

})(jQuery);
