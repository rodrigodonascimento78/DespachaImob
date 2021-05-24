<?php
    if($pessoa === 'fisica') {
        echo json_encode(array(
            $cliente,
            $comprador,
            $procurador_comprador,
            $vendedor,
            $procurador_vendedor,
            $arquivos,
            'pessoa' => $pessoa,
        ));
    } else if($pessoa === 'juridica') {
        echo json_encode(array(
            $cliente,
            $comprador,
            $procurador_comprador,
            $vendedor,
            $procurador_vendedor,
            $arquivos,
            'pessoa' => $pessoa,
        ));
    } else if($pessoa === 'desconhecida') {
        echo json_encode(array(
            'mensagem' => $mensagem,
            'pessoa' => $pessoa,
        ));
    }
?>