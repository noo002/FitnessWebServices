$(document).ready(function(){
    $('#myTable').dataTable();
});
$(function(){
    $('.dropdown').hover(function() {
            $(this).addClass('open');
    },
    function() {
            $(this).removeClass('open');
    });
});
$(document).ready(function(){
    $("#trainer").click(function(){
        $("#trainerModal").modal();
    });
});
$(document).ready(function(){
    $("#management").click(function(){
        $("#managementModal").modal();
    });
});

$(document).ready(function(){
    $("#managementForget").click(function(){
        $("#managementPasswordModal").modal();
    });
});
$(document).ready(function(){
    $("#trainerForget").click(function(){
        $("#trainerPasswordModal").modal();
    });
});
function managmentLogin() {
    var email = document.getElementById("managementEmail").value;
    var pass = document.getElementById("managementPassword").value;
    
    $.ajax({ 
       url:"Action/general.php",  
       method:"POST",  
       data: {email:email,pass:pass, management:"login"},
       success:function(data) {
           if(data==1) {
               location.href = 'Management/trainerList.php';
           }
           else{
               alert("Invalid Email or Password"); 
           }
       }
    });
    return false;
};
function trainerLogin() {
    var email = document.getElementById("trainerEmail").value;
    var pass = document.getElementById("trainerPassword").value;
    
    $.ajax({ 
       url:"Action/general.php",  
       method:"POST",  
       data: {email:email,pass:pass, trainer:"login"},
       success:function(data) {
           if(data==1) {
               location.href = 'Trainer/studentList.php';
           }
           else{
               alert("Invalid Email or Password"); 
           }
       }
    });
    return false;

};

function checkEmailM(textbox) {
    
    var email = textbox.value;
    
    $.ajax({ 
        url:"Action/general.php",
        data: {email:email, actionm:"actionm"},
        method:"POST", 
        success:function(data) {
            if(data==0) {
                textbox.setCustomValidity('This email not yet register');
            }
            else{
                textbox.setCustomValidity('');
            }
        }
    });
};
function checkEmailT(textbox) {
    
    var email = textbox.value;
    
    $.ajax({ 
        url:"Action/general.php",
        data: {email:email, actiont:"actiont"},
        method:"POST", 
        success:function(data) {
            if(data==0) {
                textbox.setCustomValidity('This email not yet register');
            }
            else{
                textbox.setCustomValidity('');
            }
        }
    });
};
