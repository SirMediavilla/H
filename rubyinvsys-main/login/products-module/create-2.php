<?php error_reporting(0);
    $product_name = $_POST['product_name'];
    $product_price = ($_POST['product_price']);

    //DB_Connection
    $conn = new mysqli('localhost', 'root', '', 'db_wbapp');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("Insert into tbl_products(product_name, product_price) values(?, ?)");
        $stmt->bind_param("ss", $product_name, $product_price);
        $stmt->execute();
        $stmt->close();
        $previousURL = $DB_SERVER['http://localhost/rubyinvsys-main/login/index.php?page=usersproducts&subpage=products'];
        $conn->close();
    }
?>
