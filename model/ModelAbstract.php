<?php
require __DIR__. "/../config/Banco.php";
require __DIR__. "/../helpers.php";

abstract class ModelAbstract
{
    protected $banco;

    public function __construct()
    {
        $this->banco = new Banco;
    }
}