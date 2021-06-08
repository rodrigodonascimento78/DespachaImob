$(() => {
    $(document).on('change', '#tipo_regime', () => {
        let tipo_regime = $('#tipo_regime').val();
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

        switch (tipo_regime) {
            case '':
                u_estavel.attr('disabled', true);
                aquestos.attr('disabled', true);
                obrigatoria.attr('disabled', true);
                total.attr('disabled', true);
                universal.attr('disabled', true);
                parcial.attr('disabled', true);
                regime.val('');
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
                regime.removeAttr('required', 'required');
                break;
            case 'solteiro':
                u_estavel.attr('disabled', false);
                aquestos.attr('disabled', true);
                obrigatoria.attr('disabled', true);
                total.attr('disabled', true);
                universal.attr('disabled', true);
                parcial.attr('disabled', true);
                break;
            default:
                u_estavel.attr('disabled', false);
                aquestos.attr('disabled', false);
                obrigatoria.attr('disabled', false);
                total.attr('disabled', false);
                universal.attr('disabled', false);
                parcial.attr('disabled', false);
                regime.attr('required', 'required');
                break;
        }
    });

    $(document).on('change', '#regime', () => {
        let tipo_regime = $('#tipo_regime');
        let regime = $('#regime').val();
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

        switch(regime) {
            case '':
                u_estavel.attr('disabled', true);
                aquestos.attr('disabled', true);
                obrigatoria.attr('disabled', true);
                total.attr('disabled', true);
                universal.attr('disabled', true);
                parcial.attr('disabled', true);
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
                tipo_regime.val('');
                break;
            default:
                data_casamento.attr('disabled', false);
                nome_conjuge.attr('disabled', false);
                cpf_conjuge.attr('disabled', false);
                nacionalidade_conjuge.attr('disabled', false);
                nascimento_conjuge.attr('disabled', false);
                rg_conjuge.attr('disabled', false);
                d_expedicao_conjuge.attr('disabled', false);
                o_expedidor_conjuge.attr('disabled', false);
                profissao_conjuge.attr('disabled', false);
                ass_cartorio_conjuge.attr('disabled', false);
                telefone_conjuge.attr('disabled', false);
                email_conjuge.attr('disabled', false);
                break;
        }
    });
});