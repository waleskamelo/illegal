<?php

require "../../model/Curso.php";

$model = new Curso();

$params = $_POST;

if ($params) {
    $response = $model->atualizar($params);
}

header("location:index.php");

