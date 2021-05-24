$(() => {
    $(document).on('change', '#vazio', () => {
        let vazio_opcao = $('#vazio').val();
        let inquilino = $('#inquilino');
        let proprietario = $('#proprietario');
        if(vazio_opcao === "N") {
            inquilino.removeAttr('disabled');
            proprietario.removeAttr('disabled');
        } else {
         inquilino.attr('disabled', true);
         proprietario.attr('disabled', true);
        }
     });
});