<?php

require "../../model/Disciplina.php";

$model = new Disciplina();

$params = $_POST;

if ($params) {
    $response = $model->adicionar($params);
}

header("location:index.php");

