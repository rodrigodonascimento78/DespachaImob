<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Imovei;

    class ImovelController extends Controller
    {
        public function add()
        {
            $this->render('imovel');
        }

        public function addAction()
        {
            $cep = filter_input(INPUT_POST, trim('cep'));
            $logradouro = filter_input(INPUT_POST, trim('logradouro'));
            $numero = filter_input(INPUT_POST, trim('numero'));
            $complemento = filter_input(INPUT_POST, trim('complemento'));
            $bairro = filter_input(INPUT_POST, trim('bairro'));
            $cidade = filter_input(INPUT_POST, trim('cidade'));
            $uf = filter_input(INPUT_POST, trim('uf'));
            $iptu = filter_input(INPUT_POST, trim('iptu'));
            $cartorio = filter_input(INPUT_POST, trim('cartorio'));
            $matricula = filter_input(INPUT_POST, trim('matricula'));
            $v_venda = filter_input(INPUT_POST, trim('v_venda'));
            $v_condominio = filter_input(INPUT_POST, trim('v_condominio'));
            $suites = filter_input(INPUT_POST, trim('suites'));
            $vazio = filter_input(INPUT_POST, trim('vazio'));
            $opcao_vazio = filter_input(INPUT_POST, trim('opcao_vazio'));
            $garagem = filter_input(INPUT_POST, trim('garagem'));
            $elevador = filter_input(INPUT_POST, trim('elevador'));
            $quartos = filter_input(INPUT_POST, trim('quartos'));
            $p_referencia = filter_input(INPUT_POST, trim('p_referencia'));
            $observacao = filter_input(INPUT_POST, trim('observacao'));

            if($cep && $logradouro && $bairro && $cidade && $uf && $cartorio && $matricula && $v_venda) {
                // CRIA PASTA PARA ANEXAR DOCUMENTOS DO IMÓVEL
                mkdir('assets/arquivos/'.$matricula);
                
                Imovei::insert([
                    'cep' => $cep,
                    'logradouro' => $logradouro,
                    'numero' => $numero,
                    'complemento' => $complemento,
                    'bairro' => $bairro,
                    'cidade' => $cidade,
                    'uf' => $uf,
                    'iptu' => $iptu,
                    'cartorio' => $cartorio,
                    'matricula' => $matricula,
                    'v_venda' => $v_venda,
                    'v_condominio' => $v_condominio,
                    'suites' => $suites,
                    'vazio' => $vazio,
                    'opcao_vazio' => $opcao_vazio,
                    'garagem' => $garagem,
                    'elevador' => $elevador,
                    'quartos' => $quartos,
                    'p_referencia' => $p_referencia,
                    'observacao' => $observacao,
                ])->execute();

                $this->redirect('imovel');
                exit;
            } else {
                $this->render('imovel');
            }
        }
    }