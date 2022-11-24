(function($) {



		var dataInput = function(data){

			$.each(data, function(key, object){

//				console.log(object.sf_fee);

			var totalShipping= '<b>Total Shipping Fee<br> Php </b>'+numeral(object.sf_fee).format('0,0.00');
			$("h3[name=totalshipping]").html(totalShipping);
			})


		}


		$('button[name="sum"]').click(function() {

			var dateFrom = $('input[name=dateFrom]').val();
			var dateTo = $('input[name=dateTo]').val();


			loadData(dateFrom,dateTo)
			
		});


		$('select#accountnameid').change(function(){
			loadData();
		});	


		var loadData = function(dateFrom,dateTo){
		var id = $('select#accountnameid').val();
		
		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
		var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
		

			 console.log(dateFrom);
			 console.log(dateTo);
		// alert('123');

		var itemType = $('select#itemType').val();

			console.log(id);

			$.post('backend/controllers/shippingfee.php', {type: 'shippingfee', id: id, dateFrom: dateFrom, dateTo: dateTo }, function(data){

				
				data = JSON.parse(data);
				console.log(data);
				

				dataInput(data);


			});

		};		
				

	loadData();

})(jQuery);

