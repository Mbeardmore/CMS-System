<?php


include "Includes/header.php";

if (isset($_SESSION['ID']) && $_SESSION['user_role']=='Admin' ||  $_SESSION['user_role'] == 'Manager') {

include "Includes/navbar.php";

include "Includes/sidenav.php";

?>



<body>


 <div id="wrapper">

   <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Item Search</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
<<<<<<< HEAD
                                        <th>creator</th>
                                        <th>Job Location</th>
                                        <th>Work Order </th>
                                        <th>Active</th>
=======
                                        <th>Job Location</th>
                                        <th>Work Order </th>
                                        <th>Active</th>
                                        <th>creator</th>
>>>>>>> 2225d3fae95dbaaefa2784401b8aa2df28470f84
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>edit</th>
                                        <th>view</th>
                                    </tr>
                                </thead>
                                <tbody>




<?php

WOSearch();
?>


 </tbody>
                            </table>














</div>
</div>
</div>
</div>
</div>
</div>

<?php



} else {

    header ("Location: ../index.html");
}

?>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
        <script>
            $(document).ready(function() {
                 $('#dataTables-example').DataTable({
                    responsive: true
        });
    });
    </script>

</body>

</html>
