<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;
    use \src\models\Cliente;

    class EditaProcuradorVendedorAjaxController extends Controller
    {
        public function index()
        {
            $numero_processo = filter_input(INPUT_POST, 'numero_processo');
            $id_cliente_proc_vendedor = filter_input(INPUT_POST, 'id_cliente_proc_vendedor');
            $id_proc_vendedor = filter_input(INPUT_POST, 'id_proc_vendedor');
            $cpf_proc_vendedor = filter_input(INPUT_POST, 'cpf_proc_vendedor');

            $comprador = Compradore::select()->where('cpf_cnpj_comprador', $cpf_proc_vendedor)->where('num_processo_comprador', intval($numero_processo))->execute();
            $procurador_comprador = Compradores_Procuradore::select()->where('cpf_cnpj_proc_comprador', $cpf_proc_vendedor)->where('num_processo_proc_comprador', intval($numero_processo))->execute();
            $vendedor = Vendedore::select()->where('cpf_cnpj_vendedor', $cpf_proc_vendedor)->where('num_processo_vendedor', intval($numero_processo))->execute();
            $procurador_vendedor = Vendedores_Procuradore::select()->where('cpf_cnpj_proc_vendedor', $cpf_proc_vendedor)->where('num_processo_proc_vendedor', intval($numero_processo))->execute();

            if(strlen($cpf_proc_vendedor) === 11) {
                if(count($comprador) === 0 && count($vendedor) === 0 && count($procurador_comprador) === 0 && count($procurador_vendedor) === 0) {
                    $cliente_cadastrado = Cliente::select()->where('cpf', $cpf_proc_vendedor)->execute();
                    if(count($cliente_cadastrado) !== 0) {
                        Vendedores_Procuradore::update()->set([
                            'id_cliente' => intval($id_cliente_proc_vendedor),
                            'cpf_cnpj_proc_vendedor' => $cpf_proc_vendedor,
                            'num_processo_proc_vendedor' => intval($numero_processo)
                        ])->where('id_proc_vendedor', intval($id_proc_vendedor))->execute();

                        $this->render('editaprocuradorvendedorajax', [
                            'mensagem' => 'sim'
                        ]);
                    } else {
                        $this->redirect('novocliente');
                    }
                } else if(count($comprador) > 0 && count($vendedor) === 0 && count($procurador_comprador) === 0 && count($procurador_vendedor) === 0) {
                    $this->render('editaprocuradorvendedorajax', [
                        'mensagem' => 'comprador'
                    ]);
                } else if(count($comprador) === 0 && count($vendedor) > 0 && count($procurador_comprador) === 0 && count($procurador_vendedor) === 0) {
                    $this->render('editaprocuradorvendedorajax', [
                        'mensagem' => 'vendedor'
                    ]);
                } else if(count($comprador) === 0 && count($vendedor) === 0 && count($procurador_comprador) > 0 && count($procurador_vendedor) === 0) {
                    $this->render('editaprocuradorvendedorajax', [
                        'mensagem' => 'procurador comprador'
                    ]);
                } else if(count($comprador) === 0 && count($vendedor) === 0 && count($procurador_comprador) === 0 && count($procurador_vendedor) > 0) {
                    $this->render('editaprocuradorvendedorajax', [
                        'mensagem' => 'procurador vendedor'
                    ]);
                }
            } else {
                $this->render('editaprocuradorvendedorajax', [
                    'mensagem' => 'nao'
                ]);
            }
            
        }
    }
?>