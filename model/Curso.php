<?php
require_once "ModelAbstract.php";

class Curso extends ModelAbstract
{
    public function listarTodos()
    {
        $this->banco->conectar();

        $query = "select * from curso";

        $result = mysqli_query($this->banco->conexao(), $query);

        $gabaritos = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $gabaritos;
    }

    public function adicionar($params)
    {
        if (! $params['nome']) {
            return null;
        }

        $this->banco->conectar();

        $query = "insert into curso(nome) values ('".$params['nome']."')";

        $result = mysqli_query($this->banco->conexao(), $query);

        $this->banco->desconectar();

        return $result;
    }

    public function visualizar($id)
    {
        $this->banco->conectar();

        $query = "select * from curso where id = $id";

        $result = mysqli_query($this->banco->conexao(), $query);

        $gabarito = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $gabarito;
    }

    public function atualizar($params)
    {
        $this->banco->conectar();

        $query = "update curso set nome='" . $params['nome'] . "' where id = " . $params['id'];

        $result = mysqli_query($this->banco->conexao(), $query);

        $this->banco->desconectar();

        return $result;
    }
}