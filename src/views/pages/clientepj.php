<?php $render('header'); ?>
<main>
    <h1 class="text-center">Cliente Pessoa Jurídica</h1>    
    <div class="container">
            <?php if(isset($mensagem) && $mensagem === 'sucesso') { ?>
                <div class="alert alert-success text-center conteudo_mensagem">
                    Cadastro realizado com sucesso!
                </div>
            <?php } else if(isset($mensagem) && $mensagem === 'error') { ?>
                <div class="alert alert-danger text-center conteudo_mensagem">
                    Cadastro não foi realizado, pois já existe na base de dados
                </div>
            <?php } ?>
            <form method="POST" action="<?= $base; ?>clientepj" class="viacepForm pessoa_juridica">

                <!-- DADOS DA PESSOA JURÍDICA -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="razao_social" class="mb-0 col-form-label-sm">Razão Social</label>
                        <input type="text" name="razao_social" id="razao_social" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome_fantasia" class="mb-0 col-form-label-sm">Nome Fantasia</label>
                        <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control pula">
                    </div>
                </div><!-- Row 1 -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="cnpj" class="mb-0 col-form-label-sm">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="insc_estadual" class="mb-0 col-form-label-sm">Insc. Estadual</label>
                        <input type="text" name="insc_estadual" id="insc_estadual" class="form-control pula i_estadual" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data_abertura" class="mb-0 col-form-label-sm">Data da Abertura</label>
                        <input type="date" name="data_abertura" id="data_abertura" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cep" class="mb-0 col-form-label-sm">CEP</label>
                        <input type="text" name="cep" id="cep" class="form-control pula viacep-cep">
                    </div>
                </div><!-- Row 2 -->

                <!-- ENDEREÇO CLIENTE  PESSOA JURÍDICA-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="logradouro" class="mb-0 col-form-label-sm">Endereço</label>
                        <input type="text" name="logradouro" id="logradouro" class="form-control pula viacep-logradouro">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numero" class="mb-0 col-form-label-sm">Número</label>
                        <input type="text" name="numero" id="numero" class="form-control pula viacep-numero">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="complemento" class="mb-0 col-form-label-sm">Complemento</label>
                        <input type="text" name="complemento" id="complemento" class="form-control pula viacep-complemento">
                    </div>
                </div><!-- Row 3 -->
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="bairro" class="mb-0 col-form-label-sm">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control pula viacep-bairro">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="cidade" class="mb-0 col-form-label-sm">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control pula viacep-cidade">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uf" class="mb-0 col-form-label-sm">UF</label>
                        <select name="uf" id="uf" class="form-control pula viacep-uf">
                            <option value=""></option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                </div><!-- Row 4 -->

                <!-- CONTATOS CLIENTE PESSOA JURÍDICA -->
                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="email_1" class="mb-0 col-form-label-sm">E-mail 1</label>
                        <input type="email" name="email_1" id="email_1" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefone_1" class="mb-0 col-form-label-sm">Telefone 1</label>
                        <input type="text" name="telefone_1" id="telefone_1" class="form-control pula telefone" required>
                    </div>
                </div><!-- Row 5 -->
                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="email_2" class="mb-0 col-form-label-sm">E-mail 2</label>
                        <input type="email" name="email_2" id="email_2" class="form-control pula">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefone_2" class="mb-0 col-form-label-sm">Telefone 2</label>
                        <input type="text" name="telefone_2" id="telefone_2" class="form-control pula telefone">
                    </div>
                </div>

                <!-- SÓCIOS 1 -->
                <h1 class="text-center mb-3">Representante Legal</h1>
                <div class="row">
                    <div class="form-group col-md-7">
                        <label for="nome_socio_1" class="mb-0 col-form-label-sm">Nome</label>
                        <input type="text" name="nome_socio_1" id="nome_socio_1" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cpf_socio_1" class="mb-0 col-form-label-sm">CPF</label>
                        <input type="text" name="cpf_socio_1" id="cpf_socio_1" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nacionalidade_socio_1" class="mb-0 col-form-label-sm">Nacionalidade</label>
                        <input type="text" name="nacionalidade_socio_1" id="nacionalidade_socio_1" class="form-control pula" required>
                    </div>
                </div><!-- row 6 -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nascimento_socio_1" class="mb-0 col-form-label-sm">Nascimento</label>
                        <input type="date" name="nascimento_socio_1" id="nascimento_socio_1" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="rg_socio_1" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                        <input type="text" name="rg_socio_1" id="rg_socio_1" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="d_expedicao_socio_1" class="mb-0 col-form-label-sm">Data Expedição</label>
                        <input type="date" name="d_expedicao_socio_1" id="d_expedicao_socio_1" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="o_expedidor_socio_1" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                        <input type="text" name="o_expedidor_socio_1" id="o_expedidor_socio_1" class="form-control pula" required>
                    </div>
                </div><!-- Row 7 -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="cep_socio_1" class="mb-0 col-form-label-sm">CEP</label>
                        <input type="text" name="cep_socio_1" id="cep_socio_1" class="form-control pula viacep-cep">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="logradouro_socio_1" class="mb-0 col-form-label-sm">Endereço</label>
                        <input type="text" name="logradouro_socio_1" id="logradouro_socio_1" class="form-control pula viacep-logradouro">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numero_socio_1" class="mb-0 col-form-label-sm">Número</label>
                        <input type="text" name="numero_socio_1" id="numero_socio_1" class="form-control pula viacep-numero">
                    </div>
                </div><!-- Row 8 -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="complemento_socio_1" class="mb-0 col-form-label-sm">Complemento</label>
                        <input type="text" name="complemento_socio_1" id="complemento_socio_1" class="form-control pula viacep-complemento">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bairro_socio_1" class="mb-0 col-form-label-sm">Bairro</label>
                        <input type="text" name="bairro_socio_1" id="bairro_socio_1" class="form-control pula viacep-bairro">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cidade_socio_1" class="mb-0 col-form-label-sm">Cidade</label>
                        <input type="text" name="cidade_socio_1" id="cidade_socio_1" class="form-control pula viacep-cidade">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uf_socio_1" class="mb-0 col-form-label-sm">UF</label>
                        <select name="uf_socio_1" id="uf_socio_1" class="form-control pula viacep-uf">
                            <option value=""></option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                </div><!-- Row 9 -->
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="profissao_socio_1" class="mb-0 col-form-label-sm">Profissão</label>
                        <input type="text" name="profissao_socio_1" id="profissao_socio_1" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="estado_civil_socio_1">Estado Civil</label>
                        <select name="estado_civil_socio_1" id="estado_civil_socio_1" class="form-control pula" required>
                            <option value=""></option>
                            <option value="solteiro">Solteiro</option>
                            <option value="casado">Casado</option>
                            <option value="separado">Separado</option>
                            <option value="divorciado">Divorciado</option>
                            <option value="viuvo">Viúvo</option>
                        </select>
                    </div><!-- Form Group -->
                    <div class="form-group col-md-5">
                        <label for="ass_cartorio_socio_1" class="mb-0 col-form-label-sm">Ass. Cartório</label>
                        <input type="text" name="ass_cartorio_socio_1" id="ass_cartorio_socio_1" class="form-control pula" required>
                    </div>
                </div><!-- Row 10 -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="celular_socio_1" class="mb-0 col-form-label-sm">Celular</label>
                        <input type="text" name="celular_socio_1" id="celular_socio_1" class="form-control pula celular">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="email_socio_1" class="mb-0 col-form-label-sm">E-mail</label>
                        <input type="email" name="email_socio_1" id="email_socio_1" class="form-control pula">
                    </div>
                </div><!-- Row 11 -->
                <div class="row" id="btns_controle_socio_1">
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Adicionar Representante Legal?</label>
                        <a type="button" id="sim_add_1" name="sim_add" class="far fa-check-circle sim_add"></a>
                        <a type="button" id="nao_add_1" name="nao_add" class="far fa-times-circle nao_add"></a>
                    </div>
                </div><!-- Row 12 -->

                <!-- SÓCIO 2 -->
                <div id="mostra_socio_2" hidden="true">
                    <h1 class="text-center mb-3">Representante Legal 2</h1>
                    <a type="button" id="close_socio_2" name="close_socio_2" class="fas fa-times close_socio"></a>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="estado_civil_2">Estado Civil</label>
                            <select name="estado_civil_2" id="estado_civil_2" class="form-control pula">
                                <option value=""></option>
                                <option value="solteiro">Solteiro</option>
                                <option value="casado">Casado</option>
                                <option value="separado">Separado</option>
                                <option value="divorciado">Divorciado</option>
                                <option value="viuvo">Viúvo</option>
                            </select>
                        </div><!-- Form Group -->
                        <div class="form-group col-md-6">
                            <label for="nome_socio_2" class="mb-0 col-form-label-sm">Nome</label>
                            <input type="text" name="nome_socio_2" id="nome_socio_2" class="form-control pula">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cpf_socio_2" class="mb-0 col-form-label-sm">CPF</label>
                            <input type="text" name="cpf_socio_2" id="cpf_socio_2" class="form-control pula">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nacionalidade_socio_2" class="mb-0 col-form-label-sm">Nacionalidade</label>
                            <input type="text" name="nacionalidade_socio_2" id="nacionalidade_socio_2" class="form-control pula">
                        </div>
                    </div><!-- row 13 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nascimento_socio_2" class="mb-0 col-form-label-sm">Nascimento</label>
                            <input type="date" name="nascimento_socio_2" id="nascimento_socio_2" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rg_socio_2" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                            <input type="text" name="rg_socio_2" id="rg_socio_2" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="d_expedicao_socio_2" class="mb-0 col-form-label-sm">Data Expedição</label>
                            <input type="date" name="d_expedicao_socio_2" id="d_expedicao_socio_2" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="o_expedidor_socio_2" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                            <input type="text" name="o_expedidor_socio_2" id="o_expedidor_socio_2" class="form-control pula" required>
                        </div>
                    </div><!-- Row 14 -->
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="cep_socio_2" class="mb-0 col-form-label-sm">CEP</label>
                            <input type="text" name="cep_socio_2" id="cep_socio_2" class="form-control pula viacep-cep">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="logradouro_socio_2" class="mb-0 col-form-label-sm">Endereço</label>
                            <input type="text" name="logradouro_socio_2" id="logradouro_socio_2" class="form-control pula viacep-logradouro">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="numero_socio_2" class="mb-0 col-form-label-sm">Número</label>
                            <input type="text" name="numero_socio_2" id="numero_socio_2" class="form-control pula viacep-numero">
                        </div>
                    </div><!-- Row 15 -->
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="complemento_socio_2" class="mb-0 col-form-label-sm">Complemento</label>
                            <input type="text" name="complemento_socio_2" id="complemento_socio_2" class="form-control pula viacep-complemento">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bairro_socio_2" class="mb-0 col-form-label-sm">Bairro</label>
                            <input type="text" name="bairro_socio_2" id="bairro_socio_2" class="form-control pula viacep-bairro">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade_socio_2" class="mb-0 col-form-label-sm">Cidade</label>
                            <input type="text" name="cidade_socio_2" id="cidade_socio_2" class="form-control pula viacep-cidade">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="uf_socio_2" class="mb-0 col-form-label-sm">UF</label>
                            <select name="uf_socio_2" id="uf_socio_2" class="form-control pula viacep-uf">
                                <option value=""></option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div><!-- Row 16 -->
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="profissao_socio_2" class="mb-0 col-form-label-sm">Profissão</label>
                            <input type="text" name="profissao_socio_2" id="profissao_socio_2" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tipo_regime_socio_2">Estado Civil</label>
                            <select name="tipo_regime_socio_2" id="tipo_regime_socio_2" class="form-control pula" required>
                                <option value=""></option>
                                <option value="solteiro">Solteiro</option>
                                <option value="casado">Casado</option>
                                <option value="separado">Separado</option>
                                <option value="divorciado">Divorciado</option>
                                <option value="viuvo">Viúvo</option>
                            </select>
                        </div><!-- Form Group -->
                        <div class="form-group col-md-5">
                            <label for="ass_cartorio_socio_2" class="mb-0 col-form-label-sm">Ass. Cartório</label>
                            <input type="text" name="ass_cartorio_socio_2" id="ass_cartorio_socio_2" class="form-control pula" required>
                        </div>
                    </div><!-- Row 17 -->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="celular_socio_2" class="mb-0 col-form-label-sm">Celular</label>
                            <input type="text" name="celular_socio_2" id="celular_socio_2" class="form-control pula celular">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="email_socio_2" class="mb-0 col-form-label-sm">E-mail</label>
                            <input type="email" name="email_socio_2" id="email_socio_2" class="form-control pula">
                        </div>
                    </div><!-- Row 18 -->
                    <div class="row" id="btns_controle_socio_2">
                        <div class="form-group col-md-12">
                            <label class="col-form-label">Adicionar Representante Legal?</label>
                            <a type="button" id="sim_add_2" name="sim_add" class="far fa-check-circle sim_add"></a>
                            <a type="button" id="nao_add_2" name="nao_add" class="far fa-times-circle nao_add"></a>
                        </div>
                    </div><!-- Row 19 -->
                </div>

                <!-- SÓCIO 3 -->
                <div id="mostra_socio_3" hidden="true">
                    <h1 class="text-center mb-3">Representante Legal 3</h1>
                    <a type="button" id="close_socio_3" name="close_socio_3" class="fas fa-times close_socio"></a>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="estado_civil_socio_3">Estado Civil</label>
                            <select name="estado_civil_socio_3" id="estado_civil_socio_3" class="form-control pula">
                                <option value=""></option>
                                <option value="solteiro">Solteiro</option>
                                <option value="casado">Casado</option>
                                <option value="separado">Separado</option>
                                <option value="divorciado">Divorciado</option>
                                <option value="viuvo">Viúvo</option>
                            </select>
                        </div><!-- Form Group -->
                        <div class="form-group col-md-6">
                            <label for="nome_socio_3" class="mb-0 col-form-label-sm">Nome</label>
                            <input type="text" name="nome_socio_3" id="nome_socio_3" class="form-control pula">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cpf_socio_3" class="mb-0 col-form-label-sm">CPF</label>
                            <input type="text" name="cpf_socio_3" id="cpf_socio_3" class="form-control pula">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nacionalidade_socio_3" class="mb-0 col-form-label-sm">Nacionalidade</label>
                            <input type="text" name="nacionalidade_socio_3" id="nacionalidade_socio_3" class="form-control pula">
                        </div>
                    </div><!-- row 20 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nascimento_socio_3" class="mb-0 col-form-label-sm">Nascimento</label>
                            <input type="date" name="nascimento_socio_3" id="nascimento_socio_3" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rg_socio_3" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                            <input type="text" name="rg_socio_3" id="rg_socio_3" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="d_expedicao_socio_3" class="mb-0 col-form-label-sm">Data Expedição</label>
                            <input type="date" name="d_expedicao_socio_3" id="d_expedicao_socio_3" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="o_expedidor_socio_3" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                            <input type="text" name="o_expedidor_socio_3" id="o_expedidor_socio_3" class="form-control pula" required>
                        </div>
                    </div><!-- Row 21 -->
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="cep_socio_3" class="mb-0 col-form-label-sm">CEP</label>
                            <input type="text" name="cep_socio_3" id="cep_socio_3" class="form-control pula viacep-cep">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="logradouro_socio_3" class="mb-0 col-form-label-sm">Endereço</label>
                            <input type="text" name="logradouro_socio_3" id="logradouro_socio_3" class="form-control pula viacep-logradouro">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="numero_socio_3" class="mb-0 col-form-label-sm">Número</label>
                            <input type="text" name="numero_socio_3" id="numero_socio_3" class="form-control pula viacep-numero">
                        </div>
                    </div><!-- Row 22 -->
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="complemento_socio_3" class="mb-0 col-form-label-sm">Complemento</label>
                            <input type="text" name="complemento_socio_3" id="complemento_socio_3" class="form-control pula viacep-complemento">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bairro_socio_3" class="mb-0 col-form-label-sm">Bairro</label>
                            <input type="text" name="bairro_socio_3" id="bairro_socio_3" class="form-control pula viacep-bairro">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade_socio_3" class="mb-0 col-form-label-sm">Cidade</label>
                            <input type="text" name="cidade_socio_3" id="cidade_socio_3" class="form-control pula viacep-cidade">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="uf_socio_3" class="mb-0 col-form-label-sm">UF</label>
                            <select name="uf_socio_3" id="uf_socio_3" class="form-control pula viacep-uf">
                                <option value=""></option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div><!-- Row 23 -->
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="profissao_socio_3" class="mb-0 col-form-label-sm">Profissão</label>
                            <input type="text" name="profissao_socio_3" id="profissao_socio_3" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tipo_regime_socio_3">Estado Civil</label>
                            <select name="tipo_regime_socio_3" id="tipo_regime_socio_3" class="form-control pula" required>
                                <option value=""></option>
                                <option value="solteiro">Solteiro</option>
                                <option value="casado">Casado</option>
                                <option value="separado">Separado</option>
                                <option value="divorciado">Divorciado</option>
                                <option value="viuvo">Viúvo</option>
                            </select>
                        </div><!-- Form Group -->
                        <div class="form-group col-md-5">
                            <label for="ass_cartorio_socio_3" class="mb-0 col-form-label-sm">Ass. Cartório</label>
                            <input type="text" name="ass_cartorio_socio_3" id="ass_cartorio_socio_3" class="form-control pula" required>
                        </div>
                    </div><!-- Row 24 -->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="celular_socio_3" class="mb-0 col-form-label-sm">Celular</label>
                            <input type="text" name="celular_socio_3" id="celular_socio_3" class="form-control pula celular">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="email_socio_3" class="mb-0 col-form-label-sm">E-mail</label>
                            <input type="email" name="email_socio_3" id="email_socio_3" class="form-control pula">
                        </div>
                    </div><!-- Row 25 -->
                    <div class="row" id="btns_controle_socio_3">
                        <div class="form-group col-md-12">
                            <label class="col-form-label">Adicionar Representante Legal?</label>
                            <a type="button" id="sim_add_3" name="sim_add" class="far fa-check-circle sim_add"></a>
                            <a type="button" id="nao_add_3" name="nao_add" class="far fa-times-circle nao_add"></a>
                        </div>
                    </div><!-- Row 26 -->
                </div>

                <!-- SÓCIO 4 -->
                <div id="mostra_socio_4" hidden="true">
                    <h1 class="text-center mb-3">Representante Legal 4</h1>
                    <a type="button" id="close_socio_4" name="close_socio_4" class="fas fa-times close_socio"></a>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="estado_civil_4">Estado Civil</label>
                            <select name="estado_civil_4" id="estado_civil_4" class="form-control pula">
                                <option value=""></option>
                                <option value="solteiro">Solteiro</option>
                                <option value="casado">Casado</option>
                                <option value="separado">Separado</option>
                                <option value="divorciado">Divorciado</option>
                                <option value="viuvo">Viúvo</option>
                            </select>
                        </div><!-- Form Group -->
                        <div class="form-group col-md-6">
                            <label for="nome_socio_4" class="mb-0 col-form-label-sm">Nome</label>
                            <input type="text" name="nome_socio_4" id="nome_socio_4" class="form-control pula">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cpf_socio_4" class="mb-0 col-form-label-sm">CPF</label>
                            <input type="text" name="cpf_socio_4" id="cpf_socio_4" class="form-control pula">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nacionalidade_socio_4" class="mb-0 col-form-label-sm">Nacionalidade</label>
                            <input type="text" name="nacionalidade_socio_4" id="nacionalidade_socio_4" class="form-control pula">
                        </div>
                    </div><!-- row 27 -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nascimento_socio_4" class="mb-0 col-form-label-sm">Nascimento</label>
                            <input type="date" name="nascimento_socio_4" id="nascimento_socio_4" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rg_socio_4" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                            <input type="text" name="rg_socio_4" id="rg_socio_4" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="d_expedicao_socio_4" class="mb-0 col-form-label-sm">Data Expedição</label>
                            <input type="date" name="d_expedicao_socio_4" id="d_expedicao_socio_4" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="o_expedidor_socio_4" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                            <input type="text" name="o_expedidor_socio_4" id="o_expedidor_socio_4" class="form-control pula" required>
                        </div>
                    </div><!-- Row 28 -->
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="cepsocio_4" class="mb-0 col-form-label-sm">CEP</label>
                            <input type="text" name="cepsocio_4" id="cepsocio_4" class="form-control pula viacep-cep">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="logradourosocio_4" class="mb-0 col-form-label-sm">Endereço</label>
                            <input type="text" name="logradourosocio_4" id="logradourosocio_4" class="form-control pula viacep-logradouro">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="numerosocio_4" class="mb-0 col-form-label-sm">Número</label>
                            <input type="text" name="numerosocio_4" id="numerosocio_4" class="form-control pula viacep-numero">
                        </div>
                    </div><!-- Row 29 -->
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="complementosocio_4" class="mb-0 col-form-label-sm">Complemento</label>
                            <input type="text" name="complementosocio_4" id="complementosocio_4" class="form-control pula viacep-complemento">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bairrosocio_4" class="mb-0 col-form-label-sm">Bairro</label>
                            <input type="text" name="bairrosocio_4" id="bairrosocio_4" class="form-control pula viacep-bairro">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidadesocio_4" class="mb-0 col-form-label-sm">Cidade</label>
                            <input type="text" name="cidadesocio_4" id="cidadesocio_4" class="form-control pula viacep-cidade">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ufsocio_4" class="mb-0 col-form-label-sm">UF</label>
                            <select name="ufsocio_4" id="ufsocio_4" class="form-control pula viacep-uf">
                                <option value=""></option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div><!-- Row 30 -->
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="profissao_socio_4" class="mb-0 col-form-label-sm">Profissão</label>
                            <input type="text" name="profissao_socio_4" id="profissao_socio_4" class="form-control pula" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tipo_regime_socio_4">Estado Civil</label>
                            <select name="tipo_regime_socio_4" id="tipo_regime_socio_4" class="form-control pula" required>
                                <option value=""></option>
                                <option value="solteiro">Solteiro</option>
                                <option value="casado">Casado</option>
                                <option value="separado">Separado</option>
                                <option value="divorciado">Divorciado</option>
                                <option value="viuvo">Viúvo</option>
                            </select>
                        </div><!-- Form Group -->
                        <div class="form-group col-md-5">
                            <label for="ass_cartorio_socio_4" class="mb-0 col-form-label-sm">Ass. Cartório</label>
                            <input type="text" name="ass_cartorio_socio_4" id="ass_cartorio_socio_4" class="form-control pula" required>
                        </div>
                    </div><!-- Row 31 -->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="celular_socio_4" class="mb-0 col-form-label-sm">Celular</label>
                            <input type="text" name="celular_socio_4" id="celular_socio_4" class="form-control pula celular">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="email_socio_4" class="mb-0 col-form-label-sm">E-mail</label>
                            <input type="email" name="email_socio_4" id="email_socio_4" class="form-control pula">
                        </div>
                    </div><!-- Row 32 -->
                </div>
                <div class="row" id="btn_enviar_form_pj" hidden="true">
                    <div class="form-group col-md-12">
                        <button type="submit" id="btn_submit_pj" class="btn btn-primary mb-3 mt-3 btn_submit">Enviar</button>
                    </div>
                </div><!-- row 33 -->
            </form>
        </div><!-- Container -->
</main>
<?php $render('footer'); ?>