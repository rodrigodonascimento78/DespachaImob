<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Cliente;
    use src\models\Compradore;
    use src\models\Compradores_Procuradore;
    use \src\models\PJCliente;
    use \src\models\Processo;
    use src\models\Vendedore;
    use src\models\Vendedores_Procuradore;

class PesquisaClienteAjaxController extends Controller
    {
        public function index()
        {
            // Dado recebido da pesquisa
            $item_pesquisado = filter_input(INPUT_POST, trim('item_pesquisado'));
            $tamanho_cpf = strlen($item_pesquisado);

            if($tamanho_cpf === 11) {

                // O retorno desta consulta é um array
                $cliente = Cliente::select()->where('cpf', $item_pesquisado)->execute();
                if(count($cliente) > 0) {
                    $cliente_data = $cliente;
                }

                $comprador = Compradore::select('num_processo_comprador')->where('cpf_cnpj_comprador', $item_pesquisado)->execute();
                if(count($comprador) > 0) {
                    $comprador_data = $comprador;
                } else {
                    $comprador_data = [];
                }

                $procurador_comprador = Compradores_Procuradore::select('num_processo_proc_comprador')->where('cpf_cnpj_proc_comprador', $item_pesquisado)->execute();
                if(count($procurador_comprador) > 0) {
                    $procurador_comprador_data = $procurador_comprador;
                } else {
                    $procurador_comprador_data = [];
                }

                $vendedor = Vendedore::select('num_processo_vendedor')->where('cpf_cnpj_vendedor', $item_pesquisado)->execute();
                if(count($vendedor) > 0) {
                    $vendedor_data = $vendedor;
                } else {
                    $vendedor_data = [];
                }

                $procurador_vendedor = Vendedores_Procuradore::select('num_processo_proc_vendedor')->where('cpf_cnpj_proc_vendedor', $item_pesquisado)->execute();
                if(count($procurador_vendedor) > 0) {
                    $procurador_vendedor_data = $procurador_vendedor;
                } else {
                    $procurador_vendedor_data = [];
                }

                $arquivos = array();

                if(is_dir('assets/arquivos/'.$item_pesquisado)) {
                    if($handle = opendir('assets/arquivos/'.$item_pesquisado)) {
                        while($file = readdir($handle)) {
                            if($file == '.' || $file == '..') {
                                continue;
                            }
                            array_push($arquivos, $file);
                        }
                    }
                } else {
                    array_push($arquivos, ['mensagem' => 'Ainda não existe documentos vinculados a essa pesquisa.']);
                }

                $this->render('pesquisaclienteajax', [
                    'cliente' => $cliente_data,
                    'comprador' => $comprador_data,
                    'procurador_comprador' => $procurador_comprador_data,
                    'vendedor' => $vendedor_data,
                    'procurador_vendedor' => $procurador_vendedor_data,
                    'arquivos' => $arquivos,
                    'pessoa' => 'fisica',
                ]);
            } else if($tamanho_cpf === 14) {
                $cliente_pj = PJCliente::select()->where('cnpj', $item_pesquisado)->execute();
                if(count($cliente_pj) > 0) {
                    $cliente_pj_data = $cliente_pj;
                }

                $comprador_pj = Processo::select('numero_processo')->where('cpf_cnpj_comprador_processo', $item_pesquisado)->execute();
                if(count($comprador_pj) > 0) {
                    $comprador_pj_data = $comprador_pj;
                } else {
                    $comprador_pj_data = [];
                }

                $procurador_comprador_pj = Processo::select('numero_processo')->where('cpf_cnpj_proc_comprador_processo', $item_pesquisado)->execute();
                if(count($procurador_comprador_pj) > 0) {
                    $procurador_comprador_pj_data = $procurador_comprador_pj;
                } else {
                    $procurador_comprador_pj_data = [];
                }

                $vendedor_pj = Processo::select('numero_processo')->where('cpf_cnpj_vendedor_processo', $item_pesquisado)->execute();
                if(count($vendedor_pj) > 0) {
                    $vendedor_pj_data = $vendedor_pj;
                } else {
                    $vendedor_pj_data = [];
                }

                $procurador_vendedor_pj = Processo::select('numero_processo')->where('cpf_cnpj_proc_vendedor_processo', $item_pesquisado)->execute();
                if(count($procurador_vendedor_pj) > 0) {
                    $procurador_vendedor_pj_data = $procurador_vendedor_pj;
                } else {
                    $procurador_vendedor_pj_data = [];
                }

                $arquivos = array();

                if(is_dir('assets/arquivos/'.$item_pesquisado)) {
                    if($handle = opendir('assets/arquivos/'.$item_pesquisado)) {
                        while($file = readdir($handle)) {
                            if($file == '.' || $file == '..') {
                                continue;
                            }
                            array_push($arquivos, $file);
                        }
                    }
                } else {
                    array_push($arquivos, ['mensagem' => 'Ainda não existe documentos vinculados a essa pesquisa.']);
                }
                
                $this->render('pesquisaclienteajax', [
                    'cliente' => $cliente_pj_data,
                    'comprador' => $comprador_pj_data,
                    'procurador_comprador' => $procurador_comprador_pj_data,
                    'vendedor' => $vendedor_pj_data,
                    'procurador_vendedor' => $procurador_vendedor_pj_data,
                    'arquivos' => $arquivos,
                    'pessoa' => 'juridica'
                ]);
                
            } else {
                $this->render('pesquisaclienteajax', [
                    'mensagem' => 'Cliente não encontrado na base de dados',
                    'pessoa' => 'desconhecida',
                ]);
            }
        }
    }
?>