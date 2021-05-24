<?php $render('header'); ?>
<main>
    <div class="home_flex container">
        <div class="niver">
            <h4 class="text-center mt-2">Aniversários de hoje:</h4>
            <ul>
                <?php foreach($aniversariantes as $rows) : ?>
                    <a href="<?= $base; ?>pesquisa?cpf=<?= $rows['cpf']; ?>"><li><i class="fas fa-caret-right setas"></i> <?= $rows['nome']; ?> - <?= $rows['celular']; ?></strong></li></a>
                <?php endforeach; ?>
            </ul>
        </div>
            
        <div class="pagina">
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
</main>

<?php $render('footer'); ?>