<?php

require "../../model/Gabarito.php";

$model = new Gabarito();

$params = $_POST;

if ($_FILES['arquivo'] && isset($params['nome']) && $params['nome']) {
    $params['arquivo'] = upload($_FILES);
    $response = $model->adicionar($params);
}

header("location:index.php");

