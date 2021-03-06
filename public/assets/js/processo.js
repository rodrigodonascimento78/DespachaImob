$(() => {
    /* PROCESSOS - MANIPULAÇÃO COM AJAX */

    /* ===================== COMPRADOR ======================= */
    $(document).on('click', '.btn_cpf_comprador', () => {
        let cpf_comprador = $('#cpf_comprador').val();
        let numero_processo = $('.num_processo').text();
        
        $.ajax({
            url: 'http://despachaimob.com/compradorAjax', // Enviado para CompradorAjaxController
            crossDomain: true,
            method: 'POST',
            dataType: 'json',
            data: {
                cpf_comprador: cpf_comprador,
                numero_processo: numero_processo
            },
            
        }).done((result) => {
            if(result.pessoa == 'fisica') {
                $(`<tr class="lista comprador">
                    <td hidden>
                        <input type="number" class="num_processo_comprador apaga_n_processo" value="`+ result.num_processo_comprador +`">
                    </td>
                    <td hidden>
                        <input type="number" class="comprador_id" value="`+ result.comprador[0].id_cliente +`">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center comprador_nome" value="`+ result.comprador[0].nome +`" readonly>
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center comprador_cpf apaga_cpf" value="`+ result.comprador[0].cpf +`" readonly>
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira mt-2 btn_apagar" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.comprador_result');

                $('#cpf_comprador').val('');
    
            } else if(result.pessoa == 'juridica') {
                $(`<tr class="lista comprador">
                    <td hidden>
                        <input type="number" class="num_processo_comprador apaga_n_processo" value="`+ result.num_processo_comprador +`">
                    </td>
                    <td hidden>
                        <input type="number" class="comprador_id" value="`+ result.comprador[0].id_cliente_pj +`">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center comprador_nome" value="`+ result.comprador[0].razao_social +`" readonly>
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center comprador_cpf apaga_cpf" value="`+ result.comprador[0].cnpj +`" readonly>
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira mt-2 btn_apagar" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.comprador_result');

                $('#cpf_comprador').val('');
    
            } else {
                $(`<tr>
                    <td colspan="2">
                        ` + result.mensagem + `
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira btn_apagar" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.comprador_result').css('color', 'red');

                $('#cpf_comprador').val('');
    
            }
        })
        .fail((jqXHR, textStatus) => {
            console.log(jqXHR);
        });
    });
    /* ========================================================= */

    /* ===================== PROCURADOR COMPRADOR ======================= */
    $(document).on('click', '.btn_cpf_procurador_comprador', () => {
        let cpf_procurador_comprador = $('#cpf_procurador_comprador').val();
        let numero_processo = $('.num_processo').text();

        $.ajax({
            url: 'http://despachaimob.com/procuradorcompradorAjax', // Enviado para ProcuradorCompradorAjaxController
            crossDomain: true,
            method: 'POST',
            dataType: 'json',
            data: {
                cpf_procurador_comprador: cpf_procurador_comprador,
                numero_processo: numero_processo,
            },
            
        }).done((result) => {
            if(result.pessoa == 'fisica') {
                $(`<tr class="lista procurador_comprador">
                    <td hidden>
                        <input type="number" class="num_processo_proc_comprador apaga_n_processo" value="`+ result.num_processo_proc_comprador +`">
                    </td>
                    <td hidden>
                        <input type="number" class="comprador_procurador_id" value="` + result.proc_comprador[0].id_cliente + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center comprador_procurador_nome" readonly value="` + result.proc_comprador[0].nome + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center comprador_procurador_cpf apaga_cpf" readonly value="` + result.proc_comprador[0].cpf + `">
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira btn_apagar mt-2" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.procurador_comprador_result');

                $('#cpf_procurador_comprador').val('');
    
            } else {
                $(`<tr>
                    <td colspan="2">
                        ` + result.mensagem + `
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira btn_apagar" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.procurador_comprador_result').css('color', 'red');

                $('#cpf_procurador_comprador').val('');
    
            }
        })
        .fail((jqXHR, textStatus) => {
            console.log("Request failed: " + textStatus);
        });
    });
    /* ========================================================= */

    /* ====================== VENDEDOR ========================= */
    $(document).on('click', '.btn_cpf_vendedor', () => {
        let cpf_vendedor = $('#cpf_vendedor').val();
        let numero_processo = $('.num_processo').text();

        $.ajax({
            url: 'http://despachaimob.com/vendedorAjax',
            crossDomain: true,
            method: 'POST',
            dataType: 'json',
            data: {
                cpf_vendedor: cpf_vendedor,
                numero_processo: numero_processo
            },
            
        }).done((result) => {
            if((result.pessoa === 'fisica')) {
                $(`<tr class="lista vendedor">
                    <td hidden>
                        <input type="number" class="num_processo_vendedor apaga_n_processo" value="`+ result.num_processo_vendedor +`">
                    </td>
                    <td hidden>
                        <input type="number" class="vendedor_id" value="` + result.vendedor[0].id_cliente + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center vendedor_nome" readonly value="` + result.vendedor[0].nome + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center vendedor_cpf apaga_cpf" readonly value="` + result.vendedor[0].cpf + `">
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira btn_apagar mt-2" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.vendedor_result');

                $('#cpf_vendedor').val('');
    
            } else if(result.pessoa === 'juridica') {
                $(`<tr class="lista vendedor">
                    <td hidden>
                        <input type="number" class="num_processo_vendedor apaga_n_processo" value="`+ result.num_processo_vendedor +`">
                    </td>
                    <td hidden>
                        <input type="number" class="vendedor_id" value="` + result.vendedor[0].id_cliente_pj + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center vendedor_nome" readonly value="` + result.vendedor[0].razao_social + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center vendedor_cpf apaga_cpf" readonly value="` + result.vendedor[0].cnpj + `">
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira btn_apagar mt-2" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.vendedor_result');

                $('#cpf_vendedor').val('');
    
            } else {
                $(`<tr>
                    <td colspan="2">
                        ` + result.mensagem + `
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira btn_apagar" type="button" id="btn_apagar">
                    </i></td>
                </tr>`).appendTo('.vendedor_result').css('color', 'red');

                $('#cpf_vendedor').val('');
    
            }
        })
        .fail((jqXHR, textStatus) => {
            console.log("Request failed: " + textStatus);
        });
    });
    /* ========================================================= */

    /* ===================== PROCURADOR VENDEDOR ======================= */
    $(document).on('click', '.btn_cpf_procurador_vendedor', () => {
        let cpf_procurador_vendedor = $('#cpf_procurador_vendedor').val();
        let numero_processo = $('.num_processo').text();
        
        $.ajax({
            url: 'http://despachaimob.com/procuradorvendedorAjax', // Enviado para ProcuradorVendedorAjaxController
            crossDomain: true,
            method: 'POST',
            dataType: 'json',
            data: {
                cpf_procurador_vendedor: cpf_procurador_vendedor,
                numero_processo: numero_processo
            },
            
        }).done((result) => {
            if(result.pessoa === 'fisica') {
                $(`<tr class="lista procurador_vendedor">
                    <td hidden>
                        <input type="number" class="num_processo_proc_vendedor apaga_n_processo" value="`+ result.num_processo_proc_vendedor +`">
                    </td>
                    <td hidden>
                        <input type="number" class="procurador_vendedor_id" value="` + result.proc_vendedor[0].id_cliente + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center procurador_vendedor_nome" readonly value="` + result.proc_vendedor[0].nome + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center procurador_vendedor_cpf apaga_cpf" readonly value="` + result.proc_vendedor[0].cpf + `">
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira btn_apagar mt-2" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.procurador_vendedor_result');

                $('#cpf_procurador_vendedor').val('');
    
            } else {
                $(`<tr>
                    <td colspan="2">
                        ` + result.mensagem + `
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira btn_apagar" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.procurador_vendedor_result').css('color', 'red');

                $('#cpf_procurador_vendedor').val('');
    
            }
        })
        .fail((jqXHR, textStatus) => {
            console.log("Request failed: " + textStatus);
        });
    });
    /* ========================================================= */

    /* ===================== IMÓVEL =========================== */
    $(document).on('click', '.btn_matricula_imovel', () => {
        let matricula_imovel = $('#matricula_imovel').val();
        
        $.ajax({
            url: 'http://despachaimob.com/imovelAjax',
            crossDomain: true,
            method: 'POST',
            dataType: 'json',
            data: {
                matricula_imovel: matricula_imovel,
            },
            
        }).done((result) => {
            
            if(result.imovel) { 
                $(`<tr class="lista imovel">
                    <td hidden>
                        <input type="number" class="imovel_id" value="` + result.imovel[0].id_imovel + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center imovel_matricula" readonly value="` + result.imovel[0].matricula + `">
                    </td>
                    <td class="td_endereco">
                        <input type="text" class="form-control-sm form-control-plaintext text-center imovel_endereco" readonly value="` + result.imovel[0].logradouro + ' - ' + result.imovel[0].numero + ' ' + result.imovel[0].complemento + `">
                    </td>
                    <td>
                        <input type="text" class="form-control-sm form-control-plaintext text-center imovel_cartorio" readonly value="` + result.imovel[0].cartorio + `">
                    </td>
                    <td>
                        <i class="far fa-trash-alt mt-2 lixeira btn_apagar" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.imovel_result');
                
                $('#matricula_imovel').val('');
    
            } else {
                $(`<tr>
                    <td colspan="3">
                        ` + result.mensagem + `
                    </td>
                    <td>
                        <i class="far fa-trash-alt lixeira btn_apagar btn_apagar" type="button" id="btn_apagar"></i>
                    </td>
                </tr>`).appendTo('.imovel_result').css('color', 'red');

                $('#matricula_imovel').val('');
    
            }
        })
        .fail((jqXHR, textStatus) => {
            console.log("Request failed: " + textStatus);
        });
    });
    /* -------------------------------------------------------- */

    /* CONTROLA O BOTÃO DE APAGAR LINHA DA PÁGINA DE PROCESSO */

    $(document).on('click', '.btn_apagar', function() {
        let delete_item = $(this).parents('tr').find('.apaga_cpf').val();
        let delete_n_processo = $(this).parents('tr').find('.apaga_n_processo').val();
        if($(this).parents('tr').is('.comprador')) {
            $.ajax({
                url: 'http://despachaimob.com/compradorAjax',
                crossDomain: true,
                method: 'POST',
                data: {
                    comprador_delete: delete_item,
                    processo_delete: delete_n_processo,
                },
            });
        }
        if($(this).parents('tr').is('.procurador_comprador')) {
            $.ajax({
                url: 'http://despachaimob.com/procuradorcompradorAjax',
                crossDomain: true,
                method: 'POST',
                data: {
                    proc_comprador_delete: delete_item,
                    processo_delete: delete_n_processo,
                },
            });
        }
        if($(this).parents('tr').is('.vendedor')) {
            $.ajax({
                url: 'http://despachaimob.com/vendedorAjax',
                crossDomain: true,
                method: 'POST',
                data: {
                    vendedor_delete: delete_item,
                    processo_delete: delete_n_processo,
                },
            });
        }
        if($(this).parents('tr').is('.procurador_vendedor')) {
            $.ajax({
                url: 'http://despachaimob.com/procuradorvendedorAjax',
                crossDomain: true,
                method: 'POST',
                data: {
                    proc_vendedor_delete: delete_item,
                    processo_delete: delete_n_processo,
                },
            });
        }
        
        $(this).parents('tr').remove();
    });

    /* -------------------------------------------------------- */

    /* CONTROLA O BOTÃO DE CRIAR O PROCESSO */

    $(document).on('click', '#btn_cria_processo', function(e) {
        e.preventDefault();
        if(($('.comprador').length > 0) && ($('.vendedor').length > 0) && ($('.imovel').length > 1)) {
            let num_processo = $('.num_processo').html();
            let lista = $('.lista > td > input');
            let comprador_id = $('.comprador_id');
            let comprador_nome = $('.comprador_nome');
            let comprador_cpf = $('.comprador_cpf');
            let comprador_procurador_id = $('.comprador_procurador_id');
            let comprador_procurador_nome = $('.comprador_procurador_nome');
            let comprador_procurador_cpf = $('.comprador_procurador_cpf');
            let vendedor_id = $('.vendedor_id');
            let vendedor_nome = $('.vendedor_nome');
            let vendedor_cpf = $('.vendedor_cpf');
            let vendedor_procurador_id = $('.vendedor_procurador_id');
            let procurador_vendedor_nome = $('.procurador_vendedor_nome');
            let procurador_vendedor_cpf = $('.procurador_vendedor_cpf');
            let imovel_id = $('.imovel_id');
            let imovel_matricula = $('.imovel_matricula');
            let imovel_endereco = $('.imovel_endereco');
            let imovel_cartorio = $('.imovel_cartorio');
            let d = new Date();
            let month = d.getMonth()+1;
            let day = d.getDate();
            let year = d.getFullYear();
            let data_atual = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;

            $(`<div class="formulario_processo"></div>`).appendTo('.form_processo');

            $(`<input type="number" hidden name="processo_numero" class="processo_numero" value="` + num_processo + `">`).appendTo('.formulario_processo');
            $(`<input type="date" hidden name="data_cadastro_processo" value="` + data_atual + `">`).appendTo('.formulario_processo');
            $(`<span id="center_num_processo">Processo número `+ num_processo +`</span>`).appendTo('.formulario_processo');
            
            // COMPRADOR
            $(lista).each((index) => {
                if($(comprador_nome).eq(index).val() !== undefined) {
                    $(`<div class="row">
                        <input type="number" hidden name="i_comprador[]" value="` + $(comprador_id).eq(index).val() + `">
                        <div class="form-group col-md-6">
                            <label class="mb-0 col-form-label-sm">Comprador</label>
                            <input type="text" name="n_comprador[]" class="form-control form-control-sm" readonly value="` + $(comprador_nome).eq(index).val() + `">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="mb-0 col-form-label-sm">CPF Comprador</label>
                            <input type="text" name="c_comprador[]" class="form-control form-control-sm c_comprador" readonly value="` + $(comprador_cpf).eq(index).val() + `">
                        </div>
                    </div>`).appendTo('.formulario_processo');
                }
            });

            // PROCURADOR DO COMPRADOR
            $(lista).each((index) => {
                if($(comprador_procurador_nome).eq(index).val() !== undefined) {
                    $(`<div class="row">
                        <input type="number" hidden name="procurador_i_comprador[]" value="` + $(comprador_procurador_id).eq(index).val() + `">
                        <div class="form-group col-md-6">
                            <label class="mb-0 col-form-label-sm">Procurador Comprador</label>
                            <input type="text" name="procurador_n_comprador[]" class="form-control form-control-sm" readonly value="` + $(comprador_procurador_nome).eq(index).val() + `">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="mb-0 col-form-label-sm">CPF Procurador Comprador</label>
                            <input type="text" name="procurador_c_comprador[]" class="form-control form-control-sm" readonly value="`+ $(comprador_procurador_cpf).eq(index).val() +`">
                        </div>
                    </div>`).appendTo('.formulario_processo');
                }
            });

            // VENDEDOR
            $(lista).each((index) => {
                if($(vendedor_nome).eq(index).val() !== undefined) {
                    $(`<div class="row">
                        <input type="number" hidden name="i_vendedor[]" value="` + $(vendedor_id).eq(index).val() + `">
                        <div class="form-group col-md-6">
                            <label class="mb-0 col-form-label-sm">Vendedor</label>
                            <input type="text" name="n_vendedor[]" class="form-control form-control-sm" readonly value="` + $(vendedor_nome).eq(index).val() + `">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="mb-0 col-form-label-sm">CPF Vendedor</label>
                            <input type="text" name="c_vendedor[]" class="form-control form-control-sm" readonly value="`+ $(vendedor_cpf).eq(index).val() +`">
                        </div>
                    </div>`).appendTo('.formulario_processo');
                }
            });

            // PROCURADOR DO VENDEDOR
            $(lista).each((index) => {
                if($(procurador_vendedor_nome).eq(index).val() !== undefined) {
                    $(`<div class="row">
                        <input type="number" hidden name="procurador_i_vendedor[]" value="` + $(vendedor_procurador_id).eq(index).val() + `">
                        <div class="form-group col-md-6">
                            <label class="mb-0 col-form-label-sm">Procurador Vendedor</label>
                            <input type="text" name="procurador_n_vendedor[]" class="form-control form-control-sm" readonly value="` + $(procurador_vendedor_nome).eq(index).val() + `">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="mb-0 col-form-label-sm">CPF Procurador Vendedor</label>
                            <input type="text" name="procurador_c_vendedor[]" class="form-control form-control-sm" readonly value="`+ $(procurador_vendedor_cpf).eq(index).val() +`">
                        </div>
                    </div>`).appendTo('.formulario_processo');
                }
            });

            // IMÓVEL
            if($(imovel_matricula) !== undefined) {
                $(`<div class="row">
                    <input type="number" hidden name="i_imovel" value="` + $(imovel_id).val() + `">
                    <div class="form-group col-md-2">
                        <label class="mb-0 col-form-label-sm">Matrícula Imóvel</label>
                        <input type="text" name="m_imovel" class="form-control" readonly value="` + $(imovel_matricula).val() + `">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="mb-0 col-form-label-sm">Endereço Imóvel</label>
                        <input type="text" name="e_imovel" class="form-control" readonly value="` + $(imovel_endereco).val() + `">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="mb-0 col-form-label-sm">Cartório Imóvel</label>
                        <input type="text" name="cart_imovel" class="form-control" id="cartorio" readonly>
                    </div>
                </div>`).appendTo('.formulario_processo');

                switch ($(imovel_cartorio).val()) {
                    case '1':
                        $('#cartorio').val('Toscano');
                        break;
                    case '2':
                        $('#cartorio').val('Massote');
                        break;
                    case '3':
                        $('#cartorio').val('Olavo Costa');
                        break;
                }
            }

            $(`<div class="row">
                <div class="form-group col-md-4">
                    <label for="indicacao" class="mb-0 col-form-label-sm">Alguém indicou este processo?</label>
                    <input type="text" name="indicacao" id="indicacao" class="form-control pula">
                </div>
                <div class="form-group col-md-2">
                    <label for="honorarios" class="mb-0 col-form-label-sm">Honorários</label>
                    <input type="text" name="honorarios" id="honorarios" class="form-control money pula">
                </div>
                <div class="form-group col-md-2">
                    <label for="certidoes" class="mb-0 col-form-label-sm">Certidões</label>
                    <input type="text" name="certidoes" id="certidoes" class="form-control money pula">
                </div>
                <div class="form-group col-md-2">
                    <label for="outros" class="mb-0 col-form-label-sm">Outros</label>
                    <input type="text" name="outros" id="outros" class="form-control money pula">
                </div>
            </div>`).appendTo('.formulario_processo');

            $(`<div class="row">
                <div class="form-group col-md-10">
                    <label for="obs" class="mb-0 col-form-label-sm">Observações</lable>
                    <textarea class="form-control pula" name="obs" id="obs"></textarea>
                </div>
            </div>`).appendTo('.formulario_processo');

            $('.lista > td').remove();
            $('.lixeira').remove();

            $(`<div class="row">
                <div class="form-group">
                    <button type="submit" id="btn_salvar_processo" name="btn_salvar_processo" class="btn btn-success btn-lg mt-4 ml-3 mr-5">Salvar</button>
                </div>
                <div class="form-group">
                    <button  type="button" id="btn_deletar_processo" name="btn_deletar_processo" class="btn btn_deletar btn-lg mt-4">Excluir</button>
                </div>
            </div>`).appendTo('.formulario_processo');

            $('.btn_cpf_comprador').attr('disabled', true);
            $('.btn_cpf_procurador_comprador').attr('disabled', true);
            $('.btn_cpf_vendedor').attr('disabled', true);
            $('.btn_cpf_procurador_vendedor').attr('disabled', true);
            $('.btn_matricula_imovel').attr('disabled', true);
        }
    });
    /* -------------------------------------------------------- */

    /* CONTROLA O BOTÃO EXCLUIR O PROCESSO */

    $(document).on('click', '#btn_deletar_processo', function() {
        let processo_numero = $('.processo_numero').val();
        $.ajax({
            url: 'http://despachaimob.com/deletaprocessoajax',
            crossDomain: true,
            method: 'POST',
            data: {
                processo_numero: processo_numero,
            },
        });

        $('.formulario_processo').remove();
        $('.btn_cpf_comprador').removeAttr('disabled');
        $('.btn_cpf_procurador_comprador').removeAttr('disabled');
        $('.btn_cpf_vendedor').removeAttr('disabled');
        $('.btn_cpf_procurador_vendedor').removeAttr('disabled');
        $('.btn_matricula_imovel').removeAttr('disabled');
        $('#cpf_comprador').focus();
    });

    /* -------------------------------------------------------- */
});