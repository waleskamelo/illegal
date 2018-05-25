<?php require_once __DIR__ ."/../../session.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Illegal Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="/illegal/css/bootstrap.min.css" rel="stylesheet">
    <link href="/illegal/css/dashboard.css" rel="stylesheet">
    <script src="/illegal/js/jquery-slim.min.js"></script>
    <script src="/illegal/js/popper.min.js"></script>
    <script src="/illegal/js/bootstrap.min.js"></script>

    <link rel="icon"
          type="image/jpg"
          href="/illegal/images/i.png"/>
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/illegal/admin/">Illegal Admin</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="/illegal/admin/logout.php">Sair</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/illegal/admin/curso">
                            <span data-feather="file"></span>
                            Curso
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/illegal/admin/disciplina">
                            <span data-feather="file"></span>
                            Disciplina
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/illegal/admin/gabarito">
                            <span data-feather="file"></span>
                            Gabaritos <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/illegal/admin/exercicio">
                            <span data-feather="book-open"></span>
                            Exercícios
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

    </div>
</div>

