<?php $render('header'); ?>
<main>
    <div class="container">
    <?php
                
    ?>
        <div class="pesquisa">
            <h1 class="text-center mb-3">Pesquisa</h1>
            <div class="row d-flex justify-content-center">
                <?php if(isset($cpf)) { ?>
                    <div class="form-group col-md-4">
                        <select name="opcao" id="opcao" class="form-control custom-select">
                            <option value="cliente">Cliente</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control item_pesquisado" name="item_pesquisado" id="item_pesquisado" placeholder="CPF, CNPJ, Nº Processo ou Matricula" value="<?= $cpf; ?>">
                    </div>
                <?php } else { ?>
                    <div class="form-group col-md-4">
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
                <?php } ?>
                <div class="form-group col-md-2">
                    <button type="button" class="btn btn_submit" name="pesquisar" id="pesquisar">Pesquisar</button>
                </div>
            </div ><!-- Row -->
        </div>
    </div><!-- Container -->
        <div class="line"></div>
    <div class="container">
        <div class="resultado_pesquisa">

        </div>
    </div><!-- Container -->
</main><!-- Main -->
<?php $render('footer'); ?>