$(document).ready(function(){
    $('#foodTable').dataTable();
});
function newFood() {
    $('#newFoodModal').modal();  
};
function editFood(no) {
    $.ajax({ 
        dataType: "json",
        url:"../Action/food.php",
        method:"POST", 
        data: {no:no, getData:"getData"},
        success:function(data) {
            
            if(data[0].image!='') {
                $('#editImage').attr('src','data:image/png;base64,'+data[0].image);
                $("#editImageSrc").val(data[0].image);
            }
            else{
                $('#editImage').attr('src','../image/logo-small.png');
                $("#editImageSrc").val('');
            }
            $("#editId").val(no);
            $("#editName").val(data[0].name);
            $("#editCal").val(data[0].cal);
            $("#editFat").val(data[0].fat);
            $("#editProtein").val(data[0].protein);
            $("#editCarboh").val(data[0].carboh);
            $("#editBarcode").val(data[0].barcode);
            $('#editFoodModal').modal(); 
        }
    });
    
};
function deleteFood(no) {
    var retVal = confirm("Do you want to delete this food ?");
    if( retVal == true ){
        $.ajax({ 
            url:"../Action/food.php",
            method:"POST", 
            data: {no:no, delete:"delete"},
            success:function(data) {
                if(data.trim()=='fail') {
                    alert('Fail delete \nThis Food already assigned to student');
                }
                else{
                    location.reload();
                    alert('Successful deleted');
                }
            }
            
        });
    }
};
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#newImage')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
        $("#newImageSrc").val(e.target.result.substring(22));
        };
        reader.readAsDataURL(input.files[0]);
    }
};
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#editImage')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
        $("#editImageSrc").val(e.target.result.substring(22));
        };
        reader.readAsDataURL(input.files[0]);
    }
};


