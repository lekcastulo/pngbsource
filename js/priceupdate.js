$( document ).ready(function() {


    var inputdata = function(data){


        // console.log(data);
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
              "Id": object.id, 
              "ItemType": object.itemtype, 
              "Value": object.value,  };

              var transaction = object.transaction_no;

               clients.push(allData);

               // console.log(transaction);

        });


       // $("#grid").jsGrid("deleteItem", transaction);
    
    //    var countries = [
    //        { Name: "", Id: 0 },
    //        { Name: "United States", Id: 1 },
    //        { Name: "Canada", Id: 2 },
    //        { Name: "United Kingdom", Id: 3 }
    //    ];
    
  
         $(".jsGrid").jsGrid({
           width: "100%",
           height: "400px",
    
        //    inserting: true,
           editing: true,
           sorting: true,
           // paging: true,
    
           data: clients,
    
           fields: [
               { name: "Id", visible: false },
               { name: "ItemType", type: "text",  validate: "required" },
               { name: "Value", type: "text",  validate: "required" },
            //    { name: "OR-number", type: "text",  validate: "required" },
            //    { name: "Item Type", type: "text",  validate: "required",  items: [{Name:"Animal"}, {Name:"Car"}, {Name:"Fruit"}] },       
            //    { name: "Gram/s Sold", type: "text",  validate: "required" },
            //    { name: "Expected Price", type: "text",  validate: "required" },
            //    { name: "Selling Price", type: "text",  validate: "required" },
            //    { name: "20% Profit", type: "text",  validate: "required" },
            //    { name: "Discount", type: "text",  validate: "required" },
               { type: "control" }
           ],

           onItemUpdated: function(args) {
            
             var id = args.item['Id'];
             var itemtype = args.item['ItemType'];
             var value = args.item['Value'];

             // var Date = new Date("MM/dd/yyyy");
            //  console.log(or);

             // var Date = new Date();
             // var formattedDate = moment(Date).format(YYYYMMDD);
     

             // console.log(formattedDate);
             
             $.post('backend/controllers/priceupdate.php', { type: 'updateEdit',id:id , value,value}, function(data) {
               loadData();
             });
           },


        //    onItemDeleted: function(args) {

        //      var  TN = args.item.TN;
        //      $.post('backend/controllers/zipcode.php', { type: 'deleteProject', TN: TN }, function(data) {
        //        loadProjects();
        //      });

        //    }
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

     $.post('backend/controllers/priceupdate.php', {type: 'prices' }, function(data){
         
           data = JSON.parse(data);


           inputdata(data);
       });
   };

   // inputdata();
   loadData();


});

