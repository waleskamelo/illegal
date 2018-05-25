<?php
require_once "ModelAbstract.php";

class Exercicio extends ModelAbstract
{
    public function listarTodos()
    {
        $this->banco->conectar();

        $query = "select e.id, e.nome, d.nome as disciplina, e.periodo, c.nome as curso, e.arquivo from exercicio as e 
                  inner join disciplina as d on e.disciplina_id = d.id
                  inner join curso as c on d.curso_id = c.id";

        $result = mysqli_query($this->banco->conexao(), $query);

        $gabaritos = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $gabaritos;
    }

    public function listar($disciplinaId)
    {
        $this->banco->conectar();

        $query = "select e.id, e.nome, d.nome as disciplina, e.periodo, c.nome as curso, e.arquivo from exercicio as e 
                  inner join disciplina as d on e.disciplina_id = d.id
                  inner join curso as c on d.curso_id = c.id where disciplina_id = '$disciplinaId'";

        $result = mysqli_query($this->banco->conexao(), $query);

        $gabaritos = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $gabaritos;
    }

    public function adicionar($params)
    {
        if (! $params['nome'] || ! $params['periodo']) {
            return null;
        }

        $this->banco->conectar();

        $query = "insert into exercicio (nome, disciplina_id, periodo, arquivo) values ('".$params['nome']."', '".$params['disciplina_id']."', '".$params['periodo']."', '".$params['arquivo']."')";

        $result = mysqli_query($this->banco->conexao(), $query);

        $this->banco->desconectar();

        return $result;
    }

    public function visualizar($id)
    {
        $this->banco->conectar();

        $query = "select e.id, e.nome, d.nome as disciplina, e.periodo, c.nome as curso, e.arquivo from exercicio as e 
                  inner join disciplina as d on e.disciplina_id = d.id
                  inner join curso as c on d.curso_id = c.id where e.id = $id";

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
