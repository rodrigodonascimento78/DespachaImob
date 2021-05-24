<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\PJCliente;

    class EditaClienteController extends Controller
    {
        public function index()
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
            $email_1 = filter_input(INPUT_POST, 'email_1');
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

            // PESSOA JURIDICA
            $razao_social = filter_input(INPUT_POST, 'razao_social');
            $nome_fantasia = filter_input(INPUT_POST, 'nome_fantasia');
            $cnpj = filter_input(INPUT_POST, 'cnpj');
            $insc_estadual = filter_input(INPUT_POST, 'insc_estadual');
            $data_abertura = filter_input(INPUT_POST, 'data_abertura');
            $cep = filter_input(INPUT_POST, 'cep');
            $logradouro = filter_input(INPUT_POST, 'logradouro');
            $numero = filter_input(INPUT_POST, 'numero');
            $complemento = filter_input(INPUT_POST, 'complemento');
            $bairro = filter_input(INPUT_POST, 'bairro');
            $cidade = filter_input(INPUT_POST, 'cidade');
            $uf = filter_input(INPUT_POST, 'uf');
            $email_1 = filter_input(INPUT_POST, 'email_1');
            $email_2 = filter_input(INPUT_POST, 'email_2');
            $telefone_1 = filter_input(INPUT_POST, 'telefone_1');
            $telefone_2 = filter_input(INPUT_POST, 'telefone_2');
            $estado_civil_socio_1 = filter_input(INPUT_POST, 'estado_civil_socio_1');
            $nome_socio_1 = filter_input(INPUT_POST, 'nome_socio_1');
            $cpf_socio_1 = filter_input(INPUT_POST, 'cpf_socio_1');
            $nacionalidade_socio_1 = filter_input(INPUT_POST, 'nacionalidade_socio_1');
            $nascimento_socio_1 = filter_input(INPUT_POST, 'nascimento_socio_1');
            $rg_socio_1 = filter_input(INPUT_POST, 'rg_socio_1');
            $d_expedicao_socio_1 = filter_input(INPUT_POST, 'd_expedicao_socio_1');
            $o_expedidor_socio_1 = filter_input(INPUT_POST, 'o_expedidor_socio_1');
            $cep_socio_1 = filter_input(INPUT_POST, 'cep_socio_1');
            $logradouro_socio_1 = filter_input(INPUT_POST, 'logradouro_socio_1');
            $numero_socio_1 = filter_input(INPUT_POST, 'numero_socio_1');
            $complemento_socio_1 = filter_input(INPUT_POST, 'complemento_socio_1');
            $bairro_socio_1 = filter_input(INPUT_POST, 'bairro_socio_1');
            $cidade_socio_1 = filter_input(INPUT_POST, 'cidade_socio_1');
            $uf_socio_1 = filter_input(INPUT_POST, 'uf_socio_1');
            $profissao_socio_1 = filter_input(INPUT_POST, 'profissao_socio_1');
            $ass_cartorio_socio_1 = filter_input(INPUT_POST, 'ass_cartorio_socio_1');
            $celular_socio_1 = filter_input(INPUT_POST, 'celular_socio_1');
            $email_socio_1 = filter_input(INPUT_POST, 'email_socio_1');
            $estado_civil_socio_2 = filter_input(INPUT_POST, 'estado_civil_socio_2');
            $nome_socio_2 = filter_input(INPUT_POST, 'nome_socio_2');
            $cpf_socio_2 = filter_input(INPUT_POST, 'cpf_socio_2');
            $nacionalidade_socio_2 = filter_input(INPUT_POST, 'nacionalidade_socio_2');
            $nascimento_socio_2 = filter_input(INPUT_POST, 'nascimento_socio_2');
            $rg_socio_2 = filter_input(INPUT_POST, 'rg_socio_2');
            $d_expedicao_socio_2 = filter_input(INPUT_POST, 'd_expedicao_socio_2');
            $o_expedidor_socio_2 = filter_input(INPUT_POST, 'o_expedidor_socio_2');
            $cep_socio_2 = filter_input(INPUT_POST, 'cep_socio_2');
            $logradouro_socio_2 = filter_input(INPUT_POST, 'logradouro_socio_2');
            $numero_socio_2 = filter_input(INPUT_POST, 'numero_socio_2');
            $complemento_socio_2 = filter_input(INPUT_POST, 'complemento_socio_2');
            $bairro_socio_2 = filter_input(INPUT_POST, 'bairro_socio_2');
            $cidade_socio_2 = filter_input(INPUT_POST, 'cidade_socio_2');
            $uf_socio_2 = filter_input(INPUT_POST, 'uf_socio_2');
            $profissao_socio_2 = filter_input(INPUT_POST, 'profissao_socio_2');
            $ass_cartorio_socio_2 = filter_input(INPUT_POST, 'ass_cartorio_socio_2');
            $celular_socio_2 = filter_input(INPUT_POST, 'celular_socio_2');
            $email_socio_2 = filter_input(INPUT_POST, 'email_socio_2');
            $estado_civil_socio_3 = filter_input(INPUT_POST, 'estado_civil_socio_3');
            $nome_socio_3 = filter_input(INPUT_POST, 'nome_socio_3');
            $cpf_socio_3 = filter_input(INPUT_POST, 'cpf_socio_3');
            $nacionalidade_socio_3 = filter_input(INPUT_POST, 'nacionalidade_socio_3');
            $nascimento_socio_3 = filter_input(INPUT_POST, 'nascimento_socio_3');
            $rg_socio_3 = filter_input(INPUT_POST, 'rg_socio_3');
            $d_expedicao_socio_3 = filter_input(INPUT_POST, 'd_expedicao_socio_3');
            $o_expedidor_socio_3 = filter_input(INPUT_POST, 'o_expedidor_socio_3');
            $cep_socio_3 = filter_input(INPUT_POST, 'cep_socio_3');
            $logradouro_socio_3 = filter_input(INPUT_POST, 'logradouro_socio_3');
            $numero_socio_3 = filter_input(INPUT_POST, 'numero_socio_3');
            $complemento_socio_3 = filter_input(INPUT_POST, 'complemento_socio_3');
            $bairro_socio_3 = filter_input(INPUT_POST, 'bairro_socio_3');
            $cidade_socio_3 = filter_input(INPUT_POST, 'cidade_socio_3');
            $uf_socio_3 = filter_input(INPUT_POST, 'uf_socio_3');
            $profissao_socio_3 = filter_input(INPUT_POST, 'profissao_socio_3');
            $ass_cartorio_socio_3 = filter_input(INPUT_POST, 'ass_cartorio_socio_3');
            $celular_socio_3 = filter_input(INPUT_POST, 'celular_socio_3');
            $email_socio_3 = filter_input(INPUT_POST, 'email_socio_3');
            $estado_civil_socio_4 = filter_input(INPUT_POST, 'estado_civil_socio_4');
            $nome_socio_4 = filter_input(INPUT_POST, 'nome_socio_4');
            $cpf_socio_4 = filter_input(INPUT_POST, 'cpf_socio_4');
            $nacionalidade_socio_4 = filter_input(INPUT_POST, 'nacionalidade_socio_4');
            $nascimento_socio_4 = filter_input(INPUT_POST, 'nascimento_socio_4');
            $rg_socio_4 = filter_input(INPUT_POST, 'rg_socio_4');
            $d_expedicao_socio_4 = filter_input(INPUT_POST, 'd_expedicao_socio_4');
            $o_expedidor_socio_4 = filter_input(INPUT_POST, 'o_expedidor_socio_4');
            $cep_socio_4 = filter_input(INPUT_POST, 'cep_socio_4');
            $logradouro_socio_4 = filter_input(INPUT_POST, 'logradouro_socio_4');
            $numero_socio_4 = filter_input(INPUT_POST, 'numero_socio_4');
            $complemento_socio_4 = filter_input(INPUT_POST, 'complemento_socio_4');
            $bairro_socio_4 = filter_input(INPUT_POST, 'bairro_socio_4');
            $cidade_socio_4 = filter_input(INPUT_POST, 'cidade_socio_4');
            $uf_socio_4 = filter_input(INPUT_POST, 'uf_socio_4');
            $profissao_socio_4 = filter_input(INPUT_POST, 'profissao_socio_4');
            $ass_cartorio_socio_4 = filter_input(INPUT_POST, 'ass_cartorio_socio_4');
            $celular_socio_4 = filter_input(INPUT_POST, 'celular_socio_4');
            $email_socio_4 = filter_input(INPUT_POST, 'email_socio_4');

            if(isset($cpf)) {
                Cliente::update()
                ->set([
                    'nome' => $nome,
                    'cpf' => $cpf,
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
                    'cpf_conjuge' => $cpf_conjuge,
                    'nacionalidade_conjuge' => $nacionalidade_conjuge,
                    'nascimento_conjuge' => $nascimento_conjuge,
                    'rg_conjuge' => $rg_conjuge,
                    'd_expedicao_conjuge' => $d_expedicao_conjuge,
                    'o_expedidor_conjuge' => $o_expedidor_conjuge,
                    'profissao_conjuge' => $profissao_conjuge,
                    'ass_cartorio_conjuge' => $ass_cartorio_conjuge,
                ])
                ->where('cpf', $cpf)->execute();

                $this->redirect('pesquisa');
            }
            if(isset($cnpj)) {
                PJCliente::update()
                ->set([
                    'razao_social' => $razao_social,
                    'nome_fantasia' => $nome_fantasia,
                    'cnpj' => $cnpj,
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
                    'cpf_socio_1' => $cpf_socio_1,
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
                    'estado_civil_socio_1' => $estado_civil_socio_1,
                    'ass_cartorio_socio_1' => $ass_cartorio_socio_1,
                    'celular_socio_1' => $celular_socio_1,
                    'email_socio_1' => $email_socio_1,
                    'nome_socio_2' => $nome_socio_2,
                    'cpf_socio_2' => $cpf_socio_2,
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
                    'estado_civil_socio_2' => $estado_civil_socio_2,
                    'ass_cartorio_socio_2' => $ass_cartorio_socio_2,
                    'celular_socio_2' => $celular_socio_2,
                    'email_socio_2' => $email_socio_2,
                    'nome_socio_3' => $nome_socio_3,
                    'cpf_socio_3' => $cpf_socio_3,
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
                    'estado_civil_socio_3' => $estado_civil_socio_3,
                    'ass_cartorio_socio_3' => $ass_cartorio_socio_3,
                    'celular_socio_3' => $celular_socio_3,
                    'email_socio_3' => $email_socio_3,
                    'nome_socio_4' => $nome_socio_4,
                    'cpf_socio_4' => $cpf_socio_4,
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
                    'estado_civil_socio_4' => $estado_civil_socio_4,
                    'ass_cartorio_socio_4' => $ass_cartorio_socio_4,
                    'celular_socio_4' => $celular_socio_4,
                    'email_socio_4' => $email_socio_4,
                ])->where('cnpj', $cnpj)->execute();

                $this->redirect('pesquisa');
            }

        }
    }
?>