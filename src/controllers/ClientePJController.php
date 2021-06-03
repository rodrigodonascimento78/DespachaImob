<?php
    namespace src\controllers;

    use \core\Controller;
use core\Model;
use \src\models\PJCliente;
    
    class ClientePJController extends Controller
    {
        public function add()
        {
            $this->render('clientepj');
        }

        public function addAction()
        {
            $razao_social = filter_input(INPUT_POST, trim('razao_social'));
            $nome_fantasia = filter_input(INPUT_POST, trim('nome_fantasia'));
            $cnpj = filter_input(INPUT_POST, trim('cnpj'));
            $insc_estadual = filter_input(INPUT_POST, trim('insc_estadual'));
            $data_abertura = filter_input(INPUT_POST, trim('data_abertura'));
            $cep = filter_input(INPUT_POST, trim('cep'));
            $logradouro = filter_input(INPUT_POST, trim('logradouro'));
            $numero = filter_input(INPUT_POST, trim('numero'));
            $complemento = filter_input(INPUT_POST, trim('complemento'));
            $bairro = filter_input(INPUT_POST, trim('bairro'));
            $cidade = filter_input(INPUT_POST, trim('cidade'));
            $uf = filter_input(INPUT_POST, trim('uf'));
            $email_1 = filter_input(INPUT_POST, trim('email_1'), FILTER_VALIDATE_EMAIL);
            $email_2 = filter_input(INPUT_POST, trim('email_2'));
            $telefone_1 = filter_input(INPUT_POST, trim('telefone_1'));
            $telefone_2 = filter_input(INPUT_POST, trim('telefone_2'));
            $nome_socio_1 = filter_input(INPUT_POST, trim('nome_socio_1'));
            $cpf_socio_1 = filter_input(INPUT_POST, trim('cpf_socio_1'));
            $nacionalidade_socio_1 = filter_input(INPUT_POST, trim('nacionalidade_socio_1'));
            $nascimento_socio_1 = filter_input(INPUT_POST, trim('nascimento_socio_1'));
            $rg_socio_1 = filter_input(INPUT_POST, trim('rg_socio_1'));
            $d_expedicao_socio_1 = filter_input(INPUT_POST, trim('d_expedicao_socio_1'));
            $o_expedidor_socio_1 = filter_input(INPUT_POST, trim('o_expedidor_socio_1'));
            $cep_socio_1 = filter_input(INPUT_POST, trim('cep_socio_1'));
            $logradouro_socio_1 = filter_input(INPUT_POST, trim('logradouro_socio_1'));
            $numero_socio_1 = filter_input(INPUT_POST, trim('numero_socio_1'));
            $complemento_socio_1 = filter_input(INPUT_POST, trim('complemento_socio_1'));
            $bairro_socio_1 = filter_input(INPUT_POST, trim('bairro_socio_1'));
            $cidade_socio_1 = filter_input(INPUT_POST, trim('cidade_socio_1'));
            $uf_socio_1 = filter_input(INPUT_POST, trim('uf_socio_1'));
            $profissao_socio_1 = filter_input(INPUT_POST, trim('profissao_socio_1'));
            $ass_cartorio_socio_1 = filter_input(INPUT_POST, trim('ass_cartorio_socio_1'));
            $estado_civil_socio_1 = filter_input(INPUT_POST, trim('estado_civil_socio_1'));
            $celular_socio_1 = filter_input(INPUT_POST, trim('celular_socio_1'));
            $email_socio_1 = filter_input(INPUT_POST, trim('email_socio_1'));
            $nome_socio_2 = filter_input(INPUT_POST, trim('nome_socio_2'));
            $cpf_socio_2 = filter_input(INPUT_POST, trim('cpf_socio_2'));
            $nacionalidade_socio_2 = filter_input(INPUT_POST, trim('nacionalidade_socio_2'));
            $nascimento_socio_2 = filter_input(INPUT_POST, trim('nascimento_socio_2'));
            $rg_socio_2 = filter_input(INPUT_POST, trim('rg_socio_2'));
            $d_expedicao_socio_2 = filter_input(INPUT_POST, trim('d_expedicao_socio_2'));
            $o_expedidor_socio_2 = filter_input(INPUT_POST, trim('o_expedidor_socio_2'));
            $cep_socio_2 = filter_input(INPUT_POST, trim('cep_socio_2'));
            $logradouro_socio_2 = filter_input(INPUT_POST, trim('logradouro_socio_2'));
            $numero_socio_2 = filter_input(INPUT_POST, trim('numero_socio_2'));
            $complemento_socio_2 = filter_input(INPUT_POST, trim('complemento_socio_2'));
            $bairro_socio_2 = filter_input(INPUT_POST, trim('bairro_socio_2'));
            $cidade_socio_2 = filter_input(INPUT_POST, trim('cidade_socio_2'));
            $uf_socio_2 = filter_input(INPUT_POST, trim('uf_socio_2'));
            $profissao_socio_2 = filter_input(INPUT_POST, trim('profissao_socio_2'));
            $ass_cartorio_socio_2 = filter_input(INPUT_POST, trim('ass_cartorio_socio_2'));
            $estado_civil_socio_2 = filter_input(INPUT_POST, trim('estado_civil_socio_2'));
            $celular_socio_2 = filter_input(INPUT_POST, trim('celular_socio_2'));
            $email_socio_2 = filter_input(INPUT_POST, trim('email_socio_2'));
            $nome_socio_3 = filter_input(INPUT_POST, trim('nome_socio_3'));
            $cpf_socio_3 = filter_input(INPUT_POST, trim('cpf_socio_3'));
            $nacionalidade_socio_3 = filter_input(INPUT_POST, trim('nacionalidade_socio_3'));
            $nascimento_socio_3 = filter_input(INPUT_POST, trim('nascimento_socio_3'));
            $rg_socio_3 = filter_input(INPUT_POST, trim('rg_socio_3'));
            $d_expedicao_socio_3 = filter_input(INPUT_POST, trim('d_expedicao_socio_3'));
            $o_expedidor_socio_3 = filter_input(INPUT_POST, trim('o_expedidor_socio_3'));
            $cep_socio_3 = filter_input(INPUT_POST, trim('cep_socio_3'));
            $logradouro_socio_3 = filter_input(INPUT_POST, trim('logradouro_socio_3'));
            $numero_socio_3 = filter_input(INPUT_POST, trim('numero_socio_3'));
            $complemento_socio_3 = filter_input(INPUT_POST, trim('complemento_socio_3'));
            $bairro_socio_3 = filter_input(INPUT_POST, trim('bairro_socio_3'));
            $cidade_socio_3 = filter_input(INPUT_POST, trim('cidade_socio_3'));
            $uf_socio_3 = filter_input(INPUT_POST, trim('uf_socio_3'));
            $profissao_socio_3 = filter_input(INPUT_POST, trim('profissao_socio_3'));
            $ass_cartorio_socio_3 = filter_input(INPUT_POST, trim('ass_cartorio_socio_3'));
            $estado_civil_socio_3 = filter_input(INPUT_POST, trim('estado_civil_socio_3'));
            $celular_socio_3 = filter_input(INPUT_POST, trim('celular_socio_3'));
            $email_socio_3 = filter_input(INPUT_POST, trim('email_socio_3'));
            $nome_socio_4 = filter_input(INPUT_POST, trim('nome_socio_4'));
            $cpf_socio_4 = filter_input(INPUT_POST, trim('cpf_socio_4'));
            $nacionalidade_socio_4 = filter_input(INPUT_POST, trim('nacionalidade_socio_4'));
            $nascimento_socio_4 = filter_input(INPUT_POST, trim('nascimento_socio_4'));
            $rg_socio_4 = filter_input(INPUT_POST, trim('rg_socio_4'));
            $d_expedicao_socio_4 = filter_input(INPUT_POST, trim('d_expedicao_socio_4'));
            $o_expedidor_socio_4 = filter_input(INPUT_POST, trim('o_expedidor_socio_4'));
            $cep_socio_4 = filter_input(INPUT_POST, trim('cep_socio_4'));
            $logradouro_socio_4 = filter_input(INPUT_POST, trim('logradouro_socio_4'));
            $numero_socio_4 = filter_input(INPUT_POST, trim('numero_socio_4'));
            $complemento_socio_4 = filter_input(INPUT_POST, trim('complemento_socio_4'));
            $bairro_socio_4 = filter_input(INPUT_POST, trim('bairro_socio_4'));
            $cidade_socio_4 = filter_input(INPUT_POST, trim('cidade_socio_4'));
            $uf_socio_4 = filter_input(INPUT_POST, trim('uf_socio_4'));
            $profissao_socio_4 = filter_input(INPUT_POST, trim('profissao_socio_4'));
            $ass_cartorio_socio_4 = filter_input(INPUT_POST, trim('ass_cartorio_socio_4'));
            $estado_civil_socio_4 = filter_input(INPUT_POST, trim('estado_civil_socio_4'));
            $celular_socio_4 = filter_input(INPUT_POST, trim('celular_socio_4'));
            $email_socio_4 = filter_input(INPUT_POST, trim('email_socio_4'));

            if($razao_social && $cnpj && $insc_estadual && $data_abertura && $email_1 && $telefone_1 && $nome_socio_1 && $cpf_socio_1 && $nacionalidade_socio_1 && $profissao_socio_1 && $estado_civil_socio_1) {
                $data = PJCliente::select()->where('cnpj', $cnpj)->execute();
                if(count($data) === 0) {
                    // CRIA PASTA PARA ANEXAR DOCUMENTOS DO CLIENTE PJ
                    mkdir('assets/arquivos/'.$this->limpaCPF_CNPJ($cnpj));

                    PJCliente::insert()->values([
                        'razao_social' => $razao_social, 
                        'nome_fantasia' => $nome_fantasia,
                        'cnpj' => $this->limpaCPF_CNPJ($cnpj),
                        'insc_estadual' => $insc_estadual,
                        'data_abertura' => $data_abertura,
                        'cep' => $cep,
                        'logradouro' => $logradouro,
                        'numero' => $numero,
                        'complemento' => $complemento,
                        'bairro' => $bairro,
                        'cidade' => $cidade,
                        'uf' => $uf,
                        'email_1' => $email_1,
                        'email_2' => $email_2,
                        'telefone_1' => $telefone_1,
                        'telefone_2' => $telefone_2,
                        'nome_socio_1' => $nome_socio_1,
                        'cpf_socio_1' => $this->limpaCPF_CNPJ($cpf_socio_1),
                        'nacionalidade_socio_1' => $nacionalidade_socio_1,
                        'nascimento_socio_1' => $nascimento_socio_1,
                        'rg_socio_1' => $rg_socio_1,
                        'd_expedicao_socio_1' => $d_expedicao_socio_1,
                        'o_expedidor_socio_1' => $o_expedidor_socio_1,
                        'cep_socio_1' => $cep_socio_1,
                        'logradouro_socio_1' => $logradouro_socio_1,
                        'numero_socio_1' => $numero_socio_1,
                        'complemento_socio_1' => $complemento_socio_1,
                        'bairro_socio_1' => $bairro_socio_1,
                        'cidade_socio_1' => $cidade_socio_1,
                        'uf_socio_1' => $uf_socio_1,
                        'profissao_socio_1' => $profissao_socio_1,
                        'ass_cartorio_socio_1' => $ass_cartorio_socio_1,
                        'estado_civil_socio_1' => $estado_civil_socio_1,
                        'celular_socio_1' => $celular_socio_1,
                        'email_socio_1' => $email_socio_1,
                        'nome_socio_2' => $nome_socio_2,
                        'cpf_socio_2' => $this->limpaCPF_CNPJ($cpf_socio_2),
                        'nacionalidade_socio_2' => $nacionalidade_socio_2,
                        'nascimento_socio_2' => $nascimento_socio_2,
                        'rg_socio_2' => $rg_socio_2,
                        'd_expedicao_socio_2' => $d_expedicao_socio_2,
                        'o_expedidor_socio_2' => $o_expedidor_socio_2,
                        'cep_socio_2' => $cep_socio_2,
                        'logradouro_socio_2' => $logradouro_socio_2,
                        'numero_socio_2' => $numero_socio_2,
                        'complemento_socio_2' => $complemento_socio_2,
                        'bairro_socio_2' => $bairro_socio_2,
                        'cidade_socio_2' => $cidade_socio_2,
                        'uf_socio_2' => $uf_socio_2,
                        'profissao_socio_2' => $profissao_socio_2,
                        'ass_cartorio_socio_2' => $ass_cartorio_socio_2,
                        'estado_civil_socio_2' => $estado_civil_socio_2,
                        'celular_socio_2' => $celular_socio_2,
                        'email_socio_2' => $email_socio_2,
                        'nome_socio_3' => $nome_socio_3,
                        'cpf_socio_3' => $this->limpaCPF_CNPJ($cpf_socio_3),
                        'nacionalidade_socio_3' => $nacionalidade_socio_3,
                        'nascimento_socio_3' => $nascimento_socio_3,
                        'rg_socio_3' => $rg_socio_3,
                        'd_expedicao_socio_3' => $d_expedicao_socio_3,
                        'o_expedidor_socio_3' => $o_expedidor_socio_3,
                        'cep_socio_3' => $cep_socio_3,
                        'logradouro_socio_3' => $logradouro_socio_3,
                        'numero_socio_3' => $numero_socio_3,
                        'complemento_socio_3' => $complemento_socio_3,
                        'bairro_socio_3' => $bairro_socio_3,
                        'cidade_socio_3' => $cidade_socio_3,
                        'uf_socio_3' => $uf_socio_3,
                        'profissao_socio_3' => $profissao_socio_3,
                        'ass_cartorio_socio_3' => $ass_cartorio_socio_3,
                        'estado_civil_socio_3' => $estado_civil_socio_3,
                        'celular_socio_3' => $celular_socio_3,
                        'email_socio_3' => $email_socio_3,
                        'nome_socio_4' => $nome_socio_4,
                        'cpf_socio_4' => $this->limpaCPF_CNPJ($cpf_socio_4),
                        'nacionalidade_socio_4' => $nacionalidade_socio_4,
                        'nascimento_socio_4' => $nascimento_socio_4,
                        'rg_socio_4' => $rg_socio_4,
                        'd_expedicao_socio_4' => $d_expedicao_socio_4,
                        'o_expedidor_socio_4' => $o_expedidor_socio_4,
                        'cep_socio_4' => $cep_socio_4,
                        'logradouro_socio_4' => $logradouro_socio_4,
                        'numero_socio_4' => $numero_socio_4,
                        'complemento_socio_4' => $complemento_socio_4,
                        'bairro_socio_4' => $bairro_socio_4,
                        'cidade_socio_4' => $cidade_socio_4,
                        'uf_socio_4' => $uf_socio_4,
                        'profissao_socio_4' => $profissao_socio_4,
                        'ass_cartorio_socio_4' => $ass_cartorio_socio_4,
                        'estado_civil_socio_4' => $estado_civil_socio_4,
                        'celular_socio_4' => $celular_socio_4,
                        'email_socio_4' => $email_socio_4,
                    ])->execute();
                    
                    $this->render('clientepj', [
                        'divinit' => '<div class="alert alert-success text-center conteudo_mensagem">',
                        'mensagem' => 'Cadastro realizado com sucesso!',
                        'divfim' => '</div>',
                    ]);
                    exit;
                }
            }
            $this->render('clientepj', [
                'divinit' => '<div class="alert alert-danger text-center conteudo_mensagem">',
                'mensagem' => 'Cadastro não foi realizado, pois já existe na base de dados',
                'divfim' => '</div>',
            ]);
        }
    }
?>