<?php
  print_r($_POST);
  if((isset($_POST["imie"])) && (isset($_POST["kwota"]))){
    $myFile = "ranking.json";
    $json = file_get_contents($myFile);
    $json = json_decode($json, TRUE);
    array_push($json["ranking"], $_POST);
    usort($json["ranking"], "porownaj");
    $json = json_encode($json);
    $fp = fopen($myFile, 'w') or die("Nie można otworzyć pliku");
    fwrite($fp, $json);
    fclose($fp);
}
function porownaj($a, $b) {
  if($a == $b) return 0;
  else if($a > $b) return 1;
  else return -1;
}
?>
