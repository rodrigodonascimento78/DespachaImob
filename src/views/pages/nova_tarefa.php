<?php $render('header'); ?>
<main>
    <h1 class="text-center">Tarefas</h1>
    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
                <ul class="list-group">
                    <a href="<?= $base ?>tarefas"><li class="list-group-item data-active">Tarefas pendentes</li></a>
                    <a href="<?= $base; ?>todas_tarefas"><li class="list-group-item data-active">Todas tarefas</li></a>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="container pagina">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Novas tarefas</h4>
                            <hr>
                            <form action="<?= $base; ?>nova_tarefa" method="POST">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="desc_tarefa" class="mb-0 col-fomr-label-sm">Data Vencimento</label>
                                        <input type="date" min="<?= $data_atual; ?>" class="form-control" name="venc_tarefa">
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="desc_tarefa" class="mb-0 col-fomr-label-sm">Descrição da tarefa</label>
                                        <input type="text" class="form-control" name="desc_tarefa">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn_submit mt-2">Cadastrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $render('footer'); ?>