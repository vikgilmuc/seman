<?php

namespace Entities;
use Doctrine\ORM\Mapping as ORM;
use Webmasters\Doctrine\ORM\Util;
use Webmasters\Doctrine\ORM as WORM;
use Gedmo\Mapping\Annotation as Gemdo;
use Doctrine\Common\Collections;
/**
*@ORM\Entity
*@ORM\Table(name="raum")
*/

class Raum extends WORM\EntityParent{
	/**
	*@ORM\Id
	*@ORM\GeneratedValue(strategy="AUTO")
	*@ORM\Column(type="integer", unique=true)
	*/
	private $id;
	
	/**
	*@ORM\Column(type="string")
	*/
	
	private $nummer;
	
	/**
	*@ORM\Column(type="integer")
	*/
	private $gross;
	
	/**
	*@ORM\Column(type="decimal")
	*/
	private $preis_a;
	
	/**
	*@ORM\Column(type="decimal")
	*/
	private $preis_b;
	
	/**
	*@ORM\Column(type="decimal")
	*/
	private $preis_t;
	/**
	*@ORM\OneToMany(targetEntity="Raum_besetzung", mappedBy="raum")
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
	
	public function getNummer() {
	return $this->nummer;}
	
public function getGross(){
	return $this->gross;
}
public function getPreis_a(){
	return $this->preis_a;
}
public function getPreis_b(){
	return $this->preis_b;
}
public function getPreis_t(){
	return $this->preis_t;
}
public function setNummer($nummer){
	$this->nummer = $nummer;
}
public function setGross($gross) {
	$this->gross = $gross;
}
public function setPreis_a($preis_a){
	$this->preis_a= $preis_a;
}
public function setPreis_b($preis_b){
	$this->preis_b= $preis_b;
}
public function setPreis_t($preis_t){
	$this->preis_t= $preis_t;
}

public function getRaum_besetzungen()
  {
    return $this->raum_besetzungen;
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
return $this->getNummer();
}

 }
 ?>
 
 
