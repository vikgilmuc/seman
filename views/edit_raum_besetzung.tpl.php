<form action="index.php?aktion=<?php e($aktion); ?>&amp;id=<?php e($raum_besetzung->getId())?>" method="post">

   <label for="id">Id</label>
   <input
    name="id_r" type="text" id="id" 
    value="<?php  ec($raum_besetzung->getRaum()->getId()); ?>"
	/>

  <label for="typ">Typ</label>
   <input
    name="typ" type="text" id="typ" 
    value="<?php ec($raum_besetzung->getTyp()); ?>"
  />
   <label for="seminar_id">Seminar</label>
  <input
    name="seminar_id" id="seminar" type="text" 
    value="<?php ec($raum_besetzung->getSeminar()->getId()); ?>"
  />               
   <label for="kunde">Kunde</label>
  <input
    name="kunde_id" id="kunde" type="text"
    value="<?php ec($raum_besetzung->getKunde()->getId()); ?>"
  />

  <label for="beginn">Beginn</label>
  <input
    name="beginn" id="beginn" type="text"
    value="<?php ec($raum_besetzung->getBeginn()->format('Y-m-d')); ?>"
  />

  <label for="ende">Ende</label>
  <input
    name="ende" id="ende" type="text"
    value="<?php ec($raum_besetzung->getEnde()->format('Y-m-d')); ?>"
  />

  <label for="raum">Raum</label>
  <input
    name="raum_id" id="raum" type="text" 
    value="<?php ec($raum_besetzung->getRaum()->getNummer()); ?>"
  />

  <input type="submit" class="button" value="Abschicken" />

</form>