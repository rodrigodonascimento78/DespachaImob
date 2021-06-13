<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\PJCliente;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;

    class VendedorAjaxController extends Controller
    {
        public function index()
        {
            $num_processo_vendedor = filter_input(INPUT_POST, trim('numero_processo'));
            $cpf_vendedor = filter_input(INPUT_POST, trim('cpf_vendedor'));
            $vendedor_delete = filter_input(INPUT_POST, trim('vendedor_delete'));
            $processo_delete = filter_input(INPUT_POST, trim('processo_delete'));
            $tamanho_cpf = strlen($cpf_vendedor);

            if($tamanho_cpf === 11) {

                // VERIFICA SE VENDEDOR NÃO REPETE
                $vendedor = Vendedore::select()->where('cpf_cnpj_vendedor', $cpf_vendedor)->where('num_processo_vendedor', intval($num_processo_vendedor))->execute();
                if(count($vendedor) === 0) {

                    // VERIFICA SE VENDEDOR É DIFERENTE DE PROCURADOR DO COMPRADOR
                    $procurador_comprador = Compradores_Procuradore::select()->where('cpf_cnpj_proc_comprador', $cpf_vendedor)->where('num_processo_proc_comprador', intval($num_processo_vendedor))->execute();
                    if(count($procurador_comprador) === 0) {

                        // VERIFICA SE VENDEDOR É DIFERENTE DE PROCURADOR DO VENDEDOR
                        $procurador_vendedor = Vendedores_Procuradore::select()->where('cpf_cnpj_proc_vendedor', $cpf_vendedor)->where('num_processo_proc_vendedor', intval($num_processo_vendedor))->execute();
                        if(count($procurador_vendedor) === 0) {
                            
                            // VERIFICA SE VENDEDOR É DIFERENTE DE COMPRADOR
                            $comprador = Compradore::select()->where('cpf_cnpj_comprador', $cpf_vendedor)->where('num_processo_comprador', intval($num_processo_vendedor))->execute();
                            if(count($comprador) === 0) {
                                // VERIFICA SE COMPRADOR ESTÁ VAZIO
                                $comprador_vazio = Compradore::select()->where('num_processo_comprador', intval($num_processo_vendedor))->execute();
                                if(count($comprador_vazio) !== 0) {
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
                                } else {
                                    $this->render('vendedorajax', [
                                        'pessoa' => 'nenhuma',
                                        'mensagem' => '<strong>PRIMEIRO DEVE SER SELECIONADO UM COMPRADOR.</strong>',
                                    ]);
                                }
                                
                            } else {
                                $this->render('vendedorajax', [
                                    'pessoa' => 'nenhuma',
                                    'mensagem' => 'Cliente já foi selecionado como <strong>COMPRADOR</strong>.',
                                ]);
                            }
                        } else {
                            $this->render('vendedorajax', [
                                'pessoa' => 'nenhuma',
                                'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO VENDEDOR</strong>.',
                            ]);
                        }
                    } else {
                        $this->render('vendedorajax', [
                            'pessoa' => 'nenhuma',
                            'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO COMPRADOR</strong>.',
                        ]);
                    }
                } else {
                    $this->render('vendedorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cliente já foi selecionado como <strong>VENDEDOR</strong>.',
                    ]);
                }
            } else if($tamanho_cpf === 14) {

                // VERIFICA SE VENDEDOR É DIFERENTE DE PROCURADOR DO COMPRADOR
                $procurador_comprador = Compradores_Procuradore::select()->where('cpf_cnpj_proc_comprador', $cpf_vendedor)->where('num_processo_proc_comprador', intval($num_processo_vendedor))->execute();
                if(count($procurador_comprador) === 0) {

                    // VERIFICA SE VENDEDOR NÃO REPETE
                    $vendedor = Vendedore::select()->where('cpf_cnpj_vendedor', $cpf_vendedor)->where('num_processo_vendedor', intval($num_processo_vendedor))->execute();
                    if(count($vendedor) === 0) {

                        // VERIFICA SE VENDEDOR É DIFERENTE DE PROCURADOR DO VENDEDOR
                        $procurador_vendedor = Vendedores_Procuradore::select()->where('cpf_cnpj_proc_vendedor', $cpf_vendedor)->where('num_processo_proc_vendedor', intval($num_processo_vendedor))->execute();
                        if(count($procurador_vendedor) === 0) {

                            // VERIFICA SE VENDEDOR É DIFERENTE DO COMPRADOR
                            $comprador = Compradore::select()->where('cpf_cnpj_comprador', $cpf_vendedor)->where('num_processo_comprador', intval($num_processo_vendedor))->execute();
                            if(count($comprador) === 0) {
                                
                                // VERIFICA SE COMPRADOR ESTÁ VAZIO
                                $comprador_vazio = Compradore::select()->where('num_processo_comprador', intval($num_processo_vendedor))->execute();
                                if(count($comprador_vazio) !== 0) {
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
                                } else {
                                    $this->render('vendedorajax', [
                                        'pessoa' => 'nenhuma',
                                        'mensagem' => '<strong>PRIMEIRO DEVE SER SELECIONADO UM COMPRADOR.</strong>',
                                    ]);
                                }
                                
                            } else {
                                $this->render('vendedorajax', [
                                    'pessoa' => 'nenhuma',
                                    'mensagem' => 'Cliente já foi selecionado como <strong>COMPRADOR</strong>.',
                                ]);
                            }
                        } else {
                            $this->render('vendedorajax', [
                                'pessoa' => 'nenhuma',
                                'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO VENDEDOR</strong>.',
                            ]);
                        }
                    } else {
                        $this->render('vendedorajax', [
                            'pessoa' => 'nenhuma',
                            'mensagem' => 'Cliente já foi selecionado como <strong>VENDEDOR</strong>.',
                        ]);
                    }
                } else {
                    $this->render('vendedorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO COMPRADOR</strong>.',
                    ]);
                } 
            } else {
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