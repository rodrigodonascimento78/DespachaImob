$(() => {
    $('#dropdown-cadastro').on('click', () => {
        if($('#menu-cadastro').attr('hidden')) {
            $('#menu-cadastro').removeAttr('hidden');
            $('#menu-formularios').attr('hidden', true);
        } else {
            $('#menu-cadastro').attr('hidden', true);
        }
    });

    $('#dropdown-formularios').on('click', () => {
        if($('#menu-formularios').attr('hidden')) {
            $('#menu-formularios').removeAttr('hidden');
            $('#menu-cadastro').attr('hidden', true);
        } else {
            $('#menu-formularios').attr('hidden', true);
        }
    });

    $('#vazio').on('change', () => {
       let vazio_opcao = $('#vazio').val();
       let inquilino = $('#inquilino');
       let proprietario = $('#proprietario');
       if(vazio_opcao === "Não") {
           inquilino.removeAttr('disabled');
           proprietario.removeAttr('disabled');
       } else {
        inquilino.attr('disabled', true);
        proprietario.attr('disabled', true);
       }
    });
});