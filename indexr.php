<?php

require_once 'includes/config.inc.php';
require_once 'models/Entities/seminar.php';

require_once 'models/Entities/kunde.php';
require_once 'models/Entities/raum.php';
require_once 'models/Entities/raum_besetzung.php';
//print_r(get_declared_classes());


$daten = array (

	'nummer'=>'1',
	
	'gross'=>'65',
	'preis_a'=> 28,
	'preis_b'=> 35,
	'preis_t'=> 170,
	);


$kunde = new Entities\Raum($daten);

$em->persist($kunde);
$em->flush();
//require_once 'views/index.tpl.php';



?>