<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\PJCliente;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;

class ProcuradorVendedorAjaxController extends Controller
    {
        public function index()
        {
            $num_processo_proc_vendedor = filter_input(INPUT_POST, trim('numero_processo'));
            $cpf_procurador_vendedor = filter_input(INPUT_POST, trim('cpf_procurador_vendedor'));
            $proc_vendedor_delete = filter_input(INPUT_POST, trim('proc_vendedor_delete'));
            $processo_delete = filter_input(INPUT_POST, trim('processo_delete'));

            $tamanho_cpf = strlen($cpf_procurador_vendedor);

            if($tamanho_cpf === 11) {

                // VERIFICA SE PROCURADOR DO VENDEDOR SE REPETE
                $procurador_vendedor = Vendedores_Procuradore::select()->where('cpf_cnpj_proc_vendedor', $cpf_procurador_vendedor)->where('num_processo_proc_vendedor', intval($num_processo_proc_vendedor))->execute();
                if(count($procurador_vendedor) === 0) {

                    // VERIFICA SE PROCURADOR DO VENDEDOR É DIFERENTE DO PROCURADOR DO COMPRADOR
                    $procurador_comprador = Compradores_Procuradore::select()->where('cpf_cnpj_proc_comprador', $cpf_procurador_vendedor)->where('num_processo_proc_comprador', intval($num_processo_proc_vendedor))->execute();
                    if(count($procurador_comprador) === 0) {

                        // VERIFICA SE PROCURADOR DO VENDEDOR É DIFERENTE DO VENDEDOR
                        $vendedor = Vendedore::select()->where('cpf_cnpj_vendedor', $cpf_procurador_vendedor)->where('num_processo_vendedor', intval($num_processo_proc_vendedor))->execute();
                        if(count($vendedor) === 0) {

                            // VERIFICA SE PROCURADOR DO VENDEDOR É DIFERENTE DO COMPRADOR
                            $comprador = Compradore::select()->where('cpf_cnpj_comprador', $cpf_procurador_vendedor)->where('num_processo_comprador', intval($num_processo_proc_vendedor))->execute();
                            if(count($comprador) === 0) {

                                //VERIFICA SE COMPRADOR ESTÁ VAZIO
                                $comprador_vazio = Compradore::select()->where('num_processo_comprador', intval($num_processo_proc_vendedor))->execute();
                                $vendedor_vazio = Vendedore::select()->where('num_processo_vendedor', intval($num_processo_proc_vendedor))->execute();
                                if((count($comprador_vazio) !== 0) && (count($vendedor_vazio) !== 0)) {
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
                                } else if((count($comprador_vazio) === 0) && (count($vendedor_vazio) === 0)) {
                                    $this->render('procuradorvendedorajax', [
                                        'pessoa' => 'nenhuma',
                                        'mensagem' => '<strong>PRIMEIRO DEVE SER SELECIONADO UM COMPRADOR E UM VENDEDOR.</strong>',
                                    ]);
                                } else if((count($comprador_vazio) === 0) && (count($vendedor_vazio) !== 0)) {
                                    $this->render('procuradorvendedorajax', [
                                        'pessoa' => 'nenhuma',
                                        'mensagem' => '<strong>PRIMEIRO DEVE SER SELECIONADO UM COMPRADOR.</strong>',
                                    ]);
                                } else if((count($comprador_vazio) !== 0) && (count($vendedor_vazio) === 0)) {
                                    $this->render('procuradorvendedorajax', [
                                        'pessoa' => 'nenhuma',
                                        'mensagem' => '<strong>PRIMEIRO DEVE SER SELECIONADO UM VENDEDOR.</strong>',
                                    ]);
                                }
                            } else {
                                $this->render('procuradorvendedorajax', [
                                    'pessoa' => 'nenhuma',
                                    'mensagem' => 'Cliente já foi selecionado como <strong>COMPRADOR</strong>.',
                                ]);
                            }
                        } else {
                            $this->render('procuradorvendedorajax', [
                                'pessoa' => 'nenhuma',
                                'mensagem' => 'Cliente já foi selecionado como <strong>VENDEDOR</strong>.',
                            ]);
                        }
                    } else {
                        $this->render('procuradorvendedorajax', [
                            'pessoa' => 'nenhuma',
                            'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO COMPRADOR</strong>.',
                        ]);
                    }
                } else {
                    $this->render('procuradorvendedorajax', [
                        'pessoa' => 'nenhuma',
                        'mensagem' => 'Cliente já foi selecionado como <strong>PROCURADOR DO VENDEDOR</strong>.',
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