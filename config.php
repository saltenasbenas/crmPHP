<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

define("DB_NAME", "crm");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");


$loader=new FilesystemLoader("templates");
$twig=new  Environment($loader, ["cache"=>false]);