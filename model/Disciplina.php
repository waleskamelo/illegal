<?php
require_once "ModelAbstract.php";

class Disciplina extends ModelAbstract
{
    public function listarTodos()
    {
        $this->banco->conectar();

        $query = "select d.id, d.nome, c.nome as curso from disciplina as d 
                  inner join curso as c on d.curso_id = c.id";

        $result = mysqli_query($this->banco->conexao(), $query);

        $gabaritos = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $gabaritos;
    }

    public function visualizar($id)
    {
        $this->banco->conectar();

        $query = "select * from disciplina where id = $id";

        $result = mysqli_query($this->banco->conexao(), $query);

        $gabarito = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $gabarito;
    }

    public function adicionar($params)
    {
        $this->banco->conectar();

        $query = "insert into disciplina(nome, curso_id) values ('".$params['nome']."', '".$params['curso_id']."')";

        $result = mysqli_query($this->banco->conexao(), $query);

        $this->banco->desconectar();

        return $result;
    }

    public function atualizar($params)
    {
        $this->banco->conectar();

        $query = "update disciplina set nome='" . $params['nome'] . "', curso_id='" . $params['curso_id'] . "' where id = " . $params['id'];

        $result = mysqli_query($this->banco->conexao(), $query);

        $this->banco->desconectar();

        return $result;
    }
}