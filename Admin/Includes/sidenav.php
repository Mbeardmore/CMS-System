  <?php 

$session = $_SESSION['ID'];
$query = "SELECT * FROM user WHERE ID = {$session}";


$result = mysqli_query($connection, $query); 
 
while ($row = mysqli_fetch_assoc($result))
{   
    $image     = $row['user_image'];
}


  ?>
  <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <div class="col-lg-5">
        <div class="nav">
            <a class="pull-left" href="#">
                <img class="media-object dp img-circle" src="../Admin/Images/user-images/<?php echo $image; ?>" style="width:100px;height:100px;">
            </a>
        </div>
</div>
<br>
<br>
<br>
<br>
<br>
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <?php if (isset($_SESSION['ID']) && $_SESSION['user_role']=='Admin' ||  $_SESSION['user_role'] == 'Manager') {

                            echo '
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Item Database<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="item_search.php">Search Item Database</a>
                                </li>
                                <li>
                                    <a href="add_item.php">Add Items</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>';
                    } else {}
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-briefcase"></i> Work Orders<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="create_workorder.php">Create Work Order</a>
                                </li>
                                <li>
                                    <a href="wo_viewall.php">View Work Orders</a>
                                </li>
                            </ul>
                        </li>

                      <?php if (isset($_SESSION['ID']) && $_SESSION['user_role']=='Admin' ||  $_SESSION['user_role'] == 'Manager') {

                            echo '
                        <li>
                            <a href="#"><i class="fa fa-users"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="register.php">create user</a>
                                </li>
                                <li>
                                    <a href="view_users.php">Manage users</a>
                                </li>
                            </ul>';
                        } else {}
                            ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
