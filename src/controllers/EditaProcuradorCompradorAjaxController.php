<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;
    use \src\models\Cliente;

    class EditaProcuradorCompradorAjaxController extends Controller
    {
        public function index()
        {
            $numero_processo = filter_input(INPUT_POST, 'numero_processo');
            $id_cliente_proc_comprador = filter_input(INPUT_POST, 'id_cliente_proc_comprador');
            $id_proc_comprador = filter_input(INPUT_POST, 'id_proc_comprador');
            $cpf_proc_comprador = filter_input(INPUT_POST, 'cpf_proc_comprador');

            $comprador = Compradore::select()->where('cpf_cnpj_comprador', $cpf_proc_comprador)->where('num_processo_comprador', intval($numero_processo))->execute();
            $procurador_comprador = Compradores_Procuradore::select()->where('cpf_cnpj_proc_comprador', $cpf_proc_comprador)->where('num_processo_proc_comprador', intval($numero_processo))->execute();
            $vendedor = Vendedore::select()->where('cpf_cnpj_vendedor', $cpf_proc_comprador)->where('num_processo_vendedor', intval($numero_processo))->execute();
            $procurador_vendedor = Vendedores_Procuradore::select()->where('cpf_cnpj_proc_vendedor', $cpf_proc_comprador)->where('num_processo_proc_vendedor', intval($numero_processo))->execute();

            if(strlen($cpf_proc_comprador) === 11) {
                if(count($comprador) === 0 && count($vendedor) === 0 && count($procurador_comprador) === 0 && count($procurador_vendedor) === 0) {
                    $cliente_cadastrado = Cliente::select()->where('cpf', $cpf_proc_comprador)->execute();
                    if(count($cliente_cadastrado) !== 0) {
                        Compradores_Procuradore::update()->set([
                            'id_cliente' => intval($id_cliente_proc_comprador),
                            'cpf_cnpj_proc_comprador' => $cpf_proc_comprador,
                            'num_processo_proc_comprador' => intval($numero_processo)
                        ])->where('id_proc_comprador', intval($id_proc_comprador))->execute();

                        $this->render('editaprocuradorcompradorajax', [
                            'mensagem' => 'sim'
                        ]);
                    } else {
                        $this->redirect('novocliente');
                    }
                } else if(count($comprador) > 0 && count($vendedor) === 0 && count($procurador_comprador) === 0 && count($procurador_vendedor) === 0) {
                    $this->render('editaprocuradorcompradorajax', [
                        'mensagem' => 'comprador'
                    ]);
                } else if(count($comprador) === 0 && count($vendedor) > 0 && count($procurador_comprador) === 0 && count($procurador_vendedor) === 0) {
                    $this->render('editaprocuradorcompradorajax', [
                        'mensagem' => 'vendedor'
                    ]);
                } else if(count($comprador) === 0 && count($vendedor) === 0 && count($procurador_comprador) > 0 && count($procurador_vendedor) === 0) {
                    $this->render('editaprocuradorcompradorajax', [
                        'mensagem' => 'procurador comprador'
                    ]);
                } else if(count($comprador) === 0 && count($vendedor) === 0 && count($procurador_comprador) === 0 && count($procurador_vendedor) > 0) {
                    $this->render('editaprocuradorcompradorajax', [
                        'mensagem' => 'procurador vendedor'
                    ]);
                }
            } else {
                $this->render('editaprocuradorcompradorajax', [
                    'mensagem' => 'nao'
                ]);
            }
            
        }
    }
?>