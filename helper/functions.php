<?php

function url($param)
{
    return BASE_URL.$param;
}

function Real($number)
{
    return 'R$ ' .number_format($number,2,',','.');
}

function Data($param)
{
    return date('d/m/Y', strtotime($param));
}

function DataHifen($param)
{
    return date('d-m-Y', strtotime($param));
}

function Hora($param)
{
    return date('H:i', strtotime($param));
}

function Horas($param)
{
    return date('H:i:s', strtotime($param));
}

function MesRel($month)
{
    $mes = date('m',strtotime($month));
    $mesDt ="";

    if($mes === '01') {
        $mesDt = "Janeiro";
    } else if($mes === '02') {
        $mesDt = "Fevereiro";
    } else if($mes === '03') {
        $mesDt = "Março";
    } else if($mes === '04') {
        $mesDt = "Abril";
    } else if($mes === '05') {
        $mesDt = "Maio";
    } else if($mes === '06') {
        $mesDt = "Junho";
    } else if($mes === '07') {
        $mesDt = "Julho";
    } else if($mes === '08') {
        $mesDt = "Agosto";
    } else if($mes === '09') {
        $mesDt = "Outubro";
    } else if($mes === '10') {
        $mesDt = "Setembro";
    } else if($mes === '11') {
        $mesDt = "Novembro";
    } else if($mes === '12') {
        $mesDt = "Dezembro";
    }

    return $mesDt;
} 

function dd ($var) {
    echo "<pre style='padding: 10px;background-color: #212121;color: #ffffff;border: 1px solid #fff;border-radius: 10px;'>";
    print_r($var);
}

function dde ($var) {
    echo "<pre style='padding: 10px;background-color: #212121;color: #ffffff;border: 1px solid #fff;border-radius: 10px;'>";
    print_r($var);
    exit;
}

function DayToday()
{
    $diasemana = array('Domingo', 'Segunda Feira', 'Terça Feira', 'Quarta Feira', 'Quinta Feira', 'Sexta Feira', 'Sabado');
    $data = date('Y-m-d');
    $diasemana_numero = date('w', strtotime($data));
    return $diasemana[$diasemana_numero].' - '.date('d/m/Y');
}