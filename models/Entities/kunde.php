<?php

namespace Entities;
use Doctrine\ORM\Mapping as ORM;
use Webmasters\Doctrine\ORM\Util;
use Doctrine\Common\Collections;

use Webmasters\Doctrine\ORM as WORM;
/**
*@ORM\Entity
*@ORM\Table(name="kunde")
*/

class Kunde extends WORM\EntityParent{
	/**
	*@ORM\Id
	*@ORM\GeneratedValue(strategy="AUTO")
	*@ORM\Column(type="integer", unique=true)
	*/

	private $id;
	
	/**
	*@ORM\Column(type="string")
	*/
	private $vorname;
	/**
	*@ORM\Column(type="string")
	*/
	private $nachname;
	/**
	*@ORM\OneToMany(targetEntity="Raum_besetzung", mappedBy="kunde")
	*/
	private $raum_besetzungen;

 public function __construct(array $daten = array()){
  Util\ArrayMapper::setEntity($this)->setData($daten);
  $this->raum_besetzungen= new Collections\ArrayCollection();
 //$this-setDaten($daten);
 }
 public function setDaten(array $daten) {
 
	if ($daten){  foreach ($daten as $k => $v)  {
	
	$setterName = 'set'. ucfirst($k);
		if (method_exists($this, $setterName)) {
		$this->$setterName($v);
		}
	}
 
	}
 }
 
 
 public function getId() {
	return $this->id;}
	
	public function getVorname() {
	return $this->vorname;}
	public function getNachname() {
	return $this->nachname;}
	
	public function setVorname($vorname){
	$this->vorname= $vorname;}

public function setNachname($nachname){
	$this->nachname = $nachname;
}
public function clearRaum_besetzungen()
  {
    $this->raum_besetzungen->clear();
  }

  public function addRaum_besetzung($raum_besetzung)
  {
    $this->raum_besetzungen->add($raum_besetzung);
  }

  public function hasRaum_besetzung(Raum_besetzung $raum_besetzung)
  {
    return $this->raum_besetzungen->contains($raum_besetzung);
  }

  public function removeRaum_besetzung(Raum_besetzung $raum_besetzung)
  {
    $this->raum_besetzungen->removeElement($raum_besetzung);
  }

public function __toString()  {
return $this->getVorname();
}	
 }
 
 ?>
 