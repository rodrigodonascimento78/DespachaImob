<?php $render('header'); ?>

<main>
    <div class="container">
        <h1 class="text-center mb-3">Procuração para o ITBI</h1>
        <form action="<?= $base; ?>novaprocuracaoitbi" method="POST">
            <div class="row d-flex justify-content-center">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control item_pesquisado pula" name="item_pesquisado" id="item_pesquisado" placeholder="Nº Processo" required>
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn_submit" name="gera_procuracao_itbi" id="gera_procuracao_itbi">Gerar Procuração</button>
                </div>
            </div ><!-- Row 1 -->
        </form>
    </div>
</main>

<?php $render('footer'); ?>