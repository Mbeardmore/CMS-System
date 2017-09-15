<?php

include "Includes/header.php";


if (isset($_SESSION['ID']) && $_SESSION['user_role']=='Admin' ||  $_SESSION['user_role'] =='Manager') {

include "Includes/navbar.php";

include "Includes/sidenav.php";

echo '

<body>


 <div id="wrapper">

   <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Item Additions
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

    <form action="" method="POST" enctype="multipart/form-data">

      <div class="form-group">
         <label for="title">username</label>
          <input   type="text" class="form-control" name="user">
      </div>
      <div class="form-group" style="width:40%;float:left;">
         <label for="title">First Name</label>
          <input   type="text" class="form-control" name="f_name">
      </div>
      <div class="form-group" style="width:40%;float:right;">
         <label for="title">Last Name</label>
          <input   type="text" class="form-control" name="l_name">
      </div>
      <div class="form-group" style="width:40%;float:right;">
         <label for="title">email</label>
          <input  type="text" class="form-control" name="email">
      </div>
      <div class="form-group" style="width:20%;">
         <label for="title">password</label>
          <input  type="password" class="form-control" name="pwd">
      </div>
      <div class="form-group" style="max-width:25%; display:block;">
          <label for="exampleSelect1">User Role</label>
          <select class="form-control" id="exampleSelect1" name="user_role">
              <option value="Manager">Manager</option>
              <option value="Admin">Admin</option>
              <option value="Technician">Technician</option>
          </select>
      </div>
      <div class="form-group">
        <label class="custom-file">
        <input type="file" id="file" name="image_upload" class="custom-file-input">
        <span class="custom-file-control"></span>
        </label>
        </div>

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user">
      </div>


</form>';




if (isset($_POST['create_user'])) {

createuser();

}

echo '</div>
</div>
</div>
</div>
</div>
</div>';

} else {

    header ("Location: ../index.html");


       }


include "Includes/footer.php";




 ?>

 <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
