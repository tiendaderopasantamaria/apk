<?php
include('Libs/mpdf/mpdf.php');

$mpdf = new mPDF('c', 'A4');
$mpdf->SetDisplayMode('fullpage');
$html = '<div class="right_col" role="main"><div class=""><div id="miscodigos" style="width: 700px; size: 10px"></div></div></div>';
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output('codigos.pdf', 'I');
?>
<!--<div class="right_col" role="main"><div class=""><div id="miscodigos" style="width: 700px; size: 10px"></div></div></div>-->
