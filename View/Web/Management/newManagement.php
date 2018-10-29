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
        <link rel="stylesheet" href="/resources/demos/style.css">

        <p>
            <b><a href="../../../Control/managementList.php">Management List </a> - Management Registration </b>
        </p><br/>
        <div>
            <form action="../../../Control/newManagement.php" method="post">
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
                                   pattern="[A-Za-z ]{10,255}" title="Not allow special symbol & number minimum 10 letter"class="form-control"
                                   />
                        </td>
                    </tr>
                    <tr>
                        <td><B>Gender  :</B> </td>
                        <td>
                            <input type="radio" title="Please specify your gender" required id="male" name="gender" value="1" /><label for="male" title="Please specify your gender">&nbsp;Male</label>
                            <input type="radio" title="Please specify your gender" id="female" name="gender" value="2" /><label for="female" title="Please specify your gender">&nbsp;Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Email :</b></td>
                        <td>
                            <input type="email" name="email" value="" required class="form-control" placeholder="Enter Email" maxlength="100"/>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Address :</b></td>
                        <td><input type="text" name="address" value="" maxlength="200" placeholder="Enter your address" required class="form-control" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Submit"class="btn btn-primary btn-xs" />
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