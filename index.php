<?php
    require "model/Curso.php";
    require "model/Disciplina.php";
    require "model/Gabarito.php";
    require "model/Exercicio.php";

    $disciplinaModel = new Disciplina();

    $disciplinas = $disciplinaModel->listarTodos();

    if (isset($_GET['disciplina_id'])) {
        $gabaritoModel  = new Gabarito();
        $exercicioModel = new Exercicio();
        $gabaritos      = $gabaritoModel->listar($_GET['disciplina_id']);
        $exercicios     = $exercicioModel->listar($_GET['disciplina_id']);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Illegal</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">

    <link rel="icon"
          type="image/jpg"
          href="images/i.png"/>
</head>

<body class="bg-light">

<div class="col-md-1 offset-11" style="margin-top: 10px;">
    <a href="/illegal/admin" class="btn btn-secondary btn-sm">Admin</a>
</div>
<!--<div class="row">-->
<!--</div>-->
<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="images/i.png" alt="" width="72" height="72">
        <h2>Illegal</h2>
        <p class="lead">Olá, Seja bem vindo ao Illegal, onde você pode adiquirir gabaritos e exercícios dos cursos de Tecnologia da UNIPE-JP</p>
    </div>
    <form action="index.php" method="GET">
        <div class="row">
            <div class="col-md-9 mb-3">
                <label for="state">Curso / Disciplina</label>
                <select class="custom-select d-block w-100" name="disciplina_id" required="">
                    <option value="">Escolha...</option>
                    <?php foreach ($disciplinas as $disciplina): ?>
                        <option value="<?php echo $disciplina['id']; ?>"><?php echo $disciplina['curso'] . ' - ' .$disciplina['nome']; ?></option>
                    <?php endforeach;?>
                </select>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
            <div class="col-md-3 mb-3" style="margin-top: 9px;">
                <label for="button"></label>
                <button class="btn btn-primary btn-sm btn-block" type="submit">Pesquisar</button>
                <div class="invalid-feedback">

                </div>
            </div>
        </div>
    <div class="row" style="margin-top: 50px;">
        <?php if (isset($gabaritos)):?>
        <div class="col-md-6 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Gabaritos</span>
                <span class="badge badge-secondary badge-pill"> <?php echo count($gabaritos); ?></span>
            </h4>
            <ul class="list-group mb-3">
                <?php foreach ($gabaritos as $gabarito): ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?php echo $gabarito['nome']; ?></h6>
                        <small class="text-muted">Período: <?php echo $gabarito['periodo']; ?></small>
                    </div>
                    <span class="text-muted">
                        <a href="/illegal/admin/gabarito/download.php?id=<?php echo $gabarito['id']; ?>" class="btn btn-secondary btn-sm">Download</a>
                    </span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif;?>

        <?php if (isset($exercicios)):?>
            <div class="col-md-6 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Exercícios</span>
                    <span class="badge badge-secondary badge-pill"> <?php echo count($exercicios); ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($exercicios as $exercicio): ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $exercicio['nome']; ?></h6>
                                <small class="text-muted">Período: <?php echo $exercicio['periodo']; ?></small>
                            </div>
                            <span class="text-muted">
                        <a href="/illegal/admin/exercicio/download.php?id=<?php echo $exercicio['id']; ?>" class="btn btn-secondary btn-sm">Download</a>
                    </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif;?>

    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy;2018 Illegal</p>
        <ul class="list-inline">
        </ul>
    </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
