<?php

require_once 'includes/config.inc.php';
require_once 'models/Entities/seminar.php';

require_once 'models/Entities/kunde.php';
require_once 'models/Entities/raum.php';
require_once 'models/Entities/raum_besetzung.php';
require_once 'includes/config.inc.php';
require_once 'models/Entities/seminar.php';
use Entities\Raum_besetzung;
use Webmasters\Doctrine\ORM\Util\ArrayMapper;

$daten = array (

	'typ'=>1,
	'beginn'=>'2013-08-12 13:00',
	'ende'=>'2013-08-12 15:00',
	);


$raum_besetzung = new Raum_besetzung();
$raum_besetzung ->setRaum($em->getReference('Entities\Raum',4));
$raum_besetzung ->setSeminar($em->getReference('Entities\Seminar',3));

$raum_besetzung ->setKunde($em->getReference('Entities\Kunde',3));


ArrayMapper::setEntity($raum_besetzung)->setData($daten);
//var_dump($raum_besetzung);
$em->persist($raum_besetzung);
$em->flush();
echo"array";
exit;


?>