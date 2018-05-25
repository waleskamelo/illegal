<?php
require_once "ModelAbstract.php";

class Gabarito extends ModelAbstract
{
    protected $diretorio;

    public function __construct()
    {
        parent::__construct();

        $this->diretorio = diretorioArmazenamento();
    }

    public function visualizar($id)
    {
        $this->banco->conectar();

        $query = "select g.id, g.nome, d.nome as disciplina, g.periodo, c.nome as curso, g.arquivo from gabarito as g 
                  inner join disciplina as d on g.disciplina_id = d.id
                  inner join curso as c on d.curso_id = c.id where g.id = $id";

        $result = mysqli_query($this->banco->conexao(), $query);

        $gabarito = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $gabarito;
    }

    public function listar($disciplinaId)
    {
        $this->banco->conectar();

        $query = "select g.id, g.nome, d.nome as disciplina, g.periodo, c.nome as curso, g.arquivo from gabarito as g 
                  inner join disciplina as d on g.disciplina_id = d.id
                  inner join curso as c on d.curso_id = c.id where disciplina_id = '$disciplinaId'";

        $result = mysqli_query($this->banco->conexao(), $query);

        $gabaritos = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $gabaritos;
    }

    public function listarTodos()
    {
        $this->banco->conectar();

        $query = "select g.id, g.nome, d.nome as disciplina, g.periodo, c.nome as curso, g.arquivo from gabarito as g 
                  inner join disciplina as d on g.disciplina_id = d.id
                  inner join curso as c on d.curso_id = c.id";

        $result = mysqli_query($this->banco->conexao(), $query);

        $gabaritos = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $gabaritos;
    }

    public function adicionar($params)
    {
        $this->banco->conectar();

        $query = "insert into gabarito (nome, disciplina_id, periodo, arquivo) values ('".$params['nome']."', '".$params['disciplina_id']."', '".$params['periodo']."', '".$params['arquivo']."')";

        $result = mysqli_query($this->banco->conexao(), $query);

        $this->banco->desconectar();

        return $result;
    }

    public function upload($file)
    {
        $extensao = pathinfo($file['arquivo']['name'], PATHINFO_EXTENSION);

        $arquivo  = $this->diretorio . basename(md5($file['arquivo']['name']) . '.' . $extensao);

        $uploaded = move_uploaded_file($file['arquivo']['tmp_name'], $arquivo);

        if ($uploaded) {
            return $arquivo;
        }

        return null;
    }
}