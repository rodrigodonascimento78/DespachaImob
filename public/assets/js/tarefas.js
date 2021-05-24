function editar(id, txt_tarefa, venc_tarefa) {
    let form = $(`<form action="http://despachaimob.com/edita_tarefa" method="POST">
                    <div class="row col-sm-12">
                        <input type="text" hidden name="id" value="`+ id +`">
                        <input type="date" name="venc_tarefa" class="form-control col-sm-3" value="`+ venc_tarefa +`">
                        <input type="text" name="desc_tarefa" class="form-control col-sm-8 ml-4" value="`+ txt_tarefa +`">
                        <button type="submit" class="btn btn_submit mt-2">Atualizar</button>
                    </div>
                </form>`);
    $('.tarefa_'+id).html('');
    $('.tarefa_icones_'+id).html('');
    $(form[0]).appendTo('#tarefa_'+id);
};

$(() => {
    // CONTROLA A AÇÃO DO BOTÃO DELETAR TAREFA
    $(document).on('click', '.del_tarefa', function () {
        let id = $(this).data('deletar');
        $.ajax({
            url: "http://despachaimob.com/deletatarefaajax",
            crossDomain: true,
            method: 'POST',
            dataType: 'json',
            data: {id: id},
        });
        location.href = "http://despachaimob.com/todas_tarefas";
    });

    //CONTROLA A AÇÃO DO BOTÃO DE MARCAR TAREFA COMO REALIZADA
    $(document).on('click', '.marca_realizada', function() {
        let id = $(this).data('realizado');
        
        $.ajax({
            url: "http://despachaimob.com/realizadaajax",
            crossDomain: true,
            method: "POST",
            dataType: 'json',
            data: {id: id},
        });
        
        location.href = "http://despachaimob.com/todas_tarefas";
    });

    $(document).on('mouseover', '.data-active', function() {
        $(this).addClass('active');
    });

    $(document).on('mouseout', '.data-active', function() {
        $(this).removeClass('active');
    });
});