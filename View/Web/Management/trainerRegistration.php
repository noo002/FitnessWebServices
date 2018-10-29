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

    </head>
    <body>
        <?php
        require_once '../../../Model/Management.php';
        require_once 'header.php';
        ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(document).ready(function () {
                $(function () {
                    $("#datepicker").datepicker({maxDate: new Date, minDate: new Date(1900, 1, 1),
                        howButtonPanel: true,
                        changeMonth: true,
                        changeYear: true,
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        yearRange: "1900: maxDate ",
                        dateFormat: "yy-mm-dd"
                    }
                    );
                });
            })
        </script>
        <p>
            <b><a href="../../../Control/trainerList.php">Trainer List </a> - Trainer Registration </b>
        </p><br/>
        <div>
            <form action="../../../Control/newTrainer.php" method="post">
                <table class="table table-bordered table-striped" align="center">
                    <thead>
                        <tr>
                            <th colspan="2" style="text-align: center">New Trainer Registration</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><b>Name : </b></td>
                        <td>
                            <input type="text" name="name" value="" maxlength="100" placeholder="Enter Name" required 
                                   pattern="[A-Za-z ]{10,255}" title="Not allow special symbol & number and minimum 10 letter"class="form-control"
                                   />
                        </td>
                    </tr>
                    <tr>
                        <td><B>Gender  :</B> </td>
                        <td>
                            <label><input type="radio" name="gender" value="1" />Male</label>&nbsp; 
                            <label><input type="radio" name="gender" value="2" />Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Email :</b></td>
                        <td>
                            <input type="email" name="email" value="" required class="form-control" placeholder="Enter Email" maxlength="100"/>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Certificate :</b></td>
                        <td><input type="text" name="cert" value=""  required maxlength="100"
                                   pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number" class="form-control" placeholder="Enter your certification"/></td>
                    </tr>
                    <tr>
                        <td><b>Address :</b></td>
                        <td><input type="text" name="address" value="" maxlength="200" placeholder="Enter your address" required class="form-control" /></td>
                    </tr>
                    <tr>
                        <td><b>Date Of Birth : </b> </td>
                        <td><input type="text" required name="birthdate"  id="datepicker" value="" readonly class="form-control" placeholder="Select your birthdate" /></td>
                    </tr>
                    <tr>
                        <td><b>Year of Experience : </b></td>
                        <td><input type="number" name="year" value="" required class="form-control" placeholder="Enter year experience" title="only enter number" min="0" max="50"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Add"class="btn btn-primary btn-xs" />
                            <input type="reset" value="Reset"  class="btn btn-xs btn-danger delete"/>
                        </td>
                    </tr>
                    <tfoot>
                        <tr>
                            <td colspan="2"class="alert alert-info">
                                <strong>
                                    <ul>
                                        <li>Password will send through the email.</li>
                                        <li>Email cannot change after insert.</li>
                                    </ul>
                                </strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>




        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
