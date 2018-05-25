<?php
include "../layout/cabecalho.php";
require "../../model/Disciplina.php";
require "../../model/Curso.php";

$model = new Disciplina();
$modelCurso = new Curso();

if (! isset($_GET['id'])) {
    header("location:index.php");
}


$disciplina = $model->visualizar($_GET['id']);
$cursos     = $modelCurso->listarTodos();

?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Editar Disciplina</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="index.php" class="btn btn-sm btn-outline-secondary">Listar</a>
                </div>
            </div>
        </div>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $disciplina['id']; ?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome da disciplina" value="<?php echo $disciplina['nome']; ?>">
            </div>
            <div class="form-group">
                <label for="disciplina_id">Curso</label>
                <select class="form-control" id="curso_id" name="curso_id">
                    <option value>Selecione</option>
                    <?php if ($cursos): ?>
                        <?php foreach ($cursos as $curso): ?>
                            <option <?php echo $curso['id'] == $disciplina['curso_id'] ? "selected" : ""; ?> value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </main>
<?php include "../layout/rodape.php"; ?>