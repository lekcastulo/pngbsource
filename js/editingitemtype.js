$( document ).ready(function() {

  var editingItemType= function(){

      $.post('backend/controllers/editing.php', {type: 'editingItemType'}, function(data){
        //   console.log(data);
          data = JSON.parse(data)

            editItemType(data);
          
      });
  }

  var editItemType = function(data){

      
    requestItemType = [];

      $.each(data, function(key, object){

       

          var requestor = object.firstname+' '+object.secondname;
          // console.log(requestor);

          var allData = {

            "Request No": object.edit_transaction,
            "OR Date": object.ordate,
            "Request Date": object.date,
            "Member ID": object.member_id,
            "Requestor Name": requestor,
            "Item ID": object.itemid,
            "Old Item Type":object.existing_itemtype,
            "Requested Item Type":object.changeitem,
            "Item Value":object.itemvalue,
            "OR Number": object.or_number,
            "AE Reason": object.reason,
            "Status": object.status,  
               

          }



         

          requestItemType.push(allData);

        //   console.log(allData);         

      });

      $(".jsGrid4").jsGrid({
        width: "100%",
        height: "400px",
 
        // inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        selecting: true,
 
        data: requestItemType,
 
        fields: [
            { name: "Request No", type: "text",  validate: "required" },
            { name: "OR Date", type: "text",  validate: "required" },
            { name: "Request Date", type: "text",  validate: "required" },
            { name: "Member ID", type: "text",  validate: "required" },
            { name: "Requestor Name", type: "text",  validate: "required" },       
            { name: "Old Item Type", type: "text",  validate: "required" },
            { name: "Item ID", type: "text",  validate: "required" },
            
            { name: "Requested Item Type", type: "text",  validate: "required" },  
            { name: "Item Value", type: "text",  validate: "required" },          
            { name: "OR Number", type: "text",  validate: "required" },
            { name: "AE Reason", type: "text",  validate: "required" },
            { name: "Status", type: "text",  validate: "required" },
            { name: "For Approval", type: "select", items: [ "For Edit", "Approved" , "Not Approved" ]},
            { name: "Reason For Approved/Not Approved", type: "text",  validate: "required" },
            { type: "control"},
        ],

        onItemUpdated: function(args) {

          



          var requestno = args.item['Request No'];
          var approval = args.item['For Approval'];
          var changeitem = args.item['Requested Item Type'];
          var itemid = args.item['Item ID'];
          var itemvalue = args.item['Item Value'];
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
         


          console.log(adminreason);
          console.log(approval);
          console.log(requestno);
          console.log(or);
          console.log(changeitem);
          console.log(member);
          console.log(itemvalue);        
          console.log(itemid);
          
          $.post('backend/controllers/editing.php', { type: 'editingItemTypeRequest', member:member, or:or , changeitem:changeitem, itemid:itemid, itemvalue:itemvalue,  approval:approval, adminreason:adminreason, requestno: requestno}, function(data) {
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


editingItemType();


})(jQuery);
