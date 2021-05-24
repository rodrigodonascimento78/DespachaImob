<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\PJCliente;
    use \src\models\Compradore;

    class CompradorAjaxController extends Controller
    {
        public function index()
        {
            $num_processo_comprador = filter_input(INPUT_POST, 'numero_processo');
            $c_comprador = filter_input(INPUT_POST, 'cpf_comprador');
            $comprador_delete = filter_input(INPUT_POST, 'comprador_delete');
            $processo_delete = filter_input(INPUT_POST, 'processo_delete');
            $tamanho_cpf = strlen($c_comprador);

            if($tamanho_cpf === 11) {
                $data = Cliente::select()->where('cpf', $c_comprador)->execute();
                
                if(count($data) !== 0) {
                    foreach($data as $key => $value) {
                        Compradore::insert([
                            'id_cliente' => $value['id_cliente'],
                            'cpf_cnpj_comprador' => $value['cpf'],
                            'num_processo_comprador' => $num_processo_comprador,
                        ])->execute();
                    }
                    
                    $this->render('compradorajax', [
                        'comprador' => $data,
                        'num_processo_comprador' => $num_processo_comprador,
                        'pessoa' => 'fisica',
                    ]);
                } else {
                    $this->render('compradorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                    ]);
                }
            } else if($tamanho_cpf === 14) {
                $data = PJCliente::select()->where('cnpj', $c_comprador)->execute();

                if(count($data) !== 0) {
                    foreach($data as $key => $value) {
                        Compradore::insert([
                            'id_cliente_pj' => $value['id_cliente_pj'],
                            'cpf_cnpj_comprador' => $value['cnpj'],
                            'num_processo_comprador' => $num_processo_comprador,
                        ])->execute();
                    }
                    
                    $this->render('compradorajax', [
                        'comprador' => $data,
                        'num_processo_comprador' => $num_processo_comprador,
                        'pessoa' => 'juridica',
                    ]);
                } else if(count($data) === 0) {
                    $this->render('compradorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                    ]);
                }
            } else if(($tamanho_cpf !== 11) || ($tamanho_cpf !== 14)) {
                $this->render('compradorajax', [
                    'pessoa' => 'nenhuma',
                    'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                ]);
            }

            if(isset($comprador_delete)) {
                Compradore::delete()->where('cpf_cnpj_comprador', $comprador_delete)->where('num_processo_comprador', intval($processo_delete))->execute();
            }
        }
    }
?>