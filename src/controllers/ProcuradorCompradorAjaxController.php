<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\PJCliente;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;

    class ProcuradorCompradorAjaxController extends Controller
    {
        public function index()
        {
            $num_processo_proc_comprador = filter_input(INPUT_POST, trim('numero_processo'));
            $cpf_procurador_comprador = filter_input(INPUT_POST, trim('cpf_procurador_comprador'));
            $proc_comprador_delete = filter_input(INPUT_POST, trim('proc_comprador_delete'));
            $processo_delete = filter_input(INPUT_POST, trim('processo_delete'));
            $tamanho_cpf = strlen($cpf_procurador_comprador);

            if ($tamanho_cpf === 11) {

                // VERIFICA SE PROCURADOR DO COMPRADOR É REPETIDO
                $procurador_comprador = Compradores_Procuradore::select()->where('cpf_cnpj_proc_comprador', $cpf_procurador_comprador)->where('num_processo_proc_comprador', intval($num_processo_proc_comprador))->execute();
                if (count($procurador_comprador) === 0) {

                    // VERIFICA SE PROCURADOR DO COMPRADOR É DIFERENTE DO VENDEDOR
                    $vendedor = Vendedore::select()->where('cpf_cnpj_vendedor', $cpf_procurador_comprador)->where('num_processo_vendedor', intval($num_processo_proc_comprador))->execute();
                    if (count($vendedor) === 0) {

                        // VERIFICA SE PROCURADOR DO COMPRADOR É DIFERENTE DO PROCURADOR DO VENDEDOR
                        $procurador_vendedor = Vendedores_Procuradore::select()->where('cpf_cnpj_proc_vendedor', $cpf_procurador_comprador)->where('num_processo_proc_vendedor', $num_processo_proc_comprador)->execute();
                        if (count($procurador_vendedor) === 0) {

                            // VERIFICA SE PROCURADOR DO COMPRADOR É DIFERENTE COMPRADOR
                            $comprador = Compradore::select()->where('cpf_cnpj_comprador', $cpf_procurador_comprador)->where('num_processo_comprador', intval($num_processo_proc_comprador))->execute();
                            if (count($comprador) === 0) {

                                // VEIRIFICA SE COMPRADOR ESTÁ VAZIO
                                $comprador_vazio = Compradore::select()->where('num_processo_comprador', intval($num_processo_proc_comprador))->execute();
                                if (count($comprador_vazio) !== 0) {
                                    $data = Cliente::select()->where('cpf', $cpf_procurador_comprador)->execute();

                                    if (count($data) !== 0) {
                                        foreach ($data as $key => $value) {
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
                                } else {
                                    $this->render('procuradorcompradorajax', [
                                        'pessoa' => 'nenhuma',
                                        'mensagem' => '<strong>PRIMEIRO DEVE SER SELECIONADO UM COMPRADOR.</strong>',
                                    ]);
                                }
                            } else {
                                $this->render('procuradorcompradorajax', [
                                    'pessoa' => 'nenhuma',
                                    'mensagem' => 'Cliente já foi selecionado como <strong>COMPRADOR</strong>.',
                                ]);
                            }
                        } else {
                            $this->render('procuradorcompradorajax', [
                            'pessoa' => 'nenhuma',
                            'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO VENDEDOR</strong>.',
                            ]);
                        }
                    } else {
                        $this->render('procuradorcompradorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cliente já foi selecionado como <strong>VENDEDOR</strong>.',
                        ]);
                    }
                } else {
                    $this->render('procuradorcompradorajax', [
                    'pessoa' => 'nenhuma',
                    'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO COMPRADOR</strong>.',
                    ]);
                }
            } else {
                $this->render('procuradorcompradorajax', [
                    'pessoa' => 'nenhuma',
                    'mensagem' => 'Cadastro não encontrado na nossa base de dados.',
                ]);
            }

            if (isset($proc_comprador_delete)) {
                Compradores_Procuradore::delete()->where('cpf_cnpj_proc_comprador', $proc_comprador_delete)->where('num_processo_proc_comprador', intval($processo_delete))->execute();
            }
        }
    }
?>