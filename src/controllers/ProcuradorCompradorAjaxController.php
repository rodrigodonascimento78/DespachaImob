<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\PJCliente;
    use \src\models\Compradores_Procuradore;

    class ProcuradorCompradorAjaxController extends Controller
    {
        public function index()
        {
            $num_processo_proc_comprador = filter_input(INPUT_POST, 'numero_processo');
            $cpf_procurador_comprador = filter_input(INPUT_POST, 'cpf_procurador_comprador');
            $proc_comprador_delete = filter_input(INPUT_POST, 'proc_comprador_delete');
            $processo_delete = filter_input(INPUT_POST, 'processo_delete');
            $tamanho_cpf = strlen($cpf_procurador_comprador);

            if($tamanho_cpf === 11) {
                $data = Cliente::select()->where('cpf', $cpf_procurador_comprador)->execute();

                if(count($data) !== 0) {
                    foreach($data as $key => $value) {
                        Compradores_Procuradore::insert([
                            'id_cliente' => $value['id_cliente'],
                            'cpf_cnpj_proc_comprador' => $value['cpf'],
                            'num_processo_proc_comprador' => $num_processo_proc_comprador,
                        ])->execute();
                    }
                    
                    $this->render('procuradorcompradorajax', [
                        'proc_comprador' => $data,
                        'num_processo_proc_comprador' => $num_processo_proc_comprador,
                        'pessoa' => 'fisica',
                    ]);
                } else {
                    $this->render('procuradorcompradorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                    ]);
                }
            }  else if($tamanho_cpf !== 11) {
                $this->render('procuradorcompradorajax', [
                    'pessoa' => 'nenhuma',
                    'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                ]);
            }

            if(isset($proc_comprador_delete)) {
                Compradores_Procuradore::delete()->where('cpf_cnpj_proc_comprador', $proc_comprador_delete)->where('num_processo_proc_comprador', intval($processo_delete))->execute();
            }
        }
    }
?>