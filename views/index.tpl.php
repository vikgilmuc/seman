<?php foreach ($raume as $raum): ?>
<p>
  <?php e($raum->getNummer()); ?> -
  <?php ec($raum->getPreis_a(), 'formatiere_zahl'); ?> &euro;
  <span class="kategorie">(<?php e($raum->getGross()); ?>m2)</span>
  [ <a
    href="index.php?aktion=edit_raum&amp;id=<?php e($raum->getId()); ?>"
  >Raum editieren</a> ]
  [ <a
    href="index.php?aktion=add_raum_besetzung&amp;raum_id=<?php e($raum->getId()); ?>"
  >Termin anlegen</a> ]
</p>
<p>
  <?php ec($raum->getGross(), array('strip_tags', 'nl2br')); ?>
</p>
<?php if ($raum->getRaum_besetzungen()): ?>
  <ul>
    <?php foreach ($raum->getRaum_besetzungen() as $raum_besetzung): ?>
    <li>
      <?php e($raum_besetzung); ?>,
      Anmeldungen:
      <?php e($raum_besetzung->getTeilnehmer()->count()); ?>
      [ <a
        href="index.php?aktion=read_raum_besetzung&amp;id=<?php e($raum_besetzung->getId()); ?>"
      >Details</a> ]
      [ <a
        href="index.php?aktion=edit_raum_besetzung&amp;id=<?php e($raum_besetzung->getId()); ?>"
      >raum_besetzung editieren</a> ]
      [ <a
        href="index.php?aktion=delete_raum_besetzung&amp;id=<?php e($raum_besetzung->getId()); ?>"
      >raum_besetzung entfernen</a> ]
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
<?php endforeach; ?>