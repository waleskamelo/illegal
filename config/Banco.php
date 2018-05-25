<?php

/**
 * Esta classe serve para criar a conexao com o banco de dados
 * Class Banco
 */
class Banco
{
    /**
     * Endereço onde o banco está
     * @var
     */
    protected $host;

    /**
     * Nome do banco de dados
     * @var
     */
    protected $banco;

    /**
     * Nome do usuario do banco de dados
     * @var
     */
    protected $usuario;

    /**
     * Senha do banco de dados
     * @var
     */
    protected $senha;

    /**
     * Propriedade que guarda a conexao do banco de dados
     * @var
     */
    protected $conexao;

    /**
     * Banco constructor.
     * @param $host
     * @param $banco
     * @param $usuario
     * @param $senha
     */
    public function __construct($host = null, $banco = null, $usuario = null, $senha = null)
    {
        $this->host    = $host ?: "localhost";
        $this->banco   = $banco ?: "illegal";
        $this->usuario = $usuario ?: "root";
        $this->senha   = $senha ?: "";
    }

    /**
     * Conecta no banco de dados
     * @return $this
     */
    public function conectar()
    {
        $this->conexao = mysqli_connect($this->host, $this->usuario, $this->senha);

        if (! $this->conexao) {
            exit('Não foi possivel conectar ao banco de dados, por favor, verifique se seu login, senha e banco estao corretos e tente novamente');
        }

        $this->selecionaBanco($this->banco);

        return $this;
    }

    /**
     * Seleciona o nome do banco de dados que vai usar
     * @param $banco
     * @return $this
     */
    public function selecionaBanco($banco)
    {
        mysqli_select_db($this->conexao, $banco);

        return $this;
    }

    /**
     * Desconecta do banco de dados
     * @return $this
     */
    public function desconectar()
    {
        mysqli_close($this->conexao);

        return $this;
    }

    /**
     * Retorna a conexao
     * @return mixed
     */
    public function conexao()
    {
        return $this->conexao;
    }
}

