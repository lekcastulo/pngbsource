$( document ).ready(function() {

   
    var editGramsData = function(data){

        
        requestGrams = [];
  
          $.each(data, function(key, object){
  
           
  
              var requestor = object.firstname+' '+object.secondname;
              // console.log(requestor);
  
              var allData = {
  
                "Request No": object.edit_transaction,
                "Request Date": object.date,
                "Member ID": object.member_id,
                "Requestor Name": requestor,
                "Grams":object.grams,
                "OR Number": object.or_number,
                "AE Reason": object.reason,
                "Status": object.status, 
                "Request Status": object.request_status, 
                
                   
  
              }
  
             
  
              requestGrams.push(allData);
  
              
  
          });
  
          $(".jsGrid").jsGrid({
            width: "100%",
            height: "400px",
     
            // inserting: true,
          //   editing: true,
            sorting: true,
            paging: true,
            selecting: true,
     
            data: requestGrams,
     
            fields: [
                { name: "Request No", type: "text",  validate: "required" },
                { name: "Request Date", type: "text",  validate: "required" },
              //   { name: "Member ID", type: "text",  validate: "required" },
              //   { name: "Requestor Name", type: "text",  validate: "required" },       
                { name: "Grams", type: "text",  validate: "required" },
                { name: "OR Number", type: "text",  validate: "required" },
                { name: "AE Reason", type: "text",  validate: "required" },
                { name: "Status", type: "text",  validate: "required" },
                { name: "Request Status", type: "text",  validate: "required" },
                
              //   { name: "For Approval", type: "select", items: [ "For Edit", "Approved" , "Not Approved" ]},
              //   { name: "Reason For Approved/Not Approved", type: "text",  validate: "required" },
              //   { type: "control"},
            ],
  
            onItemUpdated: function(args) {
  
              
             
    
             
            
            },
  
  
            onItemDeleted: function(args) {
  
              
            }
  
  
          });
  
    }
  
    var editingGrams = function(){

        $.post('backend/controllers/editing.php', {type: 'editingGrams'}, function(data){
            // console.log(data);
            data = JSON.parse(data)

              editGramsData(data);
            
        });
    }


  editingGrams();

})(jQuery);