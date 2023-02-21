<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html>
<head>

<div id="padding"></div>

    <div id= "navbar">
                <a id="nav.a" href="index.php">Home</a> |
                <a id="nav.a" href="index.php?page=users">Users</a> |
                <a id="nav.a" href="index.php?page=products">Products</a> |
                <a id="nav.a" href="index.php?page=batch">Products Inventory</a> |
                <a id="nav.a" href="index.php?page=orders">Orders</a> |
                <a id="nav.a" href="index.php?page=ordersitems">Orders Items</a> |
                <a id="nav.a" href="logout.php" id="move-right">Log Out</a>
    </div>

    <title>Ruby's' Bread and Pastries House</title>
   
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">

    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1"/>

	</head>
</head>
<body>

<div id="wrapper">
  <div id="content">
    <?php
      switch($page){
          
                case 'users':
                    require_once 'users-module/index.php';
                break; 
                case 'products':
                    require_once 'products-module/index.php';
                break; 
                case 'batch':
                  require_once 'batch-module/index.php';
                break; 
                case 'products':
                  require_once 'products-module/index.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>
</div>
          
</body>

  <footer>
      <div class=footer>
        <center>
          <p>&nbsp;
          <hr style="height:2px; width:100%; border-width:0; color:red; background-color:black">
          <p class="credit">&copy; Copyright Ruby's Bread and Pastries 2023<br></p>
          <p>All Rights Reserved</p>				
        </center>
      </div>
    </footer>
</html>