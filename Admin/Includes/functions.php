<?php

function escape($string)
{

    global $connection;

    return mysqli_real_escape_string($connection, trim($string));


}

function confirmQuery($result)
{

    global $connection;

    if (!$result) {

        die("QUERY FAILED ." . mysqli_error($connection));


    }


}


function ItemSearch()
{

    global $connection;

    $query = "SELECT * FROM stock_management";

    $display_all = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($display_all)) {
        $id             = $row['ID'];
        $image          = $row['item_image'];
        $name           = $row['prod_name'];
        $supplier       = $row['supplier_name'];
        $pexvat         = $row['P_PRICE_EXVAT'];
        $sellprice      = $row['P_SELL'];
        $size           = $row['SIZE'];
        $stock          = $row['stock_level'];
        $lastpurchase   = $row['L_PURCHASE'];
        $Stock_Location = $row['Stock_Location'];

        echo "<tr>";
        echo "<td>" . $id . "</td>";
        echo "<td>" . $image . "</td>";
        echo "<td>" . $name . "</td>";
        echo "<td>" . $supplier . "</td>";
        echo "<td>" . $pexvat . "</td>";
        echo "<td>" . $sellprice . "</td>";
        echo "<td>" . $size . "</td>";
        echo "<td>" . $stock . "</td>";
        echo "<td>" . $lastpurchase . "</td>";
        echo "<td>" . $Stock_Location . "</td>";
        echo "<td><a href='Alter_item.php?edit_item={$id}'>Edit</a></td>";
        echo "<td><a href='item_search.php?delete_item={$id}'>Delete</a></td>";
        echo "</tr>";


    }


}


function selectall()
{
    global $connection;
    $query      = "SELECT * FROM stock_management";
    $select_all = mysqli_query($connection, $query);
    $final_num  = mysqli_num_rows($select_all);
    return $final_num;
}


function createitem() {

global $connection;

  $item_name         = escape($_POST['item_name']);
  $item_supplier     = escape($_POST['item_supplier']);
  $pexvat            = escape($_POST['price_exvat']);
  $pwesell           = escape($_POST['sell_price']);
  $item_size         = escape($_POST['item_size']);
  $stock_level       = escape($_POST['stock_level']);
  $stock_location    = escape($_POST['stock_location']);
  $purchase_date     = escape($_POST['purchase_date']);

  $buy = "£".$pexvat;
  $sell = "£".$pwesell;

  $query = "INSERT INTO stock_management (prod_name, supplier_name, P_PRICE_EXVAT, P_SELL, SIZE, stock_level, L_PURCHASE, Stock_Location) ";

  $query .= "VALUES ('{$item_name}','{$item_supplier}','{$buy}','{$sell}', '{$item_size}','{$stock_level}','{$stock_location}','{$purchase_date}') ";

  $create_item = mysqli_query($connection, $query);
  confirmQuery($create_item);

  $item_id = mysqli_insert_id($connection);

echo "<p class='bg-success'>Item created.";
}



function deleteitem() {

global $connection;

if (isset($_GET['delete_item'])) {

$item_Id = escape($_GET['delete_item']);


}
$query = "DELETE  FROM stock_management WHERE ID = $item_Id ";
$select_item = mysqli_query($connection, $query);
echo "<p class='bg-sucess'> Item Deleted.";

}

function createuser() {

  global $connection;


    $username = escape($_POST['user']);
    $fname = escape($_POST['f_name']);
    $lname = escape($_POST['l_name']);
    $email = escape($_POST['email']);
    $pwd = escape($_POST['pwd']);
    $userrole = escape ($_POST['user_role']);

    $password = password_hash( $pwd, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "INSERT INTO user (u_name, u_first, u_last, u_email, u_pwd, user_role) ";
    $query .= "VALUES ('{$username}','{$fname}','{$lname}','{$email}','{$password}','{$userrole}') ";

    $result = mysqli_query($connection, $query);

    confirmQuery($result);
}

function viewallusers() {

    global $connection;

    $query = "SELECT * FROM user";

    $display_all = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($display_all)) {
        $id             = $row['ID'];
        $username       = $row['u_name'];
        $first          = $row['u_first'];
        $last           = $row['u_last'];
        $email          = $row['u_email'];
        $userrole       = $row['user_role'];
        $lastonline     = $row['Last_Signed_in'];

        echo "<tr>";
        echo "<td>" . $id . "</td>";
        echo "<td>" . $username . "</td>";
        echo "<td>" . $first . "</td>";
        echo "<td>" . $last . "</td>";
        echo "<td>" . $email . "</td>";
        echo "<td>" . $userrole . "</td>";
        echo "<td>" . $lastonline . "</td>";

        echo "<td><a href='edit_user.php?edit_user={$id}'>Edit</a></td>";
        echo "<td><a href='item_search.php?delete_item={$id}'>Delete</a></td>";
        echo "</tr>";


    }


}

function updateuser() {
    global $connection;

    global $userid;

    $username        = escape($_POST['user']);
    $first           = escape($_POST['f_name']);
    $last            = escape($_POST['l_name']);
    $email           = escape($_POST['email']);
    $userrole        = escape($_POST['user_role']);




          $query = "UPDATE user SET ";
          $query .="u_name  = '{$username}', ";
          $query .="u_first = '{$first}', ";
          $query .="u_last = '{$last}', ";
          $query .="u_email = '{$email}', ";
          $query .="user_role   = '{$userrole}' ";
          $query .= "WHERE ID = {$userid} ";

        $update_user = mysqli_query($connection,$query);

        confirmQuery($update_user);

        echo "<p class='bg-success'>user Updated. <a href='../post.php?p_id={$userid}'>View Post </a> or <a href='item_search.php'>Edit More Posts</a></p>";
}
function alteritem(){

    global $connection;

     $name = escape($_POST['item_name']);
    $supplier = escape($_POST['item_supplier']);
    $pexvat = escape($_POST['price_exvat']);
    $sellprice = escape($_POST['sell_price']);
    $size = escape($_POST['item_size']);
    $stock = escape($_POST['stock_level']);
    $lastpurchase = escape($_POST['purchase_date']);
    $Stock_Location = escape($_POST['stock_location']);

    $buy = "£". $pexvat;
    $sell = "£". $sellprice;




          $query = "UPDATE stock_management SET ";
          $query .="prod_name  = '{$name}', ";
          $query .="supplier_name = '{$supplier}', ";
          $query .="P_PRICE_EXVAT = '{$buy}', ";
          $query .="P_SELL = '{$sell}', ";
          $query .="SIZE   = '{$size}', ";
          $query .="stock_level= '{$stock}', ";
          $query .="L_PURCHASE  = '{$lastpurchase}' ";
          $query .= "WHERE ID = {$item_Id} ";

        $update_post = mysqli_query($connection,$query);

        confirmQuery($update_post);

        echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$name}'>View Post </a> or <a href='item_search.php'>Edit More Posts</a></p>";
}

function usersearch()
{

    global $connection;

    $query = "SELECT u_first FROM user;";

    $display_all = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($display_all)) {
        $firstname             = $row['u_first'];


        echo "<option value='$firstname'>" . $firstname . "</option>";

  

    }

  }

?>