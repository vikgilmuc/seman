<?php

function e($value)
{
  echo strip_tags($value);
}

function ec($value, $filters = array())
{
  foreach ((array)$filters as $filter) {
    $value = $filter($value);
  }

  echo $value;
}

function formatiere_zahl($zahl)
{
  return number_format($zahl, 2, ',', '.');
}

?>