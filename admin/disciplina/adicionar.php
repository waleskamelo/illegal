<?php
    include "../layout/cabecalho.php";
    require "../../model/Curso.php";

    $model = new Curso();
    $cursos = $model->listarTodos();
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Adicionar Disciplina</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="index.php" class="btn btn-sm btn-outline-secondary">Listar</a>
                </div>
            </div>
        </div>
        <form action="salvar.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome da disciplina">
            </div>
            <div class="form-group">
                <label for="disciplina_id">Curso</label>
                <select class="form-control" id="curso_id" name="curso_id">
                    <option value>Selecione</option>
                    <?php if ($cursos): ?>
                        <?php foreach ($cursos as $curso): ?>
                        <option value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </main>
<?php include "../layout/rodape.php"; ?>