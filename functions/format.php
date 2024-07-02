<?php
function formatarData($dataDoBanco){
    $dataObj = new DateTime($dataDoBanco);
    $dataFormatada = $dataObj->format('d/m/Y');
    return $dataFormatada;
}