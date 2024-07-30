<?php

function tempoDecorrido($data1, $data2)
{
    // Tente criar objetos DateTime com as datas fornecidas pelo usuário
    $dtINI = new DateTime($data1);
    $dtFim = new DateTime($data2);

    // Calcule a diferença em dias
    $diasDecorridos = $dtINI->diff($dtFim);

    // Verifique se a diferença foi calculada corretamente
    if ($diasDecorridos) {
        return $diasDecorridos->days;
    } else {
        return "Datas inválidas";
    }
}