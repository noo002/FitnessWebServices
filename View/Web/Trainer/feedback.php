<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        require_once '../../../Model/feedback.php';
        require_once './header.php';
        ?>
        <p>

            <b><a href="../../../Control/Trainer/activityPlanList.php">Activity Plan</a> - Feedback - <?php echo $_SESSION['activityPlanDescription'] ?></b>
            <?php
            $fullStar = '<span class="fa fa-star checked"></span>';
            $halfStar = '<span class="fa fa-star-half-full checked"></span>';
            $blackStar = '<span class="fa fa-star"></span>';
            $feedbackList = $_SESSION['feedbackList'];
            $totalRating = 0;

            foreach ($feedbackList as $row => $key) {
                $totalRating = $totalRating + $key->rating;
            }
            if($totalRating == 0){
               
            }
            else{
                $totalRating = $totalRating / sizeof($feedbackList);
            }
            ?>
        </p>
        <br/>
        <div id="totalRating" style="text-align: center;" >

            <p style="float:left;position: relative;left:400px;"><b>
                    <?php
                    echo $totalRating . "<br/>";
                    if ($totalRating < 1) {
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
        <script>
            $(document).ready(function () {
                $("#feedback").dataTable();
            });
        </script>
        <table id="feedback">
            <thead>
                <tr>
                    <th>Rating</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($feedbackList as $row =>$key){
                    echo "<tr>";
                    if ($totalRating < 1) {
                        echo "<td>".$halfStar, $blackStar, $blackStar, $blackStar, $blackStar."</td>";
                    } else if ($totalRating == 1) {
                        echo "<td>".$fullStar, $blackStar, $blackStar, $blackStar, $blackStar."</td>";
                    } else if ($totalRating > 1 && $totalRating < 2) {
                        echo "<td>".$fullStar, $halfStar, $blackStar, $blackStar, $blackStar."</td>";
                    } else if ($totalRating == 2) {
                        echo "<td>".$fullStar, $fullStar, $blackStar, $blackStar, $blackStar."</td>";
                    } else if ($totalRating > 2 && $totalRating < 3) {
                        echo "<td>".$fullStar, $fullStar, $halfStar, $blackStar, $blackStar."</td>";
                    } else if ($totalRating == 3) {
                        echo "<td>".$fullStar, $fullStar, $fullStar, $blackStar, $blackStar."</td>";
                    } else if ($totalRating > 3 && $totalRating < 4) {
                        echo "<td>".$fullStar, $fullStar, $fullStar, $halfStar, $blackStar."</td>";
                    } else if ($totalRating == 4) {
                        echo "<td>".$fullStar, $fullStar, $fullStar, $fullStar, $blackStar."</td>";
                    } else if ($totalRating > 4 && $totalRating < 5) {
                        echo "<td>".$fullStar, $fullStar, $fullStar, $fullStar, $halfStar."</td>";
                    } else if ($totalRating == 5) {
                        echo "<td>".$fullStar, $fullStar, $fullStar, $fullStar, $fullStar."</td>";  
                    }
                    echo "<td>$key->description</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <style type="text/css">
            .checked{
                color:orange;
            }
        </style>
        <br/>  <br/>  
        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
