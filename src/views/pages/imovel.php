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
                        <input type="text" name="iptu" id="iptu" class="form-control pula" required>
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
                        <label for="banheiros" class="mb-0 col-form-label-sm">Banho</label>
                        <input type="text" name="banheiros" id="banheiros" class="form-control pula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="dce" class="mb-0 col-form-label-sm">DCE</label>
                        <input type="text" name="dce" id="dce" class="form-control pula">
                    </div>                    
                </div><!-- Row 5 -->

                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="varanda" class="mb-0 col-form-label-sm">Varanda</label>
                        <input type="text" name="varanda" id="varanda" class="form-control pula">
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
                    <div class="form-group col-md-2">
                        <label for="garagem" class="mb-0 col-form-label-sm">Garagem</label>
                        <input type="text" name="garagem" id="garagem" class="form-control pula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="elevador" class="mb-0 col-form-label-sm">Elevador</label>
                        <input type="text" name="elevador" id="elevador" class="form-control pula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="ap_andar" class="mb-0 col-form-label-sm">Aptos. Andar</label>
                        <input type="text" name="ap_andar" id="ap_andar" class="form-control pula">
                    </div>
                </div><!-- Row 6 -->

                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="andares" class="mb-0 col-form-label-sm">Andares</label>
                        <input type="text" name="andares" id="andares" class="form-control pula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="area" class="mb-0 col-form-label-sm">Área</label>
                        <input type="text" name="area" id="area" class="form-control pula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="apto_posicao" class="mb-0 col-form-label-sm">Posicão Apto</label>
                        <input type="text" name="apto_posicao" id="apto_posicao" class="form-control pula">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="sol_posicao" class="mb-0 col-form-label-sm">Psição Sol</label>
                        <input type="text" name="sol_posicao" id="sol_posicao" class="form-control pula">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="p_referencia" class="mb-0 col-form-label-sm">Ponto de referência</label>
                        <input type="text" name="p_referencia" id="p_referencia" class="form-control pula">
                    </div>
                </div><!-- Row 7 -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input pula" name="ventilador_teto" id="ventilador_teto" value="ventilador_teto">
                            <label for="ventilador_teto" class="form-check-label">Ventilador teto</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="ar_condicionado" id="ar_condicionado" class="form-check-input pula" value="ar_condicionado">
                            <label for="ar_condicionado" class="form-check-label">Ar condicionado</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="arm_banheiro" id="arm_banheiro" class="form-check-input pula" value="armario_banheiro">
                            <label for="arm_banheiro" class="form-check-label">Armário banheiro</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="arm_cozinha" id="arm_cozinha" class="form-check-input pula" value="armario_cozinha">
                            <label for="arm_cozinha" class="form-check-label">Armário cozinha</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="arm_quarto" id="arm_quarto" class="form-check-input pula" value="armario_quarto">
                            <label for="arm_quarto" class="form-check-label">Armário quarto</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="granito" id="granito" class="form-check-input pula" value="fachada_granito">
                            <label for="granito" class="form-check-label">Fachada granito</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="blindex" class="form-check-input pula" id="blindex" value="fachada_blindex">
                            <label for="blindex" class="form-check-label">Fachada blindex</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check">
                            <input type="checkbox" name="fachada_pintura" id="fachada_pintura" class="form-check-input pula" value="fachada_pintura">
                            <label for="fachada_pintura" class="form-check-label">Fachaca pintura</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="seguranca_portao" id="seguranca_portao" class="form-check-input pula" value="seguranca_portao">
                            <label for="seguranca_portao" class="form-check-label">Segurança Portão</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="gas" id="gas" class="form-check-input pula" value="gas">
                            <label for="gas" class="form-check-label">Gás</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="circuito_tv" id="circuito_tv" class="form-check-input pula" value="circuito_tv">
                            <label for="circuito_tv" class="form-check-label">Circúito de TV</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="portaria" id="portaria" class="form-check-input pula" value="portaria">
                            <label for="portaria" class="form-check-label">Portaria 24h</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="interfone" id="interfone" class="form-check-input pula" value="interfone">
                            <label for="interfone" class="form-check-label">Interfone</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="ginastica" id="ginastica" class="form-check-input pula" value="ginastica">
                            <label for="ginastica" class="form-check-label">Salão de ginática</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check">
                            <input type="checkbox" name="quadra" id="quadra" class="form-check-input pula" value="quadra">
                            <label for="quadra" class="form-check-label">Quadra esportiva</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="festas" id="festas" class="form-check-input pula" value="festas">
                            <label for="festas" class="form-check-label">Salão de festas</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="jogos" id="jogos" class="form-check-input pula" value="jogos">
                            <label for="jogos" class="form-check-label">Salão de jogos</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="churrasqueira" id="churrasqueira" class="form-check-input pula" value="churrasqueira">
                            <label for="churrasqueira" class="form-check-label">Churrasqueira</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="playground" id="playground" class="form-check-input pula" value="playground">
                            <label for="playground" class="form-check-label">Playground</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="piscina" id="piscina" class="form-check-input pula" value="piscina">
                            <label for="piscina" class="form-check-label">Piscina</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="sauna" id="sauna" class="form-check-input pula" value="sauna">
                            <label for="sauna" class="form-check-label">Sauna</label>
                        </div>
                    </div>
                </div><!-- Row 8 -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="sindico" class="mb-0 col-form-label-sm">Sídico</label>
                        <input type="text" name="sindico" id="sindico" class="form-control pula">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="s_telefone" class="mb-0 col-form-label-sm">Telefone</label>
                        <input type="text" name="s_telefone" id="s_telefone" class="form-control pula">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="s_email" class="mb-0 col-form-label-sm">E-mail</label>
                        <input type="text" name="s_email" id="s_email" class="form-control pula">
                    </div>
                </div><!-- Row 9 -->
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