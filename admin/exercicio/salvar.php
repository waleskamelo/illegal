<?php

require "../../model/Exercicio.php";

$model = new Exercicio();

$params = $_POST;

if ($_FILES['arquivo'] && isset($params['nome']) && $params['nome']) {
    $params['arquivo'] = upload($_FILES);
    $response = $model->adicionar($params);
}

header("location:index.php");

