$( document ).ready(function() {

 

    
	var dataInput = function(data){

       

		// var summary = '';

			$.each(data, function(key, object){

                totalgrams = object.grams_sold;
                console.log(object);

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





	var loadData = function(dateFrom, dateTo){

        var id = $('select#accountnameid').val();

        console.log(id);
        console.log(dateFrom);
        console.log(dateTo);


		var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
        var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;	
        
     


        $.post('backend/controllers/irsales.php', {type: 'getirsales', accountname: id ,dateFrom: dateFrom, dateTo: dateTo}, function(data){

            // data = JSON.parse(data);
            // console.log(data);
            // inputData(data);

        

            totalir = JSON.parse(data);
            

            console.log(totalir);

            
            // dataInput(data);

            $("h3[name=totalgrams]").html(totalir);


        });



	};
		





	loadData();
	
 });
