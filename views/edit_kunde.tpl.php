<form action="index.php?aktion=<?php e($aktion); ?>" method="post">

  <input name="id" type="hidden" value="<?php ec($kunde->getId()); ?>" />

  <label for="anrede">Anrede</label>
  <select name="anrede" id="anrede">
    <?php foreach ($anreden as $key => $anrede): ?>
      <option
        value="<?php ec($key); ?>"
        <?php //if ($key == $kunde->getAnrede()): ?>
          selected="selected"
        <?php //endif; ?>
      ><?php e($anrede); ?></option>
    <?php endforeach; ?>
  </select>

  <label for="vorname">Vorname</label>
  <input
    name="vorname" id="vorname" type="text"
    value="<?php ec($kunde->getVorname()); ?>"
  />

  <label for="name">Nachname</label>
  <input
    name="nachname" id="name" type="text"
    value="<?php ec($kunde->getNachname()); ?>"
  />

  <label for="email">E-Mail</label>
  <input
    name="email" id="email" type="text"
    value="<?php// ec($kunde->getEmail()); ?>"
  />

  <label for="passwort">Passwort</label>
  <input
    name="passwort" id="passwort" type="password"
    value="<?php //ec($kunde->getPasswort()); ?>"
  />

  <?php if ($aktion == 'edit_kunde'): ?>
    <label for="raum_besetzunge">Raum Besetzungen</label>
    <select name="raum_besetzunge[]" id="raum_besetzunge" multiple="multiple">
      <?php foreach ($raum_besetzunge as $raum_besetzung): ?>
        <option
          value="<?php ec($raum_besetzung->getId()); ?>"
          <?php if ($kunde->hasSeminartermin($raum_besetzung)): ?>
            selected="selected"
          <?php endif; ?>
        ><?php e($raum_besetzung); ?></option>
      <?php endforeach; ?>
    </select>
  <?php endif; ?>

  <input type="submit" class="button" value="Abschicken" />

</form>