<?php include "../layout/cabecalho.php" ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Adicionar Curso</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="index.php" class="btn btn-sm btn-outline-secondary">Listar</a>
                </div>
            </div>
        </div>
        <form action="salvar.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do curso">
            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </main>
<?php include "../layout/rodape.php"; ?>