<?php





use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use app\Customer;

require_once 'vendor/autoload.php';


require_once 'config.php';
require_once 'db/DB.php';
require_once 'app/Customer.php';

$loader = new FilesystemLoader("templates");
$twig = new Environment($loader, ["cache"=>false]);

echo $twig->render('addCustomer.html',
    ['addCustomer'=>Customer::addCustomers()
    ]);




