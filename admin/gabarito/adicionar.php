<?php
    include "../layout/cabecalho.php";
    require "../../model/Disciplina.php";

    $model = new Disciplina();
    $disciplinas = $model->listarTodos();
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Adicionar Gabarito</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="index.php" class="btn btn-sm btn-outline-secondary">Listar</a>
                </div>
            </div>
        </div>
        <form action="salvar.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do gabarito">
            </div>
            <div class="form-group">
                <label for="disciplina_id">Disciplina</label>
                <select class="form-control" id="disciplina_id" name="disciplina_id">
                    <option value>Selecione</option>
                    <?php if ($disciplinas): ?>
                        <?php foreach ($disciplinas as $disciplina): ?>
                            <option value="<?php echo $disciplina['id']; ?>"><?php echo $disciplina['nome']; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nome">Periodo</label>
                <input type="text" name="periodo" class="form-control" id="periodo" placeholder="Digite o nome do periodo">
            </div>

            <div class="form-group">
                <label for="arquivo">Arquivo</label>
                <input type="file" class="form-control-file" id="arquivo" name="arquivo">
            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </main>
<?php include "../layout/rodape.php"; ?>