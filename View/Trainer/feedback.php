<title>Activity Plan List</title>

<?php
require_once 'header.php';

$fullStar = '<span class="fa fa-star checked"></span>';
$halfStar = '<span class="fa fa-star-half-full checked"></span>';
$blackStar = '<span class="fa fa-star"></span>';
$feedbackList = $_SESSION['feedbackList'];
$totalRating = 0;

foreach ($feedbackList as $row => $key) {
    $totalRating = $totalRating + $key->rating;
}
if ($totalRating == 0) {
    
} else {
    $totalRating = $totalRating / sizeof($feedbackList);
}
?>
<script>
    document.getElementById('pathLocation').innerHTML = "Activity Plan List";

    var dashboard = document.getElementById('dashboard');
    var traineeList = document.getElementById('traineeList');
    var activityPlan = document.getElementById('activityPlan');
    var goalList = document.getElementById('goalList');


    dashboard.classList.remove('active');
    traineeList.classList.remove('active');
    traineeList.classList.remove('active');
    goalList.classList.remove('active');


    activityPlan.classList.add('active');
</script>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-14">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Activity Plan List - Feedback</h4>
                        <div id="totalRating" style="text-align: center;" >

                            <p style="float:left;position: relative;left:400px;"><b>
                                    <?php
                                    echo $totalRating . "<br/>";
                                    if ($totalRating == 0) {
                                        echo $blackStar, $blackStar, $blackStar, $blackStar, $blackStar;
                                    } else if ($totalRating > 0 && $totalRating < 1) {
                                        echo $halfStar, $blackStar, $blackStar, $blackStar, $blackStar;
                                    } else if ($totalRating == 1) {
                                        echo $fullStar, $blackStar, $blackStar, $blackStar, $blackStar;
                                    } else if ($totalRating > 1 && $totalRating < 2) {
                                        echo $fullStar, $halfStar, $blackStar, $blackStar, $blackStar;
                                    } else if ($totalRating == 2) {
                                        echo $fullStar, $fullStar, $blackStar, $blackStar, $blackStar;
                                    } else if ($totalRating > 2 && $totalRating < 3) {
                                        echo $fullStar, $fullStar, $halfStar, $blackStar, $blackStar;
                                    } else if ($totalRating == 3) {
                                        echo $fullStar, $fullStar, $fullStar, $blackStar, $blackStar;
                                    } else if ($totalRating > 3 && $totalRating < 4) {
                                        echo $fullStar, $fullStar, $fullStar, $halfStar, $blackStar;
                                    } else if ($totalRating == 4) {
                                        echo $fullStar, $fullStar, $fullStar, $fullStar, $blackStar;
                                    } else if ($totalRating > 4 && $totalRating < 5) {
                                        echo $fullStar, $fullStar, $fullStar, $fullStar, $halfStar;
                                    } else if ($totalRating == 5) {
                                        echo $fullStar, $fullStar, $fullStar, $fullStar, $fullStar;
                                    }
                                    ?><br/>
                                    Total Rating

                                </b> </p>
                            <style type="text/css">
                                #rating{
                                    position: relative;

                                }
                            </style>
                            <p id="rating">
                                <?php
                                $five = 0;
                                $four = 0;
                                $three = 0;
                                $two = 0;
                                $one = 0;
                                foreach ($feedbackList as $row => $key) {
                                    if ($key->rating == 1) {
                                        $one = $one + 1;
                                    } else if ($key->rating == 2) {
                                        $two = $two + 1;
                                    } else if ($key->rating == 3) {
                                        $three = $three + 1;
                                    } else if ($key->rating == 4) {
                                        $four = $four + 1;
                                    } else if ($key->rating == 5) {
                                        $five = $five + 1;
                                    }
                                }
                                ?>
                                <b>5 <span class="fa fa-star"></span> - 
                                    <?php echo $five ?> People
                                </b><br/>
                                <b>4 <span class="fa fa-star"></span> - 
                                    <?php echo $four ?> People
                                </b><br/>
                                <b>3 <span class="fa fa-star"></span> - 
                                    <?php echo $three ?> People
                                </b><br/>
                                <b>2 <span class="fa fa-star"></span> - 
                                    <?php echo $two ?> People
                                </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>1 <span class="fa fa-star"></span> - 
                                    <?php echo $one ?> People
                                </b>

                            </p>    
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped table-bordered table-hover table-striped" id="feedbackTable">
                            <thead>
                                <tr>
                                    <th>Rating</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($feedbackList as $row => $key) {
                                    echo "<tr>";
                                    if ($totalRating < 1) {
                                        echo "<td>" . $halfStar, $blackStar, $blackStar, $blackStar, $blackStar . "</td>";
                                    } else if ($totalRating == 1) {
                                        echo "<td>" . $fullStar, $blackStar, $blackStar, $blackStar, $blackStar . "</td>";
                                    } else if ($totalRating > 1 && $totalRating < 2) {
                                        echo "<td>" . $fullStar, $halfStar, $blackStar, $blackStar, $blackStar . "</td>";
                                    } else if ($totalRating == 2) {
                                        echo "<td>" . $fullStar, $fullStar, $blackStar, $blackStar, $blackStar . "</td>";
                                    } else if ($totalRating > 2 && $totalRating < 3) {
                                        echo "<td>" . $fullStar, $fullStar, $halfStar, $blackStar, $blackStar . "</td>";
                                    } else if ($totalRating == 3) {
                                        echo "<td>" . $fullStar, $fullStar, $fullStar, $blackStar, $blackStar . "</td>";
                                    } else if ($totalRating > 3 && $totalRating < 4) {
                                        echo "<td>" . $fullStar, $fullStar, $fullStar, $halfStar, $blackStar . "</td>";
                                    } else if ($totalRating == 4) {
                                        echo "<td>" . $fullStar, $fullStar, $fullStar, $fullStar, $blackStar . "</td>";
                                    } else if ($totalRating > 4 && $totalRating < 5) {
                                        echo "<td>" . $fullStar, $fullStar, $fullStar, $fullStar, $halfStar . "</td>";
                                    } else if ($totalRating == 5) {
                                        echo "<td>" . $fullStar, $fullStar, $fullStar, $fullStar, $fullStar . "</td>";
                                    }
                                    echo "<td>$key->description</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .checked{
        color:orange;
    }
</style>
<?php
require_once 'footer.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>
<script>
    $(document).ready(function () {
        $("#feedbackTable").DataTable();
    });
</script>