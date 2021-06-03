<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\PJCliente;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;

    class CompradorAjaxController extends Controller
    {
        public function index()
        {
            $num_processo_comprador = filter_input(INPUT_POST, trim('numero_processo'));
            $c_comprador = filter_input(INPUT_POST, trim('cpf_comprador'));
            $comprador_delete = filter_input(INPUT_POST, trim('comprador_delete'));
            $processo_delete = filter_input(INPUT_POST, trim('processo_delete'));

            $tamanho_cpf = strlen($c_comprador);

            if($tamanho_cpf === 11) {

                // VERIFICA SE COMPRADOR NÃO REPETE
                $comprador = Compradore::select()->where('cpf_cnpj_comprador', $c_comprador)->where('num_processo_comprador', intval($num_processo_comprador))->execute();
                if(count($comprador) === 0) {

                    // VERIFICA SE COMPRADOR É DIFERENTE DO PROCURADOR DO COMPRADOR
                    $proc_comprador = Compradores_Procuradore::select()->where('cpf_cnpj_proc_comprador', $c_comprador)->where('num_processo_proc_comprador', intval($num_processo_comprador))->execute();
                    if(count($proc_comprador) === 0) {

                        // VERIFICA SE COMPRADOR É DIFERENTE DO VENDEDOR
                        $vendedor = Vendedore::select()->where('cpf_cnpj_vendedor', $c_comprador)->where('num_processo_vendedor', intval($num_processo_comprador))->execute();
                        if(count($vendedor) === 0) {

                            // VERIFICA SE COMPRADOR É DIFERENTE DO PROCURADOR DO VENDEDOR
                            $proc_vendedor = Vendedores_Procuradore::select()->where('cpf_cnpj_proc_vendedor', $c_comprador)->where('num_processo_proc_vendedor', intval($num_processo_comprador))->execute();
                            if(count($proc_vendedor) === 0) {
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
                            } else {
                                $this->render('compradorajax', [
                                    'pessoa' => 'nenhuma',
                                    'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO VENDEDOR</strong>.',
                                ]);
                            }
                        } else {
                            $this->render('compradorajax', [
                                'pessoa' => 'nenhuma',
                                'mensagem' => 'Cliente já foi selecionado como <strong>VENDEDOR</strong>.',
                            ]);
                        }
                    } else {
                        $this->render('compradorajax', [
                            'pessoa' => 'nenhuma',
                            'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO COMPRADOR</strong>.',
                        ]);
                    }
                } else if(count($comprador) !== 0) {
                    $this->render('compradorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cliente já foi selecionado como <strong>COMPRADOR</strong>.',
                    ]);
                }
            } else if($tamanho_cpf === 14) {
                
                // VERIFICA SE COMPRADOR NÃO REPETE
                $comprador = Compradore::select()->where('cpf_cnpj_comprador', $c_comprador)->where('num_processo_comprador', intval($num_processo_comprador))->execute();
                if(count($comprador) === 1) {

                    // VERIFICA SE COMPRADOR É DIFERENTE DO PROCURADOR DO COMPRADOR
                    $proc_comprador = Compradores_Procuradore::select()->where('cpf_cnpj_proc_comprador', $c_comprador)->where('num_processo_proc_comprador', intval($num_processo_comprador))->execute();
                    if(count($proc_comprador) === 1) {

                        // VERIFICA SE COMPRADOR É DIFERENTE DO VENDEDOR
                        $vendedor = Vendedore::select()->where('cpf_cnpj_vendedor', $c_comprador)->where('num_processo_vendedor', intval($num_processo_comprador))->execute();
                        if(count($vendedor) === 1) {

                            // VERIFICA SE COMPRADOR É DIFERENTE DO PROCURADOR DO VENDEDOR
                            $proc_vendedor = Vendedores_Procuradore::select()->where('cpf_cnpj_proc_vendedor', $c_comprador)->where('num_processo_proc_vendedor', intval($num_processo_comprador))->execute();
                            if(count($proc_vendedor) === 1) {
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
                            } else {
                                $this->render('compradorajax', [
                                    'pessoa' => 'nenhuma',
                                    'mensagem' => 'Cliente já foi selecionado como PROCURADOR DO VENDEDOR.',
                                ]);
                            }
                        } else {
                            $this->render('compradorajax', [
                                'pessoa' => 'nenhuma',
                                'mensagem' => 'Cliente já foi selecionado como VENDEDOR.',
                            ]);
                        }
                    } else {
                        $this->render('compradorajax', [
                            'pessoa' => 'nenhuma',
                            'mensagem' => 'Cliente já foi selecionado como PROCURADOR DO COMPRADOR.',
                        ]);
                    }
                } else {
                    $this->render('compradorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cliente já foi selecionado como COMPRADOR.',
                    ]);
                }
            }  else if(($tamanho_cpf !== 11) || ($tamanho_cpf !== 14)) {
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