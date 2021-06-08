<?php

use src\models\Compradore;

$render('header'); ?>
<main>
    <h1 class="text-center lista_processo">Processo Nº: <span class="num_processo" name="num_processo"><?= isset($proc_numero) ? $proc_numero : ''; ?></span></h1>
    <div class="container">
        <?php
            if(isset($mensagem)) {
                echo $divinit;
                echo $mensagem;
                echo $divfim;
            }
        ?>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cpf_comprador" class="mb-0">CPF Comprador</label>
                    <div class="input-group">
                        <input type="text" name="cpf_comprador" id="cpf_comprador" class="form-control pula">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn_cpf_comprador" type="button">Buscar</button>
                        </div><!-- Input Group Append -->
                    </div><!-- Input Group -->
                </div><!-- Form Group -->
            </div><!-- Div Col -->
            <div class="lista_compradores offset-md-1 col-md-7 mt-3">
                <table class="table table-sm text-center">
                    <thead>
                        <tr>
                            <th colspan="3">Comprador(es)</th>
                        </tr>
                        <tr>
                            <th hidden>ID Comprador</th>
                            <th>Nome</th>
                            <th colspan="2">CPF</th>
                        </tr>
                    </thead>
                    <tbody class="comprador_result"></tbody>
                </table>
            </div><!-- Compradores Lista -->
        </div><!-- Row -->
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cpf_procurador_comprador" class="mb-0">CPF Procurador Comprador</label>
                    <div class="input-group">
                        <input type="text" name="cpf_procurador_comprador" id="cpf_procurador_comprador" class="form-control pula">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn_cpf_procurador_comprador" type="button">Buscar</button>
                        </div><!-- Input Group Append -->
                    </div><!-- Input Group -->
                </div><!-- Form Group -->
            </div><!-- Div Col -->
            <div class="lista_procurador_comprador offset-md-1 col-md-7 mt-3">
                <table class="table table-sm text-center">
                    <thead>
                        <tr>
                            <th colspan=3>Procurador(es) Comprador(es)</th>
                        </tr>
                        <tr>
                            <th hidden>ID Procurador Comprador</th>
                            <th>Nome</th>
                            <th colspan="2">CPF</th>
                        </tr>
                    </thead>
                    <tbody class="procurador_comprador_result"></tbody>
                </table>
            </div><!-- Procurador Comprador Lista -->
        </div><!-- Row -->
        <hr>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cpf_vendedor" class="mb-0">CPF Vendedor</label>
                    <div class="input-group">
                        <input type="text" name="cpf_vendedor" id="cpf_vendedor" class="form-control pula">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn_cpf_vendedor" type="button">Buscar</button>
                        </div><!-- Input Group Append -->
                    </div><!-- Input Group -->
                </div><!-- Form Group -->
            </div><!-- Div Col -->
            <div class="lista_vendedores offset-md-1 col-md-7 mt-3">
                <table class="table table-sm text-center">
                    <thead>
                        <tr>
                            <th colspan="3">Vendedor(es)</th>
                        </tr>
                        <tr>
                            <th hidden>ID Vendedor</th>
                            <th>Nome</th>
                            <th colspan="2">CPF</th>
                        </tr>
                    </thead>
                    <tbody class="vendedor_result"></tbody>
                </table>
            </div><!-- Vendedores Lista -->
        </div><!-- Row -->
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cpf_procurador_vendedor" class="mb-0">CPF Procurador Vendedor</label>
                    <div class="input-group">
                        <input type="text" name="cpf_procurador_vendedor" id="cpf_procurador_vendedor" class="form-control pula">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn_cpf_procurador_vendedor" type="button">Buscar</button>
                        </div><!-- Input Group Append -->
                    </div><!-- Input Group -->
                </div><!-- Form Group -->
            </div><!-- Div Col -->
            <div class="lista_procurador_vendedor offset-md-1 col-md-7 mt-3">
                <table class="table table-sm text-center">
                    <thead>
                        <tr>
                            <th colspan=3>Procurador(es) Vendedor(es)</th>
                        </tr>
                        <tr>
                            <th hidden>ID Procurador Vendedor</th>
                            <th>Nome</th>
                            <th colspan="2">CPF</th>
                        </tr>
                    </thead>
                    <tbody class="procurador_vendedor_result"></tbody>
                </table>
            </div><!-- Procurador Vendedor Lista -->
        </div><!-- Row -->
        <hr>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="matricula_imovel" class="mb-0">Matrícula Imóvel</label>
                    <div class="input-group">
                        <input type="text" name="matricula_imovel" id="matricula_imovel" class="form-control pula">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn_matricula_imovel" type="button">Buscar</button>
                        </div><!-- Input Group Append -->
                    </div><!-- Input Group -->
                </div><!-- Form Group -->
            </div><!-- Div Col -->
            <div class="imovel offset-md-1 col-md-7 mt-3">
                <table class="table table-sm text-center">
                    <thead>
                        <tr>
                            <th colspan="5">Imóvel</th>
                        </tr>
                        <tr>
                            <th hidden>ID Imóvel</th>
                            <th>Matrícula</th>
                            <th>Endereço</th>
                            <th>Cartório</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="imovel_result"></tbody>
                </table>
            </div><!-- Imóveis Lista -->
        </div><!-- Row -->
        <div class="row justify-content-end mt-4">
            <div class="form-group">
                <button class="btn btn_submit" type="button" name="btn_cria_processo" id="btn_cria_processo">Criar Processo</button>
            </div>
        </div><!-- Row -->
        <form method="POST" action="<?= $base; ?>processo" class="form_processo">
        </form>
    </div><!-- Container -->
</main>
<?php $render('footer'); ?>