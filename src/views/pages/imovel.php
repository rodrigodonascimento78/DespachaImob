<?php $render('header'); ?>
    <main>
        <h1 class="text-center">Imóvel</h1>
        <div class="container">
            <?php
                /* if(isset($mensagem)) {
                    echo $divinit;
                    echo $mensagem;
                    echo $divfim;
                } */
            ?>
            <form method="POST" action="<?= $base; ?>imovel" class="viacepForm">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="cep" class="mb-0 col-form-label-sm">CEP</label>
                        <input type="text" name="cep" id="cep" class="form-control pula viacep-cep" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="logradouro" class="mb-0 col-form-label-sm">Endereço</label>
                        <input type="text" name="logradouro" id="logradouro" class="form-control pula viacep-logradouro" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numero" class="mb-0 col-form-label-sm">Número</label>
                        <input type="text" name="numero" id="numero" class="form-control pula viacep-numero" required>
                    </div>
                </div><!-- Row 2 -->

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="complemento" class="mb-0 col-form-label-sm">Complemento</label>
                        <input type="text" name="complemento" id="complemento" class="form-control pula">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bairro" class="mb-0 col-form-label-sm">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control pula viacep-bairro" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cidade" class="mb-0 col-form-label-sm">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control pula viacep-cidade" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uf" class="mb-0 col-form-label-sm">UF</label>
                        <select name="uf" id="uf" class="form-control pula viacep-uf" required>
                            <option value=""></option>
	                        <option value="AC">AC</option>
                            <option value="AL">AL</option>	
                            <option value="AM">AM</option>
                            <option value="AP">AP</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MG">MG</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>	
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>	
                            <option value="PR">PR</option>	
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="RS">RS</option>	
                            <option value="SC">SC</option>	
                            <option value="SE">SE</option>	
                            <option value="SP">SP</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                </div><!-- Row 3 -->

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="iptu" class="mb-0 col-form-label-sm">IPTU</label>
                        <input type="text" name="iptu" id="iptu" class="form-control pula">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="matricula" class="mb-0 col-form-label-sm">Matrícula</label>
                        <input type="text" name="matricula" id="matricula" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cartorio" class="mb-0 col-form-label-sm">Cartório</label>
                        <select name="cartorio" id="cartorio" class="form-control pula" required>
                            <option value=""></option>
                            <option value="1">Cartório do 1º Ofício do Registro de Imóveis Toscano</option>
                            <option value="2">Cartório do 2º Ofício de Registro de Imóveis Massote</option>
                            <option value="3">Cartório do 3º Ofício de Registro de Imóveis Olavo Costa</option>
                        </select>
                    </div>
                </div><!-- Row 4 -->

                <div class="row">
                    <div class="form-group col-md-3">
                    <label for="v_venda" class="mb-0 col-form-label-sm">Valor Venda</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="v_venda">R$</label>
                            </div>
                            <input type="text" name="v_venda" id="v_venda" class="form-control pula money" required>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="v_condominio" class="mb-0 col-form-label-sm">Valor Condomínio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="v_condominio">R$</label>
                            </div>
                            <input type="text" name="v_condominio" id="v_condominio" class="form-control pula money">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="suites" class="mb-0 col-form-label-sm">Suítes</label>
                        <input type="text" name="suites" id="suites" class="form-control pula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="vazio" class="mb-0 col-form-label-sm">Vazio</label>
                        <select name="vazio" id="vazio" class="form-control pula" required>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for=""> </label>
                        <div class="form-check">
                            <input type="radio" disabled name="opcao_vazio" id="Inquilino" class="form-check-input" value="Inquilino">
                            <label for="inquilino" class="form-check-label">Inquilino</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" disabled name="opcao_vazio" id="Proprietario" class="form-check-input" value="Proprietario">
                            <label for="proprietario" class="form-check-label">Proprietário</label>
                        </div>
                    </div>
                </div><!-- Row 5 -->

                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="garagem" class="mb-0 col-form-label-sm">Garagem</label>
                        <input type="text" name="garagem" id="garagem" class="form-control pula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="elevador" class="mb-0 col-form-label-sm">Elevador</label>
                        <input type="text" name="elevador" id="elevador" class="form-control pula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="quartos" class="mb-0 col-form-label-sm">Quartos</label>
                        <input type="text" name="quartos" id="quartos" class="form-control pula">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_referencia" class="mb-0 col-form-label-sm">Ponto de referência</label>
                        <input type="text" name="p_referencia" id="p_referencia" class="form-control pula">
                    </div>
                </div><!-- Row 6 -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="observacao" class="mb-0 col-form-label-sm">Observações</label>
                        <textarea class="form-control" name="observacao" id="observacao" rows="5"></textarea>
                    </div>
                </div><!-- Row 10 -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn_submit mb-5 mt-3">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
<?php $render('footer'); ?>