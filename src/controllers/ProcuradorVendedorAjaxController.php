<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\PJCliente;
    use \src\models\Vendedores_Procuradore;

class ProcuradorVendedorAjaxController extends Controller
    {
        public function index()
        {
            $num_processo_proc_vendedor = filter_input(INPUT_POST, 'numero_processo');
            $cpf_procurador_vendedor = filter_input(INPUT_POST, 'cpf_procurador_vendedor');
            $proc_vendedor_delete = filter_input(INPUT_POST, 'proc_vendedor_delete');
            $processo_delete = filter_input(INPUT_POST, 'processo_delete');
            $tamanho_cpf = strlen($cpf_procurador_vendedor);

            if($tamanho_cpf === 11) {
                $data = Cliente::select()->where('cpf', $cpf_procurador_vendedor)->execute();

                if(count($data) !== 0) {
                    foreach($data as $key => $value) {
                        Vendedores_Procuradore::insert([
                            'id_cliente' => $value['id_cliente'],
                            'cpf_cnpj_proc_vendedor' => $value['cpf'],
                            'num_processo_proc_vendedor' => $num_processo_proc_vendedor,
                        ])->execute();
                    }
                    
                    $this->render('procuradorvendedorajax', [
                        'proc_vendedor' => $data,
                        'num_processo_proc_vendedor' => $num_processo_proc_vendedor,
                        'pessoa' => 'fisica',
                    ]);
                } else {
                    $this->render('procuradorvendedorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                    ]);
                }
            }  else if($tamanho_cpf !== 11) {
                $this->render('procuradorvendedorajax', [
                    'pessoa' => 'nenhuma',
                    'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                ]);
            }

            if(isset($proc_vendedor_delete)) {
                Vendedores_Procuradore::delete()->where('cpf_cnpj_proc_vendedor', $proc_vendedor_delete)->where('num_processo_proc_vendedor', intval($processo_delete))->execute();
            }
        }
    }
?>