<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="teilnehmer")
 */
class Teilnehmer
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id = 0;

  /**
   * @ORM\Column(type="string", length=5)
   */
  private $anrede = '';

  /**
   * @ORM\Column(type="string", length=40)
   */
  private $vorname = '';

  /**
   * @ORM\Column(type="string", length=40)
   */
  private $nachname = '';

  /**
   * @ORM\Column(type="datetime")
   * @Gedmo\Timestampable(on="create")
   */
  private $registriert_seit;

  /**
   * @ORM\Column(type="string", length=50, unique=true)
   */
  private $email = '';

  /**
   * @ORM\Column(type="string", length=20)
   */
  private $passwort = '';

  /**
   * @ORM\ManyToMany(targetEntity="Raum_besetzung", inversedBy="teilnehmer")
   * @ORM\JoinTable(name="nimmt_teil")
   */
  private $seminartermine;

  public function __construct(array $daten = array())
  {
    Util\ArrayMapper::setEntity($this)->setData($daten);
    $this->seminartermine = new \Doctrine\Common\Collections\ArrayCollection();
  }

  /* *** Getter und Setter *** */

  public function getId()
  {
    return $this->id;
  }

  public function getVorname()
  {
    return $this->vorname;
  }

  public function setVorname($vorname)
  {
    $this->vorname = $vorname;
  }

  public function getNachname()
  {
    return $this->nachname;
  }

  public function setNachame($name)
  {
    $this->nachname = $name;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getPasswort()
  {
    return $this->passwort;
  }

  public function setPasswort($passwort)
  {
    $this->passwort = $passwort;
  }

  public function getRegistriert_seit()
  {
    return new Util\DateTime($this->registriert_seit);
  }

  public function getAnrede()
  {
    return $this->anrede;
  }

  public function setAnrede($anrede)
  {
    $this->anrede = $anrede;
  }

  public function getSeminartermine()
  {
    return $this->seminartermine;
  }

  public function clearSeminartermine()
  {
    $this->seminartermine->clear();
  }

  public function addSeminartermin(Raum_besetzung $seminartermin)
  {
    $this->seminartermine->add($seminartermin);
  }

  public function hasSeminartermin(Raum_besetzung $seminartermin)
  {
    return $this->seminartermine->contains($seminartermin);
  }

  public function removeSeminartermin(Raum_besetzung $seminartermin)
  {
    $this->seminartermine->removeElement($seminartermin);
  }

  /* *** Sonstige Methoden *** */

  public function  __toString()
  {
    return $this->getVorname() . ' ' . $this->getNachname();
  }
}

?>