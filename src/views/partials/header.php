<?php date_default_timezone_set('America/Sao_Paulo'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $base; ?>assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= $base; ?>assets/bootstrap4.4.1/css/bootstrap.min.css">
    <title>Despachaimob</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-dark pt-0 pb-0">
            <div class="navbar-brand">
                <a href="<?= $base; ?>"><img src="<?= $base; ?>assets/images/logo_Original_J_Freitas_Branco.png" alt="Logo DespachaImob"></a>
            </div>
            <ul class="nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Cadastro</a>
                    <div class="dropdown-menu">
                        <a href="<?= $base; ?>novocliente" class="dropdown-item">Cliente</a>
                        <a href="<?= $base; ?>clientepj" class="dropdown-item">Cliente PJ</a>
                        <a href="<?= $base; ?>imovel" class="dropdown-item">Imóvel</a>
                        <a href="<?= $base; ?>processo" class="dropdown-item">Processo</a>
                        <a href="<?= $base; ?>documentos" class="dropdown-item">Documentos</a>
                        <a href="<?= $base; ?>nova_tarefa" class="dropdown-item">Tarefas</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="certidoes.html">Certidoes</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Formulários</a>
                    <div class="dropdown-menu">
                        <a href="declaracao" class="dropdown-item">Declaração</a>
                        <a href="espelho" class="dropdown-item">Espelho</a>
                        <a href="itbi" class="dropdown-item">ITBI</a>
                        <a href="procuracao" class="dropdown-item">Procuração</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= $base; ?>pesquisa">Pesquisa</a></li>
            </ul>
        </nav>
    </header>
    