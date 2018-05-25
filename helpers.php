<?php

function dd($param) {

    echo '<pre>';
    print_r($param);
    echo '</pre>';

    exit('-------------------------------DUMP-----------------------------');

}

function diretorioArmazenamento()
{
    return __DIR__ . DIRECTORY_SEPARATOR . 'arquivos' . DIRECTORY_SEPARATOR;
}

function diretorio()
{
    return __DIR__ . DIRECTORY_SEPARATOR;
}

function upload($file)
{
    $extensao = pathinfo($file['arquivo']['name'], PATHINFO_EXTENSION);

    $nomeDoArquivo = basename(uniqid() . '.' . $extensao);

    $arquivo  = diretorioArmazenamento() . $nomeDoArquivo;

    $uploaded = move_uploaded_file($file['arquivo']['tmp_name'], $arquivo);

    if ($uploaded) {
        return $nomeDoArquivo;
    }

    return null;
}
