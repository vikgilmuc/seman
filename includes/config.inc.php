<?php
require 'vendor/autoload.php';
 $connectionOptions = array(
  'default' => array(
    'driver'   => 'pdo_mysql',
    'dbname'   => 'seman',
    'host'     => 'localhost',
    'user'     => 'root',
    'password' => 'UVGL0001',
  ),
);
 $applicationOptions = array(
  'debug_mode' => true, // im produktiven Einsatz false
);


$bootstrap = Webmasters\Doctrine\Bootstrap::getInstance($connectionOptions,$applicationOptions);

$em = $bootstrap->getEm();
         



?>



