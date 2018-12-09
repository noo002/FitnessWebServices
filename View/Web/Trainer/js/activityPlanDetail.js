//
//
//$(document).ready(function () {
//    $('button').click(function () {
//        var activityId = this.value;
//
//        $.ajax({
//            type: "post",
//            url: "../../../Control/Trainer/actionActivityPlanDetail.php",
//            data: {activityId: activityId},
//            success: function (data) {
//                if (data === "1") {
//                    document.getElementById(activityId).innerHTML = "Cancel";
//                    document.getElementById(activityId).className = "btn btn-primary btn-xs";
//                    alert("This Activity is Assigned to the Plan");
//                  //  location.reload(true);
//
//
//                } else if (data === "2") {
//                    document.getElementById(activityId).innerHTML = "Select";
//                    document.getElementById(activityId).className = "btn btn-success btn-xs";
//                    alert("This Activity is Removed from the Plan");
//              //      window.location.href = "activityPlanListDetail.php";
//
//                } else {
//                    alert("Please contact IT staff for internal help");
//                }
//            }
//        });
//        return false;
//    }
//    );
//});
