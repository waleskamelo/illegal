<?php

require "../../model/Exercicio.php";

$model = new Exercicio();

if (! isset($_GET['id'])) {
    header("location:index.php");
}

$exercicio = $model->visualizar($_GET['id']);

if (! $exercicio) {
    header("location:index.php");
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');

header('Content-Disposition: attachment; filename="' . $exercicio['arquivo'] . '"');
header("Content-Length: " . filesize(diretorioArmazenamento() . $exercicio['arquivo']));
flush(); // Flush system output buffer
readfile(diretorioArmazenamento() . $exercicio['arquivo']);



