<form action="index.php?aktion=<?php e($aktion); ?>" method="post">
 
  <input name="id" type="hidden" value="<?php ec($teilnehmer->getId()); ?>" />

  <label for="anrede">Anrede</label>
  <select name="anrede" id="anrede">
    <?php foreach ($anreden as $key => $anrede): ?>
      <option
        value="<?php ec($key); ?>"
        <?php if ($key == $teilnehmer->getAnrede()): ?>
          selected="selected"
        <?php endif; ?>
      ><?php e($anrede); ?></option>
    <?php endforeach; ?>
  </select>

  <label for="vorname">Vorname</label>
  <input
    name="vorname" id="vorname" type="text"
    value="<?php ec($teilnehmer->getVorname()); ?>"
  />

  <label for="nachname">Nachname</label>
  <input
    name="nachname" id="nachname" type="text"
    value="<?php ec($teilnehmer->getNachname()); ?>"
  />

  <label for="email">E-Mail</label>
  <input
    name="email" id="email" type="text"
    value="<?php ec($teilnehmer->getEmail()); ?>"
  />

  <label for="passwort">Passwort</label>
  <input
    name="passwort" id="passwort" type="password"
    value="<?php ec($teilnehmer->getPasswort()); ?>"
  />

  <?php if ($aktion == 'edit_teilnehmer'): ?>
    <label for="seminartermine">Seminartermine</label>
    <select name="seminartermine[]" id="seminartermine" multiple="multiple">
      <?php foreach ($raum_besetzung as $kurse): ?>
        <option
          value="<?php ec($kurse->getId()); ?>"
          <?php if ($teilnehmer->hasSeminartermin($seminartermin)): ?>
            selected="selected"
          <?php endif; ?>
        ><?php e($kurse); ?></option>
      <?php endforeach; ?>
    </select>
  <?php endif; ?>

  <input type="submit" class="button" value="Abschicken" />

</form>