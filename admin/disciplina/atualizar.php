<?php

require "../../model/Disciplina.php";

$model = new Disciplina();

$params = $_POST;

if ($params) {
    $response = $model->atualizar($params);
}

header("location:index.php");

