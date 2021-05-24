<?php
    if($existe_imovel === 'sim') {
        echo json_encode(array(
            $imovel,
            $processo,
            $arquivos,
            'existe_imovel' => $existe_imovel,
        ));
    } else if($existe_imovel === 'nao') {
        echo json_encode(array(
            'mensagem' => $mensagem,
            'existe_imovel' => $existe_imovel,
        ));
    }
?>