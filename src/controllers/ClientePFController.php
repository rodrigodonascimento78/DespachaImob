<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Cliente;
    
    class ClientePFController extends Controller
    {
        public function add()
        {
            $this->render('clientePF');
        }

        public function addAction()
        {
            $nome = filter_input(INPUT_POST, trim('nome'));
            $cpf = filter_input(INPUT_POST, trim('cpf'));
            $nacionalidade = filter_input(INPUT_POST, trim('nacionalidade'));
            $nascimento = filter_input(INPUT_POST, trim('nascimento'));
            $rg = filter_input(INPUT_POST, trim('rg'));
            $d_expedicao = filter_input(INPUT_POST, trim('d_expedicao'));
            $o_expedidor = filter_input(INPUT_POST, trim('o_expedidor'));
            $profissao = filter_input(INPUT_POST, trim('profissao'));
            $ass_cartorio = filter_input(INPUT_POST, trim('ass_cartorio'));
            $cep = filter_input(INPUT_POST, trim('cep'));
            $logradouro = filter_input(INPUT_POST, trim('logradouro'));
            $numero = filter_input(INPUT_POST, trim('numero'));
            $complemento = filter_input(INPUT_POST, trim('complemento'));
            $bairro = filter_input(INPUT_POST, trim('bairro'));
            $cidade = filter_input(INPUT_POST, trim('cidade'));
            $uf = filter_input(INPUT_POST, trim('uf'));
            $email_1 = filter_input(INPUT_POST, trim('email_1'), FILTER_VALIDATE_EMAIL);
            $email_2 = filter_input(INPUT_POST, trim('email_2'));
            $celular = filter_input(INPUT_POST, trim('celular'));
            $residencia = filter_input(INPUT_POST, trim('residencia'));
            $comercial = filter_input(INPUT_POST, trim('comercial'));
            $recado = filter_input(INPUT_POST, trim('recado'));
            $tipo_regime = filter_input(INPUT_POST, trim('tipo_regime'));
            $regime = filter_input(INPUT_POST, trim('regime'));
            $data_casamento = filter_input(INPUT_POST, trim('data_casamento'));
            $cartorio_casamento = filter_input(INPUT_POST, trim('cartorio_casamento'));
            $matricula_certidao = filter_input(INPUT_POST, trim('matricula_certidao'));
            $nome_conjuge = filter_input(INPUT_POST, trim('nome_conjuge'));
            $cpf_conjuge = filter_input(INPUT_POST, trim('cpf_conjuge'));
            $nacionalidade_conjuge = filter_input(INPUT_POST, trim('nacionalidade_conjuge'));
            $nascimento_conjuge = filter_input(INPUT_POST, trim('nascimento_conjuge'));
            $rg_conjuge = filter_input(INPUT_POST, trim('rg_conjuge'));
            $d_expedicao_conjuge = filter_input(INPUT_POST, trim('d_expedicao_conjuge'));
            $o_expedidor_conjuge = filter_input(INPUT_POST, trim('o_expedidor_conjuge'));
            $profissao_conjuge = filter_input(INPUT_POST, trim('profissao_conjuge'));
            $ass_cartorio_conjuge = filter_input(INPUT_POST, trim('ass_cartorio_conjuge'));
            $telefone_conjuge = filter_input(INPUT_POST, trim('telefone_conjuge'));
            $email_conjuge = filter_input(INPUT_POST, trim('email_conjuge'));

            if(empty($data_casamento)) {
                $data_casamento = '';
            }
            if(empty($d_expedicao_conjuge)) {
                $d_expedicao_conjuge = '';
            }

            if($nome && $cpf && $nascimento && $rg && $d_expedicao && $o_expedidor && $email_1 && $celular && $tipo_regime) {
                $data = Cliente::select()->where('cpf', $cpf)->execute();
                if(count($data) === 0) {
                    // CRIA A PASTA PARA ANEXAR DOCUMENTOS DO CLIENTE
                    mkdir('assets/arquivos/'.$this->limpaCPF_CNPJ($cpf));

                    Cliente::insert([
                        'nome' => $nome,
                        'cpf' => $this->limpaCPF_CNPJ($cpf),
                        'nacionalidade' => $nacionalidade,
                        'nascimento' => $nascimento,
                        'rg' => $rg,
                        'd_expedicao' => $d_expedicao,
                        'o_expedidor' => $o_expedidor,
                        'profissao' => $profissao,
                        'ass_cartorio' => $ass_cartorio,
                        'cep' => $cep,
                        'logradouro' => $logradouro,
                        'numero' => $numero,
                        'complemento' => $complemento,
                        'bairro' => $bairro,
                        'cidade' => $cidade,
                        'uf' => $uf,
                        'email_1' => $email_1,
                        'email_2' => $email_2,
                        'celular' => $celular,
                        'residencia' => $residencia,
                        'comercial' => $comercial,
                        'recado' => $recado,
                        'tipo_regime' => $tipo_regime,
                        'regime' => $regime,
                        'data_casamento' => $data_casamento,
                        'cartorio_casamento' => $cartorio_casamento,
                        'matricula_certidao' => $matricula_certidao,
                        'nome_conjuge' => $nome_conjuge,
                        'cpf_conjuge' => $this->limpaCPF_CNPJ($cpf_conjuge),
                        'nacionalidade_conjuge' => $nacionalidade_conjuge,
                        'nascimento_conjuge' => $nascimento_conjuge,
                        'rg_conjuge' => $rg_conjuge,
                        'd_expedicao_conjuge' => $d_expedicao_conjuge,
                        'o_expedidor_conjuge' => $o_expedidor_conjuge,
                        'profissao_conjuge' => $profissao_conjuge,
                        'ass_cartorio_conjuge' => $ass_cartorio_conjuge,
                        'telefone_conjuge' => $telefone_conjuge,
                        'email_conjuge' => $email_conjuge,
                    ])->execute();
                    $this->render('clientepf', [
                        'mensagem' => 'sucesso',
                    ]);
                    exit;
                }
            }
            $this->render('clientepf', [
                'mensagem' => 'error',
            ]);
        }
    }