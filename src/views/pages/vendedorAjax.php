<?php
    if($pessoa === 'fisica') {
        echo json_encode(array(
            'vendedor' => $vendedor,
            'num_processo_vendedor' => $num_processo_vendedor,
            'pessoa' => $pessoa,
        ));
    } else if($pessoa === 'juridica') {
        echo json_encode(array(
            'vendedor' => $vendedor,
            'pessoa' => $pessoa,
        ));
    } else {
        echo json_encode(array(
            'mensagem' => $mensagem,
            'pessoa' => $pessoa,
        ));
    }
?>