<p>
  Wollen Sie den Raum_besetzung (<?php e($raum_besetzung); ?>) wirklich entfernen?
</p>

<form action="index.php?aktion=<?php e($aktion); ?>" method="post">

  <input name="id" type="hidden" value="<?php ec($raum_besetzung->getId()); ?>" />

  <input type="submit" class="button" value="Ja" />
  <a href="index.php">Abbrechen</a>

</form>