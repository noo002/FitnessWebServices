
<title>User List</title>
        <?php
        require_once 'header.php';
        ?>
        <script>
            document.getElementById('pathLocation').innerHTML = "User List";
            var dashboard = document.getElementById('dashboard');
            var trainerList = document.getElementById('trainerList');
            var traineeList = document.getElementById('traineeList');
            var userList = document.getElementById('userList');
            var foodList = document.getElementById('foodList');
            var activityList = document.getElementById('activityList');


            dashboard.classList.remove('active');
            traineeList.classList.remove('active');
            userList.classList.remove('active');
            foodList.classList.remove('active');
            activityList.classList.remove('active');


            userList.classList.add('active');
        </script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">User List</h4>
                                <p>
                                    <?php
                                    for ($d = 0; $d < 221; $d++) {
                                        echo "&nbsp;";
                                    }
                                    ?>
                                    <a href="NewUser.php"><button class='btn btn-success'>Insert New User</button></a>
                                </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form method="post" action="../../Control/Management/actionManagement.php">
                                    <table class="table table-striped table-bordered table-hover table-striped" id="userListTable">
                                        <thead>
                                            <tr>
                                                <th style="color:black">Name</th>
                                                <th style="color:black">Gender</th>
                                                <th style="color:black">Email</th>
                                                <th style="color:black">Status</th>
                                                <th style="color:black">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $management = $_SESSION['managementList'];

                                            foreach ($management as $row => $key) {
                                                echo "<tr>";
                                                echo "<td>$key->name</td>";
                                                echo "<td>$key->gender</td>";
                                                echo "<td>$key->email</td>";
                                                if ($key->active == 1) {
                                                    echo "<td>Active</td>";
                                                    $inactive = "<td><button class='btn btn-danger btn-xs' name='activation' value='$key->managementId'><span class='glyphicon glyphicon-remove'></span>Inactive</button></td>";
                                                    echo $inactive;
                                                } else if ($key->active == 0) {
                                                    echo "<td>Inactive</td>";
                                                    $active = "<td><button class='btn btn-primary btn-xs' name='activation' value='$key->managementId'><span class='glyphicon glyphicon-ok'></span>Active</button></td>";
                                                    echo $active;
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
        $(document).ready(function () {
            $("#userListTable").DataTable();
        });
    </script>
