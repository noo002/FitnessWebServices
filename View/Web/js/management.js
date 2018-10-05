$(document).ready(function(){
    $('#managementTable').dataTable();
});
function newManagement() {
    $('#newManagementModal').modal();
};
function editManagement(id) {
    
    $.ajax({ 
        dataType: "json",
        url:"../Action/management.php",
        data: {id:id, getData:"getData"},
        method:"POST", 
         success:function(data) {
             $('#editId').val(id);
             $('#editName').val(data[0].name);
             $('#editManagementModal').modal();
             if(data[0].gender =='0') {
                 $('#editMale').attr('checked', 'checked');
             }
             else{
                 $('#editFemale').attr('checked', 'checked');
             }
         }
    });
    
}
function checkEmail(textbox) {
    var email = document.getElementById("newEmail").value;
    $.ajax({ 
        url:"../Action/general.php",
        data: {email:email, actionm:"actionm"},
        method:"POST", 
        success:function(data) {
            if(data==1) {
                textbox.setCustomValidity('This email already used.');
            }
            else{
                textbox.setCustomValidity('');
            }
        }
    });
};
function inactive(id) {
    var retVal = confirm("Do you want to inactive this account ?");
    if( retVal == true ){
        status =0;
        $.ajax({ 
            url:"../Action/management.php",
            data: {id:id,status:status, active:"active"},
            method:"POST", 
            success:function(data) {
                alert('This account inactive');
                location.reload();
            }
        });
    }
    
};
function active(id) {
    var retVal = confirm("Do you want to active this account ?");
    if( retVal == true ){
        status =1;
        $.ajax({ 
            url:"../Action/management.php",
            data: {id:id,status:status, active:"active"},
            method:"POST", 
            success:function(data) {
                alert('This account actived');
                location.reload();
            }
        });
    }
    
};