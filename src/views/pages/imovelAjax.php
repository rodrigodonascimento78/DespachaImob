<?php
    if($tem = 's') {
        echo json_encode(array(
            'imovel' => $imovel,
            'tem' => $tem,
        ));
    } else if($tem = 'n') {
        echo json_encode(array(
            'mensagem' => $mensagem,
            'tem' => $tem,
        ));
    }
?>