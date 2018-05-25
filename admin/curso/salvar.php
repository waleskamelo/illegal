<?php

require "../../model/Curso.php";

$model = new Curso();

$params = $_POST;

if ($params) {
    $response = $model->adicionar($params);
}

header("location:index.php");

