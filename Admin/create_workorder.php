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
            <!-- /.col-lg-12 -->
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
                <div class="form-group" style="max-width:30%;float:left;">
                    <label for="date"> Date Starts </label>
                    <input type="date" class="form-control" id="date" name="start_date">
                </div>
                <div class="form-group" style="max-width:30%;float:right;position:relative;right:75%">
                    <label for="date"> End Date </label>
                    <input type="date" class="form-control" id="date" name="end_date">
                </div>
                <div class="form-group" style="float:right;position: fixed;right: 28%;display: grid;"">
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
                <div class="form-group" style="max-width:45%;display:block;" style=""">
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
