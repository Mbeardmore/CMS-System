<?php

include "Includes/header.php";



include "Includes/navbar.php";
include "Includes/sidenav.php";

if (isset($_SESSION['ID']) && $_SESSION['user_role']=='Admin' ||  $_SESSION['user_role'] == 'Manager') {

  $tech = $_SESSION['u_first'];

$woID = escape($_GET['view_wo']);
$query = "SELECT * FROM work_orders WHERE ID = {$woID}";


$select_wo = mysqli_query($connection, $query);

$row = mysqli_fetch_assoc($select_wo);
    $id             = $row['ID'];
    $jobtype        = $row['Job_type'];
    $creator        = $row['creator'];
    $wonum          = $row['Work_Order'];
    $jobloc         = $row['job_location'];
    $creation       = $row['date_today'];
    $datestart      = $row['date_start'];
    $dateend        = $row['date_end'];
    $Assigned       = $row['Assigned_user'];
    $jobinfo        = $row['job_info'];
    $procedures     = $row['procedures'];
    $floorsize      = $row['floor_size'];
    $status         = $row['status'];
    $contact        = $row['site_contact'];

$start = new DateTime($datestart);
$end = new DateTime($dateend);
$diff = date_diff($start,$end);
$conversion = $diff->format('%d Days'); 

$nights1 = $conversion + '1';



   
?>

<div id="wrapper">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">View Work order</h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
                    Work Order : <?php echo $wonum;?>
                  <div class="panel_heading" style="float:right">
                  
                  </div>
        </div>
                                <div class="row" id="status">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                     <?php if (isset($_SESSION['ID']) && $_SESSION['user_role']=='Admin' ||  $_SESSION['user_role'] == 'Manager') {

                            echo '
                                        <a href="#" class="btn btn-white btn-xs pull-right">Edit project</a>'; }?>
                                        <h2 style="left:4%; position:relative;">Work Order <?php echo $jobloc . " " . $wonum; ?></h2>
                                    </div>
                                    <?php
                                    switch ($status) {
                                        case 'Pending':
        
                                            ?>
                                            <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-warning"><?php echo $status; ?></span></dd>
                                       </dl> <?php
                                        
                                            break;
                                        
                                        
                                        case 'Completed':?>

                                            <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-success"><?php echo $status; ?></span></dd>
                                       </dl><?php
                                            break;

                                        case 'Cancelled':?>          

                                        <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-danger"><?php echo $status; ?></span></dd>
                                       </dl><?php
                                            break;
                                      
                                      }

                                      ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Created by:</dt> <dd><?php echo $creator; ?></dd>
                                        <dt>Nights on Site:</dt> <dd><?php echo $nights1 ?></dd>
                                        <dt>Client:</dt> <dd><a href="#" class="text-navy"> Apple</a> </dd>
                                        <dt>Contact onsite:</dt><dd> <?php echo $contact;?></dd>
                                        <dd></dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd></dd>
                                        <dt>Created:</dt> <dd><?php echo $creation; ?></dd>
                                        <dt>Assigned Technicians:</dt>
                                        <dd> <b><?php echo $Assigned ?><b></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Completed:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm" style="width:60%">
                                                <div style="width: 63.3%;" class="progress-bar"></div>
                                            </div>
                                            <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class= "row">
                                <div class= col-lg-12>
                                    <dl class="dl-horizontal">
                                        <dt></dt>
                                        <dd>    
                                            
                                              <ul class="nav nav-pills">
                                                <li class="active"><a data-toggle="pill" href="#home">Messages</a></li>
                                                <li><a data-toggle="pill" href="#menu1">Notes</a></li>
                                                <li><a data-toggle="pill" href="#menu2">Images</a></li>
                                                <li><a data-toggle="pill" href="#menu3">Job Information</a></li>
                                                <li><a data-toggle="pill" href="#menu4">Accommodation</a></li>
                                              </ul>
                                              
                                              <div class="tab-content">
                                                <div id="home" class="tab-pane fade in active">
                                                  <h3>Messages</h3>
                                                </div>
                                                <div id="menu1" class="tab-pane fade">
                                                  <h3>Notes</h3>
                                                  <form method="POST">
                                                  <div class="form-group" style="max-width:60%">
                                                    <label for="comment">Comment:</label>
                                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                                    <br>
                                                    <input class="btn btn-primary" type="submit" name="add-note">
                                                    </form>

                                                    <?php if(isset($_POST['add-note'])) {

                                                      addnote($wonum, $tech);

                                                      } ?>
                                                  </div>
                                                </div>
                                                <div id="menu2" class="tab-pane fade">
                                                  <h3>Images</h3>
                                                <div class="container" style="position:relative;right:10%">
                                                  <div class="panel panel-default">
                                                    <div class="panel-heading"><strong>Upload Images</strong> <small>job Images Upload</small></div>
                                                    <div class="panel-body">

                                                      <!-- Standar Form -->
                                                      <h4>Select files from your computer</h4>
                                                      <form action="" method="POST" enctype="multipart/form-data" id="js-upload-form">
                                                        <div class="form-inline">
                                                          <div class="form-group">
                                                            <input type="file" name="files[]" id="js-upload-files" multiple>
                                                          </div>
                                                          <button type="submit" class="btn btn-sm btn-primary" name="upload" id="js-upload-submit">Upload files</button>
                                                        </div>
                                                      </form>

                                                      <!-- Drop Zone -->
                                                      <h4>Or drag and drop files below</h4>
                                                      <div class="upload-drop-zone" id="drop-zone">
                                                        Just drag and drop files here
                                                      </div>

                                                      <!-- Progress Bar -->
                                                      <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                          <span class="sr-only">60% Complete</span>
                                                        </div>
                                                      </div>

                                                      <!-- Upload Finished -->
                                                      <div class="js-upload-finished">
                                                        <h3>Processed files</h3>
                                                        <div class="list-group">
                                                        </div>
                                                      </div>
                                                    <?php 

                                                        if(isset($_POST['upload'])) {
                                                          handleimages($jobloc, $wonum, $tech);
                                                      }

                                                     ?>
                                                    </div>
                                                  </div>
                                                </div> <!-- /container -->
                                                </div>
                                                <div id="menu3" class="tab-pane fade">
                                                  <h3>Job Information</h3>
                                                  <?php 
                                                            switch ($jobtype) {
                                                                case 'Stone_rest':
                                                                echo "";
                                                                    break;

                                                                case 'wood_rest':
                                                                echo "";
                                                                    break;

                                                                 case 'Hardfloor_rest':
                                                                echo "";
                                                                    break;

                                                                 case 'carpet_clean':
                                                                echo "";
                                                                    break;

                                                                 case 'Slip_Treatment':
                                                                echo "";
                                                                    break;

                                                                 case 'Apple_Strip_FOH':
                                                                echo "";
                                                                    break;

                                                                case 'Apple_ardex':
                                                                echo "";
                                                                    break;

                                                                case 'Apple_hone':
                                                                echo "";
                                                                    break;

                                                                case 'Apple_strip_BOH':
                                                                echo "";
                                                                    break;
                                                            }

                                                ?>
                                                </div>
                                                <div id="menu4" class="tab-pane fade">
                                                  <h3>Accomodation Information</h3>
                                                  <p>Address</p>
                                                  <p>Contact</p>
                                                </div>
                                              </div>
                                            
                                        </dd>
                                    </dl>
                                    <?php  if ($status === "Completed") {

                                    } else {

                                      echo '
                                    <div class="col-md-12 center-block" style="margin-bottom:5px;">
                                    <button id="myBtn" class="btn btn-primary center-block btn-lg" data-toggle="modal" data-target="#myModal">Complete</button>
                                    </div>';
                                  }
                                    ?>
                                </div>
                            </div>





<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Complete Details</h4>

            </div>
            <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group" style="width:40%">
                     <label for="title">Technician Signature</label>
                        <input  type="text" class="form-control" name="Tech">
                </div>
                <div class="form-group" style="width:40%;">
                     <label for="title">Client Signature</label>
                        <input  type="text" class="form-control" name="Client">
                </div>
                <label for="rating">Satisfaction Rating</label>
                <div name="rating">
                <label class="radio-inline"><input type="radio" value="1" name="optradio">1</label>
                <label class="radio-inline"><input type="radio" value="2" name="optradio">2</label>
                <label class="radio-inline"><input type="radio" value="3" name="optradio">3</label>
                <label class="radio-inline"><input type="radio" value="4" name="optradio">4</label>
                <label class="radio-inline"><input type="radio" value="5" name="optradio">5</label>
                </div> 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input class="btn btn-primary" id="submit" type="submit" name="complete_wo" value="Complete">
            </div>
            </form>
            <?php 

            if (isset($_POST['complete_wo'])) {
              completewo();
             } 
              ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    

    $(document).ready(function () {
      
    $("#modal").click(function(){
         $('#myModal').modal('show');
    });
});
</script>



<?php 
}



include "Includes/footer.php";


 ?>

 <script>
    $('#myModal').on('hidden.bs.modal', function () {
 location.reload(forceGET);
})
</script>