$(document).ready(function(){
    $('#myTable').dataTable();
    $('#myTable2').dataTable();
    
    $('#myTable3').dataTable();
    
    $('#newPlanModal input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
            $(this).parents("tr").find("#newTime").removeAttr("disabled"); 
        }
        else if($(this).prop("checked") == false){
            var grandTotal = parseInt($("#newTotalCal").html());
            var subTotal = parseInt($(this).parents("tr").find("#newSubCal").html());
            $("#newTotalCal").html(grandTotal-subTotal);
            $(this).parents("tr").find("#newSubCal").html(0);
            $(this).parents("tr").find("#newTime").val("");
            $(this).parents("tr").find("#newTime").attr("disabled", "disabled");
        }
    });
    
    $('#editPlanModal2 input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
            $(this).parents("tr").find("#editTime").removeAttr("disabled"); 
        }
        else if($(this).prop("checked") == false){
            var grandTotal = parseInt($("#newTotalCal").html());
            var subTotal = parseInt($(this).parents("tr").find("#editSubCal").html());
            $("#newTotalCal").html(grandTotal-subTotal);
            $(this).parents("tr").find("#editSubCal").html(0);
            $(this).parents("tr").find("#editTime").val("");
            $(this).parents("tr").find("#editTime").attr("disabled", "disabled");
        }
    });
    $('#newPlanModal input[type="number"]').change(function() {
        var grandTotal =0;
        var time = $(this).parents("tr").find("#newCal").html();
        $(this).parents("tr").find("#newSubCal").html(time*this.value);
        
        $.each($('#newPlanModal input[type="checkbox"]'), function(){  
            var subTotal = parseInt($(this).parents("tr").find("#newSubCal").html());
            grandTotal = grandTotal+subTotal;
        });
        $("#newTotalCal").html(grandTotal);
    });
    
    $('#editPlanModal2 input[type="number"]').change(function() {
        var grandTotal =0;
        var time = $(this).parents("tr").find("#editCal").html();
        $(this).parents("tr").find("#editSubCal").html(time*this.value);
        
        $.each($('#editPlanModal2 input[type="checkbox"]'), function(){  
            var subTotal = parseInt($(this).parents("tr").find("#editSubCal").html());
            grandTotal = grandTotal+subTotal;
        });
        $("#editTotalCal").html(grandTotal);
    });


});
function deletePlan(no) {
    var retVal = confirm("Do you want to continue ?");
    if( retVal == true ){
        $.ajax({ 
          url:"../Action/activityPlan.php",
          method:"POST", 
          data: {no:no, delete:"delete"},
          success:function(data) {
              location.reload();
              alert(data);
          }
        });
    } 
};
function updatePlan() {
    
    var num =0;
    var activityNo = [];
    var time = [];
    var no = $('#editNo').val();
    $.each($("input[type='checkbox']:checked"), function(){  
        activityNo.push($(this).val());
        time.push($(this).parents("tr").find("#editTime").val());
        num++;
    });
    if(num==0) {
            alert("Please select least one activity");
            return false;
    }
    else{
        
        $.ajax({ 
            url:"../Action/activityPlan.php",
            method:"POST", 
            data: {no:no,activityNo:activityNo,time:time,name:$("#editName").val(), edit:"edit"},
            success:function() {
                location.reload();
                alert('Update Successful');
            }
        });

    }
};
function editPlan(no) {
    /**
    activityNo = 1;
    value = 50;
    $('#chk'+activityNo).attr('checked', true);
    $('#chk'+activityNo).parents("tr").find("#editTime").removeAttr("disabled");
    var cal = $('#chk'+activityNo).parents("tr").find("#editCal").html();
    $('#chk'+activityNo).parents("tr").find("#editSubCal").html(cal*value);
    $('#editPlanModal2').modal();
    */
    $.ajax({ 
        dataType: "json",
        url:"../Action/activityPlan.php",
        method:"POST", 
        data: {no:no, getSelected:"getSelected"},
        success:function(data) {
            $('#editNo').val(no);
            $('#editName').val(data[0].name);
            var grandTotal = 0;
            for(var x=0;x<data.length;x++) {
                
                $('#chk'+data[x].activityNo).attr('checked', true);
                $('#chk'+data[x].activityNo).parents("tr").find("#editTime").removeAttr("disabled");
                $('#chk'+data[x].activityNo).parents("tr").find("#editTime").val(data[x].time);
                var cal = $('#chk'+data[x].activityNo).parents("tr").find("#editCal").html();
                var subTotal = cal*data[x].time;
                grandTotal = grandTotal +subTotal;
                $('#chk'+data[x].activityNo).parents("tr").find("#editSubCal").html(subTotal);
            }
            $("#editTotalCal").html(grandTotal);
            $('#editPlanModal2').modal();
        }
    });
    
    /**
     * 
     
    $('#myTable3 td').parent().remove();
    $("#editNo").val(no);
    $.ajax({
        url:"../Action/activityPlan.php",
        method:"POST", 
        data: {no:no, getName:"getName"},
        success:function(data) {
          $("#editName").val(data);
      }
    });
    $.ajax({ 
      dataType: "json",
      url:"../Action/activityPlan.php",
      method:"POST", 
      data: {no:no, allActitviy:"allActitviy"},
      success:function(data) {
          var grandTotal = 0;
          for(var x=0;x<data.length;x++) {
              var checkbox = "checked";
              var textbox = "";
              var value = data[x].time;
              var totalCal = 0;
              if(data[x].time==null) {
                  checkbox ='';
                  textbox ='disabled';
                  value ='';
              }
              else{
                  totalCal = value * data[x].cal;
                  grandTotal =grandTotal+totalCal;
              }
              $('#myTable3 > tbody:last').append('<tr data-toggle="tooltip" title="'+data[x].desc+'">\n\
                <td><input type="checkbox" value="'+data[x].no+'" '+checkbox+' /></td>\n\
                <td><img src="data:image/png;base64, '+data[x].image+'" width="80px" height="80px"/></td>\n\
                <td>'+data[x].name+'</td><td id="editCal">'+data[x].cal+'</td>\n\
                <td><input type="number" class="form-control" onChange="editCheckTextbox()" id="editTime" value="'+value+'" '+textbox+' required min="1" /></td ><td id="editTotalCal">'+totalCal+'</td>\n\
                </tr>');
          }
          $('#editGrandTotal').html(grandTotal);
          $('#myTable3').dataTable();
          $("#editPlanModal").modal(); 
      }
    });*/
};
function planDetail(no) {
    var totalCal=0;
    $('#activtiyPlan td').parent().remove();
    $.ajax({ 
      url:"../Action/activityPlan.php",
      method:"POST", 
      data: {no:no, getName:"getName"},
      success:function(data) {
          $('#planTitle').html(data);
      }
    });
    $.ajax({ 
        dataType: "json",
        url:"../Action/activityPlan.php",
        method:"POST", 
        data: {no:no, getAll:"getAll"},
        success:function(data) {
          for(var x=0;x<data.length;x++) {
             
              $('#activtiyPlan > tbody:last').append('<tr data-toggle="tooltip" title="'+data[x].desc+'">\n\
<td><img src="data:image/png;base64, '+data[x].image+'" width="80px" height="80px"/></td>\n\
<td>'+data[x].name+'</td>\n\
<td>'+data[x].time+'</td>\n\
<td>'+data[x].cal+'</td></tr>');
               
              totalCal =totalCal+ data[x].cal;
          }
         
          $('#activtiyPlan').DataTable();
          $("#detailActivityModal").modal(); 
          $('#totalCal').html(totalCal);
      }
    });
};
function newPlan() {
    $("#newPlanModal").modal();  
};
function addNewPlan() {
    var num =0;
    var activityNo = [];
    var time = [];
    $.each($("input[type='checkbox']:checked"), function(){  
        activityNo.push($(this).val());
        time.push($(this).parents("tr").find("#newTime").val());
        num++;
    });
    if(num==0) {
            alert("Please select least one activity");
            return false;
    }
    else{
        
        $.ajax({ 
            url:"../Action/activityPlan.php",
            method:"POST", 
            data: {no:activityNo,time:time,name:$("#newName").val(), new:"new"},
            success:function(data) {
                location.reload();
                alert(data);
            }
        });
    }
};

