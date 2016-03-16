<?php
  //date_default_timezone_set('Europe/Madrid');
  $time = time();

  echo date('j',$time)."<br>";

  $datetime1 = new DateTime('08:24:33');
  $datetime2 = new DateTime('08:46:27');
  $interval = $datetime1->diff($datetime2);
  echo $interval->format('%R%a días');

  $strStart = '1991-10-14 4:25';
  $strEnd   = date("Y-m-d H:i:s");

  $dteStart = new DateTime($strStart);
  $dteEnd   = new DateTime($strEnd);

  $dteDiff  = $dteStart->diff($dteEnd);

  $date = $dteDiff->format("%Y-%M-%D %H:%I:%S");

  echo $date;
?>
