
<?php session_start(); ?>

<?php 

$_SESSION['ID'] = null;
$_SESSION['u_name'] = null;
$_SESSION['u_email'] = null;
$_SESSION['user_role'] = null;
    
header("Location: ../index.html");

?>

