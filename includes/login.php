<?php 
session_start();
include_once "db.php";
include_once "../Admin/Includes/functions.php";

if (isset($_POST['submit'])) {

	$uid = escape($_POST['uid']);
	$pwd = escape($_POST['pwd']);

	

	# Error Handlers

	# Check if empty
$query = "SELECT * FROM user WHERE u_name = '{$uid}' OR u_email = '{$uid}'";
$result = mysqli_query($connection, $query);
if (!$result) {
	die ("QUERY FAILED" .  mysqli_error($connection));
	header("Location: ../index.html");
}

while ($row = mysqli_fetch_assoc($result)) {
	$UID = $row['ID'];
	$uname = $row['u_name'];
	$ufirst = $row['u_first'];
	$ulast = $row['u_last'];
	$uemail = $row['u_email'];
	$upwd = $row['u_pwd'];
	$urole = $row['user_role'];


	if (password_verify($pwd,$upwd)) {

		
             $_SESSION['ID'] = $UID;
             $_SESSION['u_name'] = $uname;
             $_SESSION['u_first'] = $ufirst;
             $_SESSION['u_last'] = $ulast;
             $_SESSION['u_email'] = $uemail;
             $_SESSION['user_role'] = $urole;
             



             header("Location:../admin/index.php");

         } else {



             header("Location: ../index.html");
             return false;
       



         }



     }

     return true;
 }
  header("Location: ../index.html");
?>