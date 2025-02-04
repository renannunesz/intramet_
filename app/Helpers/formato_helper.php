<?php


function formatarCNPJ($cnpj) {
    // Remove qualquer caractere que não seja número
    $cnpj = preg_replace('/\D/', '', $cnpj);
    
    // Aplica a formatação se tiver 14 dígitos
    if (strlen($cnpj) === 14) {
        return preg_replace("/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/", "$1.$2.$3/$4-$5", $cnpj);
    }
    
    // Retorna o próprio CNPJ caso esteja inválido
    return $cnpj;
}


function formatarCPF($cpf) {
    // Remove qualquer caractere que não seja número
    $cpf = preg_replace('/\D/', '', $cpf);

    // Aplica a formatação se tiver 11 dígitos
    if (strlen($cpf) === 11) {
        return preg_replace("/^(\d{3})(\d{3})(\d{3})(\d{2})$/", "$1.$2.$3-$4", $cpf);
    }

    // Retorna o próprio CPF caso esteja inválido
    return $cpf;
}

