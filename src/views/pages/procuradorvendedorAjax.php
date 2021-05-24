<?php
    if($pessoa === 'fisica') {
        echo json_encode(array(
            'proc_vendedor' => $proc_vendedor,
            'num_processo_proc_vendedor' => $num_processo_proc_vendedor,
            'pessoa' => $pessoa,
        ));
    } else if($pessoa === 'nenhuma') {
        echo json_encode(array(
            'mensagem' => $mensagem,
            'pessoa' => $pessoa, 
        ));
    }