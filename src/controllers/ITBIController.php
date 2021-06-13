<?php
  namespace src\controllers;

  use \core\Controller;
  use \src\models\Processo;
  use \src\models\Compradore;
  use \src\models\Compradores_Procuradore;
  use \src\models\Vendedore;
  use \src\models\Vendedores_Procuradore;
  use \src\models\Imovei;
  use \src\models\Cliente;
  use \src\models\PJCliente;
  use \PhpOffice\PhpWord\PhpWord;
  use \PhpOffice\PhpWord\TemplateProcessor;
  use \PhpOffice\PhpWord\IOFactory;

  class ITBIController extends Controller
  {
    public function index()
    {
      $this->render('itbi');
    }

    public function addITBI()
    {
        $item_pesquisado = trim(filter_input(INPUT_POST, trim('item_pesquisado')));
		$percentual = filter_input(INPUT_POST, trim('percentual'));
		$fase = filter_input(INPUT_POST, trim('fase'));
		$natureza = filter_input(INPUT_POST, trim('natureza'));
		$natureza_especificar = filter_input(INPUT_POST, trim('natureza_especificar'));
		$dt_transacao = filter_input(INPUT_POST, trim('dt_transacao'));
		$contrato = filter_input(INPUT_POST, trim('contrato'));
		$tipo_contrato = filter_input(INPUT_POST, trim('tipo_contrato'));
		$outro_especificar = filter_input(INPUT_POST, trim('outro_especificar'));
		$f_pagamento = filter_input(INPUT_POST, trim('f_pagamento'));
		$parcelas = filter_input(INPUT_POST, trim('parcelas'));

        // CARREGA O MODELO DO DOCUMENTO (ITBI)
        $modelo = new TemplateProcessor('assets/modelos/Modelo ITBI.docx');
      
		// COMPRADOR
        $comprador = Compradore::select()->where('num_processo_comprador', $item_pesquisado)->execute();
        if(count($comprador) === 1) {
          foreach($comprador as $dados) {
			if(strlen($dados['cpf_cnpj_comprador']) === 11) {
				$comprador_pf = Cliente::select()->where('cpf', $dados['cpf_cnpj_comprador'])->execute();
				if(count($comprador_pf) !== 0) {
					foreach($comprador_pf as $dados) {
						$modelo->setValue('a_nome', $dados['nome']);
						
						if(strlen($dados['cpf_conjuge']) !== '') {
							$modelo->setValue('a_outro', 'X');
						} else {
							$modelo->setValue('a_outro', '');
						}
						
						$modelo->setValue('a_endereco', $dados['logradouro']);
						$modelo->setValue('a_numero', $dados['numero']);

						if(strlen($dados['complemento']) !== '') {
							$modelo->setValue('a_complemento', $dados['complemento']);
						} else {
							$modelo->setValue('a_complemento', '');
						}

						$modelo->setValue('a_bairro', $dados['bairro']);
						$modelo->setValue('a_cep', Controller::formataCEP($dados['cep']));
						$modelo->setValue('a_cidade', $dados['cidade']);
						$modelo->setValue('a_telefone', $dados['celular']);
						$modelo->setValue('a_cpf', Controller::formataPessoa($dados['cpf']));

						$email = str_split($dados['email_1']);
						$a = 1;
						foreach($email as $dados) {
							$modelo->setValue('a_'.$a, $dados);
							$a++;
						}
						
						for($a; $a < 36; $a++) {
							$modelo->setValue('a_'.$a, '');
						}
					}
				}
			} else if(strlen($dados['cpf_cnpj_comprador']) === 14) {
				$comprador_pj = PJCliente::select()->where('cnpj', $dados['cpf_cnpj_comprador'])->execute();
				if(count($comprador_pj) !== 0) {
					foreach($comprador_pj as $dados) {
						$modelo->setValue('a_nome', $dados['razao_social']);
						$modelo->setValue('a_outro', '');
						$modelo->setValue('a_endereco', $dados['logradouro']);
						$modelo->setValue('a_numero', $dados['numero']);

						if(strlen($dados['complemento']) !== '') {
							$modelo->setValue('a_complemento', $dados['complemento']);
						} else {
							$modelo->setValue('a_complemento', '');
						}

						$modelo->setValue('a_bairro', $dados['bairro']);
						$modelo->setValue('a_cep', Controller::formataCEP($dados['cep']));
						$modelo->setValue('a_cidade', $dados['cidade']);
						$modelo->setValue('a_telefone', $dados['telefone_1']);
						$modelo->setValue('a_cpf', Controller::formataPessoa($dados['cnpj']));

						$email = str_split($dados['email_1']);
						$a = 1;
						foreach($email as $dados) {
							$modelo->setValue('a_'.$a, $dados);
							$a++;
						}
						
						for($a; $a < 36; $a++) {
							$modelo->setValue('a_'.$a, '');
						}

					}
				}
			}
          }
        } else if(count($comprador) > 1) {
			foreach($comprador as $dados) {
				if(strlen($comprador[0]['cpf_cnpj_comprador']) === 11) {
					$comprador_pf = Cliente::select()->where('cpf', $dados['cpf_cnpj_comprador'])->execute();
					if(count($comprador_pf) !== 0) {
						foreach($comprador_pf as $dados) {
							$modelo->setValue('a_nome', $comprador_pf[0]['nome']);
							$modelo->setValue('a_outro', 'X');
							$modelo->setValue('a_endereco', $comprador_pf[0]['logradouro']);
							$modelo->setValue('a_numero', $comprador_pf[0]['numero']);
							
							if(strlen($comprador_pf[0]['complemento']) !== '') {
								$modelo->setValue('a_complemento', $comprador_pf[0]['complemento']);
							} else {
								$modelo->setValue('a_complemento', '');
							}

							$modelo->setValue('a_bairro', $comprador_pf[0]['bairro']);
							$modelo->setValue('a_cep', Controller::formataCEP($comprador_pf[0]['cep']));
							$modelo->setValue('a_cidade', $comprador_pf[0]['cidade']);
							$modelo->setValue('a_telefone', $comprador_pf[0]['celular']);
							$modelo->setValue('a_cpf', Controller::formataPessoa($comprador_pf[0]['cpf']));

							$email = str_split($comprador_pf[0]['email_1']);
							$a = 1;
							foreach($email as $dados) {
								$modelo->setValue('a_'.$a, $dados);
								$a++;
							}
							
							for($a; $a < 36; $a++) {
								$modelo->setValue('a_'.$a, '');
							}
						}
					}
				} else if(strlen($comprador[0]['cpf_cnpj_comprador']) === 14) {
					$comprador_pj = PJCliente::select()->where('cpf', $dados['cpf_cnpj_comprador'])->execute();
					if(count($comprador_pj) !== 0) {
						foreach($comprador_pj as $dados) {
							$modelo->setValue('a_nome', $comprador_pj[0]['razao_social']);
							$modelo->setValue('a_outro', 'X');
							$modelo->setValue('a_endereco', $comprador_pj[0]['logradouro']);
							$modelo->setValue('a_numero', $comprador_pj[0]['numero']);
							
							if(strlen($comprador_pj[0]['complemento']) !== '') {
								$modelo->setValue('a_complemento', $comprador_pj[0]['complemento']);
							} else {
								$modelo->setValue('a_complemento', '');
							}

							$modelo->setValue('a_bairro', $comprador_pj[0]['bairro']);
							$modelo->setValue('a_cep', Controller::formataCEP($comprador_pj[0]['cep']));
							$modelo->setValue('a_cidade', $comprador_pj[0]['cidade']);
							$modelo->setValue('a_telefone', $comprador_pj[0]['telefone_1']);
							$modelo->setValue('a_cpf', Controller::formataPessoa($comprador_pj[0]['cnpj']));

							$email = str_split($comprador_pj[0]['email_1']);
							$a = 1;
							foreach($email as $dados) {
								$modelo->setValue('a_'.$a, $dados);
								$a++;
							}
							
							for($a; $a < 36; $a++) {
								$modelo->setValue('a_'.$a, '');
							}
						}
					}
				}
			}
		}

		// VENDEDOR
        $vendedor = Vendedore::select()->where('num_processo_vendedor', $item_pesquisado)->execute();
        if(count($vendedor) === 1) {
          foreach($vendedor as $dados) {
			if(strlen($dados['cpf_cnpj_vendedor']) === 11) {
				$vendedor_pf = Cliente::select()->where('cpf', $dados['cpf_cnpj_vendedor'])->execute();
				if(count($vendedor_pf) !== 0) {
					foreach($vendedor_pf as $dados) {
						$modelo->setValue('v_nome', $dados['nome']);
						
						if(strlen($dados['cpf_conjuge']) !== '') {
							$modelo->setValue('v_outro', 'X');
						} else {
							$modelo->setValue('v_outro', '');
						}
						
						$modelo->setValue('v_endereco', $dados['logradouro']);
						$modelo->setValue('v_numero', $dados['numero']);

						if(strlen($dados['complemento']) !== '') {
							$modelo->setValue('v_complemento', $dados['complemento']);
						} else {
							$modelo->setValue('v_complemento', '');
						}

						$modelo->setValue('v_bairro', $dados['bairro']);
						$modelo->setValue('v_cep', Controller::formataCEP($dados['cep']));
						$modelo->setValue('v_cidade', $dados['cidade']);
						$modelo->setValue('v_telefone', $dados['celular']);
						$modelo->setValue('v_cpf', Controller::formataPessoa($dados['cpf']));

						$email = str_split($dados['email_1']);
						$a = 1;
						foreach($email as $dados) {
							$modelo->setValue('v_'.$a, $dados);
							$a++;
						}
						
						for($a; $a < 36; $a++) {
							$modelo->setValue('v_'.$a, '');
						}
					}
				}
			} else if(strlen($dados['cpf_cnpj_vendedor']) === 14) {
				$vendedor_pj = PJCliente::select()->where('cnpj', $dados['cpf_cnpj_vendedor'])->execute();
				if(count($vendedor_pj) !== 0) {
					foreach($vendedor_pj as $dados) {
						$modelo->setValue('v_nome', $dados['razao_social']);
						$modelo->setValue('v_outro', '');
						$modelo->setValue('v_endereco', $dados['logradouro']);
						$modelo->setValue('v_numero', $dados['numero']);

						if(strlen($dados['complemento']) !== '') {
							$modelo->setValue('v_complemento', $dados['complemento']);
						} else {
							$modelo->setValue('v_complemento', '');
						}

						$modelo->setValue('v_bairro', $dados['bairro']);
						$modelo->setValue('v_cep', Controller::formataCEP($dados['cep']));
						$modelo->setValue('v_cidade', $dados['cidade']);
						$modelo->setValue('v_telefone', $dados['telefone_1']);
						$modelo->setValue('v_cpf', Controller::formataPessoa($dados['cnpj']));

						$email = str_split($dados['email_1']);
						$a = 1;
						foreach($email as $dados) {
							$modelo->setValue('v_'.$a, $dados);
							$a++;
						}
						
						for($a; $a < 36; $a++) {
							$modelo->setValue('v_'.$a, '');
						}

					}
				}
			}
          }
        } else if(count($vendedor) > 1) {
			foreach($vendedor as $dados) {
				if(strlen($vendedor[0]['cpf_cnpj_vendedor']) === 11) {
					$vendedor_pf = Cliente::select()->where('cpf', $dados['cpf_cnpj_vendedor'])->execute();
					if(count($vendedor_pf) !== 0) {
						foreach($vendedor_pf as $dados) {
							$modelo->setValue('v_nome', $vendedor_pf[0]['nome']);
							$modelo->setValue('v_outro', 'X');
							$modelo->setValue('v_endereco', $vendedor_pf[0]['logradouro']);
							$modelo->setValue('v_numero', $vendedor_pf[0]['numero']);
							
							if(strlen($vendedor_pf[0]['complemento']) !== '') {
								$modelo->setValue('v_complemento', $vendedor_pf[0]['complemento']);
							} else {
								$modelo->setValue('v_complemento', '');
							}

							$modelo->setValue('v_bairro', $vendedor_pf[0]['bairro']);
							$modelo->setValue('v_cep', Controller::formataCEP($vendedor_pf[0]['cep']));
							$modelo->setValue('v_cidade', $vendedor_pf[0]['cidade']);
							$modelo->setValue('v_telefone', $vendedor_pf[0]['celular']);
							$modelo->setValue('v_cpf', Controller::formataPessoa($vendedor_pf[0]['cpf']));

							$email = str_split($vendedor_pf[0]['email_1']);
							$a = 1;
							foreach($email as $dados) {
								$modelo->setValue('v_'.$a, $dados);
								$a++;
							}
							
							for($a; $a < 36; $a++) {
								$modelo->setValue('v_'.$a, '');
							}
						}
					}
				} else if(strlen($vendedor[0]['cpf_cnpj_vendedor']) === 14) {
					$vendedor_pj = PJCliente::select()->where('cpf', $dados['cpf_cnpj_vendedor'])->execute();
					if(count($vendedor_pj) !== 0) {
						foreach($vendedor_pj as $dados) {
							$modelo->setValue('v_nome', $vendedor_pj[0]['razao_social']);
							$modelo->setValue('v_outro', 'X');
							$modelo->setValue('v_endereco', $vendedor_pj[0]['logradouro']);
							$modelo->setValue('v_numero', $vendedor_pj[0]['numero']);
							
							if(strlen($vendedor_pj[0]['complemento']) !== '') {
								$modelo->setValue('v_complemento', $vendedor_pj[0]['complemento']);
							} else {
								$modelo->setValue('v_complemento', '');
							}

							$modelo->setValue('v_bairro', $vendedor_pj[0]['bairro']);
							$modelo->setValue('v_cep', Controller::formataCEP($vendedor_pj[0]['cep']));
							$modelo->setValue('v_cidade', $vendedor_pj[0]['cidade']);
							$modelo->setValue('v_telefone', $vendedor_pj[0]['telefone_1']);
							$modelo->setValue('v_cpf', Controller::formataPessoa($vendedor_pj[0]['cnpj']));

							$email = str_split($vendedor_pj[0]['email_1']);
							$a = 1;
							foreach($email as $dados) {
								$modelo->setValue('v_'.$a, $dados);
								$a++;
							}
							
							for($a; $a < 36; $a++) {
								$modelo->setValue('v_'.$a, '');
							}
						}
					}
				}
			}
		}

		// IMÓVEL
		$imovel = Processo::select()->where('numero_processo', $item_pesquisado)->execute();
		foreach($imovel as $dados) {
			$dados_imovel = Imovei::select()->where('matricula', $dados['matricula_processo'])->execute();
			foreach($dados_imovel as $values) {
				$modelo->setValue('i_iptu', Controller::formataIPTU($values['iptu']));
				$modelo->setValue('i_percentual', trim($percentual));
				$modelo->setValue('i_endereco', $values['logradouro']);
				$modelo->setValue('i_numero', $values['numero']);
				
				if(strlen($values['numero']) !== '') {
					$modelo->setValue('i_complemento', $values['complemento']);
				} else {
					$modelo->setValue('i_numero', '');
				}

				$modelo->setValue('i_bairro', $values['bairro']);
				$modelo->setValue('i_fase', $fase);
			}
		}

		// DADOS DA TRANSMISSÃO / CESSÃO
		if($natureza === 'compra') {
			$modelo->setValue('compra', 'X');
			$modelo->setValue('cessao', '');
			$modelo->setValue('outra', '');
			$modelo->setValue('especificar', '');
		} else if($natureza === 'cessao') {
			$modelo->setValue('compra', '');
			$modelo->setValue('cessao', 'X');
			$modelo->setValue('outra', '');
			$modelo->setValue('especificar', '');
		} else if($natureza === 'outra') {
			$modelo->setValue('compra', '');
			$modelo->setValue('cessao', '');
			$modelo->setValue('outra', 'X');
			$modelo->setValue('especificar', $natureza_especificar);
		}
		
		$modelo->setValue('valor', $values['v_venda']);
		$modelo->setValue('extenso', Controller::converte($values['v_venda']));

		if($contrato === 'sim') {
			$modelo->setValue('sim', 'X');
			$modelo->setValue('nao', '');
		} else if($contrato === 'nao') {
			$modelo->setValue('sim', '');
			$modelo->setValue('nao', 'X');
		} else {
			$modelo->setValue('sim', '');
			$modelo->setValue('nao', '');
		}

		$transacao = explode('-', $dt_transacao);
		$modelo->setValue('dia', $transacao[2]);
		$modelo->setValue('mes', $transacao[1]);
		$modelo->setValue('ano', $transacao[0]);

		if($tipo_contrato === 'promessa') {
			$modelo->setValue('promessa', 'X');
			$modelo->setValue('contrato', '');
			$modelo->setValue('outro', '');
			$modelo->setValue('outro_especificar', '');
		} else if($tipo_contrato === 'contrato') {
			$modelo->setValue('promessa', '');
			$modelo->setValue('contrato', 'X');
			$modelo->setValue('outro', '');
			$modelo->setValue('outro_especificar', '');
		} else if($tipo_contrato === 'outro') {
			$modelo->setValue('promessa', '');
			$modelo->setValue('contrato', '');
			$modelo->setValue('outro', 'X');
			$modelo->setValue('outro_especificar', $outro_especificar);
		}

		// FORMA DE PAGAMENTO
		if($f_pagamento === 'avista') {
			$modelo->setValue('avista', 'X');
			$modelo->setValue('parcela', '');
			$modelo->setValue('parcelas', '');
		} else if($f_pagamento === 'parcelado') {
			$modelo->setValue('avista', '');
			$modelo->setValue('parcela', 'X');
			$modelo->setValue('parcelas', $parcelas);
		}

        $modelo->saveAs('assets/arquivos/ITBI - '.$item_pesquisado.'.docx');
		$this->redirect('itbi');
    }

	public function indexProcuracaoITBI()
	{
		$this->render('procuracaoitbi');
	}

	public function addProcuracaoITBI()
	{
		$item_pesquisado = filter_input(INPUT_POST, trim('item_pesquisado'));

		$processo = Processo::select()->where('numero_processo', $item_pesquisado)->execute();
		$comprador = Compradore::select()->where('num_processo_comprador', $item_pesquisado)->execute();

		if(count($comprador) !== 0) {
			if($comprador[0]['cpf_conjuge']) {
				$modelo_sem_conjuge = new TemplateProcessor('assets/modelos/Modelo Procuracao ITBI Conjuge.docx');
				
				$modelo_sem_conjuge->setValue('processo', $processo[0]['numero_processo']);

				$modelo_sem_conjuge->save('assets/arquivos/Procuracao -'.$item_pesquisado.'.docx');
				$this->redirect('procuracaoitbi');
			}
		}
	}
  }