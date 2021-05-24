<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Imovei;

    class EditaImovelController extends Controller
    {
        public function index()
        {
            $cep = filter_input(INPUT_POST, 'cep');
            $logradouro = filter_input(INPUT_POST, 'logradouro');
            $numero = filter_input(INPUT_POST, 'numero');
            $complemento = filter_input(INPUT_POST, 'complemento');
            $bairro = filter_input(INPUT_POST, 'bairro');
            $cidade = filter_input(INPUT_POST, 'cidade');
            $uf = filter_input(INPUT_POST, 'uf');
            $iptu = filter_input(INPUT_POST, 'iptu');
            $cartorio = filter_input(INPUT_POST, 'cartorio');
            $matricula = filter_input(INPUT_POST, 'matricula');
            $v_venda = filter_input(INPUT_POST, 'v_venda');
            $v_condominio = filter_input(INPUT_POST, 'v_condominio');
            $suites = filter_input(INPUT_POST, 'suites');
            $banheiros = filter_input(INPUT_POST, 'banheiros');
            $dce = filter_input(INPUT_POST, 'dce');
            $varanda = filter_input(INPUT_POST, 'varanda');
            $vazio = filter_input(INPUT_POST, 'vazio');
            $opcao_vazio = filter_input(INPUT_POST, 'opcao_vazio');
            $garagem = filter_input(INPUT_POST, 'garagem');
            $elevador = filter_input(INPUT_POST, 'elevador');
            $ap_andar = filter_input(INPUT_POST, 'ap_andar');
            $andares = filter_input(INPUT_POST, 'andares');
            $area = filter_input(INPUT_POST, 'area');
            $apto_posicao = filter_input(INPUT_POST, 'apto_posicao');
            $sol_posicao = filter_input(INPUT_POST, 'sol_posicao');
            $p_referencia = filter_input(INPUT_POST, 'p_referencia');
            $ventilador_teto = filter_input(INPUT_POST, 'ventilador_teto');
            $ar_condicionado = filter_input(INPUT_POST, 'ar_condicionado');
            $arm_banheiro = filter_input(INPUT_POST, 'arm_banheiro');
            $arm_cozinha = filter_input(INPUT_POST, 'arm_cozinha');
            $arm_quarto = filter_input(INPUT_POST, 'arm_quarto');
            $granito = filter_input(INPUT_POST, 'granito');
            $blindex = filter_input(INPUT_POST, 'blindex');
            $fachada_pintura = filter_input(INPUT_POST, 'fachada_pintura');
            $seguranca_portao = filter_input(INPUT_POST, 'seguranca_portao');
            $gas = filter_input(INPUT_POST, 'gas');
            $circuito_tv = filter_input(INPUT_POST, 'circuito_tv');
            $portaria = filter_input(INPUT_POST, 'portaria');
            $interfone = filter_input(INPUT_POST, 'interfone');
            $ginastica = filter_input(INPUT_POST, 'ginastica');
            $quadra = filter_input(INPUT_POST, 'quadra');
            $festas = filter_input(INPUT_POST, 'festas');
            $churrasqueira = filter_input(INPUT_POST, 'churrasqueira');
            $playground = filter_input(INPUT_POST, 'playground');
            $piscina = filter_input(INPUT_POST, 'piscina');
            $sauna = filter_input(INPUT_POST, 'sauna');
            $sindico = filter_input(INPUT_POST, 'sindico');
            $s_telefone = filter_input(INPUT_POST, 's_telefone');
            $s_email = filter_input(INPUT_POST, 's_email');
            $observacao = filter_input(INPUT_POST, 'observacao');

            Imovei::update()->set([
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
                'banheiros' => $banheiros,
                'dce' => $dce,
                'varanda' => $varanda,
                'vazio' => $vazio,
                'opcao_vazio' => $opcao_vazio,
                'garagem' => $garagem,
                'elevador' => $elevador,
                'ap_andar' => $ap_andar,
                'andares' => $andares,
                'area' => $area,
                'apto_posicao' => $apto_posicao,
                'sol_posicao' => $sol_posicao,
                'p_referencia' => $p_referencia,
                'ventilador_teto' => $ventilador_teto,
                'ar_condicionado' => $ar_condicionado,
                'arm_banheiro' => $arm_banheiro,
                'arm_cozinha' => $arm_cozinha,
                'arm_quarto' => $arm_quarto,
                'granito' => $granito,
                'blindex' => $blindex,
                'fachada_pintura' => $fachada_pintura,
                'seguranca_portao' => $seguranca_portao,
                'gas' => $gas,
                'circuito_tv' => $circuito_tv,
                'portaria' => $portaria,
                'interfone' => $interfone,
                'ginastica' => $ginastica,
                'quadra' => $quadra,
                'festas' => $festas,
                'churrasqueira' => $churrasqueira,
                'playground' => $playground,
                'piscina' => $piscina,
                'sauna' => $sauna,
                'sindico' => $sindico,
                's_telefone' => $s_telefone,
                's_email' => $s_email,
                'observacao' => $observacao,
            ])->where('matricula', $matricula)->execute();

            $this->redirect('pesquisa');
        }
    }
?>