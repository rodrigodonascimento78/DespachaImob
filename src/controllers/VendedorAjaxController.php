<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\PJCliente;
    use \src\models\Vendedore;

    class VendedorAjaxController extends Controller
    {
        public function index()
        {
            $num_processo_vendedor = filter_input(INPUT_POST, 'numero_processo');
            $cpf_vendedor = filter_input(INPUT_POST, 'cpf_vendedor');
            $vendedor_delete = filter_input(INPUT_POST, 'vendedor_delete');
            $processo_delete = filter_input(INPUT_POST, 'processo_delete');
            $tamanho_cpf = strlen($cpf_vendedor);

            if($tamanho_cpf === 11) {
                $data = Cliente::select()->where('cpf', $cpf_vendedor)->execute();

                if(count($data) !== 0) {
                    foreach($data as $key => $value) {
                        Vendedore::insert([
                            'id_cliente' => $value['id_cliente'],
                            'cpf_cnpj_vendedor' => $value['cpf'],
                            'num_processo_vendedor' => $num_processo_vendedor,
                        ])->execute();
                    }

                    $this->render('vendedorajax', [
                        'vendedor' => $data,
                        'num_processo_vendedor' => $num_processo_vendedor,
                        'pessoa' => 'fisica',
                    ]);
                } else {
                    $this->render('vendedorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                    ]);
                }
            } else if($tamanho_cpf === 14) {
                $data = PJCliente::select()->where('cnpj', $cpf_vendedor)->execute();

                if(count($data) !== 0) {
                    foreach($data as $key => $value) {
                        Vendedore::insert([
                            'id_cliente_pj' => $value['id_cliente_pj'],
                            'cpf_cnpj_vendedor' => $value['cnpj'],
                            'num_processo_vendedor' => $num_processo_vendedor,
                        ])->execute();
                    }
                    
                    $this->render('vendedorajax', [
                        'vendedor' => $data,
                        'num_processo_vendedor' => $num_processo_vendedor,
                        'pessoa' => 'juridica',
                    ]);
                } else {
                    $this->render('vendedorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                    ]);
                }
            } else if($tamanho_cpf !== 11 || $tamanho_cpf !== 14) {
                $this->render('vendedorajax', [
                    'pessoa' => 'nenhuma',
                    'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                ]);
            }

            if(isset($vendedor_delete)) {
                Vendedore::delete()->where('cpf_cnpj_vendedor', $vendedor_delete)->where('num_processo_vendedor', intval($processo_delete))->execute();
            }
        }
    }
?>