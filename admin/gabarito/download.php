<?php

require "../../model/Gabarito.php";

$model = new Gabarito();

if (! isset($_GET['id'])) {
    header("location:index.php");
}

$gabarito = $model->visualizar($_GET['id']);

if (! $gabarito) {
    header("location:index.php");
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');

header('Content-Disposition: attachment; filename="' . $gabarito['arquivo'] . '"');
header("Content-Length: " . filesize(diretorioArmazenamento() . $gabarito['arquivo']));
flush(); // Flush system output buffer
readfile(diretorioArmazenamento() . $gabarito['arquivo']);



