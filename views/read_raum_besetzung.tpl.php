<p>
  Seminar: <?php e($raum_besetzung->getSeminar()->getTitel()); ?><br />
  <br />
  Raum: <?php e($raum_besetzung->getRaum()->getNummer()); ?>
  Kunde: <a href="index.php?aktion=edit_kunde&amp;id=<?php e($raum_besetzung->getKunde()->getId()); ?>"
        ><?php e($raum_besetzung->getKunde()->getVorname()); ?>   Kunde editieren </a>
  typ: <?php e($raum_besetzung->getTyp()); ?>
  wann <?php e($raum_besetzung); ?>
</p>

<?php if ($raum_besetzung->getTeilnehmer()): ?>
  <h3>Teilnehmer</h3>
  <ul>
    <?php foreach ($raum_besetzung->getTeilnehmer() as $teilnehmer): ?>
      <li>
        <?php e($teilnehmer); ?>
        [ <a
          href="index.php?aktion=edit_teilnehmer&amp;id=<?php e($teilnehmer->getId()); ?>"
        >Teilnehmer editieren</a> ]
        [ <a
          href="index.php?aktion=remove_teilnehmer&amp;id=<?php e($raum_besetzung->getId()); ?>&amp;teilnehmer_id=<?php e($teilnehmer->getId()); ?>"
        >Teilnehmer abmelden</a> ]
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
 <?php if ($aktion == 'read_raum_besetzung'): ?>
 <p>
  <a href="index.php?aktion=add_teilnehmer_zu_seminar&amp;id=<?php e($raum_besetzung->getId()); ?>"
  >add teilnehmer</a>
</p>
<?php endif; ?>
 <?php if ($aktion == 'add_teilnehmer_zu_seminar'): ?>
 	
	<form action="index.php?aktion=add_teilnehmer_zu_seminar&amp;id=<?php e($raum_besetzung->getId()); ?>" method="post">
	<select name="id_t" id="add_teilnehmer" size="<?php e(count($alleTeilnehmer));?>">
 <?php foreach ($alleTeilnehmer as $teilnehmer): ?>

	<option
          value="<?php  ec($teilnehmer->getId()); ?>"
          <?php if ($teilnehmer->hasSeminartermin($raum_besetzung)): ?>
            selected="selected"
          <?php endif; ?>
        ><?php ec($teilnehmer->getVorname()); ?></option>
	 <!--<a href="?aktion=add_teilnehmer&amp;id_t=<?php e($teilnehmer->getId());?>&amp;id_r=<?php e($raum_besetzung->getId());?>">add</a>-->
	
	
	
	
 <?php endforeach; ?></select><input type="submit" class="button" value="Abschicken" /></form>
<?php endif; ?>

	