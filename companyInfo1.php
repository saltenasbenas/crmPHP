<?php


use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use app\Customer;
use app\Information;
use app\Company;

require_once 'vendor/autoload.php';

require_once 'config.php';

$idCustomer=$_GET['id'];

echo $twig->render('companyInfo.html',
    ['companyInfo'=>Company::Companies($idCustomer)
    ]);




