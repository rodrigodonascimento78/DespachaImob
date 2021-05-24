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
            $nome = filter_input(INPUT_POST, 'nome');
            $cpf = filter_input(INPUT_POST, 'cpf');
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
            $nascimento = filter_input(INPUT_POST, 'nascimento');
            $rg = filter_input(INPUT_POST, 'rg');
            $d_expedicao = filter_input(INPUT_POST, 'd_expedicao');
            $o_expedidor = filter_input(INPUT_POST, 'o_expedidor');
            $profissao = filter_input(INPUT_POST, 'profissao');
            $ass_cartorio = filter_input(INPUT_POST, 'ass_cartorio');
            $cep = filter_input(INPUT_POST, 'cep');
            $logradouro = filter_input(INPUT_POST, 'logradouro');
            $numero = filter_input(INPUT_POST, 'numero');
            $complemento = filter_input(INPUT_POST, 'complemento');
            $bairro = filter_input(INPUT_POST, 'bairro');
            $cidade = filter_input(INPUT_POST, 'cidade');
            $uf = filter_input(INPUT_POST, 'uf');
            $email_1 = filter_input(INPUT_POST, 'email_1', FILTER_VALIDATE_EMAIL);
            $email_2 = filter_input(INPUT_POST, 'email_2');
            $celular = filter_input(INPUT_POST, 'celular');
            $residencia = filter_input(INPUT_POST, 'residencia');
            $comercial = filter_input(INPUT_POST, 'comercial');
            $recado = filter_input(INPUT_POST, 'recado');
            $tipo_regime = filter_input(INPUT_POST, 'tipo_regime');
            $regime = filter_input(INPUT_POST, 'regime');
            $data_casamento = filter_input(INPUT_POST, 'data_casamento');
            $cartorio_casamento = filter_input(INPUT_POST, 'cartorio_casamento');
            $matricula_certidao = filter_input(INPUT_POST, 'matricula_certidao');
            $nome_conjuge = filter_input(INPUT_POST, 'nome_conjuge');
            $cpf_conjuge = filter_input(INPUT_POST, 'cpf_conjuge');
            $nacionalidade_conjuge = filter_input(INPUT_POST, 'nacionalidade_conjuge');
            $nascimento_conjuge = filter_input(INPUT_POST, 'nascimento_conjuge');
            $rg_conjuge = filter_input(INPUT_POST, 'rg_conjuge');
            $d_expedicao_conjuge = filter_input(INPUT_POST, 'd_expedicao_conjuge');
            $o_expedidor_conjuge = filter_input(INPUT_POST, 'o_expedidor_conjuge');
            $profissao_conjuge = filter_input(INPUT_POST, 'profissao_conjuge');
            $ass_cartorio_conjuge = filter_input(INPUT_POST, 'ass_cartorio_conjuge');

            if($data_casamento === "") {
                $data_casamento = '';
            }
            if($d_expedicao_conjuge === '') {
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
                    ])->execute();
                    $this->render('clientepf', [
                        'divinit' => '<div class="alert alert-success text-center conteudo_mensagem">',
                        'mensagem' => 'Cadastro realizado com sucesso!',
                        'divfim' => '</div>',
                    ]);
                    exit;
                }
            }
            $this->render('clientepf', [
                'divinit' => '<div class="alert alert-danger text-center conteudo_mensagem">',
                'mensagem' => 'Cadastro não foi realizado, pois já existe na base de dados',
                'divfim' => '</div>',
            ]);
        }
    }
?>  