(function($) {




	var dataInput = function(data){

		// console.log(data);

		var summary = '';
			  
			$.each(data, function(key, object){

				summary += '<tr>'

				

				totalremain = object.totalinput - object.totalgrams;
				console.log(totalremain);

				summary += '<td style="text-align:left;"><b>'+object.memberFirstname+'</b></td>';
				// summary += '<td style="text-align:left;"><b>'+object.totalgramsremaining+'</b></td>';
				summary += '<td style="text-align:left;"><b>'+numeral(totalremain).format('0,0.00')+'</b></td>';
				// console.log(tot);

			});

			$("tbody[name=itemsSummary]").html(summary);
	};

		 





	
	var loadData = function(){
		$.post('backend/controllers/getremaininggrams.php', {type: 'getRemainingGrams' }, function(data){
			data = JSON.parse(data);
			dataInput(data);
		});
	};
	

	


	loadData();

})(jQuery);
