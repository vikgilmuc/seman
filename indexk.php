<?php

require_once 'includes/config.inc.php';
require_once 'models/Entities/seminar.php';

require_once 'models/Entities/kunde.php';
require_once 'models/Entities/raum.php';
require_once 'models/Entities/raum_besetzung.php';
//print_r(get_declared_classes());


$daten = array (

	'vorname'=>'pepe',
	
	'nachname'=>'flores');


$kunde = new Entities\Kunde($daten);

$em->persist($kunde);
$em->flush();
//require_once 'views/index.tpl.php';


?>