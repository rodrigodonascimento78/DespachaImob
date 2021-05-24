<?php
    if($pessoa === 'fisica') {
        echo json_encode(array(
            'comprador' => $comprador,
            'num_processo_comprador' => $num_processo_comprador,
            'pessoa' => $pessoa,
            
        ));
    } else if($pessoa === 'juridica') {
        echo json_encode(array(
            'comprador' => $comprador,
            'num_processo_comprador' => $num_processo_comprador,
            'pessoa' => $pessoa,

        ));
    } else if($pessoa === 'nenhuma') {
        echo json_encode(array(
            'mensagem' => $mensagem,
            'pessoa' => $pessoa,
        ));
    }
?>