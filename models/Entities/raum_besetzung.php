<?php

namespace Entities;
use Doctrine\ORM\Mapping as ORM;
use Webmasters\Doctrine\ORM\Util;
use Gedmo\Mapping\Annotation as Gemdo;
use Webmasters\Doctrine\ORM as WORM;



/**
*@ORM\Entity
*@ORM\Table(name="raum_besetzung")
*/
class Raum_besetzung extends WORM\EntityParent {
	/**
	*@ORM\Id
	*@ORM\GeneratedValue(strategy="AUTO")
	*@ORM\Column(type="integer", unique=true)
	*/
	private $id;
	/**
	*@ORM\Column(type="integer")
	*/
	private $typ;
	/**
	*@ORM\Column(type="datetime")
	*/
	private $beginn;
	/**
	*@ORM\Column(type="datetime")
	*/
	private $ende;
	/**
	*@ORM\Column(type="datetime")
	*@Gemdo\Timestampable(on="create")
	**/
	private $gebucht;
	
	/**
	*@ORM\ManyToOne(targetEntity="Seminar", inversedBy="raum_besetzungen")
	*/
	private $seminar;
	
	/**
	*@ORM\ManyToOne(targetEntity="Raum", inversedBy="raum_besetzungen")
	*/
	private $raum;
	
	
	/**
	*@ORM\ManyToOne(targetEntity="Kunde", inversedBy="raum_besetzungen")
	*/
	private $kunde;
	
	/**
   * @ORM\ManyToMany(targetEntity="Teilnehmer", mappedBy="seminartermine")
   * @ORM\JoinTable(name="nimmt_teil")
   * @ORM\OrderBy({"vorname" = "ASC"})
   */
  private $teilnehmer;

 public function __construct(array $daten = array()){
 Util\ArrayMapper::setEntity($this)->setData($daten);
 $this->teilnehmer = new \Doctrine\Common\Collections\ArrayCollection();
   
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
	
	
	public function getTyp() {
	return $this->typ;}
	public function getSeminar() {
	return $this->seminar;}
	public function getRaum() {
	return $this->raum;}
	public function getKunde() {
	return $this->kunde;}
	
	public function getBeginn() {
	return new Util\DateTime($this->beginn);}
	
	public function getEnde() {
	return new Util\DateTime($this->ende);}
	
	public function getGebucht() {
	return new Util\DateTime($this->gebucht);}
	
	
	
	
	public function setTyp($typ) {
	$this->typ=$typ;}
	public function setSeminar($seminar) {
	$this->seminar=$seminar;}
	public function setRaum($raum) {
	$this->raum=$raum;}
	public function setKunde($kunde) {
	$this->kunde=$kunde;}
	

public function setBeginn($beginn){
	$this->beginn = new Util\DateTime($beginn);
}
public function setEnde($ende){
	$this->ende = new Util\DateTime($ende);
}

public function getTeilnehmer()
  {
    return $this->teilnehmer;
  }

  public function clearTeilnehmer()
  {
    $this->teilnehmer->clear();
  }

  public function addTeilnehmer(Teilnehmer $teilnehmer)
  {
    $this->teilnehmer->add($teilnehmer);
  }

  public function hasTeilnehmer(Teilnehmer $teilnehmer)
  {
    return $this->teilnehmer->contains($teilnehmer);
  }

  public function removeTeilnehmer(Teilnehmer $teilnehmer)
  {
    $this->teilnehmer->removeElement($teilnehmer);
  }


public function __toString(){
return
'Vom:'.$this->getBeginn()->format('d.m.Y').
'Bis:'.$this->getEnde()->format('d.m.Y');}
	
}
?>

 