	(function($) {

    	var dataInput = function(data, dates){
		// $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=usdeur.json&callback=?', function (data) {

		   var options = {
		        chart: {
		        	renderTo: charts,
		            zoomType: 'x,y',
		            type: 'spline'
		        },
		        title: {
		            text: 'Daily Sales Charts'
		        },
		        subtitle: {
		            text: document.ontouchstart === undefined ?
		                    'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
		        },
		        xAxis: {
		            categories: dates
		        },
		        yAxis: {
		            title: {
		                text: 'Sales'
		            }
		        },
		        legend: {
		            enabled: false
		        },
				tooltip:{
				enabled: true,
				shared: true,
				crossHairs: true

				},
		        plotOptions: {
		            area: {
		                fillColor: {
		                    linearGradient: {
		                        x1: 0,
		                        y1: 0,
		                        x2: 0,
		                        y2: 1
		                    },
		                    stops: [
		                        [0, Highcharts.getOptions().colors[0]],
		                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
		                    ]
		                },
		                marker: {
		                    radius: 2
		                },
		                lineWidth: 1,
		                states: {
		                    hover: {
		                        lineWidth: 1
		                    }
		                },
		                threshold: null
		            }
		        },

		        series: [{
		            type: 'area',
		            name: 'Sales',
		            data: data
		        }]

		    };

			$.each(data, function(key, object){

				var seriesData = {name: key, data: []};

			   // console.log(seriesData);
			   	// options.series[0].data.push(object[0], object[1]);
			});

			   console.log(options.series[0]);

		   // options.series.push(;

		var chart = new Highcharts.Chart(options);
	};



		var loadData = function(){
			$.post('backend/controllers/charts.php' , {type: 'sales'}, function(data){


				data = JSON.parse(data);

				alldata = [];
				alldates = [];
				$.each(data, function(key, object){

				
					if (object.date == false){
						object.date = 0;
					}

				sales = [];

					var selling = object.sales;
					var n = Number(selling);
						
						var date = object.date;
						// var time = '0';
						alldates.push(date);
						// var datetime = date + time;
						// console.log(date);
						
						sales.push(date, n);

						alldata.push(sales);
			
						// console.log(sales[1]);
					
				
				});

				// console.log(alldates);
			

				dataInput(alldata, alldates);

			});
			
		}

		loadData();
	
	})(jQuery);