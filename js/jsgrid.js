$( document ).ready(function() {


         var inputdata = function(data){

                var clients = [];

            $.each(data, function(key, object){


                   var exact = object.item_value * object.grams;
 

                   var profit = object.item_value * object.grams   ;
                   var profit2 = object.selling_price - profit  ;
                   var profit3 = profit2 * .20  ;

                   var overall = object.selling_price - exact;

                   if (overall > 0){
                    overall = '0';
                   }

                   if (profit3 < 0){
                    profit3 = 0;
                   }


                   var allData =  { 
                   "TN": object.transaction_no, 
                   "Date": object.date, 
                   "Customer": object.customer_name, 
                   "OR-number": object.official_receipt, 
                   "Item Type": object.item_type ,  
                   "Gram/s Sold": object.grams,  
                   "Expected Price": exact, 
                   "Selling Price": object.selling_price,
                   "20% Profit": profit3,
                   "Discount": overall, };

                   var transaction = object.transaction_no;

                    clients.push(allData);

                    // console.log(transaction);

             });


            // $("#grid").jsGrid("deleteItem", transaction);
         
            var countries = [
                { Name: "", Id: 0 },
                { Name: "United States", Id: 1 },
                { Name: "Canada", Id: 2 },
                { Name: "United Kingdom", Id: 3 }
            ];
         
       
              $(".jsGrid").jsGrid({
                width: "100%",
                height: "400px",
         
                // inserting: true,
                editing: true,
                sorting: true,
                // paging: true,
         
                data: clients,
         
                fields: [
                    { name: "TN", type: "text",  validate: "required" },
                    { name: "Date", type: "text",  validate: "required" },
                    { name: "Customer", type: "text",  validate: "required" },
                    { name: "OR-number", type: "text",  validate: "required" },
                    { name: "Item Type", type: "text",  validate: "required",  items: [{Name:"Animal"}, {Name:"Car"}, {Name:"Fruit"}] },       
                    { name: "Gram/s Sold", type: "text",  validate: "required" },
                    { name: "Expected Price", type: "text",  validate: "required" },
                    { name: "Selling Price", type: "text",  validate: "required" },
                    { name: "20% Profit", type: "text",  validate: "required" },
                    { name: "Discount", type: "text",  validate: "required" },
                    { type: "control" }
                ],

                onItemUpdated: function(args) {

                  var  TN = args.item.TN;
                  var Date = args.item['Date'];
                  var itemType = args.item['Item Type'];
                  var Customer = args.item['Customer'];
                  var or = args.item['OR-number'];
                  var grams = args.item['Gram/s Sold'];
                  var sPrice = args.item['Selling Price'];

                  // var Date = new Date("MM/dd/yyyy");
                  console.log(or);

                  // var Date = new Date();
                  // var formattedDate = moment(Date).format(YYYYMMDD);
          

                  // console.log(formattedDate);
                  
                  $.post('backend/controllers/zipcode.php', { type: 'saveProject', TN: TN, Date: Date, 
                    Customer: Customer, or: or, itemType: itemType, grams: grams, sPrice: sPrice}, function(data) {
                    loadData();
                  });
                },


                onItemDeleted: function(args) {

                  var  TN = args.item.TN;
                  $.post('backend/controllers/zipcode.php', { type: 'deleteProject', TN: TN }, function(data) {
                    loadProjects();
                  });

                }
            });
        };


        $('select#accountnameid').change(function(){
          loadData();
        }); 
         
        $('button[name="sum"]').click(function() {

          var dateFrom = $('input[name=dateFrom]').val();
          var dateTo = $('input[name=dateTo]').val();


          loadData(dateFrom,dateTo)
          
        });

        $('select#itemType').change(function(){
          loadData();
        });

        var loadData = function(dateFrom, dateTo){
                
                var itemType = $('select#itemType').val();
                var id = $('select#accountnameid').val();
                var dateFrom = (typeof dateFrom ==='undefined') ? '2010-01-01': dateFrom;
                var dateTo = (typeof dateTo ==='undefined') ? '2030-01-01': dateTo;
                var itemType = $('select#itemType').val();

          $.post('backend/controllers/zipcode.php', {type: 'sales', itemType: itemType, id: id, dateFrom: dateFrom, dateTo: dateTo }, function(data){
                // console.log(sdata);
                data = JSON.parse(data);


                inputdata(data);
            });
        };

        // inputdata();
        loadData();
     

 });
