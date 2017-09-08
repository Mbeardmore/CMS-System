<?php

include "Includes/header.php";

if (isset($_SESSION['ID']) && $_SESSION['user_role']=='Admin' ||  $_SESSION['user_role'] == 'Manager') {

include "Includes/navbar.php";
include "Includes/sidenav.php";

echo '

<body>


<div id="wrapper">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Work order</h1>
            </div>
            <div class="form-group" style="display:inline-grid;margin-left:1%;">
                <label for="jobtype"> Job Type </label>
                <select class="selectpicker" name="Jobtype">
                    <option value="Stone_rest">Stone Floor Restoration</option>
                    <option value="wood_rest">Wood Floor Restoration</option>
                    <option value="Hardfloor_rest">Hard Floor Restoration</option>
                    <option value="carpet_clean">Carpet Cleaning</option>
                    <option value="Slip_Treatment">Slip Treatment</option>
                    <option value="Apple_Strip_FOH">Apple Deep & Seal FOH</option>
                    <option value="Apple_ardex">Apple Ardex Removal</option>
                    <option value="Apple_hone">Apple Stone Honing</option>
                    <option value="Apple_strip_BOH">DApple Strip & Seal BOH</option>

                   

                </select>
                </div>
        </div>
        <!-- /.row -->
        <div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
                  Work Order Form
                  <div class="panel_heading" style="float:right">';
                  echo "<b>Creator:</b>" . " " . $_SESSION['u_first'] . " " . $_SESSION['u_last'];
                  echo'
                  </div>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group" style="float:left;width:45%;">
                    <label for="title">Job Location</label>
                    <input type="text" class="form-control" name="job_location">
                </div>
                <div class="form-group" style="float:right;width:45%">
                    <label for="title">Work Order Number</label>
                    <input type="text" placeholder="WO1123423" class="form-control" name="wo_number">
                </div>
                <div class="form-group" style="float:right;width:25%;position:relative;right:20%">
                    <label for="title">Floor Size</label>
                    <input type="text" placeholder="324sqm" class="form-control" name="floor_size">
                </div>
                <div class="form-group" style="max-width:25%; display:block;">
                    <label for="exampleSelect1">Active</label>
                    <select class="form-control" id="exampleSelect1" name="Active">
                        <option value="Not Active">Not Active</option>
                        <option value="Active">Active </option>
                    </select>
                </div>
                <div class="form-group" name="dates" style="display:inline-table;">
                <div class="form-group" style="max-width:45%;float:left;">
                    <label for="date"> Start Date </label>
                    <input type="date" class="form-control" id="date" name="start_date">
                </div>
                <div class="form-group" style="max-width:45%;float:right">
                    <label for="date"> End Date </label>
                    <input type="date" class="form-control" id="date" name="end_date">
                </div>
                </div>
                <div class="form-group" style="display:inline-grid;position:relative;right:22.6%;top:10px;"">
                <label for="assigned"> Assign Users </label>
                <select class="selectpicker" name="assigned[]" multiple data-actions-box="true" data-live-search="true">';
                usersearch();
                echo '
                </select>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group" style="max-width:45%;display:block;" style="padding-left: 0px;"">
                    <label for="post_content">Job Details</label>
                    <textarea class="form-control " name="Job-Details" id="" cols="30" rows="10">
                    </textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="create_wo" value="create">
                </div>

            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>';


if (isset($_POST['create_wo'])) {
  createworkorder();
}
} else {
      header ("Location: ../index.html");
       }


      include "Includes/footer.php";
      ?>
