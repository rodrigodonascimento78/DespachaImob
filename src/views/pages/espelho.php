<?php $render('header'); ?>
<main>
    <div class="container">
        <div class="pesquisa">
            <h1 class="text-center mb-3">Espelho</h1>
            <form action="<?= $base; ?>novoespelho" method="POST" target="_blank">
                <div class="row d-flex justify-content-center">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control item_pesquisado" name="item_pesquisado" id="item_pesquisado" placeholder="Nº Processo">
                    </div>
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn_submit" name="gera_espelho" id="gera_espelho">Gerar Espelho</button>
                    </div>
                </div ><!-- Row -->
            </form>
        </div>
    </div><!-- Container -->
</main><!-- Main -->
<?php $render('footer'); ?>