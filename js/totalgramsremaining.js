	(function($) {





// alert('12321321323');



		$('select#accountnameid').change(function(){
			loadData();
		});

	



	var loadData = function(){

		var id = $('select#accountnameid').val();
	

		$.post('backend/controllers/totalremaininggrams.php', {type: 'mytotalremaininggrams', id: id }, function(data){
		$("h3[name=totalRemaining]").html(data);
			// data = JSON.parse(data);		
            console.log(data);
			
		});


	};
		


	loadData();
	
	})(jQuery);
