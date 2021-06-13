/*------------------- CONTROLA A PÁGINA HOME ------------------- */

$(() => {
    /* MENSAGENS DE ALERTA DE FORMULÁRIOS */

    $(document).ready(function() {
        if ($(".conteudo_mensagem").length){ 
            setTimeout(function() {
                $(".conteudo_mensagem").animate({
                    "opacity": "0",
                }, 2000, function() {
                    $(".conteudo_mensagem").hide();
                    window.location.href = 'http://despachaimob.com/novocliente';
                });
            }, 6000);
        }
    });

    /* ------------------------------------------------------ */

    /* CONTROLA PREENCHIMENTO DE CEP DE TODOS OS FORMULÁRIOS */

    $(document).on('focusout', '.viacep-cep', function() {
        $.ajax({
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            dataType: 'json',
            success: function(resp) {
                $('.viacep-logradouro').val(resp.logradouro),
                $('.viacep-bairro').val(resp.bairro),
                $('.viacep-cidade').val(resp.localidade),
                $('.viacep-uf').val(resp.uf),

                $('.viacep-numero').focus()
            }
        });
    });

    /* ------------------------------------------------------ */

    /* CONTROLA A TECLA ENTER PULA CAMPOS DE TODOS OS FORMULÁRIOS */

    $(document).on('keypress', '.pula', function(e){
        var tecla = (e.keyCode?e.keyCode:e.which);

        if(tecla == 13){
            campo = $('.pula');
            indice = campo.index(this);

            if(campo[indice+1] != null){
                proximo = campo[indice + 1];
                proximo.focus();
                e.preventDefault(e);
            }
        }
    });

    /* ------------------------------------------------------- */

    /* ----------- MASCARAS DE CAMPOS DO PROJETO ------------- */
    
    $('.celular').mask('(00) 9 9999-9999');
    $('.telefone').mask('(00) 0000-0000');
    $('.cpf').mask('000.000.000-00');
    $('.cnpj').mask('00.000.000/0000-00');
    $('.i_estadual').mask('00.000000-0');

    $(document).on('keypress', '.money', function() {
        $('.money').maskMoney({thousands:'.',decimal:',',precision:2});
    });

    /* ------------------------------------------------------- */

    /* CONTROLA REPRESENTANTE LEGAL DA PÁGINA PESSOA JURÍDICA */

    $(() => {
        $(document).on('click', '.nao_add', () => {
            $('#btn_enviar_form_pj').removeAttr('hidden');
        });

        $(document).on('click', '#sim_add_1', () => {
            $('#mostra_socio_2').removeAttr('hidden', false);
            $('#btns_controle_socio_1').attr('hidden', true);
            if(!$('#btn_enviar_form-pj').attr('hidden')) {
                $('#btn_enviar_form_pj').attr('hidden', true);
            }
        });

        $(document).on('click', '#close_socio_2', () => {
            $('#mostra_socio_2').attr('hidden', true);
            $('#estado_civil_2').val('');
            $('#nome_socio_2').val('');
            $('#cpf_socio_2').val('');
            $('#nacionalidade_socio_2').val('');
            $('#profissao_socio_2').val('');
            $('#celular_socio_2').val('');
            $('#email_socio_2').val('');
            $('#btns_controle_socio_1').removeAttr('hidden', true);
            if(!$('#btn_enviar_form-pj').attr('hidden')) {
                $('#btn_enviar_form_pj').attr('hidden', true);
            }
        });

        $(document).on('click', '#sim_add_2', () => {
            $('#mostra_socio_3').removeAttr('hidden', false);
            $('#btns_controle_socio_2').attr('hidden', true);
            if(!$('#btn_enviar_form-pj').attr('hidden')) {
                $('#btn_enviar_form_pj').attr('hidden', true);
            }
        });

        $(document).on('click', '#close_socio_3', () => {
            $('#mostra_socio_3').attr('hidden', true);
            $('#estado_civil_3').val('');
            $('#nome_socio_3').val('');
            $('#cpf_socio_3').val('');
            $('#nacionalidade_socio_3').val('');
            $('#profissao_socio_3').val('');
            $('#celular_socio_3').val('');
            $('#email_socio_3').val('');
            $('#btns_controle_socio_2').removeAttr('hidden', true);
            if(!$('#btn_enviar_form-pj').attr('hidden')) {
                $('#btn_enviar_form_pj').attr('hidden', true);
            }
        });

        $(document).on('click', '#sim_add_3', () => {
            $('#mostra_socio_4').removeAttr('hidden', false);
            $('#btns_controle_socio_3').attr('hidden', true);
            $('#btn_enviar_form_pj').removeAttr('hidden', true);
        });

        $(document).on('click', '#close_socio_4', () => {
            $('#mostra_socio_4').attr('hidden', true);
            $('#estado_civil_4').val('');
            $('#nome_socio_4').val('');
            $('#cpf_socio_4').val('');
            $('#nacionalidade_socio_4').val('');
            $('#profissao_socio_4').val('');
            $('#celular_socio_4').val('');
            $('#email_socio_4').val('');
            $('#btns_controle_socio_3').removeAttr('hidden', true);
            if(!$('#btn_enviar_form-pj').attr('hidden')) {
                $('#btn_enviar_form_pj').attr('hidden', true);
            }
        });
    });

    /* ------------------------------------------------------- */

    /* --------------- CONTROLA FORMULÁRIO ITBI --------------- */
    $(document).on('change', '.natureza', function() {
        if($('.natureza').val() === 'outra') {
            if($('.natureza_especificar').attr('disabled')) {
                $('.natureza_especificar').removeAttr('disabled');
            }
        } else {
            $('.natureza_especificar').attr('disabled', true);
        }
    });

    $(document).on('change', '.tipo_contrato', function() {
        if($('.tipo_contrato').val() === 'outro') {
            if($('.outro_especificar').attr('disabled')) {
                $('.outro_especificar').removeAttr('disabled');
            }
        } else {
            $('.outro_especificar').attr('disabled', true);
        }
    });

    $(document).on('change', '.f_pagamento', function() {
        if($('.f_pagamento').val() === 'parcelado') {
            if($('.parcelas').attr('disabled')) {
                $('.parcelas').removeAttr('disabled');
            }
        } else {
            $('.parcelas').attr('disabled', true);
        }
    });

    $(document).on('click', '.preenche_dt_transacao', function() {
        if($(this).prop('checked') === true) {
            $('#gera_itbi').removeAttr('disabled');
        } else {
            $('#gera_itbi').attr('disabled', true);
        }
    });

    /* -------------------------------------------------------- */
});