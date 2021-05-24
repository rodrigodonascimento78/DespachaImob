<?php
    if($pessoa === 'fisica') {
        echo json_encode(array(
            'proc_comprador' => $proc_comprador,
            'num_processo_proc_comprador' => $num_processo_proc_comprador,
            'pessoa' => $pessoa,
        ));
    } else if($pessoa === 'nenhuma') {
        echo json_encode(array(
            'mensagem' => $mensagem,
            'pessoa' => $pessoa
        ));
    }
?>