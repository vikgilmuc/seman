<?php

require_once 'includes/config.inc.php';
require_once 'models/Entities/seminar.php';

require_once 'models/Entities/kunde.php';
require_once 'models/Entities/raum.php';
require_once 'models/Entities/raum_besetzung.php';
//print_r(get_declared_classes());

$daten = array (

	'titel'=>'neu Seminar',
	'beschreibung'=>'neu Seminar beschreibung',
	'dozent'=>'victor Gil');


$seminar = new Entities\Seminar($daten);

$em->persist($seminar);
$em->flush();
require_once 'views/index.tpl.php';


?>