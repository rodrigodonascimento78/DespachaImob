<?php $render('header'); ?>
<main>
    <h1 class="text-center">Tarefas</h1>
    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
                <ul class="list-group menu-list">
                    <a href="<?= $base; ?>nova_tarefa"><li class="list-group-item data-active">Nova tarefa</li></a>
                    <a href="<?= $base; ?>todas_tarefas"><li class="list-group-item data-active">Todas tarefas</li></a>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Tarefas pendentes</h4>
                            <hr>
                        <?php foreach($tarefas as $indice => $tarefa) {
                            $data = new DateTime($tarefa['data_cadastrado']);
                            if($tarefa['status'] === 'pendente') {
                        ?>
                            <div class="row mb-2 d-flex align-items-center tarefa">
                                <div class="col-sm-2 tarefa_<?= $tarefa['id'] ?>"><?= $data->format('d/m/Y'); ?></div>
                                <div class="col-sm-7 tarefa_<?= $tarefa['id'] ?>"><?= $tarefa['tarefa']; ?></div>
                                <div class="col-sm-3 mt-2 d-flex justify-content-between tarefa_icones_<?= $tarefa['id'] ?>">
                                    <i class="fas fa-trash-alt fa-lg text-danger del_tarefa" data-deletar="<?= $tarefa['id']; ?>"></i>
                                    <i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa['id']; ?>, '<?= $tarefa['tarefa']; ?>', '<?= $tarefa['data_cadastrado']; ?>')"></i>
                                    <i class="fas fa-check-square fa-lg text-success marca_realizada" data-realizado="<?= $tarefa['id']; ?>"></i>
                                </div>
                            </div>
                            <div  id="tarefa_<?= $tarefa['id']; ?>"></div>
                        <?php } 
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $render('footer'); ?>