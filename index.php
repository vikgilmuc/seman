<?php

require_once 'includes/config.inc.php';
require_once 'includes/helper.inc.php';
require_once 'includes/funktionen.inc.php';
require_once 'models/Entities/seminar.php';

require_once 'models/Entities/kunde.php';
require_once 'models/Entities/raum.php';
require_once 'models/Entities/raum_besetzung.php';
require_once 'models/Entities/teilnehmer.php';

require_once 'models/Entities/seminar.php';
use Entities\Raum_besetzung, Entities\Kunde, Entities\Teilnehmer;
use Webmasters\Doctrine\ORM\Util\ArrayMapper;

// Session starten
session_start();

$aktion = isset($_REQUEST['aktion']) ? $_REQUEST['aktion'] : null;
$view = $aktion;
switch($aktion) {
	
	case 'read_raum_besetzung':
		$raum_besetzung = $em->getRepository('Entities\Raum_besetzung')->find($_REQUEST['id']);
    break;
	
	case 'edit_raum_besetzung':
  echo"request";
		var_dump($_REQUEST);
		echo"get";
		var_dump($_GET);
		echo"post";
		var_dump($_POST);
		$raum_besetzung = $em->getRepository('Entities\Raum_besetzung')->find($_REQUEST['id']);
		
		
		if ($_POST) {
		echo gettype($raum_besetzung);
				echo get_class($raum_besetzung);
		//$raum_besetzung = new Raum_besetzung();
			
			$raum_besetzung ->setRaum($em->getReference('Entities\Raum',$_POST['raum_id']));
			$raum_besetzung ->setKunde($em->getReference('Entities\Kunde',$_POST['kunde_id']));
			$raum_besetzung ->setSeminar($em->getReference('Entities\Seminar',$_POST['seminar_id']));
		
		  ArrayMapper::setEntity($raum_besetzung)->setData($_POST);

		  $em->persist($raum_besetzung);
		  $em->flush();

		  set_message('raum_besetzung wurde aktualisiert.');
		
		  redirect('index.php');
		  }
    break;
	
	
	
	case 'add_raum_besetzung':
		$raum_besetzung = new Raum_besetzung();
		
		$raum_besetzung ->setRaum($em->getReference('Entities\Raum',$_REQUEST['raum_id']));
		$raum_besetzung ->setKunde($em->getReference('Entities\Kunde',0));
		$raum_besetzung ->setSeminar($em->getReference('Entities\Seminar',0));
		
		if ($_POST) {
		$raum_besetzung ->setRaum($em->getReference('Entities\Raum',$_POST['raum_id']));
		$raum_besetzung ->setKunde($em->getReference('Entities\Kunde',$_POST['kunde_id']));
		$raum_besetzung ->setSeminar($em->getReference('Entities\Seminar',$_POST['seminar_id']));
		
		  ArrayMapper::setEntity($raum_besetzung)->setData($_POST);

		  $em->persist($raum_besetzung);
		  $em->flush();

		  set_message('Raum Besetzung wurde gespeichert.');
		  redirect('index.php');
			}

		$view = 'edit_raum_besetzung';
    break;
	
	case 'delete_raum_besetzung':
		$raum_besetzung = $em->getRepository('Entities\Raum_besetzung')->find($_REQUEST['id']);

		if ($_POST) {
		  $em->remove($raum_besetzung);
		  $em->flush();

		  set_message('Seminartermin wurde entfernt.');
		  redirect('index.php');
		}
    break;
	
	  case 'add_kunde':
    $kunde = new Kunde();
    $anreden = get_anreden();

    if ($_POST) {
      ArrayMapper::setEntity($kunde)->setData($_POST);

      $em->persist($kunde);
      $em->flush();

      set_message('Kunde wurde gespeichert.');
      redirect('index.php');
    }

    $view = 'edit_kunde';
    break;
	
	 case 'edit_kunde':
		$kunde = $em
		->getRepository('Entities\Kunde')
		->find($_REQUEST['id']);
		
		
    //$anreden = get_anreden();

    if ($_POST) {
      ArrayMapper::setEntity($kunde)->setData($_POST);

      $em->persist($kunde);
      $em->flush();

      set_message('Kunde wurde gespeichert.');
      redirect('index.php');
    }

    $view = 'edit_kunde';
    break;
	
	case 'neu_teilnehmer':
		$teilnehmer = new Teilnehmer();
		$anreden = get_anreden();

		if ($_POST) {
		  ArrayMapper::setEntity($teilnehmer)->setData($_POST);

		  $em->persist($teilnehmer);
		  $em->flush();

		  set_message('Teilnehmer wurde gespeichert.');
		  redirect('index.php');
		}

		$view = 'edit_teilnehmer';
    break;
	
	case 'edit_teilnehmer':
	
			$teilnehmer= $em
				->getRepository('Entities\Teilnehmer')
				->find($_REQUEST['id']);
				
			$anreden = get_anreden();
			$raum_besetzung = $em->getRepository('Entities\Raum_besetzung')->findAll();
			
			if ($_POST) {
			  ArrayMapper::setEntity($teilnehmer)->setData($_POST);

			  $em->persist($teilnehmer);
			  $em->flush();

			  set_message('Teilnehmer wurde gespeichert.');
			  redirect('index.php');
			}

			$view = 'edit_teilnehmer';
    break;
	
	case 'add_teilnehmer_zu_seminar':
		echo"request";
		var_dump($_REQUEST);
		echo"get";
		var_dump($_GET);
		echo"post";
		var_dump($_POST);
		$raum_besetzung = $em->getRepository('Entities\Raum_besetzung')->find($_REQUEST['id']);
		echo gettype($raum_besetzung);
		$alleTeilnehmer = $em->getRepository('Entities\Teilnehmer')->findAll();	
		
			if ($_POST) {
				
				$teilnehmer = $em->getRepository('Entities\Teilnehmer')->find($_POST['id_t']);
				echo gettype($em->getReference('Entities\Teilnehmer',$_POST['id_t']));
				echo get_class($em->getReference('Entities\Teilnehmer',$_POST['id_t']));
				//$raum_besetzung ->addTeilnehmer($em->getReference('Entities\Teilnehmer',$_POST['id_t']));
				 $teilnehmer -> addSeminartermin($em->getReference('Entities\Raum_besetzung',$_REQUEST['id']));
				 
			 
			  echo ($em->getReference('Entities\Raum_besetzung',$_REQUEST['id']));

			  $em->persist($teilnehmer);
			  $em->flush();

			 set_message('Teilnehmer wurde gespeichert.');
		
			  redirect('index.php');
			}

			
			$view = 'read_raum_besetzung';
    break;
	
	default:
		$query = $em
		  ->createQueryBuilder()
		  ->select('r, rb, s, k')
		  ->from('Entities\Raum', 'r')
		  ->leftJoin('r.raum_besetzungen', 'rb')
		  ->leftJoin('rb.seminar', 's')
		  ->leftJoin('rb.kunde', 'k')
		   ->orderBy('r.nummer', 'ASC')
		  ->getQuery()
		;
		$raume = $query->getResult();
		$view = 'index';
    break;
	
	

}

//$message = get_message(); // Meldung auslesen (sofern vorhanden)
require_once 'views/layout.tpl.php';
//require_once 'views/'. $view . '.tpl.php';

/*
$daten = array (

	'typ'=>1,
	'beginn'=>'2013-08-12 13:00',
	'ende'=>'2013-08-12 15:00',
	);


$raum_besetzung = new Raum_besetzung();
$raum_besetzung ->setRaum($em->getReference('Entities\Raum',2));
$raum_besetzung ->setSeminar($em->getReference('Entities\Seminar',1));

$raum_besetzung ->setKunde($em->getReference('Entities\Kunde',1));


ArrayMapper::setEntity($raum_besetzung)->setData($daten);
//var_dump($raum_besetzung);
$em->persist($raum_besetzung);
$em->flush();
echo"array";
exit;
*/

?>