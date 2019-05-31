<?php
function generarCodigo() {
  $n1 = 100000000;
  $n2 = 999999999;
  $codigo = rand($n1, $n2);
  return $codigo;
}
  
