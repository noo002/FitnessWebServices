
<title>Food List</title>
        <?php
        require_once 'header.php';
        ?>
        <script>
            document.getElementById('pathLocation').innerHTML = "Food List";


            var dashboard = document.getElementById('dashboard');
            var trainerList = document.getElementById('trainerList');
            var traineeList = document.getElementById('traineeList');
            var userList = document.getElementById('userList');
            var foodList = document.getElementById('foodList');
            var activityList = document.getElementById('activityList');


            dashboard.classList.remove('active');
            traineeList.classList.remove('active');
            userList.classList.remove('active');
            trainerList.classList.remove('active');
            activityList.classList.remove('active');


            foodList.classList.add('active');
        </script>

        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Food List</h4>
                                <p>
                                    <?php
                                    for ($d = 0; $d < 221; $d++) {
                                        echo "&nbsp;";
                                    }
                                    ?>
                                    <a href="newFood.php"><button class='btn btn-success'>Insert new food</button></a>
                                </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form method="post" action="../../Control/Management/actionFood.php">
                                    <table class="table table-striped table-bordered table-hover table-striped" id="foodListTable">
                                        <thead>
                                            <tr>
                                                <th style="color: black">Name</th>
                                                <th style="color: black">Calories</th>
                                                <th style="color: black">Fat(g)</th>
                                                <th style="color: black">Protein(g)</th>
                                                <th style="color: black">Carbohydrate(g)</th>
                                                <th style="color: black">Unit Measurement(g/ml)</th>
                                                <th style="color: black">Food Status</th>
                                                <th style="color: black">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $foodList = $_SESSION['foodList'];
                                            foreach ($foodList as $row => $key) {
                                                echo "<tr>";
                                                echo "<td>$key->name</td>";
                                                echo "<td>$key->calories</td>";
                                                echo "<td>$key->fat</td>";
                                                echo "<td>$key->protein</td>";
                                                echo "<td>$key->carbohydrate</td>";
                                                echo "<td>$key->unitOfMeasurement</td>";
                                                $edit = '<td><button value="' . $key->foodId . '" name="edit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</button>&nbsp;';
                                                $Inactive = '<button value="' . $key->foodId . '"  name="status" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Inactive</button></td>';
                                                $active = '<button value="' . $key->foodId . '"  name="status" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"></span> Active</button></td>';
                                                if ($key->foodStatus == 1) {
                                                    echo "<td>Active</td>";
                                                    echo $edit;
                                                    echo $Inactive;
                                                } else if ($key->foodStatus == 2) {
                                                    echo "<td>Inactive</td>";
                                                    echo $edit;
                                                    echo $active;
                                                } else {
                                                    echo "<td>Error occur</td>";
                                                }

                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php
        require_once 'footer.php';
        ?>
        <script>
        $(document).ready(function(){
            $("#foodListTable").DataTable();
        });
        </script>
