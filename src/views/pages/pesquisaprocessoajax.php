<?php
    if(($tem_processo === 'sim')) {
        echo json_encode($processo = [
            'processo' => $processo,
            'compradores_pf' => $compradores_pf,
            'compradores_pj' => $compradores_pj,
            'procuradores_compradores' => $procuradores_compradores,
            'vendedores_pf' => $vendedores_pf,
            'vendedores_pj' => $vendedores_pj,
            'procuradores_vendedores' => $procuradores_vendedores,
            'imovel' => $imovel,
            'arquivos' => $arquivos,
            'tem_processo' => 'sim',
        ]);
    } else if($tem_processo === 'nao') {
        echo json_encode(array(
            'mensagem' => $mensagem,
            'tem_processo' => $tem_processo
        ));
    }
?>