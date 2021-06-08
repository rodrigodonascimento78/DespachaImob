$(() => {
    $(document).on('click', '#pesquisar', () => {
        let opcao = $('#opcao').val();
        let item_pesquisado = $('#item_pesquisado').val();
        function verificaCampo(campo) {
            if(campo === null) {
                return '';
            } else if(campo !== null) {
                return campo;
            }
        }
        if(opcao === 'cliente') {
            $.ajax({
                url: 'http://despachaimob.com/pesquisaclienteajax',
                crossDomain: true,
                method: 'POST',
                dataType: 'json',
                data: {item_pesquisado: item_pesquisado,},
                success: (result) => {
                    if((result.pessoa) === 'fisica') {
                        $('#opcao').attr('disabled', true);
                        $('#item_pesquisado').attr('disabled', true);
                        $('#pesquisar').attr('disabled', true);

                        $(`<div id="form_pessoa_fisica" class="mt-4">
                            <div class="d-flex justify-content-center centralizar">
                                <div class="col-md-5">
                                    <ul class="processos">
                                        
                                    </ul>
                                </div>
                                <div class="v_line"></div>
                                <div class="col-md-7">
                                    <ul class="documentos">
                                        
                                    </ul>
                                </div>
                            </div>
                            <h1 class="text-center">Cliente Pessoa Física</h1>
                            <!-- DADOS PESSOAIS DO CLIENTE -->
                            <form method="POST" action="http://despachaimob.com/editacliente" class="pessoa_fisica">
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="nome" class="mb-0 col-form-label-sm">Nome</label>
                                        <input type="text" name="nome" id="nome" class="form-control pula" value="`+ result[0][0].nome +`" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="cpf" class="mb-0 col-form-label-sm">CPF</label>
                                        <input type="text" name="cpf" id="cpf" class="form-control pula" value="`+ result[0][0].cpf +`" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="nacionalidade" class="mb-0 col-form-label-sm">Nacionalidade</label>
                                        <input type="text" name="nacionalidade" id="nacionalidade" class="form-control pula" value="`+ verificaCampo(result[0][0].nacionalidade) +`">
                                    </div>
                                </div><!-- Row 1 -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="nascimento" class="mb-0 col-form-label-sm">Nascimento</label>
                                        <input type="date" name="nascimento" id="nascimento" class="form-control pula" value="`+ result[0][0].nascimento +`" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="rg" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                                        <input type="text" name="rg" id="rg" class="form-control pula" value="`+ result[0][0].rg +`" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="d_expedicao" class="mb-0 col-form-label-sm">Data Expedição</label>
                                        <input type="date" name="d_expedicao" id="d_expedicao" class="form-control pula" value="`+ result[0][0].d_expedicao +`" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="o_expedidor" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                                        <input type="text" name="o_expedidor" id="o_expedidor" class="form-control pula" value="`+ result[0][0].o_expedidor +`" required>
                                    </div>
                                </div><!-- Row 2 -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="profissao" class="mb-0 col-form-label-sm">Profissão</label>
                                        <input type="text" name="profissao" id="profissao" class="form-control pula" value="`+ verificaCampo(result[0][0].profissao) +`">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ass_cartorio" class="mb-0 col-form-label-sm">Assinatura Cartório</label>
                                        <input type="text" name="ass_cartorio" id="ass_cartorio" class="form-control pula" value="`+ verificaCampo(result[0][0].ass_cartorio) +`">
                                    </div>
                                </div><!-- Row 3 -->

                                <!-- ENDEREÇO CLIENTE -->
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="cep" class="mb-0 col-form-label-sm">CEP</label>
                                        <input type="text" name="cep" id="cep" class="form-control pula viacep-cep" value="`+ verificaCampo(result[0][0].cep) +`">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="logradouro" class="mb-0 col-form-label-sm">Endereço</label>
                                        <input type="text" name="logradouro" id="logradouro" class="form-control pula viacep-logradouro" value="`+ verificaCampo(result[0][0].logradouro) +`">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="numero" class="mb-0 col-form-label-sm">Número</label>
                                        <input type="text" name="numero" id="numero" class="form-control pula viacep-numero" value="`+ verificaCampo(result[0][0].numero) +`">
                                    </div>
                                </div><!-- Row 4 -->
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="complemento" class="mb-0 col-form-label-sm">Complemento</label>
                                        <input type="text" name="complemento" id="complemento" class="form-control pula viacep-complemento" value="`+ verificaCampo(result[0][0].complemento) +`">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bairro" class="mb-0 col-form-label-sm">Bairro</label>
                                        <input type="text" name="bairro" id="bairro" class="form-control pula viacep-bairro" value="`+ verificaCampo(result[0][0].bairro) +`">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="cidade" class="mb-0 col-form-label-sm">Cidade</label>
                                        <input type="text" name="cidade" id="cidade" class="form-control pula viacep-cidade" value="`+ verificaCampo(result[0][0].cidade) +`">
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
                                        <input type="email" name="email_1" id="email_1" class="form-control pula" value="`+ result[0][0].email_1 +`" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email_2" class="mb-0 col-form-label-sm">E-mail 2</label>
                                        <input type="email" name="email_2" id="email_2" class="form-control pula" value="`+ verificaCampo(result[0][0].email_2) +`">
                                    </div>
                                </div><!-- Row 6 -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="celular" class="mb-0 col-form-label-sm">Celular</label>
                                        <input type="text" name="celular" id="celular" class="form-control pula celular" value="`+ result[0][0].celular +`" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="residencia" class="mb-0 col-form-label-sm">Residência</label>
                                        <input type="text" name="residencia" id="residencia" class="form-control pula telefone" value="`+ verificaCampo(result[0][0].residencia) +`">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="comercial" class="mb-0 col-form-label-sm">Comercial</label>
                                        <input type="text" name="comercial" id="comercial" class="form-control pula telefone" value="`+ verificaCampo(result[0][0].comercial) +`">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="recado" class="mb-0 col-form-label-sm">Recado</label>
                                        <input type="text" name="recado" id="recado" class="form-control pula telefone" value="`+ verificaCampo(result[0][0].recado) +`">
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
                                        <input type="date" id="data_casamento" name="data_casamento" class="form-control pula" disabled="true" value="`+ verificaCampo(result[0][0].data_casamento) +`">
                                    </div>
                                </div><!-- row 8 -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cartorio_casamento">Cartório de Registro Civíl de Pessoa Naturais</label>
                                        <input type="text" id="cartorio_casamento" name="cartorio_casamento" class="form-control pula" value="`+ result[0][0].cartorio_casamento +`" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="matricula_certidao">Matrícula Certidão</label>
                                        <input type="text" id="matricula_certidao" name="matricula_certidao" class="form-control pula" value="`+ result[0][0].matricula_certidao +`" required>
                                    </div>
                                </div><!-- row 9 -->
                                <h1 class="text-center mb-3">Dados do Cônjuge</h1>
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="nome_conjuge" class="mb-0 col-form-label-sm">Nome</label>
                                        <input type="text" name="nome_conjuge" id="nome_conjuge" class="form-control pula" value="`+ verificaCampo(result[0][0].nome_conjuge) +`" disabled="true">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="cpf_conjuge" class="mb-0 col-form-label-sm">CPF</label>
                                        <input type="text" name="cpf_conjuge" id="cpf_conjuge" class="form-control pula" value="`+ verificaCampo(result[0][0].cpf_conjuge) +`" disabled="true">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="nacionalidade_conjuge" class="mb-0 col-form-label-sm">Nacionalidade</label>
                                        <input type="text" name="nacionalidade_conjuge" id="nacionalidade_conjuge" class="form-control pula" value="`+ verificaCampo(result[0][0].nacionalidade_conjuge) +`" disabled="true">
                                    </div>
                                </div><!-- Row 10 -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="nascimento_conjuge" class="mb-0 col-form-label-sm">Nascimento</label>
                                        <input type="date" name="nascimento_conjuge" id="nascimento_conjuge" class="form-control pula" value="`+ verificaCampo(result[0][0].nascimento_conjuge) +`" disabled="true">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="rg_conjuge" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                                        <input type="text" name="rg_conjuge" id="rg_conjuge" class="form-control pula" value="`+ verificaCampo(result[0][0].rg_conjuge) +`" disabled="true">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="d_expedicao_conjuge" class="mb-0 col-form-label-sm">Data Expedição</label>
                                        <input type="date" name="d_expedicao_conjuge" id="d_expedicao_conjuge" class="form-control pula" value="`+ verificaCampo(result[0][0].d_expedicao_conjuge) +`" disabled="true">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="o_expedidor_conjuge" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                                        <input type="text" name="o_expedidor_conjuge" id="o_expedidor_conjuge" class="form-control pula" value="`+ verificaCampo(result[0][0].o_expedidor_conjuge) +`" disabled="true">
                                    </div>
                                </div><!-- Row 11 -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="profissao_conjuge" class="mb-0 col-form-label-sm">Profissão</label>
                                        <input type="text" name="profissao_conjuge" id="profissao_conjuge" class="form-control pula" value="`+ verificaCampo(result[0][0].profissao_conjuge) +`" disabled="true">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ass_cartorio_conjuge" class="mb-0 col-form-label-sm">Assinatura Cartório</label>
                                        <input type="text" name="ass_cartorio_conjuge" id="ass_cartorio_conjuge" class="form-control pula" value="`+ verificaCampo(result[0][0].ass_cartorio_conjuge) +`" disabled="true">
                                    </div>
                                </div><!-- Row 12 -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="telefone_conjuge" class="mb-0 col-form-label-sm">Telefone</label>
                                        <input type="text" name="telefone_conjuge" id="telefone_conjuge" class="form-control pula" value="`+ result[0][0].telefone_conjuge +`" disabled="true" />
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="email_conjuge" class="mb-0 col-form-label-sm">E-mail</label>
                                        <input type="text" name="email_conjuge" id="email_conjuge" class="form-control pula" value="`+ result[0][0].email_conjuge +`" disabled="true" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" id="btn_editar_pf" class="btn btn_editar mb-4 mt-3">Editar</button>
                                        <button type="button" id="btn_fechar_pf" class="btn btn_submit btn_fechar mb-4 mt-3">Fechar</button>
                                    </div>
                                </div><!-- row 13 -->
                            </form>
                        </div>
                        `).appendTo('.resultado_pesquisa');

                        $('#uf').val(result[0][0].uf);

                        let regime = $('#regime');
                        let u_estavel = $('#u_estavel');
                        let aquestos = $('#aquestos');
                        let obrigatoria = $('#obrigatoria');
                        let total = $('#total');
                        let universal = $('#universal');
                        let parcial = $('#parcial');
                        let data_casamento = $('#data_casamento');
                        let nome_conjuge = $('#nome_conjuge');
                        let cpf_conjuge = $('#cpf_conjuge');
                        let nacionalidade_conjuge = $('#nacionalidade_conjuge');
                        let nascimento_conjuge = $('#nascimento_conjuge');
                        let rg_conjuge = $('#rg_conjuge');
                        let d_expedicao_conjuge = $('#d_expedicao_conjuge');
                        let o_expedidor_conjuge = $('#o_expedidor_conjuge');
                        let profissao_conjuge = $('#profissao_conjuge');
                        let ass_cartorio_conjuge = $('#ass_cartorio_conjuge');
                        let telefone_conjuge = $('#telefone_conjuge');
                        let email_conjuge = $('#email_conjuge');
                        
                        $('#tipo_regime').val(result[0][0].tipo_regime);
                        $('#regime').val(result[0][0].regime);

                        if((result[0][0].tipo_regime) === 'solteiro') {
                            data_casamento.attr('disabled', true);
                            nome_conjuge.attr('disabled', true);
                            cpf_conjuge.attr('disabled', true);
                            nacionalidade_conjuge.attr('disabled', true);
                            nascimento_conjuge.attr('disabled', true);
                            rg_conjuge.attr('disabled', true);
                            d_expedicao_conjuge.attr('disabled', true);
                            o_expedidor_conjuge.attr('disabled', true);
                            profissao_conjuge.attr('disabled', true);
                            ass_cartorio_conjuge.attr('disabled', true);
                            telefone_conjuge.attr('disabled', true);
                            email_conjuge.attr('disabled', true);
                            u_estavel.removeAttr('disabled');
                        } else {
                            regime.removeAttr('disabled');
                            u_estavel.removeAttr('disabled');
                            aquestos.removeAttr('disabled');
                            obrigatoria.removeAttr('disabled');
                            total.removeAttr('disabled');
                            universal.removeAttr('disabled');
                            parcial.removeAttr('disabled');
                            data_casamento.removeAttr('disabled');
                            nome_conjuge.removeAttr('disabled');
                            cpf_conjuge.removeAttr('disabled');
                            nacionalidade_conjuge.removeAttr('disabled');
                            nascimento_conjuge.removeAttr('disabled');
                            rg_conjuge.removeAttr('disabled');
                            d_expedicao_conjuge.removeAttr('disabled');
                            o_expedidor_conjuge.removeAttr('disabled');
                            profissao_conjuge.removeAttr('disabled');
                            ass_cartorio_conjuge.removeAttr('disabled');
                            telefone_conjuge.removeAttr('disabled');
                            email_conjuge.removeAttr('disabled');
                        }
                        
                        if(result[1].length !== 0) {
                            $.each((result[1]), function(index, value) {
                                $(`<li><strong>Comprador</strong> no processo número `+ value.num_processo_comprador +`</li>`).appendTo('.processos');
                            });
                        }
                        
                        if(result[2].length !== 0) {
                            $.each(result[2], function(index, value) {
                                $(`<li><strong>Procurador do Comprador</strong> no processo número `+ value.num_processo_proc_comprador +`</li>`).appendTo('.processos');
                            });
                        }
    
                        if(result[3].length !== 0) {
                            $.each(result[3], function(index, value) {
                                $(`<li><strong>Vendedor</strong> no processo número `+ value.num_processo_vendedor +`</li>`).appendTo('.processos');
                            });
                        }
    
                        if((result[4].length) !== 0) {
                            $.each(result[4], function(index, value) {
                                $(`<li><strong>Procurador do Vendedor</strong> no processo número `+ value.num_processo_proc_vendedor +`</li>`).appendTo('.processos');
                            });
                        }

                        if(result[5].length !== 0) {
                            $.each(result[5], function(index, value) {
                                if(!value.mensagem) {
                                    $(`<li><a href="assets/arquivos/`+ result[0][0].cpf +`/`+ value +`" target="_blank">`+ value +`</a></li>`).appendTo('.documentos');
                                } else {
                                    $(`<li>`+ value.mensagem + `</li>`).appendTo('.documentos');
                                }
                            });
                        }

                    } else if((result.pessoa) === 'juridica') {
                        $('#opcao').attr('disabled', true);
                        $('#item_pesquisado').attr('disabled', true);
                        $('#pesquisar').attr('disabled', true);

                        $(`<div id="form_pessoa_juridica" class="mt-4">
                            <div class="d-flex justify-content-center centralizar">
                                <div class="col-md-5">
                                    <ul class="processos">
                                        
                                    </ul>
                                </div>
                                <div class="v_line"></div>
                                <div class="col-md-7">
                                    <ul class="documentos">
                                        
                                    </ul>
                                </div>
                            </div>
                            <h1 class="text-center">Cliente Pessoa Jurídica</h1>
                            <!-- DADOS DA PESSOA JURÍDICA -->
                            <form method="POST" action="http://despachaimob.com/editacliente" class="pessoa_juridica">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="razao_social" class="mb-0 col-form-label-sm">Razão Social</label>
                                        <input type="text" name="razao_social" id="razao_social" class="form-control pula" value="`+ result[0][0].razao_social +`" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nome_fantasia" class="mb-0 col-form-label-sm">Nome Fantasia</label>
                                        <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control pula" value="`+ verificaCampo(result[0][0].nome_fantasia) +`">
                                    </div>
                                </div><!-- Row 1 -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="cnpj" class="mb-0 col-form-label-sm">CNPJ</label>
                                        <input type="text" name="cnpj" id="cnpj" class="form-control pula" value="`+ result[0][0].cnpj +`" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="insc_estadual" class="mb-0 col-form-label-sm">Insc. Estadual</label>
                                        <input type="text" name="insc_estadual" id="insc_estadual" class="form-control pula" value="`+ result[0][0].insc_estadual +`" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="data_abertura" class="mb-0 col-form-label-sm">Data da Abertura</label>
                                        <input type="date" name="data_abertura" id="data_abertura" class="form-control pula" value="`+ result[0][0].data_abertura +`" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cep" class="mb-0 col-form-label-sm">CEP</label>
                                        <input type="text" name="cep" id="cep" class="form-control pula viacep-cep" value="`+ verificaCampo(result[0][0].cep) +`">
                                    </div>
                                </div><!-- Row 2 -->

                                <!-- ENDEREÇO CLIENTE  PESSOA JURÍDICA-->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="logradouro" class="mb-0 col-form-label-sm">Endereço</label>
                                        <input type="text" name="logradouro" id="logradouro" class="form-control pula viacep-logradouro" value="`+ verificaCampo(result[0][0].logradouro) +`">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="numero" class="mb-0 col-form-label-sm">Número</label>
                                        <input type="text" name="numero" id="numero" class="form-control pula viacep-numero" value="`+ verificaCampo(result[0][0].numero) +`">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="complemento" class="mb-0 col-form-label-sm">Complemento</label>
                                        <input type="text" name="complemento" id="complemento" class="form-control pula viacep-complemento" value="`+ verificaCampo(result[0][0].complemento) +`">
                                    </div>
                                </div><!-- Row 4 -->
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="bairro" class="mb-0 col-form-label-sm">Bairro</label>
                                        <input type="text" name="bairro" id="bairro" class="form-control pula viacep-bairro" value="`+ verificaCampo(result[0][0].bairro) +`">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="cidade" class="mb-0 col-form-label-sm">Cidade</label>
                                        <input type="text" name="cidade" id="cidade" class="form-control pula viacep-cidade" value="`+ verificaCampo(result[0][0].cidade) +`">
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

                                <!-- CONTATOS CLIENTE PESSOA JURÍDICA -->
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="email_1" class="mb-0 col-form-label-sm">E-mail 1</label>
                                        <input type="email" name="email_1" id="email_1" class="form-control pula" value="`+ result[0][0].email_1 +`" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="telefone_1" class="mb-0 col-form-label-sm">Telefone 1</label>
                                        <input type="text" name="telefone_1" id="telefone_1" class="form-control pula telefone" value="`+ result[0][0].telefone_1 +`" required>
                                    </div>
                                </div><!-- Row 6 -->
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="email_2" class="mb-0 col-form-label-sm">E-mail 2</label>
                                        <input type="email" name="email_2" id="email_2" class="form-control pula" value="`+ verificaCampo(result[0][0].email_2) +`">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="telefone_2" class="mb-0 col-form-label-sm">Telefone 2</label>
                                        <input type="text" name="telefone_2" id="telefone_2" class="form-control pula telefone" value="`+ verificaCampo(result[0][0].telefone_2) +`">
                                    </div>
                                </div>

                                <!-- SÓCIOS 1 -->
                                <h1 class="text-center mb-3">Representante Legal</h1>
                                <div class="row">
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
                                    <div class="form-group col-md-6">
                                        <label for="nome_socio_1" class="mb-0 col-form-label-sm">Nome</label>
                                        <input type="text" name="nome_socio_1" id="nome_socio_1" class="form-control pula" value="`+ result[0][0].nome_socio_1 +`" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="cpf_socio_1" class="mb-0 col-form-label-sm">CPF</label>
                                        <input type="text" name="cpf_socio_1" id="cpf_socio_1" class="form-control pula" value="`+ result[0][0].cpf_socio_1 +`" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="nacionalidade_socio_1" class="mb-0 col-form-label-sm">Nacionalidade</label>
                                        <input type="text" name="nacionalidade_socio_1" id="nacionalidade_socio_1" class="form-control pula" value="`+ verificaCampo(result[0][0].nacionalidade_socio_1) +`">
                                    </div>
                                </div><!-- row 8 -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="nascimento_socio_1" class="mb-0 col-form-label-sm">Nascimento</label>
                                        <input type="date" name="nascimento_socio_1" id="nascimento_socio_1" class="form-control pula" value="`+ result[0][0].nascimento_socio_1 +`">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="rg_socio_1" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                                        <input type="text" name="rg_socio_1" id="rg_socio_1" class="form-control pula" value="`+ verificaCampo(result[0][0].rg_socio_1) +`">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="d_expedicao_socio_1" class="mb-0 col-form-label-sm">Data Expedição</label>
                                        <input type="date" name="d_expedicao_socio_1" id="d_expedicao_socio_1" class="form-control pula" value="`+ result[0][0].d_expedicao_socio_1 +`">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="o_expedidor_socio_1" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                                        <input type="text" name="o_expedidor_socio_1" id="o_expedidor_socio_1" class="form-control pula" value="`+ verificaCampo(result[0][0].o_expedidor_socio_1) +`">
                                    </div>
                                </div><!-- Row 7 -->
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="cep_socio_1" class="mb-0 col-form-label-sm">CEP</label>
                                        <input type="text" name="cep_socio_1" id="cep_socio_1" class="form-control pula viacep-cep" value="`+ verificaCampo(result[0][0].cep_socio_1) +`">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="logradouro_socio_1" class="mb-0 col-form-label-sm">Endereço</label>
                                        <input type="text" name="logradouro_socio_1" id="logradouro_socio_1" class="form-control pula viacep-logradouro" value="`+ verificaCampo(result[0][0].logradouro_socio_1) +`">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="numero_socio_1" class="mb-0 col-form-label-sm">Número</label>
                                        <input type="text" name="numero_socio_1" id="numero_socio_1" class="form-control pula viacep-numero" value="`+ verificaCampo(result[0][0].numero_socio_1) +`">
                                    </div>
                                </div><!-- Row 8 -->
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="complemento_socio_1" class="mb-0 col-form-label-sm">Complemento</label>
                                        <input type="text" name="complemento_socio_1" id="complemento_socio_1" class="form-control pula viacep-complemento" value="`+ verificaCampo(result[0][0].complemento_socio_1) +`">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bairro_socio_1" class="mb-0 col-form-label-sm">Bairro</label>
                                        <input type="text" name="bairro_socio_1" id="bairro_socio_1" class="form-control pula viacep-bairro" value="`+ verificaCampo(result[0][0].bairro_socio_1) +`">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="cidade_socio_1" class="mb-0 col-form-label-sm">Cidade</label>
                                        <input type="text" name="cidade_socio_1" id="cidade_socio_1" class="form-control pula viacep-cidade" value="`+ verificaCampo(result[0][0].cidade_socio_1) +`">
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
                                    <div class="form-group col-md-6">
                                        <label for="profissao_socio_1" class="mb-0 col-form-label-sm">Profissão</label>
                                        <input type="text" name="profissao_socio_1" id="profissao_socio_1" class="form-control pula" value="`+ verificaCampo(result[0][0].profissao_socio_1) +`">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ass_cartorio_socio_1" class="mb-0 col-form-label-sm">Ass. Cartório</label>
                                        <input type="text" name="ass_cartorio_socio_1" id="ass_cartorio_socio_1" class="form-control pula" value="`+ verificaCampo(result[0][0].ass_cartorio_socio_1) +`">
                                    </div>
                                </div><!-- Row 10 -->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="celular_socio_1" class="mb-0 col-form-label-sm">Celular</label>
                                        <input type="text" name="celular_socio_1" id="celular_socio_1" class="form-control pula celular" value="`+ verificaCampo(result[0][0].celular_socio_1) +`">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="email_socio_1" class="mb-0 col-form-label-sm">E-mail</label>
                                        <input type="email" name="email_socio_1" id="email_socio_1" class="form-control pula" value="`+ verificaCampo(result[0][0].email_socio_1) +`">
                                    </div>
                                </div><!-- Row 11 -->
                                <div class="row" id="btns_controle_socio_1">
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label">Adicionar Representante Legal?</label>
                                        <a type="button" id="sim_add_1" name="sim_add" class="far fa-check-circle sim_add"></a>
                                        <a type="button" id="nao_add_1" name="nao_add" class="far fa-times-circle nao_add"></a>
                                    </div>
                                </div>

                                <!-- SÓCIO 2 -->
                                <div id="mostra_socio_2" hidden="true">
                                    <h1 class="text-center mb-3">Representante Legal 2</h1>
                                    <a type="button" id="close_socio_2" name="close_socio_2" class="fas fa-times close_socio"></a>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="estado_civil_socio_2">Estado Civil</label>
                                            <select name="estado_civil_socio_2" id="estado_civil_socio_2" class="form-control pula">
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
                                            <input type="text" name="nome_socio_2" id="nome_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].nome_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="cpf_socio_2" class="mb-0 col-form-label-sm">CPF</label>
                                            <input type="text" name="cpf_socio_2" id="cpf_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].cpf_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nacionalidade_socio_2" class="mb-0 col-form-label-sm">Nacionalidade</label>
                                            <input type="text" name="nacionalidade_socio_2" id="nacionalidade_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].nacionalidade_socio_2) +`">
                                        </div>
                                    </div><!-- row 8 -->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="nascimento_socio_2" class="mb-0 col-form-label-sm">Nascimento</label>
                                            <input type="date" name="nascimento_socio_2" id="nascimento_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].nascimento_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="rg_socio_2" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                                            <input type="text" name="rg_socio_2" id="rg_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].rg_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="d_expedicao_socio_2" class="mb-0 col-form-label-sm">Data Expedição</label>
                                            <input type="date" name="d_expedicao_socio_2" id="d_expedicao_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].d_expedicao_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="o_expedidor_socio_2" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                                            <input type="text" name="o_expedidor_socio_2" id="o_expedidor_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].o_expedidor_socio_2) +`">
                                        </div>
                                    </div><!-- Row 7 -->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="cep_socio_2" class="mb-0 col-form-label-sm">CEP</label>
                                            <input type="text" name="cep_socio_2" id="cep_socio_2" class="form-control pula viacep-cep" value="`+ verificaCampo(result[0][0].cep_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="logradouro_socio_2" class="mb-0 col-form-label-sm">Endereço</label>
                                            <input type="text" name="logradouro_socio_2" id="logradouro_socio_2" class="form-control pula viacep-logradouro" value="`+ verificaCampo(result[0][0].logradouro_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="numero_socio_2" class="mb-0 col-form-label-sm">Número</label>
                                            <input type="text" name="numero_socio_2" id="numero_socio_2" class="form-control pula viacep-numero" value="`+ verificaCampo(result[0][0].numero_socio_2) +`">
                                        </div>
                                    </div><!-- Row 8 -->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="complemento_socio_2" class="mb-0 col-form-label-sm">Complemento</label>
                                            <input type="text" name="complemento_socio_2" id="complemento_socio_2" class="form-control pula viacep-complemento" value="`+ verificaCampo(result[0][0].complemento_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="bairro_socio_2" class="mb-0 col-form-label-sm">Bairro</label>
                                            <input type="text" name="bairro_socio_2" id="bairro_socio_2" class="form-control pula viacep-bairro" value="`+ verificaCampo(result[0][0].bairro_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cidade_socio_2" class="mb-0 col-form-label-sm">Cidade</label>
                                            <input type="text" name="cidade_socio_2" id="cidade_socio_2" class="form-control pula viacep-cidade" value="`+ verificaCampo(result[0][0].cidade_socio_2) +`">
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
                                    </div><!-- Row 9 -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="profissao_socio_2" class="mb-0 col-form-label-sm">Profissão</label>
                                            <input type="text" name="profissao_socio_2" id="profissao_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].profissao_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ass_cartorio_socio_2" class="mb-0 col-form-label-sm">Ass. Cartório</label>
                                            <input type="text" name="ass_cartorio_socio_2" id="ass_cartorio_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].ass_cartorio_socio_2) +`">
                                        </div>
                                    </div><!-- Row 10 -->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="celular_socio_2" class="mb-0 col-form-label-sm">Celular</label>
                                            <input type="text" name="celular_socio_2" id="celular_socio_2" class="form-control pula celular" value="`+ verificaCampo(result[0][0].celular_socio_2) +`">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="email_socio_2" class="mb-0 col-form-label-sm">E-mail</label>
                                            <input type="email" name="email_socio_2" id="email_socio_2" class="form-control pula" value="`+ verificaCampo(result[0][0].email_socio_2) +`">
                                        </div>
                                    </div><!-- Row 11 -->
                                    <div class="row" id="btns_controle_socio_2">
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Adicionar Representante Legal?</label>
                                            <a type="button" id="sim_add_2" name="sim_add" class="far fa-check-circle sim_add"></a>
                                            <a type="button" id="nao_add_2" name="nao_add" class="far fa-times-circle nao_add"></a>
                                        </div>
                                    </div>
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
                                            <input type="text" name="nome_socio_3" id="nome_socio_3" class="form-control pula" value="`+ verificaCampo(result[0][0].nome_socio_3) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="cpf_socio_3" class="mb-0 col-form-label-sm">CPF</label>
                                            <input type="text" name="cpf_socio_3" id="cpf_socio_3" class="form-control pula" value="`+ verificaCampo(result[0][0].cpf_socio_3) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nacionalidade_socio_3" class="mb-0 col-form-label-sm">Nacionalidade</label>
                                            <input type="text" name="nacionalidade_socio_3" id="nacionalidade_socio_3" class="form-control pula" value="`+ verificaCampo(result[0][0].nacionalidade_socio_3) +`">
                                        </div>
                                    </div><!-- row 8 -->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="nascimento_socio_3" class="mb-0 col-form-label-sm">Nascimento</label>
                                            <input type="date" name="nascimento_socio_3" id="nascimento_socio_3" class="form-control pula" value="`+ result[0][0].nascimento_socio_3 +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="rg_socio_3" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                                            <input type="text" name="rg_socio_3" id="rg_socio_3" class="form-control pula" value="`+ verificaCampo(result[0][0].rg_socio_3) +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="d_expedicao_socio_3" class="mb-0 col-form-label-sm">Data Expedição</label>
                                            <input type="date" name="d_expedicao_socio_3" id="d_expedicao_socio_3" class="form-control pula" value="`+ result[0][0].d_expedicao_socio_3 +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="o_expedidor_socio_3" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                                            <input type="text" name="o_expedidor_socio_3" id="o_expedidor_socio_3" class="form-control pula" value="`+ verificaCampo(result[0][0].o_expedidor_socio_3) +`">
                                        </div>
                                    </div><!-- Row 7 -->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="cep_socio_3" class="mb-0 col-form-label-sm">CEP</label>
                                            <input type="text" name="cep_socio_3" id="cep_socio_3" class="form-control pula viacep-cep" value="`+ verificaCampo(result[0][0].cep_socio_3) +`">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="logradouro_socio_3" class="mb-0 col-form-label-sm">Endereço</label>
                                            <input type="text" name="logradouro_socio_3" id="logradouro_socio_3" class="form-control pula viacep-logradouro" value="`+ verificaCampo(result[0][0].logradouro_socio_3) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="numero_socio_3" class="mb-0 col-form-label-sm">Número</label>
                                            <input type="text" name="numero_socio_3" id="numero_socio_3" class="form-control pula viacep-numero" value="`+ verificaCampo(result[0][0].numero_socio_3) +`">
                                        </div>
                                    </div><!-- Row 8 -->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="complemento_socio_3" class="mb-0 col-form-label-sm">Complemento</label>
                                            <input type="text" name="complemento_socio_3" id="complemento_socio_3" class="form-control pula viacep-complemento" value="`+ verificaCampo(result[0][0].complemento_socio_3) +`">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="bairro_socio_3" class="mb-0 col-form-label-sm">Bairro</label>
                                            <input type="text" name="bairro_socio_3" id="bairro_socio_3" class="form-control pula viacep-bairro" value="`+ verificaCampo(result[0][0].bairro_socio_3) +`">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cidade_socio_3" class="mb-0 col-form-label-sm">Cidade</label>
                                            <input type="text" name="cidade_socio_3" id="cidade_socio_3" class="form-control pula viacep-cidade" value="`+ verificaCampo(result[0][0].cidade_socio_3) +`">
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
                                    </div><!-- Row 9 -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="profissao_socio_3" class="mb-0 col-form-label-sm">Profissão</label>
                                            <input type="text" name="profissao_socio_3" id="profissao_socio_3" class="form-control pula" value="`+ verificaCampo(result[0][0].profissao_socio_3) +`">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ass_cartorio_socio_3" class="mb-0 col-form-label-sm">Ass. Cartório</label>
                                            <input type="text" name="ass_cartorio_socio_3" id="ass_cartorio_socio_3" class="form-control pula" value="`+ verificaCampo(result[0][0].ass_cartorio_socio_3) +`">
                                        </div>
                                    </div><!-- Row 10 -->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="celular_socio_3" class="mb-0 col-form-label-sm">Celular</label>
                                            <input type="text" name="celular_socio_3" id="celular_socio_3" class="form-control pula celular" value="`+ verificaCampo(result[0][0].celular_socio_3) +`">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="email_socio_3" class="mb-0 col-form-label-sm">E-mail</label>
                                            <input type="email" name="email_socio_3" id="email_socio_3" class="form-control pula" value="`+ verificaCampo(result[0][0].email_socio_3) +`">
                                        </div>
                                    </div><!-- Row 11 -->
                                    <div class="row" id="btns_controle_socio_3">
                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Adicionar Representante Legal?</label>
                                            <a type="button" id="sim_add_3" name="sim_add" class="far fa-check-circle sim_add"></a>
                                            <a type="button" id="nao_add_3" name="nao_add" class="far fa-times-circle nao_add"></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- SÓCIO 4 -->
                                <div id="mostra_socio_4" hidden="true">
                                    <h1 class="text-center mb-3">Representante Legal 4</h1>
                                    <a type="button" id="close_socio_4" name="close_socio_4" class="fas fa-times close_socio"></a>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="estado_civil_socio_4">Estado Civil</label>
                                            <select name="estado_civil_socio_4" id="estado_civil_socio_4" class="form-control pula">
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
                                            <input type="text" name="nome_socio_4" id="nome_socio_4" class="form-control pula" value="`+ verificaCampo(result[0][0].nome_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="cpf_socio_4" class="mb-0 col-form-label-sm">CPF</label>
                                            <input type="text" name="cpf_socio_4" id="cpf_socio_4" class="form-control pula" value="`+ verificaCampo(result[0][0].cpf_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nacionalidade_socio_4" class="mb-0 col-form-label-sm">Nacionalidade</label>
                                            <input type="text" name="nacionalidade_socio_4" id="nacionalidade_socio_4" class="form-control pula" value="`+ verificaCampo(result[0][0].nacionalidade_socio_4) +`">
                                        </div>
                                    </div><!-- row 8 -->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="nascimento_socio_4" class="mb-0 col-form-label-sm">Nascimento</label>
                                            <input type="date" name="nascimento_socio_4" id="nascimento_socio_4" class="form-control pula" value="`+ result[0][0].nascimento_socio_4 +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="rg_socio_4" class="mb-0 col-form-label-sm">Doc. Identidade</label>
                                            <input type="text" name="rg_socio_4" id="rg_socio_4" class="form-control pula" value="`+ verificaCampo(result[0][0].rg_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="d_expedicao_socio_4" class="mb-0 col-form-label-sm">Data Expedição</label>
                                            <input type="date" name="d_expedicao_socio_4" id="d_expedicao_socio_4" class="form-control pula" value="`+ result[0][0].d_expedicao_socio_4 +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="o_expedidor_socio_4" class="mb-0 col-form-label-sm">Orgão Expedidor</label>
                                            <input type="text" name="o_expedidor_socio_4" id="o_expedidor_socio_4" class="form-control pula" value="`+ verificaCampo(result[0][0].o_expedidor_socio_4) +`">
                                        </div>
                                    </div><!-- Row 7 -->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="cep_socio_4" class="mb-0 col-form-label-sm">CEP</label>
                                            <input type="text" name="cep_socio_4" id="cep_socio_4" class="form-control pula viacep-cep" value="`+ verificaCampo(result[0][0].cep_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="logradouro_socio_4" class="mb-0 col-form-label-sm">Endereço</label>
                                            <input type="text" name="logradouro_socio_4" id="logradouro_socio_4" class="form-control pula viacep-logradouro" value="`+ verificaCampo(result[0][0].logradouro_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="numero_socio_4" class="mb-0 col-form-label-sm">Número</label>
                                            <input type="text" name="numero_socio_4" id="numero_socio_4" class="form-control pula viacep-numero" value="`+ verificaCampo(result[0][0].numero_socio_4) +`">
                                        </div>
                                    </div><!-- Row 8 -->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="complemento_socio_4" class="mb-0 col-form-label-sm">Complemento</label>
                                            <input type="text" name="complemento_socio_4" id="complemento_socio_4" class="form-control pula viacep-complemento" value="`+ verificaCampo(result[0][0].complemento_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="bairro_socio_4" class="mb-0 col-form-label-sm">Bairro</label>
                                            <input type="text" name="bairro_socio_4" id="bairro_socio_4" class="form-control pula viacep-bairro" value="`+ verificaCampo(result[0][0].bairro_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cidade_socio_4" class="mb-0 col-form-label-sm">Cidade</label>
                                            <input type="text" name="cidade_socio_4" id="cidade_socio_4" class="form-control pula viacep-cidade" value="`+ verificaCampo(result[0][0].cidade_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="uf_socio_4" class="mb-0 col-form-label-sm">UF</label>
                                            <select name="uf_socio_4" id="uf_socio_4" class="form-control pula viacep-uf">
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
                                        <div class="form-group col-md-6">
                                            <label for="profissao_socio_4" class="mb-0 col-form-label-sm">Profissão</label>
                                            <input type="text" name="profissao_socio_4" id="profissao_socio_4" class="form-control pula" value="`+ verificaCampo(result[0][0].profissao_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ass_cartorio_socio_4" class="mb-0 col-form-label-sm">Ass. Cartório</label>
                                            <input type="text" name="ass_cartorio_socio_4" id="ass_cartorio_socio_4" class="form-control pula" value="`+ verificaCampo(result[0][0].ass_cartorio_socio_4) +`">
                                        </div>
                                    </div><!-- Row 10 -->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="celular_socio_4" class="mb-0 col-form-label-sm">Celular</label>
                                            <input type="text" name="celular_socio_4" id="celular_socio_4" class="form-control pula celular" value="`+ verificaCampo(result[0][0].celular_socio_4) +`">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="email_socio_4" class="mb-0 col-form-label-sm">E-mail</label>
                                            <input type="email" name="email_socio_4" id="email_socio_4" class="form-control pula" value="`+ verificaCampo(result[0][0].email_socio_4) +`">
                                        </div>
                                    </div>
                                    </div><!-- Row 11 -->
                                    <div class="row" id="btn_enviar_form_pj" hidden="true">
                                        <div class="form-group col-md-12">
                                            <button type="submit" id="btn_editar_pf" class="btn btn_editar mb-4 mt-3">Editar</button>
                                            <button type="button" id="btn_fechar_pf" class="btn btn_submit btn_fechar mb-4 mt-3">Fechar</button>
                                        </div>
                                    </div><!-- row 13 -->
                                <div>
                            </form>
                        </div>
                        `).appendTo('.resultado_pesquisa');

                        $('#uf').val(result[0][0].uf);
                        $('#estado_civil_socio_1').val(result[0][0].estado_civil_socio_1);
                        $('#estado_civil_socio_2').val(result[0][0].estado_civil_socio_2);
                        $('#estado_civil_socio_3').val(result[0][0].estado_civil_socio_3);
                        $('#estado_civil_socio_4').val(result[0][0].estado_civil_socio_4);

                        if(result[1].length !== 0) {
                            $.each((result[1]), function(index, value) {
                                $(`<li><strong>Comprador</strong> no processo número `+ result[1][index].numero_processo +`</li>`).appendTo('.processos');
                            });
                        }
    
                        if(result[2].length !== 0) {
                            $.each((result[2]), function(index, value) {
                                $(`<li><strong>Procurador do Comprador</strong> no processo número `+ result[2][index].numero_processo +`</li>`).appendTo('.processos');
                            });
                        }
    
                        if(result[3].length !== 0) {
                            $.each((result[3]), function(index, value) {
                                $(`<li><strong>Vendedor</strong> no processo número `+ result[3][index].numero_processo +`</li>`).appendTo('.processos');
                            });
                        }
    
                        if((result[4].length) !== 0) {
                            $.each(result[4], function(index, value) {
                                $(`<li><strong>Procurador do Vendedor</strong> no processo número `+ result[4][index].numero_processo +`</li>`).appendTo('.processos');
                                
                            });
                        }

                        if(result[5].length !== 0) {
                            $.each(result[5], function(index, value) {
                                if(!value.mensagem) {
                                    $(`<li><a href="assets/arquivos/`+ result[0][0].cpf +`/`+ value +`" target="_blank">`+ value +`</a></li>`).appendTo('.documentos');
                                } else {
                                    $(`<li>`+ value.mensagem + `</li>`).appendTo('.documentos');
                                }
                            });
                        }

                    } else if(result.pessoa === 'desconhecida') {
                        $(`<div id="form_pessoa_desconhecida" class="mt-4">
                            <h1 class="text-center mensagem">`+ result.mensagem +`</h1>
                            <button type="button"class="btn btn_submit btn_fechar mb-4 mt-3">Fechar</button>
                        </div>
                        `).appendTo('.resultado_pesquisa');

                        $('#opcao').attr('disabled', true);
                        $('#item_pesquisado').attr('disabled', true);
                        $('#pesquisar').attr('disabled', true);
                    }
                    
                },
                error: (result) => {
                    alert('Algo deu errado!');
                    console.log(result.responseText);
                }
            });
        } else if(opcao === 'imovel') {
            $.ajax({
                url: 'http://despachaimob.com/pesquisaimovelajax',
                crossDomain: true,
                method: 'POST',
                dataType: 'json',
                data:{item_pesquisado: item_pesquisado},
                success: (result) => {
                    if(result.existe_imovel === 'sim') {
                        $('#opcao').attr('disabled', true);
                        $('#item_pesquisado').attr('disabled', true);
                        $('#pesquisar').attr('disabled', true);

                        $(`<div id="form_imovel" class="mt-4">
                            <div class="d-flex justify-content-center centralizar">
                                <div class="col-md-5">
                                    <ul class="processos">
                                            
                                    </ul>
                                </div>
                                <div class="v_line"></div>
                                <div class="col-md-7">
                                    <ul class="documentos">
                                    
                                    </ul>
                                </div>
                            </div>
                            <h1 class="text-center">Imóvel</h1>
                            <div class="container">
                                <form method="POST" action="http://despachaimob.com/editaimovel" class="viacepForm">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="cep" class="mb-0 col-form-label-sm">CEP</label>
                                            <input type="text" name="cep" id="cep" class="form-control pula viacep-cep" value="`+ result[0][0].cep +`" required>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="logradouro" class="mb-0 col-form-label-sm">Endereço</label>
                                            <input type="text" name="logradouro" id="logradouro" class="form-control pula viacep-logradouro" value="`+ result[0][0].logradouro +`" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="numero" class="mb-0 col-form-label-sm">Número</label>
                                            <input type="text" name="numero" id="numero" class="form-control pula viacep-numero" value="`+ result[0][0].numero +`" required>
                                        </div>
                                    </div><!-- Row 2 -->
                    
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="complemento" class="mb-0 col-form-label-sm">Complemento</label>
                                            <input type="text" name="complemento" id="complemento" class="form-control pula" value="`+ result[0][0].complemento +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="bairro" class="mb-0 col-form-label-sm">Bairro</label>
                                            <input type="text" name="bairro" id="bairro" class="form-control pula viacep-bairro" value="`+ result[0][0].bairro +`" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cidade" class="mb-0 col-form-label-sm">Cidade</label>
                                            <input type="text" name="cidade" id="cidade" class="form-control pula viacep-cidade" value="`+ result[0][0].cidade +`" required>
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
                                            <input type="text" name="iptu" id="iptu" class="form-control pula" value="`+ result[0][0].iptu +`">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="matricula" class="mb-0 col-form-label-sm">Matrícula</label>
                                            <input type="text" name="matricula" id="matricula" class="form-control pula" value="`+ result[0][0].matricula +`" required>
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
                                                <input type="text" name="v_venda" id="v_venda" class="form-control pula money" value="`+ result[0][0].v_venda +`" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="v_condominio" class="mb-0 col-form-label-sm">Valor Condomínio</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="v_condominio">R$</label>
                                                </div>
                                                <input type="text" name="v_condominio" id="v_condominio" class="form-control pula money" value="`+ result[0][0].v_condominio +`">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="suites" class="mb-0 col-form-label-sm">Suítes</label>
                                            <input type="text" name="suites" id="suites" class="form-control pula" value="`+ result[0][0].suites +`">
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
                                                <input type="radio" disabled name="opcao_vazio" id="inquilino" class="form-check-input" value="Inquilino">
                                                <label for="inquilino" class="form-check-label">Inquilino</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" disabled name="opcao_vazio" id="proprietario" class="form-check-input" value="Proprietario">
                                                <label for="proprietario" class="form-check-label">Proprietário</label>
                                            </div>
                                        </div>
                                    </div><!-- Row 5 -->
                    
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="garagem" class="mb-0 col-form-label-sm">Garagem</label>
                                            <input type="text" name="garagem" id="garagem" class="form-control pula" value="`+ result[0][0].garagem +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="elevador" class="mb-0 col-form-label-sm">Elevador</label>
                                            <input type="text" name="elevador" id="elevador" class="form-control pula" value="`+ result[0][0].elevador +`">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="quartos" class="mb-0 col-form-label-sm">Quartos</label>
                                            <input type="text" name="quartos" id="quartos" class="form-control pula" value="`+ result[0][0].quartos +`">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="p_referencia" class="mb-0 col-form-label-sm">Ponto de referência</label>
                                            <input type="text" name="p_referencia" id="p_referencia" class="form-control pula" value="`+ result[0][0].p_referencia +`">
                                        </div>
                                    </div><!-- Row 6 -->
                    
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="observacao" class="mb-0 col-form-label-sm">Observações</label>
                                            <textarea class="form-control" name="observacao" id="observacao" rows="5">`+ result[0][0].observacao +`</textarea>
                                        </div>
                                    </div><!-- Row 10 -->
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <button type="submit" id="btn_editar_pf" class="btn btn_editar mb-4 mt-3">Editar</button>
                                            <button type="button" id="btn_fechar_pf" class="btn btn_submit btn_fechar mb-4 mt-3">Fechar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        `).appendTo('.resultado_pesquisa');

                        $('#uf').val(result[0][0].uf);

                        $('#cartorio').val(result[0][0].cartorio);

                        $('#vazio').val(result[0][0].vazio);

                        if(result[0][0].vazio === 'N') {
                            $('#inquilino').removeAttr('disabled');
                            $('#proprietario').removeAttr('disabled');

                            if(result[0][0].opcao_vazio === 'Inquilino') {
                                $('#inquilino').attr('checked', true);
                            }

                            if(result[0][0].opcao_vazio === 'Proprietario') {
                                $('#proprietario').attr('checked', true);
                            }
                        }
                        
                        if(result[1].length !== 0) {
                            $.each(result[1], function(index, value) {
                                $(`<li>Processo número <strong>`+ value.numero_processo +`</strong></li>`).appendTo('.processos');
                            });
                        }

                        if(result[2].length) {
                            $.each(result[2], function(index, value) {
                                if(!value.mensagem) {
                                    $(`<li><a href="assets/arquivos/`+ result[0][0].matricula +`/`+ value +`" target="_blank">`+ value +`</a></li>`).appendTo('.documentos');
                                } else {
                                    $(`<li>`+ value.mensagem +`</li>`).appendTo('.documentos');
                                }
                            });
                        }

                    } else if(result.existe_imovel === 'nao') {
                        $('#opcao').attr('disabled', true);
                        $('#item_pesquisado').attr('disabled', true);
                        $('#pesquisar').attr('disabled', true);

                        $(`<div id="form_sem_imovel" class="mt-4">
                                <h1 class="text-center mensagem">`+ result.mensagem +`</h1>
                                <button type="button"class="btn btn_submit btn_fechar mb-4 mt-3">Fechar</button>
                            </div>
                        `).appendTo('.resultado_pesquisa');

                    }
                },
                error: (result) => {
                    alert('Algo deu errado! IMOVEL')
                    console.log(result.responseText);
                }
            });
        } else if(opcao === 'processo') {
            $.ajax({
                url: 'http://despachaimob.com/pesquisaprocessoajax',
                crossDomain: true,
                method: 'POST',
                dataType: 'json',
                data: {item_pesquisado: item_pesquisado},
                success: function(result) {
                    if(result.tem_processo == 'sim') {
                        function formataData(data) {
                            if(data) {
                                switch (data) {
                                    case '':
                                        return '';
                                        break;
                                    case '0000-00-00':
                                        return '';
                                        break;
                                    case null:
                                        return '';
                                        break;
                                    default:
                                        format_data = data.split('-');
                                        return (format_data[2]+'/'+format_data[1]+'/'+format_data[0]);
                                        break;
                                }
                            } else {
                                return '';
                            }
                        }
                        $('#opcao').attr('disabled', true);
                        $('#item_pesquisado').attr('disabled', true);
                        $('#pesquisar').attr('disabled', true);

                        $('<div class="formulario_processo"></div>').appendTo('.resultado_pesquisa');

                        // CABEÇALHO DO PROCESSO
                        $(`<div id="form_processo mt-4">
                            <h1 id="titulo_processo" class="text-center">Processo</h1>
                            <div class="row d-flex justify-content-center">
                                <div class="form-group col-md-3" id="div_indicacao">
                                    <label class="col-form-label-sm mb-0">Indicado por</label>
                                    <input type="text" class="form-control indicacao" value="`+ result.processo[0].indicacao +`" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_numero_processo">
                                    <label class="col-form-label-sm mb-0">Processo número</label>
                                    <input type="text" class="form-control numero_processo" value="`+ result.processo[0].numero_processo +`" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_data_processo">
                                    <label class="col-form-label-sm mb-0">Início Processo</label>
                                    <input type="text" class="form-control inicio_processo" value="`+ formataData(result.processo[0].data_cadastro_processo) +`" readonly>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center centralizar">
                                <ul class="documentos">
                                        
                                </ul>
                            </div>
                        </div>`).appendTo('.formulario_processo');

                        // ARQUIVOS
                        if(result.arquivos) {
                            for(let a in result.arquivos) {
                                if(result.arquivos[a].mensagem) {
                                    $(`<li class="arquivos_mensagem">`+ result.arquivos[a].mensagem +`</li>`).appendTo('.documentos');
                                } else {
                                    $(`<li><a href="`+ result.arquivos[a].dirname + '/' + result.arquivos[a].basename +`" target="_blank">`+ result.arquivos[a].basename +`</a></li>`).appendTo('.documentos');
                                }
                            }
                        }

                        $(`<div class="line"></div>`).appendTo('.formulario_processo');

                        // COMPRADOR PESSOA FÍSICA
                        if(result.compradores_pf) {
                            for(let a in result.compradores_pf) {
                                $(`<div class="compradores">
                                    <h1 class="text-center mb-3">Comprador</h1>
                                    <div class="row row_1">
                                        <div class="form-group col-md-5">
                                            <label class="col-form-label-sm mb-0">Nome</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].nome +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">CPF</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].cpf +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].nacionalidade +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Profissão</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].profissao +`" readonly>
                                        </div>
                                    </div><!-- Row 1 -->
                                    <div class="row row_2">
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Nascimento</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.compradores_pf[a].nascimento) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Data do Casamento</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.compradores_pf[a].data_casamento) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].tipo_regime +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Tipo Regime</label>
                                            <input type="text" class="form-control comprador_regime" readonly>
                                        </div>
                                    </div><!-- Row 2 -->
                                    <div class="row row_3">
                                        <div class="form-group col-md-2">
                                            <label class="col-form-table-sm mb-0">Doc. Identidade</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].rg +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-table-sm mb-0">Orgão Expedidor</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].o_expedidor +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-table-sm mb-0">Data Expedição</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.compradores_pf[a].d_expedicao) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-table-sm mb-0">Assinatura Cartório</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].ass_cartorio +`" readonly>
                                        </div>
                                    </div><!-- Row 3 -->
                                </div>`).appendTo('.formulario_processo');

                                if(result.compradores_pf[a].cpf_conjuge) {
                                    // CÔNJUGE COMPRADOR
                                    $(`<div class="comprador_conjuge">
                                        <h1 class="text-center">Cônjuge Comprador</h1>
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label-sm mb-0">Nome</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pf[a].nome_conjuge +`" readonly>
                                            </div>
                                                <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">CPF</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pf[a].cpf_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pf[a].nacionalidade_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">Profissão</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pf[a].profissao_conjuge +`" readonly>
                                            </div>
                                        </div><!-- Row 4 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nascimento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pf[a].nascimento_conjuge) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data do Casamento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pf[a].data_casamento) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pf[a].regime +`" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label-sm mb-0">Tipo Regime</label>
                                                <input type="text" class="form-control comprador_regime" readonly>
                                            </div>
                                        </div><!-- Row 5 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-table-sm mb-0">Doc. Identidade</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pf[a].rg_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-table-sm mb-0">Orgão Expedidor</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pf[a].o_expedidor_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-table-sm mb-0">Data Expedição</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pf[a].d_expedicao_conjuge) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-table-sm mb-0">Assinatura Cartório</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pf[a].ass_cartorio_conjuge +`" readonly>
                                            </div>
                                        </div><!-- Row 6 -->
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="telefone_conjuge" class="mb-0 col-form-label-sm">Telefone</label>
                                                <input type="text" name="telefone_conjuge" id="telefone_conjuge" class="form-control pula" value="`+ result.compradores_pf[a].telefone_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label for="email_conjuge" class="mb-0 col-form-label-sm">E-mail</label>
                                                <input type="text" name="email_conjuge" id="email_conjuge" class="form-control pula" value="`+ result.compradores[a].email_conjuge +`" readonly>
                                            </div>
                                        </div>
                                    </div><!-- Row 4 -->`).appendTo('.formulario_processo');
                                }

                                switch (result.compradores_pf[a].regime) {
                                    case 'parcial':
                                        $('.comprador_regime').val('Comunhão Parcial de Bens');
                                        break;
                                    case 'universal':
                                        $('.comprador_regime').val('Comunhão Universal de Bens');
                                        break;
                                    case 'total':
                                        $('.comprador_regime').val('Separação Total de Bens');
                                        break;
                                    case 'obrigatoria':
                                        $('.comprador_regime').val('Separação Obrigatória de Bens');
                                        break;
                                    case 'aquestos':
                                        $('.comprador_regime').val('Separação Final nos Aquestos');
                                        break;
                                    case 'u_estavel':
                                        $('.comprador_regime').val('União Estável');
                                        break;
                                }

                                // ENDEREÇO COMPRADOR
                                $(`<div class="endereco_comprador">
                                    <h1 class="text-center mb-3">Endereço Comprador</h1>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Endereço</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].logradouro +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Bairro</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].bairro +`" readonly>
                                        </div>
                                    </div><!-- Row 7 -->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Número</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].numero +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Complemento</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].complemento +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">CEP</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].cep +`" readonly>
                                        </div>
                                    </div><!-- Row 8 -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">E-mail 1</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].email_1 +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">E-mail 2</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].email_2 +`" readonly>
                                        </div>
                                    </div><!-- Row 9 -->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Celular</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].celular +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Residência</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].residencia +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Comercial</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].comercial +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Recado</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pf[a].recado +`" readonly>
                                        </div>
                                    </div><!-- Row 10 -->
                                </div>`).appendTo('.formulario_processo');

                                $(`<div class="line"></div>`).appendTo('.formulario_processo');
                            }
                        }

                        // COMPRADOR PESSOA JURÍDICA
                        if(result.compradores_pj) {
                            for(let a in result.compradores_pj) {
                                $(`<div class="compradores_pj">
                                    <h1 class="text-center mb-3">Comprador</h1>
                                    <div class="row row_1">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Razão Social</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pj[a].razao_social +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Nome Fantasia</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].nome_fantasia) +`" readonly>
                                        </div>
                                    </div><!-- Row 1 -->
                                    <div class="row row_2">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">CNPJ</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pj[a].cnpj +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Inscrição Estadual</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].insc_estadual) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Data de Abetura</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.compradores_pj[a].data_abertura) +`" readonly>
                                        </div>
                                    </div><!-- Row 2 -->

                                    <h1 class="text-center mb-3">Endereço</h1>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Endereço Vendedor</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pj[a].logradouro +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Número</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pj[a].numero +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Complemento</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].complemento) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">CEP</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pj[a].cep +`" readonly>
                                        </div>
                                    </div><!-- Row 3 -->
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label class="col-form-label-sm mb-0">E-mail 1</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pj[a].email_1 +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Telefone 1</label>
                                            <input type="text" class="form-control" value="`+ result.compradores_pj[a].telefone_1 +`" readonly>
                                        </div>
                                    </div><!-- Row 4 -->
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label class="col-form-label-sm mb-0">E-mail 2</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].email_2) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Telefone 2</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].telefone_2) +`" readonly>
                                        </div>
                                    </div>
                                </div>`).appendTo('.formulario_processo');

                                // REPRESENTATE LEGAL 1
                                $(`<div class="representante_legal">
                                        <h1 class="text-center mb-3">Representante Legal</h1>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label-sm mb-0">Nome</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].nome_socio_1 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">CPF</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].cpf_socio_1 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">RG</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].rg_socio_1) +`" readonly>
                                            </div>
                                        </div><!-- Row 5 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Expedição</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pj[a].d_expedicao_socio_1) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].o_expedidor_socio_1) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Nascimento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pj[a].nascimento_socio_1) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].nacionalidade_socio_1 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].estado_civil_socio_1 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">CEP</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].cep_socio_1) +`" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-0 col-form-label-sm">Endereço</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].logradouro_socio_1) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">Número</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].numero_socio_1) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="mb-0 col-form-label-sm">Complemento</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].complemento_socio_1) +`" readonly>
                                            </div>
                                        </div><!-- Row 6 -->
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Bairro</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].bairro_socio_1) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Cidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].cidade_socio_1) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">UF</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].uf_socio_1) +`" readonly>
                                            </div>
                                        </div><!-- Row 7 -->
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label-sm mb-0">Profissão</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].profissao_socio_1 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">Telefone</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].celular_socio_1 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label-sm mb-0">E-mail</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].email_socio_1 +`" readonly>
                                            </div>
                                        </div><!-- Row 8 -->
                                    </div>`).appendTo('.formulario_processo');

                                // REPRESENTATE LEGAL 2
                                if(result.compradores_pj[a].cpf_socio_2) {
                                    $(`<div class="representante_legal"">
                                        <h1 class="text-center mb-3">Representante Legal</h1>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label-sm mb-0">Nome</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].nome_socio_2 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">CPF</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].cpf_socio_2 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">RG</label>
                                                <input type="text" class="form-control" value="`+ verificaCampos(result.compradores_pj[a].rg_socio_2) +`" readonly>
                                            </div>
                                        </div><!-- Row 9 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Expedição</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pj[a].d_expedicao_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].o_expedidor_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Nascimento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pj[a].nascimento_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].nacionalidade_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].estado_civil_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">CEP</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].cep_socio_2) +`" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-0 col-form-label-sm">Endereço</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].logradouro_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">Número</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].numero_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="mb-0 col-form-label-sm">Complemento</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].complemento_socio_2) +`" readonly>
                                            </div>
                                        </div><!-- Row 10 -->
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Bairro</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].bairro_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Cidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].cidade_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">UF</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].uf_socio_2) +`" readonly>
                                            </div>
                                        </div><!-- Row 11 -->
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label-sm mb-0">Profissão</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].profissao_socio_2 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">Telefone</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].celular_socio_2 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label-sm mb-0">E-mail</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].email_socio_2 +`" readonly>
                                            </div>
                                        </div><!-- Row 12 -->
                                    </div>`).appendTo('.formulario_processo');
                                }

                                // REPRESENTATE LEGAL 3
                                if(result.compradores_pj[a].cpf_socio_3) {
                                    $(`<div class="representante_legal">
                                        <h1 class="text-center mb-3">Representante Legal</h1>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label-sm mb-0">Nome</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].nome_socio_3 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">CPF</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].cpf_socio_3 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">RG</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].rg_socio_3) +`" readonly>
                                            </div>
                                        </div><!-- Row 13 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Expedição</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pj[a].d_expedicao_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].o_expedidor_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Nascimento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pj[a].d_nascimento_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].nacionalidade_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].estado_civil_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">CEP</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].cep_socio_3) +`" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-0 col-form-label-sm">Endereço</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].logradouro_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">Número</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].numero_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="mb-0 col-form-label-sm">Complemento</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].complemento_socio_3) +`" readonly>
                                            </div>
                                        </div><!-- Row 14 -->
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Bairro</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].bairro_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Cidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].cidade_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">UF</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].uf_socio_3) +`" readonly>
                                            </div>
                                        </div><!-- Row 15 -->
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label-sm mb-0">Profissão</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].profissao_socio_3 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">Telefone</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].celular_socio_3 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label-sm mb-0">E-mail</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].email_socio_3 +`" readonly>
                                            </div>
                                        </div><!-- Row 16 -->
                                    </div>`).appendTo('.formulario_processo');
                                }

                                // REPRESENTATE LEGAL 4
                                if(result.compradores_pj[a].cpf_socio_4) {
                                    $(`<div class="representante_legal">
                                        <h1 class="text-center mb-3">Representante Legal</h1>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label-sm mb-0">Nome</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].nome_socio_4 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">CPF</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].cpf_socio_4 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">RG</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].rg_socio_4) +`" readonly>
                                            </div>
                                        </div><!-- Row 17 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Expedição</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pj[a].d_expedicao_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].o_expedidor_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Nascimento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.compradores_pj[a].nascimento_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].nacionalidade_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].estado_civil_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">CEP</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].cep_socio_4) +`" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-0 col-form-label-sm">Endereço</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].logradouro_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">Número</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].numero_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">Complemento</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].complemento_socio_4) +`" readonly>
                                            </div>
                                        </div><!-- Row 18 -->
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Bairro</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].bairro_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Cidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].cidade_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">UF</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.compradores_pj[a].uf_socio_4) +`" readonly>
                                            </div>
                                        </div><!-- Row 19 -->
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label-sm mb-0">Profissão</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].profissao_socio_4 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">Telefone</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].celular_socio_4 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label-sm mb-0">E-mail</label>
                                                <input type="text" class="form-control" value="`+ result.compradores_pj[a].email_socio_4 +`" readonly>
                                            </div>
                                        </div><!-- Row 20 -->
                                    </div>`).appendTo('.formulario_processo');
                                }

                                $(`<div class="line"></div>`).appendTo('.formulario_processo');
                            }
                        }

                        // PROCURADOR DO COMPRADOR
                        if(result.procuradores_compradores.length !== 0) {
                            $(`<div class="procurador_comprador">
                                <h1 class="text-center">Procurador do Comprador</h1>
                                <div class="alert alert-danger text-center aviso_proc_comprador" role="alert"></div>
                                <input type="number" class="id_proc_comprador" hidden name="id_proc_comprador" value="`+ result.procuradores_compradores[1].id_proc_comprador +`">
                                <input type="number" class="id_cliente_proc_comprador" hidden name="id_cliente_proc_comprador" value="`+ result.procuradores_compradores[0].id_cliente +`">
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label class="col-form-label-sm mb-0">Nome</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].nome +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">CPF</label>
                                        <input type="text" name="proc_comprador_cpf" class="form-control cpf_proc_comprador" value="`+ result.procuradores_compradores[0].cpf +`">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].nacionalidade +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Profissão</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].profissao +`" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Nascimento</label>
                                        <input type="text" class="form-control" value="`+ formataData(result.procuradores_compradores[0].nascimento) +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Data Casamento</label>
                                        <input type="text" class="form-control" value="`+ formataData(result.procuradores_compradores[0].data_casamento) +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].tipo_regime +`" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label-sm mb-0">Tipo Regime Casamento</label>
                                        <input type="text" class="form-control proc_comprador_regime" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Doc. Identidade</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].rg +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].o_expedidor +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Data Expedição</label>
                                        <input type="text" class="form-control" value="`+ formataData(result.procuradores_compradores[0].d_expedicao) +`" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label-sm mb-0">Assinatura Cartório</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].ass_cartorio +`" readonly>
                                    </div>
                                </div>
                                <h1 class="text-center">Contato</h1>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label-sm mb-0">E-mail 1</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].email_1 +`" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label-sm mb-0">E-mail 2</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].email_2 +`" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Celular</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].celular +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Residência</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].residencia +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Comercial</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].comercial +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Recado</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_compradores[0].recado +`" readonly>
                                    </div>
                                </div><div class="row">
                                <div class="form-group col-md-12">
                                    <button type="button" class="btn btn_submit btn_edita_proc_comprador">Editar Procurador</button>
                                </div>
                            </div>
                            </div>`).appendTo('.formulario_processo');

                            switch (result.procuradores_compradores[0].regime) {
                                case 'parcial':
                                    $('.proc_comprador_regime').val('Comunhão Parcial de Bens');
                                    break;
                                case 'universal':
                                    $('.proc_comprador_regime').val('Comunhão Universal de Bens');
                                    break;
                                case 'total':
                                    $('.proc_comprador_regime').val('Separação Total de Bens');
                                    break;
                                case 'obrigatoria':
                                    $('.proc_comprador_regime').val('Separação Obrigatória de Bens');
                                    break;
                                case 'aquestos':
                                    $('.proc_comprador_regime').val('Separação Final nos Aquestos');
                                    break;
                                case 'u_estavel':
                                    $('.proc_comprador_regime').val('União Estável');
                                    break;
                            }

                            $(`<div class="line"></div>`).appendTo('.formulario_processo');
                        }

                        // VENDEDORES PESSOA FÍSICA
                        if(result.vendedores_pf) {
                            for(let a in result.vendedores_pf) {
                                $(`<div class="vendedores">
                                    <h1 class="text-center mb-3">Vendedor</h1>
                                    <div class="row row_1">
                                        <div class="form-group col-md-5">
                                            <label class="col-form-label-sm mb-0">Nome</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].nome +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">CPF</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].cpf +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].nacionalidade +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Profissão</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].profissao +`" readonly>
                                        </div>
                                    </div><!-- Row 1 -->
                                    <div class="row row_2">
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Nascimento</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.vendedores_pf[a].nascimento_conjuge) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Data do Casamento</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.vendedores_pf[a].data_casamento) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].tipo_regime +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Tipo Regime</label>
                                            <input type="text" class="form-control vendedor_regime" readonly>
                                        </div>
                                    </div><!-- Row 2 -->
                                    <div class="row row_3">
                                        <div class="form-group col-md-2">
                                            <label class="col-form-table-sm mb-0">Doc. Identidade</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].rg +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-table-sm mb-0">Orgão Expedidor</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].o_expedidor +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-table-sm mb-0">Data Expedição</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.vendedores_pf[a].d_expedicao) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-table-sm mb-0">Assinatura Cartório</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].ass_cartorio +`" readonly>
                                        </div>
                                    </div><!-- Row 3 -->
                                </div>`).appendTo('.formulario_processo');

                                if(result.vendedores_pf[a].cpf_conjuge) {
                                    // CÔNJUGE VENDEDORES
                                    $(`<div class="vendedor_conjuge">
                                        <h1 class="text-center">Cônjuge Vendedor</h1>
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label-sm mb-0">Nome</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pf[a].nome_conjuge +`" readonly>
                                            </div>
                                                <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">CPF</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pf[a].cpf_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pf[a].nacionalidade_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">Profissão</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pf[a].profissao_conjuge +`" readonly>
                                            </div>
                                        </div><!-- Row 4 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nascimento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.vendedores_pf[a].nascimento_conjuge) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data do Casamento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.vendedores_pf[a].data_casamento) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pf[a].tipo_regime +`" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label-sm mb-0">Tipo Regime</label>
                                                <input type="text" class="form-control vendedor_regime" readonly>
                                            </div>
                                        </div><!-- Row 5 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-table-sm mb-0">Doc. Identidade</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pf[a].rg_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-table-sm mb-0">Orgão Expedidor</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pf[a].o_expedidor_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-table-sm mb-0">Data Expedição</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.vendedores_pf[a].d_expedicao_conjuge) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-table-sm mb-0">Assinatura Cartório</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pf[a].ass_cartorio_conjuge +`" readonly>
                                            </div>
                                        </div><!-- Row 6 -->
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="telefone_conjuge" class="mb-0 col-form-label-sm">Telefone</label>
                                                <input type="text" name="telefone_conjuge" id="telefone_conjuge" class="form-control pula" value="`+ result.vendedores_pf[a].telefone_conjuge +`" readonly>
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label for="email_conjuge" class="mb-0 col-form-label-sm">E-mail</label>
                                                <input type="text" name="email_conjuge" id="email_conjuge" class="form-control pula" value="`+ result.vendedores_pf[a].email_conjuge +`" readonly>
                                            </div>
                                        </div>
                                    </div><!-- Row 4 -->`).appendTo('.formulario_processo');

                                    switch (result.vendedores_pf[a].regime) {
                                        case 'parcial':
                                            $('.vendedor_regime').val('Comunhão Parcial de Bens');
                                            break;
                                        case 'universal':
                                            $('.vendedor_regime').val('Comunhão Universal de Bens');
                                            break;
                                        case 'total':
                                            $('.vendedor_regime').val('Separação Total de Bens');
                                            break;
                                        case 'obrigatoria':
                                            $('.vendedor_regime').val('Separação Obrigatória de Bens');
                                            break;
                                        case 'aquestos':
                                            $('.vendedor_regime').val('Separação Final nos Aquestos');
                                            break;
                                        case 'u_estavel':
                                            $('.vendedor_regime').val('União Estável');
                                            break;
                                    }
                                }

                                // ENDEREÇO VENDEDOR
                                $(`<div class="endereco_vendedor">
                                    <h1 class="text-center mb-3">Endereço Vendedor</h1>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Endereço</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].logradouro +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Bairro</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].bairro +`" readonly>
                                        </div>
                                    </div><!-- Row 7 -->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Número</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].numero +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Complemento</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].complemento +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">CEP</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].cep +`" readonly>
                                        </div>
                                    </div><!-- Row 8 -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">E-mail 1</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].email_1 +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">E-mail 2</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].email_2 +`" readonly>
                                        </div>
                                    </div><!-- Row 9 -->
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Celular</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].celular +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Residência</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].residencia +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Comercial</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].comercial +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Recado</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pf[a].recado +`" readonly>
                                        </div>
                                    </div><!-- Row 10 -->
                                </div>`).appendTo('.formulario_processo');

                                $(`<div class="line"></div>`).appendTo('.formulario_processo');
                            }
                        }

                        // VENDEDOR PESSOA JURÍDICA
                        if(result.vendedores_pj) {
                            for(let a in result.vendedores_pj) {
                                $(`<div class="vendedores_pj">
                                    <h1 class="text-center mb-3">Vendedor</h1>
                                    <div class="row row_1">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Razão Social</label>
                                            <input type="text" class="form-control vendedores_pj_unico_razao" value="`+ result.vendedores_pj[a].razao_social +`" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Nome Fantasia</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].nome_fantasia) +`" readonly>
                                        </div>
                                    </div><!-- Row 1 -->
                                    <div class="row row_2">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">CNPJ</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].cnpj +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Inscrição Estadual</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].insc_estadual) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Data de Abetura</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.vendedores_pj[a].data_abertura) +`" readonly>
                                        </div>
                                    </div><!-- Row 2 -->

                                    <h1 class="text-center mb-3">Endereço</h1>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Endereço Vendedor</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].logradouro +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Número</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].numero +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Complemento</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].complemento +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">CEP</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].cep +`" readonly>
                                        </div>
                                    </div><!-- Row 3 -->
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label class="col-form-label-sm mb-0">E-mail 1</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].email_1 +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Telefone 1</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].telefone_1 +`" readonly>
                                        </div>
                                    </div><!-- Row 4 -->
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label class="col-form-label-sm mb-0">E-mail 2</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].email_2 +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label-sm mb-0">Telefone 2</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].telefone_2 +`" readonly>
                                        </div>
                                    </div>
                                </div>`).appendTo('.formulario_processo');

                                // REPRESENTATE LEGAL 1
                                $(`<div class="representante_legal">
                                    <h1 class="text-center mb-3">Representante Legal</h1>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label-sm mb-0">Nome</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].nome_socio_1 +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">CPF</label>
                                            <input type="text" class="form-control" value="`+ result.vendedores_pj[a].cpf_socio_1 +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">RG</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].rg_socio_1) +`" readonly>
                                        </div>
                                    </div><!-- Row 5 -->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Data Expedição</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.vendedores_pj[a].d_expedicao_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].o_expedido_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Data Nascimento</label>
                                            <input type="text" class="form-control" value="`+ formataData(result.vendedores_pj[a].nascimento_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].nacionalidade_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].estado_civil_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="mb-0 col-form-label-sm">CEP</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].cep_socio_1) +`" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="mb-0 col-form-label-sm">Endereço</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].logradouro_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="mb-0 col-form-label-sm">Número</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].numero_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="mb-0 col-form-label-sm">Complemento</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].complemento_socio_1) +`" readonly>
                                        </div>
                                    </div><!-- Row 6 -->
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <label class="mb-0 col-form-label-sm">Bairro</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].bairro_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="mb-0 col-form-label-sm">Cidade</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].cidade_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="mb-0 col-form-label-sm">UF</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].uf_socio_1) +`" readonly>
                                        </div>
                                    </div><!-- Row 7 -->
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <label class="col-form-label-sm mb-0">Profissão</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].profissao_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="col-form-label-sm mb-0">Telefone</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].celular_socio_1) +`" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="col-form-label-sm mb-0">E-mail</label>
                                            <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].email_socio_1) +`" readonly>
                                        </div>
                                    </div><!-- Row 8 -->
                                </div>`).appendTo('.formulario_processo');

                                // REPRESENTATE LEGAL 2
                                if(result.vendedores_pj[a].cpf_socio_2) {
                                    $(`<div class="representante_legal"">
                                        <h1 class="text-center mb-3">Representante Legal</h1>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label-sm mb-0">Nome</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pj[a].nome_socio_2 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">CPF</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pj[a].cpf_socio_2 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">RG</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].rg_socio_2) +`" readonly>
                                            </div>
                                        </div><!-- Row 9 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Expedição</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.vendedores_pj[a].d_expedicao_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].o_expedidor_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Nascimento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.vendedores_pj[a].nascimento_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].nacionalidade_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].estado_civil_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">CEP</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].cep_socio_2) +`" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-0 col-form-label-sm">Endereço</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].logradouro_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">Número</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].numero_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="mb-0 col-form-label-sm">Complemento</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].complemento_socio_2) +`" readonly>
                                            </div>
                                        </div><!-- Row 10 -->
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Bairro</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].bairro_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Cidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].cidade_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">UF</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].uf_socio_2) +`" readonly>
                                            </div>
                                        </div><!-- Row 11 -->
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label-sm mb-0">Profissão</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].profissao_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">Telefone</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].celular_socio_2) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label-sm mb-0">E-mail</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].email_socio_2) +`" readonly>
                                            </div>
                                        </div><!-- Row 12 -->
                                    </div>`).appendTo('.formulario_processo');
                                }

                                // REPRESENTATE LEGAL 3
                                if(result.vendedores_pj[a].cpf_socio_3) {
                                    $(`<div class="representante_legal">
                                        <h1 class="text-center mb-3">Representante Legal</h1>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label-sm mb-0">Nome</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pj[a].nome_socio_3 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">CPF</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pj[a].cpf_socio_3 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">RG</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].rg_socio_3) +`" readonly>
                                            </div>
                                        </div><!-- Row 13 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Expedição</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.vendedores_pj[a].d_expedicao_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].o_expedidor_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Nascimento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.vendedores_pj[a].nascimento_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].nacionalidade_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].estado_civil_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">CEP</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].cep_socio_3) +`" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-0 col-form-label-sm">Endereço</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].logradouro_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">Número</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].numero_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="mb-0 col-form-label-sm">Complemento</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].complemento_socio_3) +`" readonly>
                                            </div>
                                        </div><!-- Row 14 -->
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Bairro</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].bairro_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Cidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].cidade_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">UF</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].uf_socio_3) +`" readonly>
                                            </div>
                                        </div><!-- Row 15 -->
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label-sm mb-0">Profissão</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].profissao_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">Telefone</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].celular_socio_3) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label-sm mb-0">E-mail</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].email_socio_3) +`" readonly>
                                            </div>
                                        </div><!-- Row 16 -->
                                    </div>`).appendTo('.formulario_processo');
                                }

                                // REPRESENTATE LEGAL 4
                                if(result.vendedores_pj[a].cpf_socio_4) {
                                    $(`<div class="representante_legal">
                                        <h1 class="text-center mb-3">Representante Legal</h1>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label-sm mb-0">Nome</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pj[a].nome_socio_4 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">CPF</label>
                                                <input type="text" class="form-control" value="`+ result.vendedores_pj[a].cpf_socio_4 +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">RG</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].rg_socio_4) +`" readonly>
                                            </div>
                                        </div><!-- Row 17 -->
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Expedição</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.vendedores_pj[a].d_expedicao_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].o_expedidor_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Data Nascimento</label>
                                                <input type="text" class="form-control" value="`+ formataData(result.vendedores_pj[a].nascimento_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].nacionalidade_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].estado_civil_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">CEP</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].cep_socio_4) +`" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-0 col-form-label-sm">Endereço</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].logradouro_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">Número</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].numero_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="mb-0 col-form-label-sm">Complemento</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].complemento_socio_4) +`" readonly>
                                            </div>
                                        </div><!-- Row 18 -->
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Bairro</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].bairro_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mb-0 col-form-label-sm">Cidade</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].cidade_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="mb-0 col-form-label-sm">UF</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].uf_socio_4) +`" readonly>
                                            </div>
                                        </div><!-- Row 19 -->
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label-sm mb-0">Profissão</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].profissao_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-form-label-sm mb-0">Telefone</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].celular_socio_4) +`" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label-sm mb-0">E-mail</label>
                                                <input type="text" class="form-control" value="`+ verificaCampo(result.vendedores_pj[a].email_socio_4) +`" readonly>
                                            </div>
                                        </div><!-- Row 20 -->
                                    </div>`).appendTo('.formulario_processo');
                                }

                                $(`<div class="line"></div>`).appendTo('.formulario_processo');
                            }
                        }

                        // PROCURADOR DO VENDEDOR
                        if(result.procuradores_vendedores.length !== 0) {
                            $(`<div class="procurador_vendedor">
                                <h1 class="text-center">Procurador do Vendedor</h1>
                                <div class="alert alert-danger text-center aviso_proc_vendedor" role="alert"></div>
                                <input type="number" class="id_proc_vendedor" hidden name="id_proc_vendedor" value="`+ result.procuradores_vendedores[1].id_proc_vendedor +`">
                                <input type="number" class="id_cliente_proc_vendedor" hidden name="id_cliente" value="`+ result.procuradores_vendedores[0].id_cliente +`">
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label class="col-form-label-sm mb-0">Nome</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].nome +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">CPF</label>
                                        <input type="text" name="proc_vendedor_cpf" class="form-control cpf_proc_vendedor" value="`+ result.procuradores_vendedores[0].cpf +`">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Nacionalidade</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].nacionalidade +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Profissão</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].profissao +`" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Nascimento</label>
                                        <input type="text" class="form-control" value="`+ formataData(result.procuradores_vendedores[0].nascimento) +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Data Casamento</label>
                                        <input type="text" class="form-control" value="`+ formataData(result.procuradores_vendedores[0].data_casamento) +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Estado Civíl</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].tipo_regime +`" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label-sm mb-0">Tipo Regime Casamento</label>
                                        <input type="text" class="form-control proc_vendedor_regime" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Doc. Identidade</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].rg +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Orgão Expedidor</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].o_expedidor +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Data Expedição</label>
                                        <input type="text" class="form-control" value="`+ formataData(result.procuradores_vendedores[0].d_expedicao) +`" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label-sm mb-0">Assinatura Cartório</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].ass_cartorio +`" readonly>
                                    </div>
                                </div>
                                <h1 class="text-center">Contato</h1>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label-sm mb-0">E-mail 1</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].email_1 +`" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label-sm mb-0">E-mail 2</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].email_2 +`" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Celular</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].celular +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Residência</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].residencia +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Comercial</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].comercial +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Recado</label>
                                        <input type="text" class="form-control" value="`+ result.procuradores_vendedores[0].recado +`" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <button type="button" class="btn btn_submit btn_edita_proc_vendedor">Editar Procurador</button>
                                    </div>
                                </div>
                            </div>`).appendTo('.formulario_processo');

                            switch (result.procuradores_vendedores[0].regime) {
                                case 'parcial':
                                    $('.proc_vendedor_regime').val('Comunhão Parcial de Bens');
                                    break;
                                case 'universal':
                                    $('.proc_vendedor_regime').val('Comunhão Universal de Bens');
                                    break;
                                case 'total':
                                    $('.proc_vendedor_regime').val('Separação Total de Bens');
                                    break;
                                case 'obrigatoria':
                                    $('.proc_vendedor_regime').val('Separação Obrigatória de Bens');
                                    break;
                                case 'aquestos':
                                    $('.proc_vendedor_regime').val('Separação Final nos Aquestos');
                                    break;
                                case 'u_estavel':
                                    $('.proc_vendedor_regime').val('União Estável');
                                    break;
                            }

                            $(`<div class="line"></div>`).appendTo('.formulario_processo');
                        }

                        // IMÓVEL
                        if(result.imovel) {
                            $(`<div class="imovel">
                                <h1 class="text-center mb-3">Imóvel</h1>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label-sm mb-0">Endereço</label>
                                        <input type="text" class="form-control" value="`+ result.imovel[0].logradouro +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">Nº</label>
                                        <input type="text" class="form-control" value="`+ result.imovel[0].numero +`" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label-sm mb-0">Complemento</label>
                                        <input type="text" class="form-control" value="`+ result.imovel[0].complemento +`" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label-sm mb-0">Bairro</label>
                                        <input type="text" class="form-control" value="`+ result.imovel[0].bairro +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">CEP</label>
                                        <input type="text" class="form-control" value="`+ result.imovel[0].cep +`" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label-sm mb-0">Cidade</label>
                                        <input type="text" class="form-control" value="`+ result.imovel[0].cidade +`" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label-sm mb-0">UF</label>
                                        <input type="text" class="form-control" value="`+ result.imovel[0].uf +`" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Registro</label>
                                        <input type="text" class="form-control" value="`+ result.imovel[0].matricula +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Cartório</label>
                                        <input type="text" class="form-control" id="cartorio" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">IPTU</label>
                                        <input type="text" class="form-control" value="`+ result.imovel[0].iptu +`" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label-sm mb-0">Valor de Venda</label>
                                        <input type="text" class="form-control money" value="`+ result.imovel[0].v_venda +`" readonly>
                                    </div>
                                </div>`).appendTo('.formulario_processo');

                            if(result.imovel[0].cartorio === '1') {
                                $('#cartorio').val('Toscano - 1º Ofício');
                            } else if(result.imovel[0].cartorio === '2') {
                                $('#cartorio').val('Massote - 2º Ofício');
                            } else if(result.imovel[0].cartorio === '3') {
                                $('#cartorio').val('Olavo Costa - 3º Ofício');
                            }
                        }

                        // PROCESSO(HONORÁRIOS, CERTIDÕES, OUTROS, OBSERVAÇÃO)
                        $(`<form method="POST" action="http://despachaimob.com/editaprocesso">
                            <div class="row">
                                <input type="text" hidden name="processo_numero" id="processo_numero" class="processo_numero" value="`+ result.processo[0].numero_processo +`">
                                <div id="div_honorarios" class="form-group col-md-4">
                                    <label class="col-form-label-sm mb-0">Honorários</label>
                                    <input type="text" class="form-control money honorarios" id="honorarios" name="honorarios" value="`+ result.processo[0].honorarios +`">
                                </div>
                                <div id="div_certidoes" class="form-group col-md-4">
                                    <label class="col-form-label-sm mb-0">Certidões</label>
                                    <input type="text" class="form-control money certidoes" id="certidoes" name="certidoes" value="`+ result.processo[0].certidoes +`">
                                </div>
                                <div id="div_outros" class="form-group col-md-4">
                                    <label class="col-form-label-sm mb-0">Outros</label>
                                    <input type="text" class="form-control money outros" id="outros" name="outros" value="`+ result.processo[0].outros +`">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label-sm mb-0">Observações</label>
                                    <textarea class="form-control observa" name="observa" id="observa" value="`+ result.processo[0].obs +`">`+ result.processo[0].obs +`</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" id="btn_editar_imovel" class="btn btn_editar mb-4 mt-3">Editar</button>
                                    <button type="button" id="btn_fechar_imovel" class="btn btn_submit btn_fechar mb-4 mt-3">Fechar</button>
                                </div>
                            </div>
                        </form>`).appendTo('.formulario_processo');
                    } else if(result.tem_processo === 'nao') {
                        $('#opcao').attr('disabled', true);
                        $('#item_pesquisado').attr('disabled', true);
                        $('#pesquisar').attr('disabled', true);

                        $(`<div id="form_sem_processo" class="mt-4">
                                <h1 class="text-center mensagem">`+ result.mensagem +`</h1>
                                <button type="button"class="btn btn_submit btn_fechar mb-4 mt-3">Fechar</button>
                            </div>
                        `).appendTo('.resultado_pesquisa');
                    }
                },
                error: function(result) {
                    alert('Algo deu errado! PROCESSO');
                    console.log(result.responseText);
                }
            });
        }
    });

    $(document).on('click', '.btn_fechar', function(e) {
        e.preventDefault();
        $('#form_pessoa_fisica').remove();
        $('#form_pessoa_juridica').remove();
        $('#form_pessoa_desconhecida').remove();
        $('#form_imovel').remove();
        $('#form_sem_imovel').remove();
        $('#form_sem_processo').remove();
        $('.formulario_processo').remove();
        $('#opcao').removeAttr('disabled');
        $('#opcao').val('');
        $('#opcao').focus();
        $('#item_pesquisado').removeAttr('disabled');
        $('#item_pesquisado').val('');
        $('#pesquisar').removeAttr('disabled');
        $('#pesquisar').val('');
        location.href = 'http://despachaimob.com/pesquisa';
    });

    $('.money').maskMoney({thousands:'.',decimal:',',precision:2});

    $(document).on('click', '.btn_edita_proc_comprador', function() {
        let numero_processo = $('.numero_processo').val();
        let id_cliente_proc_comprador = $('.id_cliente_proc_comprador').val();
        let id_proc_comprador = $('.id_proc_comprador').val();
        let cpf_proc_comprador = $('.cpf_proc_comprador').val();
        
        $.ajax({
            url: 'http://despachaimob.com/editaprocuradorcompradorajax',
            crossDomain: true,
            method: 'POST',
            dataType: 'json',
            data: {
                numero_processo: numero_processo,
                id_cliente_proc_comprador: id_cliente_proc_comprador,
                id_proc_comprador: id_proc_comprador,
                cpf_proc_comprador: cpf_proc_comprador
            },
            success: function(result) {
                console.log(result);
                if(result.mensagem == 'sim') {
                    location.href = 'http://despachaimob.com/pesquisa';
                } else if(result.mensagem == 'nao') {
                    $('.aviso_proc_comprador').css({'display':'block'});
                    $('.aviso_proc_comprador').html('O CPF digitado está incorreto, digite novamente.');
                    setTimeout(function() {
                        $('.aviso_proc_comprador').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_comprador').html('');
                            $('.aviso_proc_comprador').css({'display':'none'});
                            $('.aviso_proc_comprador').removeAttr("style");
                        });
                    }, 5000);
                } else if(result.mensagem == 'comprador') {
                    $('.aviso_proc_comprador').css({'display':'block'});
                    $('.aviso_proc_comprador').html('Este CPF já está cadastrado como COMPRADOR, favor digitar outro CPF');
                    setTimeout(function() {
                        $('.aviso_proc_comprador').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_comprador').html('');
                            $('.aviso_proc_comprador').css({'display':'none'});
                            $('.aviso_proc_comprador').removeAttr("style");
                        });
                    }, 5000);
                } else if(result.mensagem == 'vendedor') {
                    $('.aviso_proc_comprador').css({'display':'block'});
                    $('.aviso_proc_comprador').html('Este CPF já está cadastrado como VENDEDOR, favor digitar outro CPF');
                    setTimeout(function() {
                        $('.aviso_proc_comprador').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_comprador').html('');
                            $('.aviso_proc_comprador').css({'display':'none'});
                            $('.aviso_proc_comprador').removeAttr("style");
                        });
                    }, 5000);
                } else if(result.mensagem == 'procurador comprador') {
                    $('.aviso_proc_comprador').css({'display':'block'});
                    $('.aviso_proc_comprador').html('Este CPF já está cadastrado como PROCURADOR DO COMPRADOR, favor digitar outro CPF');
                    setTimeout(function() {
                        $('.aviso_proc_comprador').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_comprador').html('');
                            $('.aviso_proc_comprador').css({'display':'none'});
                            $('.aviso_proc_comprador').removeAttr("style");
                        });
                    }, 5000);
                } else if(result.mensagem == 'procurador vendedor') {
                    $('.aviso_proc_comprador').css({'display':'block'});
                    $('.aviso_proc_comprador').html('Este CPF já está cadastrado como PROCURADOR DO VENDEDOR, favor digitar outro CPF');
                    setTimeout(function() {
                        $('.aviso_proc_comprador').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_comprador').html('');
                            $('.aviso_proc_comprador').css({'display':'none'});
                            $('.aviso_proc_comprador').removeAttr("style");
                        });
                    }, 5000);
                }
            }
        });
    });

    $(document).on('click', '.btn_edita_proc_vendedor', function() {
        let numero_processo = $('.numero_processo').val();
        let id_cliente_proc_vendedor = $('.id_cliente_proc_vendedor').val();
        let id_proc_vendedor = $('.id_proc_vendedor').val();
        let cpf_proc_vendedor = $('.cpf_proc_vendedor').val();
        
        $.ajax({
            url: 'http://despachaimob.com/editaprocuradorvendedorajax',
            crossDomain: true,
            method: 'POST',
            dataType: 'json',
            data: {
                numero_processo: numero_processo,
                id_cliente_proc_vendedor: id_cliente_proc_vendedor,
                id_proc_vendedor: id_proc_vendedor,
                cpf_proc_vendedor: cpf_proc_vendedor
            },
            success: function(result) {
                console.log(result);
                if(result.mensagem == 'sim') {
                    location.href = 'http://despachaimob.com/pesquisa';
                } else if(result.mensagem == 'nao') {
                    $('.aviso_proc_vendedor').css({'display':'block'});
                    $('.aviso_proc_vendedor').html('O CPF digitado está incorreto, digite novamente.');
                    setTimeout(function() {
                        $('.aviso_proc_vendedor').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_vendedor').html('');
                            $('.aviso_proc_vendedor').css({'display':'none'});
                            $('.aviso_proc_vendedor').removeAttr("style");
                        });
                    }, 5000);
                } else if(result.mensagem == 'comprador') {
                    $('.aviso_proc_vendedor').css({'display':'block'});
                    $('.aviso_proc_vendedor').html('Este CPF já está cadastrado como COMPRADOR, favor digitar outro CPF');
                    setTimeout(function() {
                        $('.aviso_proc_vendedor').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_vendedor').html('');
                            $('.aviso_proc_vendedor').css({'display':'none'});
                            $('.aviso_proc_vendedor').removeAttr("style");
                        });
                    }, 5000);
                } else if(result.mensagem == 'vendedor') {
                    $('.aviso_proc_vendedor').css({'display':'block'});
                    $('.aviso_proc_vendedor').html('Este CPF já está cadastrado como VENDEDOR, favor digitar outro CPF');
                    setTimeout(function() {
                        $('.aviso_proc_vendedor').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_vendedor').html('');
                            $('.aviso_proc_vendedor').css({'display':'none'});
                            $('.aviso_proc_vendedor').removeAttr("style");
                        });
                    }, 5000);
                } else if(result.mensagem == 'procurador comprador') {
                    $('.aviso_proc_vendedor').css({'display':'block'});
                    $('.aviso_proc_vendedor').html('Este CPF já está cadastrado como PROCURADOR DO COMPRADOR, favor digitar outro CPF');
                    setTimeout(function() {
                        $('.aviso_proc_vendedor').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_vendedor').html('');
                            $('.aviso_proc_vendedor').css({'display':'none'});
                            $('.aviso_proc_vendedor').removeAttr("style");
                        });
                    }, 5000);
                } else if(result.mensagem == 'procurador vendedor') {
                    $('.aviso_proc_vendedor').css({'display':'block'});
                    $('.aviso_proc_vendedor').html('Este CPF já está cadastrado como PROCURADOR DO VENDEDOR, favor digitar outro CPF');
                    setTimeout(function() {
                        $('.aviso_proc_vendedor').animate({
                            'opacity':'0',
                        }, 200, function() {
                            $('.aviso_proc_vendedor').html('');
                            $('.aviso_proc_vendedor').css({'display':'none'});
                            $('.aviso_proc_vendedor').removeAttr("style");
                        });
                    }, 5000);
                }
            }
        });
    });

    /* $(document).on('click', '.btn_editar', function() {
        let numero_processo = $('.numero_processo').val();
        let honorarios = $('.honorarios').val();
        let certidoes = $('.certidoes').val();
        let outros = $('.outros').val();
        let observa = $('.observa').val();
        $.ajax({
            url: 'http://despachaimob.com/editaprocessoajax',
            crossDomain: true,
            method: 'POST',
            data: {
                numero_processo: numero_processo,
                honorarios: honorarios,
                certidoes: certidoes,
                outros: outros,
                observa: observa
            }
            
        });
    }); */
});