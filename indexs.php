<?php
require_once 'includes/config.inc.php';
require_once 'models/Entities/seminar.php';
use Entities\Seminar;


$daten = array (

	'titel'=>'neu Seminar',
	'beschreibung'=>'neu Seimar beschreibung',
	'dozent'=>'victor Gil');


$seminar = new Seminar($daten);

$em->persist($seminar);
$em->flush();
require_once 'views/index.tpl.php';


?>