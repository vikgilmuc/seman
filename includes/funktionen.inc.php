<?php

function redirect($to)
{
  header('Location:' . $to);
  exit;
}

function set_message($message)
{
  $_SESSION['message'] = $message;
}

function get_message()
{
  $message = false;
  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
  }
  return $message;
}

function get_anreden()
{
  return array(
    '' => '---',
    'Frau' => 'Frau',
    'Herr' => 'Herr'
  );
}

?>