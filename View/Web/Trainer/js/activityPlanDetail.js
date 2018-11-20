

$(document).ready(function () {
    $('button').click(function () {
        var button = this.value;
        var status = document.getElementById(button).checked;
        $.ajax({
            type: "post",
            url: "../../../Control/Trainer/actionActivityPlanDetail.php",
            data: {activityId: button, status: status},
            success: function (data) {
                alert(data);
            }
        });
        return false;
    }
    );
});
