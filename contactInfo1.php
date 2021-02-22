<?php


use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use app\Customer;
use app\Information;

require_once 'vendor/autoload.php';
require_once 'config.php';





$costumerID=$_GET['id'];

if (isset($_GET['action'])){
 
    
    switch ($_GET['action']) {
        
        case 'edit':
            echo $twig->render('editConversation.html', [
            'info'=>new Information($_GET['id'])
            ]);
            break;
        case 'update':
            $info=new Information($_GET['id']);
            $info->conversation=$_POST['conversation'];
          
            $info->save();
            header('location: test.php');
            die();
            
            
            
            break;
     
            
            
            
            
    }
    
}else {
    echo $twig->render('contactInfo.html',
        ['contactInfo'=>Information::getConversation($costumerID)]);
}




