$( document ).ready(function() {

  
    var editingGrams = function(){
  
      $.post('backend/controllers/editing.php', {type: 'editingGrams'}, function(data){
          // console.log(data);
          data = JSON.parse(data)
  
            editGramsData(data);
          
      });
    }
  
    var editGramsData = function(data){
  
        
      requestCustomer = [];
  
        $.each(data, function(key, object){
  
        
  
            var requestor = object.firstname+' '+object.secondname;
            // console.log(data);
  
            var allData = {
  
              "Request No": object.edit_transaction,
              "OR Date": object.ordate,
              "Request Date": object.date,
              "Member ID": object.member_id,
              "Requestor Name": requestor,
              "Old Grams":object.existing_grams,
              "Requested Grams":object.grams,
              "OR Number": object.or_number,
              "AE Reason": object.reason,
              "Status": object.status,  
                
  
            }
  
          
  
            requestCustomer.push(allData);
  
            // console.log(allData);
  
            
  
        });
  
        $(".jsGrid2").jsGrid({
          width: "100%",
          height: "400px",
  
          // inserting: true,
          editing: true,
          sorting: true,
          paging: true,
          selecting: true,
  
          data: requestCustomer,
  
          fields: [
              { name: "Request No", type: "text",  validate: "required" },
              { name: "OR Date", type: "text",  validate: "required" },
              { name: "Request Date", type: "text",  validate: "required" },
              { name: "Member ID", type: "text",  validate: "required" },
              { name: "Requestor Name", type: "text",  validate: "required" }, 
              { name: "Old Grams", type: "text",  validate: "required" },      
              { name: "Requested Grams", type: "text",  validate: "required" },
              { name: "OR Number", type: "text",  validate: "required" },
              { name: "AE Reason", type: "text",  validate: "required" },
              { name: "Status", type: "text",  validate: "required" },
              { name: "For Approval", type: "select", items: [ "For Edit", "Approved" , "Not Approved" ]},
              { name: "Reason For Approved/Not Approved", type: "text",  validate: "required" },
              { type: "control"},
          ],
  
          onItemUpdated: function(args) {



            console.log(args.item);
  
            
  
  
  
            var requestno = args.item['Request No'];
            var approval = args.item['For Approval'];
            var grams = args.item['Requested Grams'];
            var member = args.item['Member ID'];
            var or = args.item['OR Number'];
            var adminreason = args.item['Reason For Approved/Not Approved'];
  
            // console.log(member);
  
            if (approval == 1) {
                approval = 'Approved';
            }
  
            if (approval == 2) {
              approval = 'Not Approved';
          }
          
  
  
            // console.log(adminreason);
            // console.log(approval);
            // console.log(requestno);
            // console.log(or);
            // console.log(customer);
            // console.log(member);
            
  
            
            $.post('backend/controllers/editing.php', { type: 'editingGramsRequest', member:member,or:or, grams:grams, approval:approval, adminreason:adminreason, requestno: requestno}, function(data) {
              loadData();
            });
          },
  
  
          onItemDeleted: function(args) {
  
            // var  TN = args.item.TN;
            // $.post('backend/controllers/zipcode.php', { type: 'deleteProject', TN: TN }, function(data) {
            //   loadData();
  
            // });
  
          }
  
  
          });
  
    }

  

  editingGrams();
  
  
  })(jQuery);
  