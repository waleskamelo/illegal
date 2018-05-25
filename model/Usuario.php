<?php
require_once "ModelAbstract.php";

class Usuario extends ModelAbstract
{
    public function login($email, $senha)
    {
        $senha = md5($senha);

        $this->banco->conectar();

        $query = "select * from usuario where email like '$email' and senha like '$senha'";

        $result = mysqli_query($this->banco->conexao(), $query);

        $usuario = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $this->banco->desconectar();

        return $usuario;
    }
}
