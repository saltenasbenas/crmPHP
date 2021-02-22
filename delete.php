<?php
use app\Customer;


require_once 'config.php';
require_once 'db/DB.php';
require_once 'app/Customer.php';


$customer=new Customer($_GET['id']);
if (isset($_POST['id'])){
    
    $customer->deleteCustomer();
    header('Location: main.php');
    die();
}

?>