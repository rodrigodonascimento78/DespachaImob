<?php $render('header'); ?>
<main>
<div class="container">
        <div class="pesquisa">
            <?php
                if (isset($mensagem)) {
                    echo '<div class="'. $classe .'">'.$mensagem.'</div>';
                }
            ?>
            <h1 class="text-center">Anexar Documentos</h1>
                <form method="POST" enctype="multipart/form-data" action="<?= $base; ?>documentos">
                    <div class="row d-flex justify-content-center">
                        <div class="form-group col-md-3">
                            <select name="opcao" id="opcao" class="form-control custom-select">
                                <option value="">Escolha uma opção</option>
                                <option value="cliente">Cliente</option>
                                <option value="imovel">Imóvel</option>
                                <option value="processo">Processo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control item_pesquisado" name="item_pesquisado" id="item_pesquisado" placeholder="CPF, CNPJ, Nº Processo ou Matricula">
                        </div>

                        <div class="form-group col-md-3 mb-3 d-flex justify-content-center">
                            <label id="label_arquivos" for="arquivos">Selecione os arquivos <i class="fas fa-cloud-upload-alt ml-2"></i></label>
                            <input multiple type="file" name="arquivos" id="arquivos">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="submit" name="acao" value="Enviar Arquivos" class="btn btn-primary btn_submit">
                        </div>
                    </div ><!-- Row -->
                </form>
        </div>
    </div><!-- Container -->
</main>
<?php $render('footer'); ?>