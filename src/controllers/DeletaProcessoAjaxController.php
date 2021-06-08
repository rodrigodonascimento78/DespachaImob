<?php

    namespace src\controllers;
    
    use \core\Controller;
    use \src\models\Processo;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;
    use \src\models\Imovei;

    class DeletaProcessoAjaxController extends Controller
    {
        public function index()
        {
            $processo_numero = filter_input(INPUT_POST, trim('processo_numero'));

            Compradore::delete()->where('num_processo_comprador', intval($processo_numero))->execute();
            Compradores_Procuradore::delete()->where('num_processo_proc_comprador', intval($processo_numero))->execute();
            Vendedore::delete()->where('num_processo_vendedor', intval($processo_numero))->execute();
            Vendedores_Procuradore::delete()->where('num_processo_proc_vendedor', intval($processo_numero))->execute();
        }
    }
?>