(function($) {



    var dataInput = function(data){

      var table = '';

    	$.each(data, function(key, object){

    			table += '<tr>'

				table += '<td><b>'+object.customer_name+'</b></td>';
				table += '<td><b>'+object.transactions+'</b></td>';
				table += '<td><b>'+numeral(object.total_buys).format('0,0.00')+'</b></td>';
			

    		// console.log(object);

    	});
    		$("tbody[name=inhouse]").html(table);
    };

	
		$('select#limitOption').change(function(){
			loadData();
		});	

	var loadData = function(dateFrom,dateTo){


		var limit = $('select#limitOption').val();
		// var id = id;
		// console.log(limit);
		$.post('backend/controllers/inhousereseller.php', {type: 'inhousereselling', limit: limit}, function(data){

			// console.log(data);
			data = JSON.parse(data);


			dataInput(data);


		});
	};
	

	


	loadData();

})(jQuery);