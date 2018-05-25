<?php
include "../layout/cabecalho.php";
require "../../model/Curso.php";

$model = new Curso();

if (! isset($_GET['id'])) {
    header("location:index.php");
}


$curso = $model->visualizar($_GET['id']);
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Editar Curso</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="index.php" class="btn btn-sm btn-outline-secondary">Listar</a>
                </div>
            </div>
        </div>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $curso['id']; ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do curso" value="<?php echo $curso['nome']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </main>
<?php include "../layout/rodape.php"; ?>