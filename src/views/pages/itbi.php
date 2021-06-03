<?php

use core\Controller;

$render('header'); ?>
<main>
    <div class="container">
        <div class="pesquisa">
            <h1 class="text-center mb-3">ITBI</h1>
            <form action="<?= $base; ?>novoitbi" method="POST">
                <div class="row d-flex justify-content-center">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control item_pesquisado pula" name="item_pesquisado" id="item_pesquisado" placeholder="Nº Processo" required>
                    </div>
                </div ><!-- Row 1 -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="percentual" class="mb-0 col-form-label-sm">Percentual Adquirido (%)</label>
                        <input type="text" class="form-control pula" name="percentual" id="percentual" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fase" class="mb-0 col-form-label-sm">Fase da Construção</label>
                        <input type="text" class="form-control pula" name="fase" id="fase" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="natureza" class="mb-0 col-form-label-sm">Natureza da Transmissão / Cessão</label>
                        <select class="form-control natureza" name="natureza" id="natureza" required>
                            <option></option>
                            <option value="compra">Compra e Venda</option>
                            <option value="cessao">Cessão de Direitos</option>
                            <option class="outra" value="outra">Outra</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="natureza_especificar" class="mb-0 col-form-label-sm">Especificar</label>
                        <input type="text" class="form-control natureza_especificar pula" name="natureza_especificar" id="natureza_especificar" disabled>
                    </div>
                </div><!-- Row 2 -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="dt_transacao" class="mb-0 col-form-label-sm">Data da transação</label>
                        <input type="date" class="form-control pula" name="dt_transacao">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="contrato" class="mb-0 col-form-label-sm">Foi firmado contato?</label>
                        <select name="contrato" id="contrato" class="form-control pula">
                            <option></option>
                            <option value="nao">Não</option>
                            <option value="sim">Sim</option>
                        </select>
                    </div>
                    <div class="form-goup col-md-3">
                        <label for="tipo_contrato" class="mb-0 col-form-label-sm">Tipo de contrato</label>
                        <select name="tipo_contrato" id="tipo_contrato" class="form-control tipo_contrato pula">
                            <option></option>
                            <option value="promessa">Promessa de compra e venda</option>
                            <option value="contrato">Contrato com agente do SFH</option>
                            <option class="outro" value="outro">Outro</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="outro_especificar" class="mb-0 col-form-label-sm">Especificar</label>
                        <input type="text" class="form-control pula outro_especificar" name="outro_especificar" disabled>
                    </div>
                </div><!-- Row 3 -->
                <div class="row d-flex justify-content-center">
                    <div class="form-group col-md-3">
                        <label for="f_pagamento" class="mb-0 col-form-label-sm">Forma de pagamento (ITBI)</label>
                        <select name="f_pagamento" id="f_pagamento" class="form-control f_pagamento pula" required>
                            <option></option>
                            <option value="avista">À vista</option>
                            <option class="parcelado" value="parcelado">Parcelado</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="parcelas" class="mb-0 col-form-label-sm">Número de parcelas</label>
                        <select name="parcelas" id="parcelas" class="form-control parcelas pula" disabled>
                            <option></option>
                            <option value="1">1 parcela</option>
                            <option value="2">2 parcelas</option>
                            <option value="3">3 parcelas</option>
                            <option value="4">4 parcelas</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn_submit" name="gera_itbi" id="gera_itbi">Gerar ITBI</button>
                    </div>
                </div><!-- Row  -->
            </form>
        </div>
    </div><!-- Container -->
</main><!-- Main -->
<?php $render('footer'); ?>