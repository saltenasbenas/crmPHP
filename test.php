<?php

use Twig\Loader\ArrayLoader;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\Customer;
use app\Company;
use db\DB;

require_once 'vendor/autoload.php ';
require_once 'config.php';




if (isset($_GET['action'])){
//     if (isset($_GET['id'])){
//         $ps = DB::get()->prepare("SELECT id FROM customers  WHERE id=?");
//         $ps->execute([$_GET['id']]);
//         $data = $ps->fetch(\PDO::FETCH_ASSOC);
//         $id=$data['id'];

//     }else{
//         $_GET['id'];
//     }
    
    $id=$_GET['id'];
    switch ($_GET['action']) {
        case 'edit':
       echo $twig->render('customer_edit.html', [
       'customer'=>new Customer($id)]);
        break;
        case 'show':
            echo $twig->render('customer.html', [
            'customer'=>new Customer($id)]);
            break;
        
        case 'update':
                $customer=new Customer($id);
                $customer->name=$_POST['name'];
                $customer->surname=$_POST['surname'];
                $customer->phone=$_POST['phone'];
                $customer->email=$_POST['email'];
                $customer->address=$_POST['address'];
                $customer->position=$_POST['position'];
                $customer->company_id=$_POST['company_id'];
                $customer->description=$_POST['description'];
                $customer->save();
                header('location: test.php');
                die(); 
                
            
            
            break;
            case 'delete':
                $customer=new Customer($id);
                $customer->deleteCustomer();
                header('location: test.php');
                die(); 
                
                break;
            
            case 'add':
                echo $twig->render('addCustomer.html', [
                'customer'=>new Customer($id)]);
                break;
                
                
            case 'addCustomer':
                    $customer=new Customer($id);
                    $customer->name=$_POST['name'];
                    $customer->surname=$_POST['surname'];
                    $customer->phone=$_POST['phone'];
                    $customer->email=$_POST['email'];
                    $customer->address=$_POST['address'];
                    $customer->position=$_POST['position'];
                    $customer->company_id=$_POST['company_id'];
                    $customer->addCustomer();
                    header('Location: test.php');
                    die();
                
                break;
                
    
    
    
    }
   
}else {
    echo $twig->render('main.html',
        ['main'=>Customer::getCustomers()]);
    
}





