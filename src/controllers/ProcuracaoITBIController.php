<?php
  namespace src\controllers;

  use \core\Controller;
  use \src\models\Processo;
  use \src\models\Compradore;
  use \src\models\Imovei;
  use \src\models\Cliente;
  use \src\models\PJCliente;
  use \PhpOffice\PhpWord\TemplateProcessor;

  class ProcuracaoITBIController extends Controller
  {
    public function index()
	{
		$this->render('procuracaoitbi');
	}

	public function addProcuracaoITBI()
	{
		$item_pesquisado = filter_input(INPUT_POST, trim('item_pesquisado'));

		$processo = Processo::select()->where('numero_processo', $item_pesquisado)->execute();
		$comprador = Compradore::select()->where('num_processo_comprador', $item_pesquisado)->execute();
        $imovel = Imovei::select()->where('matricula', $processo[0]['matricula_processo'])->execute();
        
		if(count($comprador) !== 0) {
            if(strlen($comprador[0]['cpf_cnpj_comprador']) === 11) {
                $dados_comprador = Cliente::select()->where('cpf', $comprador[0]['cpf_cnpj_comprador'])->execute();
                if($dados_comprador[0]['tipo_regime'] !== 'solteiro') {
                    $modelo_com_conjuge = new TemplateProcessor('assets/modelos/Modelo Procuracao ITBI Conjuge.docx');
                    
                    $modelo_com_conjuge->setValue('processo', $processo[0]['numero_processo']);
                    $modelo_com_conjuge->setValue('nome', $dados_comprador[0]['nome']);
                    
                    $nascimento = explode('-', $dados_comprador[0]['nascimento']);
                    $modelo_com_conjuge->setValue('dia_nasc', $nascimento[2]);
                    $modelo_com_conjuge->setValue('mes_nasc', $nascimento[1]);
                    $modelo_com_conjuge->setValue('ano_nasc', $nascimento[0]);

                    $modelo_com_conjuge->setValue('nacionalidade', $dados_comprador[0]['nacionalidade']);
                    $modelo_com_conjuge->setValue('profissao', $dados_comprador[0]['profissao']);
                    $modelo_com_conjuge->setValue('cpf', Controller::formataPessoa($dados_comprador[0]['cpf']));
                    $modelo_com_conjuge->setValue('tipo_regime', $dados_comprador[0]['tipo_regime']);
                    $modelo_com_conjuge->setValue('nome_conjuge', $dados_comprador[0]['nome_conjuge']);
                    $modelo_com_conjuge->setValue('nacionalidade_conjuge', $dados_comprador[0]['nacionalidade_conjuge']);
                    $modelo_com_conjuge->setValue('profissao_conjuge', $dados_comprador[0]['profissao_conjuge']);
                    $modelo_com_conjuge->setValue('cpf_conjuge', Controller::formataPessoa($dados_comprador[0]['cpf_conjuge']));
                    $modelo_com_conjuge->setValue('logradouro', $dados_comprador[0]['logradouro']);
                    $modelo_com_conjuge->setValue('numero', $dados_comprador[0]['numero']);

                    if(isset($dados_comprador[0]['complemento'])) {
                        $modelo_com_conjuge->setValue('complemento', ', '.$dados_comprador[0]['complemento']);
                    } else {
                        $modelo_com_conjuge->setValue('complemento', '');
                    }

                    $modelo_com_conjuge->setValue('bairro', $dados_comprador[0]['bairro']);
                    $modelo_com_conjuge->setValue('cep', Controller::formataCEP($dados_comprador[0]['cep']));
                    $modelo_com_conjuge->setValue('cidade', $dados_comprador[0]['cidade']);
                    $modelo_com_conjuge->setValue('uf', $dados_comprador[0]['uf']);

                    $modelo_com_conjuge->setValue('logradouro_imovel', $imovel[0]['logradouro']);
                    $modelo_com_conjuge->setValue('numero_imovel', $imovel[0]['numero']);

                    if(isset($imovel[0]['complemento'])) {
                        $modelo_com_conjuge->setValue('complemento_imovel', ', '.$imovel[0]['complemento']);
                    } else {
                        $modelo_com_conjuge->setValue('complemento_imovel', '');
                    }

                    $modelo_com_conjuge->setValue('bairro_imovel', $imovel[0]['bairro']);
                    $modelo_com_conjuge->setValue('matricula', $imovel[0]['matricula']);
                    $modelo_com_conjuge->setValue('cartorio', $imovel[0]['cartorio']);
                    $modelo_com_conjuge->setValue('iptu', $imovel[0]['iptu']);

                    $hoje = date('d/m/Y');
                    $data_atual = explode('/',$hoje);
                    $modelo_com_conjuge->setValue('dia', $data_atual[0]);
                    $modelo_com_conjuge->setValue('mes', Controller::formataMes($data_atual[1]));
                    $modelo_com_conjuge->setValue('ano', $data_atual[2]);

                    $modelo_com_conjuge->saveAs('assets/arquivos/Procuracao - '.$item_pesquisado.'.docx');
                    $this->redirect('procuracaoitbi');
                } else if(($dados_comprador[0]['tipo_regime'] === 'solteiro') && ($dados_comprador[0]['regime'] === 'u_estavel')) {
                    $modelo_com_conjuge = new TemplateProcessor('assets/modelos/Modelo Procuracao ITBI Conjuge.docx');
                    
                    $modelo_com_conjuge->setValue('processo', $processo[0]['numero_processo']);
                    $modelo_com_conjuge->setValue('nome', $dados_comprador[0]['nome']);
                    
                    $nascimento = explode('-', $dados_comprador[0]['nascimento']);
                    $modelo_com_conjuge->setValue('dia_nasc', $nascimento[2]);
                    $modelo_com_conjuge->setValue('mes_nasc', $nascimento[1]);
                    $modelo_com_conjuge->setValue('ano_nasc', $nascimento[0]);

                    $modelo_com_conjuge->setValue('nacionalidade', $dados_comprador[0]['nacionalidade']);
                    $modelo_com_conjuge->setValue('profissao', $dados_comprador[0]['profissao']);
                    $modelo_com_conjuge->setValue('cpf', Controller::formataPessoa($dados_comprador[0]['cpf']));

                    $modelo_com_conjuge->setValue('tipo_regime', 'união estável');

                    $modelo_com_conjuge->setValue('nome_conjuge', $dados_comprador[0]['nome_conjuge']);
                    $modelo_com_conjuge->setValue('nacionalidade_conjuge', $dados_comprador[0]['nacionalidade_conjuge']);
                    $modelo_com_conjuge->setValue('profissao_conjuge', $dados_comprador[0]['profissao_conjuge']);
                    $modelo_com_conjuge->setValue('cpf_conjuge', Controller::formataPessoa($dados_comprador[0]['cpf_conjuge']));
                    $modelo_com_conjuge->setValue('logradouro', $dados_comprador[0]['logradouro']);
                    $modelo_com_conjuge->setValue('numero', $dados_comprador[0]['numero']);

                    if(isset($dados_comprador[0]['complemento'])) {
                        $modelo_com_conjuge->setValue('complemento', ', '.$dados_comprador[0]['complemento']);
                    } else {
                        $modelo_com_conjuge->setValue('complemento', '');
                    }

                    $modelo_com_conjuge->setValue('bairro', $dados_comprador[0]['bairro']);
                    $modelo_com_conjuge->setValue('cep', Controller::formataCEP($dados_comprador[0]['cep']));
                    $modelo_com_conjuge->setValue('cidade', $dados_comprador[0]['cidade']);
                    $modelo_com_conjuge->setValue('uf', $dados_comprador[0]['uf']);

                    $modelo_com_conjuge->setValue('logradouro_imovel', $imovel[0]['logradouro']);
                    $modelo_com_conjuge->setValue('numero_imovel', $imovel[0]['numero']);

                    if(isset($imovel[0]['complemento'])) {
                        $modelo_com_conjuge->setValue('complemento_imovel', ', '.$imovel[0]['complemento']);
                    } else {
                        $modelo_com_conjuge->setValue('complemento_imovel', '');
                    }

                    $modelo_com_conjuge->setValue('bairro_imovel', $imovel[0]['bairro']);
                    $modelo_com_conjuge->setValue('matricula', $imovel[0]['matricula']);
                    $modelo_com_conjuge->setValue('cartorio', $imovel[0]['cartorio']);
                    $modelo_com_conjuge->setValue('iptu', $imovel[0]['iptu']);

                    $hoje = date('d/m/Y');
                    $data_atual = explode('/',$hoje);
                    $modelo_com_conjuge->setValue('dia', $data_atual[0]);
                    $modelo_com_conjuge->setValue('mes', Controller::formataMes($data_atual[1]));
                    $modelo_com_conjuge->setValue('ano', $data_atual[2]);

                    $modelo_com_conjuge->saveAs('assets/arquivos/Procuracao - '.$item_pesquisado.'.docx');
                    $this->redirect('procuracaoitbi');
                } else {
                    $modelo_sem_conjuge = new TemplateProcessor('assets/modelos/Modelo Procuracao ITBI.docx');
                    
                    $modelo_sem_conjuge->setValue('processo', $processo[0]['numero_processo']);
                    $modelo_sem_conjuge->setValue('nome', $dados_comprador[0]['nome']);
                    
                    $nascimento = explode('-', $dados_comprador[0]['nascimento']);
                    $modelo_sem_conjuge->setValue('dia_nasc', $nascimento[2]);
                    $modelo_sem_conjuge->setValue('mes_nasc', $nascimento[1]);
                    $modelo_sem_conjuge->setValue('ano_nasc', $nascimento[0]);

                    $modelo_sem_conjuge->setValue('nacionalidade', $dados_comprador[0]['nacionalidade']);
                    $modelo_sem_conjuge->setValue('profissao', $dados_comprador[0]['profissao']);
                    $modelo_sem_conjuge->setValue('cpf', Controller::formataPessoa($dados_comprador[0]['cpf']));
                    $modelo_sem_conjuge->setValue('tipo_regime', $dados_comprador[0]['tipo_regime']);
                    $modelo_sem_conjuge->setValue('logradouro', $dados_comprador[0]['logradouro']);
                    $modelo_sem_conjuge->setValue('numero', $dados_comprador[0]['numero']);

                    if(isset($dados_comprador[0]['complemento'])) {
                        $modelo_sem_conjuge->setValue('complemento', ', '.$dados_comprador[0]['complemento']);
                    } else {
                        $modelo_sem_conjuge->setValue('complemento', '');
                    }

                    $modelo_sem_conjuge->setValue('bairro', $dados_comprador[0]['bairro']);
                    $modelo_sem_conjuge->setValue('cep', Controller::formataCEP($dados_comprador[0]['cep']));
                    $modelo_sem_conjuge->setValue('cidade', $dados_comprador[0]['cidade']);
                    $modelo_sem_conjuge->setValue('uf', $dados_comprador[0]['uf']);

                    $modelo_sem_conjuge->setValue('logradouro_imovel', $imovel[0]['logradouro']);
                    $modelo_sem_conjuge->setValue('numero_imovel', $imovel[0]['numero']);

                    if(isset($imovel[0]['complemento'])) {
                        $modelo_sem_conjuge->setValue('complemento_imovel', ', '.$imovel[0]['complemento']);
                    } else {
                        $modelo_sem_conjuge->setValue('complemento_imovel', '');
                    }

                    $modelo_sem_conjuge->setValue('bairro_imovel', $imovel[0]['bairro']);
                    $modelo_sem_conjuge->setValue('matricula', $imovel[0]['matricula']);
                    $modelo_sem_conjuge->setValue('cartorio', $imovel[0]['cartorio']);
                    $modelo_sem_conjuge->setValue('iptu', $imovel[0]['iptu']);

                    $hoje = date('d/m/Y');
                    $data_atual = explode('/',$hoje);
                    $modelo_sem_conjuge->setValue('dia', $data_atual[0]);
                    $modelo_sem_conjuge->setValue('mes', Controller::formataMes($data_atual[1]));
                    $modelo_sem_conjuge->setValue('ano', $data_atual[2]);

                    $modelo_sem_conjuge->saveAs('assets/arquivos/Procuracao - '.$item_pesquisado.'.docx');
                    $this->redirect('procuracaoitbi');
                }
            } else if(strlen($comprador[0]['cpf_cnpj_comprador']) === 14) {
                $dados_comprador_pj = PJCliente::select()->where('cnpj', $comprador[0]['cpf_cnpj_comprador'])->execute();

                $modelo_pj = new TemplateProcessor('assets/modelos/Modelo Procuracao ITBI Pessoa Juridica.docx');
                    
                $modelo_pj->setValue('processo', $processo[0]['numero_processo']);
                $modelo_pj->setValue('razao_social', $dados_comprador_pj[0]['razao_social']);
                $modelo_pj->setValue('cnpj', $dados_comprador_pj[0]['cnpj']);
                $modelo_pj->setValue('logradouro', $dados_comprador_pj[0]['logradouro']);
                $modelo_pj->setValue('numero', $dados_comprador_pj[0]['numero']);

                if(isset($dados_comprador_pj[0]['complemento'])) {
                    $modelo_pj->setValue('complemento', ', '.$dados_comprador_pj[0]['complemento']);
                } else {
                    $modelo_pj->setValue('complemento', '');
                }

                $modelo_pj->setValue('bairro', $dados_comprador_pj[0]['bairro']);
                $modelo_pj->setValue('cep', Controller::formataCEP($dados_comprador_pj[0]['cep']));
                $modelo_pj->setValue('cidade', $dados_comprador_pj[0]['cidade']);
                $modelo_pj->setValue('uf', $dados_comprador_pj[0]['uf']);

                $modelo_pj->setValue('nome_socio', $dados_comprador_pj[0]['nome_socio_1']);
                
                $nascimento = explode('-', $dados_comprador_pj[0]['nascimento_socio_1']);
                $modelo_pj->setValue('dia_nasc', $nascimento[2]);
                $modelo_pj->setValue('mes_nasc', $nascimento[1]);
                $modelo_pj->setValue('ano_nasc', $nascimento[0]);

                $modelo_pj->setValue('nacionalidade_socio', $dados_comprador_pj[0]['nacionalidade_socio_1']);
                $modelo_pj->setValue('estado_civil_socio', $dados_comprador_pj[0]['estado_civil_socio_1']);
                $modelo_pj->setValue('profissao_socio', $dados_comprador_pj[0]['profissao_socio_1']);
                $modelo_pj->setValue('cpf_socio', Controller::formataPessoa($dados_comprador_pj[0]['cpf_socio_1']));
                $modelo_pj->setValue('logradouro_socio', $dados_comprador_pj[0]['logradouro_socio_1']);
                $modelo_pj->setValue('numero_socio', $dados_comprador_pj[0]['numero_socio_1']);

                if(isset($dados_comprador_pj[0]['complemento_socio_1'])) {
                    $modelo_pj->setValue('complemento_socio', ', '.$dados_comprador_pj[0]['complemento_socio_1']);
                } else {
                    $modelo_pj->setValue('complemento_socio', '');
                }

                $modelo_pj->setValue('bairro_socio', $dados_comprador_pj[0]['bairro_socio_1']);
                $modelo_pj->setValue('cep_socio', Controller::formataCEP($dados_comprador_pj[0]['cep_socio_1']));
                $modelo_pj->setValue('cidade_socio', $dados_comprador_pj[0]['cidade_socio_1']);
                $modelo_pj->setValue('uf_socio', $dados_comprador_pj[0]['uf_socio_1']);

                $modelo_pj->setValue('logradouro_imovel', $imovel[0]['logradouro']);
                $modelo_pj->setValue('numero_imovel', $imovel[0]['numero']);

                if(isset($imovel[0]['complemento'])) {
                    $modelo_pj->setValue('complemento_imovel', ', '.$imovel[0]['complemento']);
                } else {
                    $modelo_pj->setValue('complemento_imovel', '');
                }

                $modelo_pj->setValue('bairro_imovel', $imovel[0]['bairro']);
                $modelo_pj->setValue('matricula', $imovel[0]['matricula']);
                $modelo_pj->setValue('cartorio', $imovel[0]['cartorio']);
                $modelo_pj->setValue('iptu', $imovel[0]['iptu']);

                $hoje = date('d/m/Y');
                $data_atual = explode('/',$hoje);
                $modelo_pj->setValue('dia', $data_atual[0]);
                $modelo_pj->setValue('mes', Controller::formataMes($data_atual[1]));
                $modelo_pj->setValue('ano', $data_atual[2]);

                $modelo_pj->saveAs('assets/arquivos/Procuracao - '.$item_pesquisado.'.docx');
                $this->redirect('procuracaoitbi');
            }
		}
	}
  }
?>