<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function rellenar ($data){
  if (strlen($data)<40) {
    return str_pad($data, 40, " ",STR_PAD_LEFT);
  }
}

function rellenar1 ($data){
  if (strlen($data)<9) {
    return str_pad($data, 9, " ",STR_PAD_LEFT);
  }
}

function rellenar2 ($data){
  if (strlen($data)<26) {
    return str_pad($data, 26, " ",STR_PAD_LEFT);
  }
}
?>
