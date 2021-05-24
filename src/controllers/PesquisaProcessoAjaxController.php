<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Processo;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;
    use \src\models\Cliente;
    use \src\models\PJCliente;
    use \src\models\Imovei;

    class PesquisaProcessoAjaxController extends Controller
    {
        public function index()
        {
            $item_pesquisado = filter_input(INPUT_POST, 'item_pesquisado');
            $processo = [];
            $compradores_pf = [];
            $compradores_pj = [];
            $procuradores_compradores = [];
            $vendedores_pf = [];
            $vendedores_pj = [];
            $procuradores_vendedores = [];
            $imovel = [];
            $arquivos = array();
            
            // PROCESSO
            $processo_data = Processo::select()->where('numero_processo', $item_pesquisado)->execute();
            foreach($processo_data as $key => $value) {
                array_push($processo, $value);
                // IMÓVEL
                $dados_imovel = Imovei::select()->where('matricula', $value['matricula_processo'])->execute();
                foreach($dados_imovel as $key => $value) {
                    array_push($imovel, $value);
                }
            }

            

            if(count($processo_data) !== 0) {
                // ARQUIVOS
                if(is_dir('assets/arquivos/'.$item_pesquisado)) {
                    $files = scandir('assets/arquivos/'.$item_pesquisado);
                    foreach($files as $arq) {
                        if(!in_array($arq, array('.', '..'))) {
                            $filename = 'assets/arquivos/'.$item_pesquisado.DIRECTORY_SEPARATOR.$arq;
                            $info = pathinfo($filename);
                            array_push($arquivos, $info);
                        }
                    }
                } else {
                    array_push($arquivos, ['mensagem' => 'Ainda não existe documentos vinculados a essa pesquisa.']);
                }
                // COMPRADOR
                $dados_compradores = Compradore::select()->where('num_processo_comprador', intval($item_pesquisado))->execute();
                if(count($dados_compradores) !== 0) {
                    foreach($dados_compradores as $key => $value) {
                        if(strlen($value['cpf_cnpj_comprador']) == 11) {
                            $clientes_pf = Cliente::select()->where('cpf', $value['cpf_cnpj_comprador'])->execute();
                            foreach($clientes_pf as $indice => $dados_compradores_pf) {
                                array_push($compradores_pf, $dados_compradores_pf);
                            }
                        } else if(strlen($value['cpf_cnpj_comprador']) == 14) {
                            $clientes_pj = PJCliente::select()->where('cnpj', $value['cpf_cnpj_comprador'])->execute();
                            foreach($clientes_pj as $indice => $dados_compradores_pj) {
                                array_push($compradores_pj, $dados_compradores_pj);
                            }
                        }
                    }
                }

                // PROCURADOR COMPRADOR
                $dados_proc_comprador = Compradores_Procuradore::select()->where('num_processo_proc_comprador', intval($item_pesquisado))->execute();
                if(count($dados_proc_comprador) !== 0) {
                    foreach($dados_proc_comprador as $key => $value) {
                        $clientes_proc_compradores = Cliente::select()->where('cpf', $value['cpf_cnpj_proc_comprador'])->execute();
                        foreach($clientes_proc_compradores as $indice => $dados_proc_compradores) {
                            array_push($procuradores_compradores, $dados_proc_compradores);
                            array_push($procuradores_compradores, ['id_proc_comprador' => $value['id_proc_comprador']]);
                        }
                    }
                }

                // VENDEDOR
                $dados_vendedor = Vendedore::select()->where('num_processo_vendedor', intval($item_pesquisado))->execute();
                if(count($dados_vendedor) !== 0) {
                    foreach($dados_vendedor as $key => $value) {
                        if(strlen($value['cpf_cnpj_vendedor']) == 11) {
                            $clientes_pf = Cliente::select()->where('cpf', $value['cpf_cnpj_vendedor'])->execute();
                            foreach($clientes_pf as $indice => $dados_vendedores_pf) {
                                array_push($vendedores_pf, $dados_vendedores_pf);
                            }
                        } else if(strlen($value['cpf_cnpj_vendedor']) == 14) {
                            $clientes_pj = PJCliente::select()->where('cnpj', $value['cpf_cnpj_vendedor'])->execute();
                            foreach($clientes_pj as $indice => $dados_vendedores_pj) {
                                array_push($vendedores_pj, $dados_vendedores_pj);
                            }
                        }
                    }
                }

                // PROCURADOR VENDEDOR
                $dados_proc_vendedor = Vendedores_Procuradore::select()->where('num_processo_proc_vendedor', intval($item_pesquisado))->execute();
                if(count($dados_proc_vendedor) !== 0) {
                    foreach($dados_proc_vendedor as $key => $value) {
                        $clientes_proc_vendedores = Cliente::select()->where('cpf', $value['cpf_cnpj_proc_vendedor'])->execute();
                        foreach($clientes_proc_vendedores as $indice => $dados_proc_vendedores) {
                            array_push($procuradores_vendedores, $dados_proc_vendedores);
                            array_push($procuradores_vendedores, ['id_proc_vendedor' => $value['id_proc_vendedor']]);
                        }
                    }
                }

                $this->render('pesquisaprocessoajax', [
                    'processo' => $processo,
                    'compradores_pf' => $compradores_pf,
                    'compradores_pj' => $compradores_pj,
                    'procuradores_compradores' => $procuradores_compradores,
                    'vendedores_pf' => $vendedores_pf,
                    'vendedores_pj' => $vendedores_pj,
                    'procuradores_vendedores' => $procuradores_vendedores,
                    'imovel' => $imovel,
                    'arquivos' => $arquivos,
                    'tem_processo' => 'sim',
                ]);
            } else if(count($processo) === 0) {
                $this->render('pesquisaprocessoajax', [
                    'mensagem' => 'Processo não encontrado na base de dados',
                    'tem_processo' => 'nao',
                ]);
            }
        }
    }
?>