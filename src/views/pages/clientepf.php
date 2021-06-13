<?php $render('header'); ?>
    <main>
        <h1 class="text-center">Cliente Pessoa Física</h1>
        <div class="container">
            <?php if(isset($mensagem) && $mensagem === 'sucesso') { ?>
                <div class="alert alert-success text-center conteudo_mensagem">
                    'Cadastro realizado com sucesso!'
                </div>
            <?php } else if(isset($mensagem) && $mensagem === 'error') { ?>
                <div class="alert alert-danger text-center conteudo_mensagem">
                    Cadastro não foi realizado, pois já existe na base de dados.
                </div>
            <?php } ?>
            <form method="POST" action="<?= $base; ?>novocliente" class="viacepForm pessoa_fisica">

                <!-- DADOS PESSOAIS DO CLIENTE -->
                <div class="row">
                    <div class="form-group col-md-7">
                        <label for="nome" class="mb-0 col-form-label-sm">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cpf" class="mb-0 col-form-label-sm">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nacionalidade" class="mb-0 col-form-label-sm">Nacionalidade</label>
                        <input type="text" name="nacionalidade" id="nacionalidade" class="form-control pula">
                    </div>
                </div><!-- Row 1 -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nascimento" class="mb-0 col-form-label-sm">Nascimento</label>
                        <input type="date" name="nascimento" id="nascimento" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="rg" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                        <input type="text" name="rg" id="rg" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="d_expedicao" class="mb-0 col-form-label-sm">Data Expedição</label>
                        <input type="date" name="d_expedicao" id="d_expedicao" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="o_expedidor" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                        <input type="text" name="o_expedidor" id="o_expedidor" class="form-control pula" required>
                    </div>
                </div><!-- Row 2 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="profissao" class="mb-0 col-form-label-sm">Profissão</label>
                        <input type="text" name="profissao" id="profissao" class="form-control pula">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ass_cartorio" class="mb-0 col-form-label-sm">Assinatura Cartório</label>
                        <input type="text" name="ass_cartorio" id="ass_cartorio" class="form-control pula">
                    </div>
                </div><!-- Row 3 -->

                <!-- ENDEREÇO CLIENTE -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="cep" class="mb-0 col-form-label-sm">CEP</label>
                        <input type="text" name="cep" id="cep" class="form-control pula viacep-cep">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="logradouro" class="mb-0 col-form-label-sm">Endereço</label>
                        <input type="text" name="logradouro" id="logradouro" class="form-control pula viacep-logradouro">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numero" class="mb-0 col-form-label-sm">Número</label>
                        <input type="text" name="numero" id="numero" class="form-control pula viacep-numero">
                    </div>
                </div><!-- Row 4 -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="complemento" class="mb-0 col-form-label-sm">Complemento</label>
                        <input type="text" name="complemento" id="complemento" class="form-control pula viacep-complemento">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bairro" class="mb-0 col-form-label-sm">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control pula viacep-bairro">
                    </div>
                    <div class="form-group col-md-4">
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
                </div><!-- Row 5 -->

                <!-- CONTATOS CLIENTE -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email_1" class="mb-0 col-form-label-sm">E-mail 1</label>
                        <input type="email" name="email_1" id="email_1" class="form-control pula" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email_2" class="mb-0 col-form-label-sm">E-mail 2</label>
                        <input type="email" name="email_2" id="email_2" class="form-control pula">
                    </div>
                </div><!-- Row 6 -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="celular" class="mb-0 col-form-label-sm">Celular</label>
                        <input type="text" name="celular" id="celular" class="form-control pula celular" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="residencia" class="mb-0 col-form-label-sm">Residência</label>
                        <input type="text" name="residencia" id="residencia" class="form-control pula telefone">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="comercial" class="mb-0 col-form-label-sm">Comercial</label>
                        <input type="text" name="comercial" id="comercial" class="form-control pula telefone">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="recado" class="mb-0 col-form-label-sm">Recado</label>
                        <input type="text" name="recado" id="recado" class="form-control pula telefone">
                    </div>
                </div><!-- Row 7 -->

                <!-- ESTADO CIVIL -->
                <h1 class="text-center mb-3">Estado Civil</h1>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="tipo_regime">Estado Civil</label>
                        <select name="tipo_regime" id="tipo_regime" class="form-control pula" required>
                            <option value=""></option>
                            <option value="solteiro">Solteiro</option>
                            <option value="casado">Casado</option>
                            <option value="separado">Separado</option>
                            <option value="divorciado">Divorciado</option>
                            <option value="viuvo">Viúvo</option>
                        </select>
                    </div><!-- Form Group -->
                    <div class="form-group col-md-7">
                        <label for="regime">Regime de Bens / União Estável</label>
                        <select name="regime" id="regime" class="form-control pula">
                            <option value=""></option>
                            <option value="parcial" id="parcial" disabled="true">Comunhão Parcial de Bens</option>
                            <option value="universal" id="universal" disabled="true">Comunhão Universal de Bens</option>
                            <option value="total" id="total" disabled="true">Separação Total de Bens</option>
                            <option value="obrigatoria" id="obrigatoria" disabled="true">Separação Obrigatória de Bens</option>
                            <option value="aquestos" id="aquestos" disabled="true">Separação Final nos Aquestos</option>
                            <option value="u_estavel" id="u_estavel" disabled="true">União Estável</option>
                        </select>
                    </div><!-- Form Group -->
                    <div class="form-group col-md-3">
                        <label for="data_casamento">Data do Casamento</label>
                        <input type="date" id="data_casamento" name="data_casamento" class="form-control pula" disabled="true">
                    </div>
                </div><!-- row 8 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cartorio_casamento">Cartório de Registro Civíl de Pessoa Naturais</label>
                        <input type="text" id="cartorio_casamento" name="cartorio_casamento" class="form-control pula">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="matricula_certidao">Matrícula Certidão</label>
                        <input type="text" id="matricula_certidao" name="matricula_certidao" class="form-control pula">
                    </div>
                </div><!-- row 9 -->
                <h1 class="text-center mb-3">Dados do Cônjuge</h1>
                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="nome_conjuge" class="mb-0 col-form-label-sm">Nome</label>
                        <input type="text" name="nome_conjuge" id="nome_conjuge" class="form-control pula" disabled="true">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cpf_conjuge" class="mb-0 col-form-label-sm">CPF</label>
                        <input type="text" name="cpf_conjuge" id="cpf_conjuge" class="form-control pula" disabled="true">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nacionalidade_conjuge" class="mb-0 col-form-label-sm">Nacionalidade</label>
                        <input type="text" name="nacionalidade_conjuge" id="nacionalidade_conjuge" class="form-control pula" disabled="true">
                    </div>
                </div><!-- Row 10 -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nascimento_conjuge" class="mb-0 col-form-label-sm">Nascimento</label>
                        <input type="date" name="nascimento_conjuge" id="nascimento_conjuge" class="form-control pula" disabled="true">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="rg_conjuge" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                        <input type="text" name="rg_conjuge" id="rg_conjuge" class="form-control pula" disabled="true">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="d_expedicao_conjuge" class="mb-0 col-form-label-sm">Data Expedição</label>
                        <input type="date" name="d_expedicao_conjuge" id="d_expedicao_conjuge" class="form-control pula" disabled="true">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="o_expedidor_conjuge" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                        <input type="text" name="o_expedidor_conjuge" id="o_expedidor_conjuge" class="form-control pula" disabled="true">
                    </div>
                </div><!-- Row 11 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="profissao_conjuge" class="mb-0 col-form-label-sm">Profissão</label>
                        <input type="text" name="profissao_conjuge" id="profissao_conjuge" class="form-control pula" disabled="true">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ass_cartorio_conjuge" class="mb-0 col-form-label-sm">Assinatura Cartório</label>
                        <input type="text" name="ass_cartorio_conjuge" id="ass_cartorio_conjuge" class="form-control pula" disabled="true">
                    </div>
                </div><!-- Row 12 -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="telefone_conjuge" class="mb-0 col-form-label-sm">Telefone</label>
                        <input type="text" name="telefone_conjuge" id="telefone_conjuge" class="form-control pula" disabled>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="email_conjuge" class="mb-0 col-form-label-sm">E-mail</label>
                        <input type="text" name="email_conjuge" id="email_conjuge" class="form-control pula" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn_submit mb-5 mt-3">Enviar</button>
                    </div>
                </div><!-- row 13 -->
            </form>
        </div><!-- Container -->
    </main>
<?php $render('footer'); ?>