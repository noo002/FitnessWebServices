$(document).ready(function(){
    $('#trainerTable').dataTable();
});
function newTrainer() {
    $('#newTrainerModal').modal();
};
function inactive(id) {
    var retVal = confirm("Do you want to inactive this account ?");
    if( retVal == true ){
        status =0;
        $.ajax({ 
            url:"../Action/trainerAdmin.php",
            data: {id:id,status:status, inactive:"inactive"},
            method:"POST", 
            success:function(data) {
                alert(data);
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
            url:"../Action/trainerAdmin.php",
            data: {id:id,status:status, active:"active"},
            method:"POST", 
            success:function(data) {
                alert('This account actived');
                location.reload();
            }
        });
    }
};
function studentDetail(id) {
   $('#studentAssignTable td').parent().remove();
    $.ajax({
        dataType: "json",
        url:"../Action/trainerAdmin.php",
        data: {id:id, getStudent:"getStudent"},
        method:"POST",
        success:function(data) {
            
            if(data.length!=0) {
                for(var x=0;x<data.length;x++) {
                gender = 'Male';
                if(data[x].gender =='1') {
                    gender = 'Female';
                }
                $('#studentAssignTable > tbody:last').append('<tr><td>'+data[x].name+'</td><td>'+gender+'</td><td>'+data[x].dob+'</td><td>'+data[x].email+'</td></tr>');
                }
                $('#studentAssignTable').dataTable();
                $('#studentModal').modal();
            }
            else{
                alert("No Student assigned on this trainer");
            }
            
        }
    });
    
};
function edit(id) {
    
    $.ajax({
        dataType:"json",
        url:"../Action/trainerAdmin.php",
        data: {id:id, getData:"getData"},
        method:"POST",
        success:function(data) {
           
            $('#editId').val(id);
            $('#editName').val(data[0].name);
            $('#editCert').val(data[0].cert);
            $('#editYear').val(data[0].year);
            if(data[0].gender =='0') {
                 $('#editMale').attr('checked', 'checked');
             }
             else{
                 $('#editFemale').attr('checked', 'checked');
             }
            $('#editTrainerModal').modal();
        }
    });
};
function checkEmail(textbox) {
    var email = document.getElementById("newEmail").value;
    $.ajax({ 
        url:"../Action/general.php",
        data: {email:email, actiont:"actiont"},
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
