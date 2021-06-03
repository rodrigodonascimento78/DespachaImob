<?php
    namespace src\controllers;

    use \core\Controller;
    use \Mpdf\Mpdf;
    use \src\models\Processo;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;
    use \src\models\Imovei;
    use \src\models\Cliente;
    use \src\models\PJCliente;

class EspelhoController extends Controller
    {
        public function index()
        {
            $this->render('espelho');
        }

        public function addEspelho()
        {
            $item_pesquisado = filter_input(INPUT_POST, trim('item_pesquisado'));
            $dados_processo = [];
            $dados_comprador_pf = [];
            $dados_comprador_pj = [];
            $dados_proc_comprador = [];
            $dados_vendedor_pf = [];
            $dados_vendedor_pj = [];
            $dados_proc_vendedor = [];

            // PROCESSO
            $processo = Processo::select()->where('numero_processo', $item_pesquisado)->execute();
            if(count($processo) !== 0) {
                foreach($processo as $dados) {
                    array_push($dados_processo, $dados);
                }
            }

            $mpdf = new Mpdf();
            $css = file_get_contents('C:/xampp/htdocs/Despachaimob/public/assets/css/espelho.css');
            // CABEÇALHO DO ESPELHO
            $html = '<div class="container">
                        <div class="inicio_processo">
                            <div>INÍCIO: '. Controller::formataData($processo[0]['data_cadastro_processo']) .'</div>
                        </div><!-- inicio_processo -->
                        <div class="cabecalho_espelho">
                            <div class="logo_espelho">
                                <img src="C:/xampp/htdocs/Despachaimob/public/assets/images/logo_Original_J_Freitas.png">
                            </div>
                            <div class="cabecalho_texto">
                                <div class="freitas"><strong>J.FREITAS</strong> CRECI nº <strong>12.535</strong> - 4ª REGIÃO/MG</div>
                                <div class="corretor"><strong>CORRETOR</strong> de Imóveis / <strong>DESPACHANTE</strong> Imobiliário</div>
                                <div class="fones">Fones: <strong>(32) 9-8808-0821 e CLÁUDIO (32) 9-8855-0458</strong></div>
                            </div>
                            <div class="cabecalho_processo">
                                <span class="numero">NÚMERO</span>
                                <span class="num_processo">'. $processo[0]["numero_processo"] .'</span>
                                <span class="indica">' .$processo[0]["indicacao"] .'</span>
                            </div>
                        </div><!-- Cabeçalho Espelho -->
                
                        <div class="endereco_espelho">
                            <span>ENDEREÇO: Rua Halfeld, 414 sala 5100 (Ec. Antigo Banco Mineiro da Produção) JF / MG</span>
                        </div>
                        <div class="processo_compradores">
                            <div class="dados_pessoais_compradores">';
            // COMPRADOR
            $comprador = Compradore::select()->where('num_processo_comprador', $item_pesquisado)->execute();
            if(count($comprador) !== 0) {
                foreach($comprador as $values) {
                    if(strlen($values['cpf_cnpj_comprador']) === 11) {
                        $campos_comprador_pf = Cliente::select()->where('cpf', $values['cpf_cnpj_comprador'])->execute();
                        foreach($campos_comprador_pf as $dados) {
                            array_push($dados_comprador_pf, $dados);
                        }
                    }
                    if(strlen($values['cpf_cnpj_comprador']) === 14) {
                        $campos_comprador_pj = PJCliente::select()->where('cnpj', $values['cpf_cnpj_comprador'])->execute();
                        foreach($campos_comprador_pj as $dados) {
                            array_push($dados_comprador_pj, $dados);
                        }
                    }
                }
            }
            // COMPRADOR PESSOA FÍSICA
            if(isset($dados_comprador_pf)) {
                foreach($dados_comprador_pf as $dados) {
                    $html .= '<table class="comprador">
                                <thead>
                                    <tr>
                                        <th colspan="9" class="espelho">COMPRADOR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="labels nome_label">Nome:</td>
                                        <td colspan="5" class="info-importantes destaque">'. $dados["nome"] .'</td>
                                        <td class="labels">CPF:</td>
                                        <td class="info-importantes destaque">'. Controller::formataPessoa($dados["cpf"]) .'</td>
                                    </tr>
                                    <tr>
                                    <td class="labels">Nacionalidade:</td>
                                    <td class="info-importantes">'. $dados["nacionalidade"] .'</td>
                                    <td class="labels">Profissão:</td>
                                    <td colspan="3" class="info-importantes profissao">'. $dados["profissao"] .'</td>
                                    <td class="labels">Nasc.:</td>
                                    <td class="info-importantes">'.Controller::formataData($dados["nascimento"]) .'</td>
                                    </tr>
                                    <tr>
                                    <td class="labels">Dat Casamento:</td>
                                    <td class="info-importantes">'. Controller::formataData($dados["data_casamento"]) .'</td>
                                    <td class="labels">Est. Civíl:</td>
                                    <td colspan="3" class="info-importantes">'. $dados["tipo_regime"] . '/' . $dados['regime'] .'</td>
                                    <td class="labels">União Estável:</td>
                                    <td class="info-importantes">'. Controller::formataRegime($dados['regime']) .'</td>
                                    </tr>
                                    <tr>
                                        <td class="labels">RG:</td>
                                        <td class="info-importantes">'. $dados['rg'] .'</td>
                                        <td class="labels">Exped. em:</td>
                                        <td class="info-importantes">'. Controller::formataData($dados['d_expedicao']) .'</td>
                                        <td class="labels">Org. Exp.:</td>
                                        <td colspan="3" class="info-importantes">'. $dados['o_expedidor'] .'</td>
                                    </tr>
                                    <tr>
                                        <td class="labels">Ass. Cartório:</td>
                                        <td colspan="8" class="info-importantes">'. $dados['ass_cartorio'] .'</td>
                                    </tr>
                                </tbody>
                            </table>';

                    // CÔNJUGE COMPRADOR
                    if($dados["cpf_conjuge"] !== '' && $dados["cpf_conjuge"] !== NULL) {
                        $html .= '<table class="conjuge_comprador">
                                    <thead>
                                        <tr>
                                            <th colspan="9" class="espelho">Comprador/CÔNJUGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="labels nome_label">Nome:</td>
                                            <td colspan="5" class="info-importantes destaque">'. $dados["nome_conjuge"] .'</td>
                                            <td class="labels">CPF:</td>
                                            <td class="info-importantes destaque">'. Controller::formataPessoa($dados["cpf_conjuge"]) .'</td>
                                        </tr>
                                        <tr>
                                        <td class="labels">Nacionalidade:</td>
                                        <td class="info-importantes">'. $dados["nacionalidade_conjuge"] .'</td>
                                        <td class="labels">Profissão:</td>
                                        <td colspan="3" class="info-importantes profissao">'. $dados["profissao_conjuge"] .'</td>
                                        <td class="labels">Nasc.:</td>
                                        <td class="info-importantes">'.Controller::formataData($dados["nascimento_conjuge"]) .'</td>
                                        </tr>
                                        <tr>
                                        <td class="labels">Dat Casamento:</td>
                                        <td class="info-importantes">'. Controller::formataData($dados["data_casamento"]) .'</td>
                                        <td class="labels">Est. Civíl:</td>
                                        <td colspan="3" class="info-importantes">'. $dados["tipo_regime"] . '/' . $dados['regime'] .'</td>
                                        <td class="labels">União Estável:</td>
                                        <td class="info-importantes">'. Controller::formataRegime($dados['regime']) .'</td>
                                        </tr>
                                        <tr>
                                            <td class="labels">RG:</td>
                                            <td class="info-importantes">'. $dados['rg_conjuge'] .'</td>
                                            <td class="labels">Exped. em:</td>
                                            <td class="info-importantes">'. Controller::formataData($dados['d_expedicao_conjuge']) .'</td>
                                            <td class="labels">Org. Exp.:</td>
                                            <td colspan="3" class="info-importantes">'. $dados['o_expedidor_conjuge'] .'</td>
                                        </tr>
                                        <tr>
                                            <td class="labels">Ass. Cartório:</td>
                                            <td colspan="7" class="info-importantes">'. $dados['ass_cartorio_conjuge'] .'</td>
                                        </tr>
                                    </tbody>
                                </table>';
                    }

                    // ENDEREÇO COMPRADOR
                    $html .= '<table class="endereco">
                        <thead>
                            <tr>
                                <th colspan="9" class="espelho">ENDEREÇO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels nome_label">Endereço:</td>
                                <td colspan="5" class="info-importantes">'. $dados['logradouro'] .'</td>
                                <td class="labels">Número:</td>
                                <td colspan="2" class="info-importantes">'. $dados['numero'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Bairro:</td>
                                <td colspan="4" class="info-importantes">'. $dados['bairro'] .'</td>
                                <td class="labels nome_label">Complemento:</td>
                                <td colspan="3" class="info-importantes">'. $dados['complemento'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">CEP:</td>
                                <td colspan="3" class="info-importantes">'. Controller::formataCEP($dados['cep']) .'</td>
                                <td class="labels">Cidade/UF:</td>
                                <td colspan="4" class="info-importantes">'. $dados['cidade'] . ' / ' . $dados['uf'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Celular:</td>
                                <td class="info-importantes">'. $dados['celular'] .'</td>
                                <td class="labels">Comercial:</td>
                                <td class="info-importantes">'. $dados['comercial'] .'</td>
                                <td class="labels">E-mail:</td>
                                <td colspan="4" class="info-importantes">'. $dados['email_1'] .'</td>
                            </tr>
                        </tbody>
                    </table>';
                }
            }
            
            //  COMPRADOR PESSOA JURÍDICA
            if($dados_comprador_pj) {
                foreach($dados_comprador_pj as $dados) {
                    $html .= '<table class="comprador-pj">
                        <thead>
                            <tr>
                                <th colspan="9" class="espelho">COMPRADOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels razao_label">Razão Social:</td>
                                <td colspan="6" class="info-importantes destaque">'. $dados['razao_social'] .'</td>
                                <td class="labels">CNPJ:</td>
                                <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cnpj']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Endereço:</td>
                                <td colspan="8" class="info-importantes">'. $dados['logradouro'] . ', ' . $dados['numero'] . ' ' . $dados['complemento'] . ' ' . $dados['birro'] . ' - CEP ' . $dados['cep'] . ' - ' . $dados['cidade'] . ' / ' . $dados['uf'] .'</td>
                            </tr>
                        </tbody>
                    </table>';
                    
                    // SÓCIO 1
                    $html .= '<table class="socio">
                        <thead>
                            <tr>
                                <th colspan="9" class="espelho">Comprador/SÓCIO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels razao_label">Nome:</td>
                                <td colspan="6" class="info-importantes destaque">'. $dados['nome_socio_1'] .'</td>
                                <td class="labels">CPF:</td>
                                <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf_socio_1']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels razao_label">Nacionalidade:</td>
                                <td class="info-importantes">'. $dados['nacionalidade_socio_1'] .'</td>
                                <td class="labels">Profissão:</td>
                                <td colspan="4" class="info-importantes">'. $dados['profissao_socio_1'] .'</td>
                                <td class="labels">Est. Civíl:</td>
                                <td class="info-importantes">'. $dados['estado_civil_socio_1'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Nascimento:</td>
                                <td class="info-importantes">'. Controller::formataData($dados['nascimento_socio_1']) .'</td>
                                <td class="labels">RG:</td>
                                <td colspan="2" class="info-importantes">'. $dados['rg_socio_1'] .'</td>
                                <td class="labels">Org. Expd.:</td>
                                <td class="info-importantes">'. $dados['o_expedidor_socio_1'] .'</td>
                                <td class="labels">Dt. Expd.:</td>
                                <td class="info-importantes">'. $dados['d_expedicao_socio_1'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Endereço:</td>
                                <td colspan="8" class="info-importantes">'. $dados['logradouro_socio_1'] . ', ' . $dados['numero_socio_1'] . ' ' . $dados['complemento_socio_1'] . ' ' . $dados['birro_socio_1'] . ' - CEP ' . Controller::formataCEP($dados['cep_socio_1']) . ' - ' . $dados['cidade_socio_1'] . ' / ' . $dados['uf_socio_1'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Telefone:</td>
                                <td colspan="2" class="info-importantes">'. $dados['celular_socio_1'] .'</td>
                                <td class="labels">E-mail:</td>
                                <td colspan="5" class="info-importantes">'. $dados['email_socio_1'] .'</td>
                            </tr>
                        </tbody>
                    </table>';

                    // SÓCIO 2
                    if($dados['cpf_socio_2'] !== '') {
                        $html .= '<table class="socio">
                            <thead>
                                <tr>
                                    <th colspan="9" class="espelho">Comprador/SÓCIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="labels razao_label">Nome:</td>
                                    <td colspan="6" class="info-importantes destaque">'. $dados['nome_socio_2'] .'</td>
                                    <td class="labels">CPF:</td>
                                    <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf_socio_2']) .'</td>
                                </tr>
                                <tr>
                                    <td class="labels razao_label">Nacionalidade:</td>
                                    <td class="info-importantes">'. $dados['nacionalidade_socio_2'] .'</td>
                                    <td class="labels">Profissão:</td>
                                    <td colspan="4" class="info-importantes">'. $dados['profissao_socio_2'] .'</td>
                                    <td class="labels">Est. Civíl:</td>
                                    <td class="info-importantes">'. $dados['estado_civil_socio_2'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Nascimento:</td>
                                    <td class="info-importantes">'. Controller::formataData($dados['nascimento_socio_2']) .'</td>
                                    <td class="labels">RG:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['rg_socio_2'] .'</td>
                                    <td class="labels">Org. Expd.:</td>
                                    <td class="info-importantes">'. $dados['o_expedidor_socio_2'] .'</td>
                                    <td class="labels">Dt. Expd.:</td>
                                    <td class="info-importantes">'. $dados['d_expedicao_socio_2'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Endereço:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['logradouro_socio_2'] . ', ' . $dados['numero_socio_2'] . ' ' . $dados['complemento_socio_2'] . ' ' . $dados['birro_socio_2'] . ' - CEP ' . Controller::formataCEP($dados['cep_socio_2']) . ' - ' . $dados['cidade_socio_2'] . ' / ' . $dados['uf_socio_2'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Telefone:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['celular_socio_2'] .'</td>
                                    <td class="labels">E-mail:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['email_socio_2'] .'</td>
                                </tr>
                            </tbody>
                        </table>';
                    }

                    // SÓCIO 3
                    if($dados['cpf_socio_3'] !== '') {
                        $html .= '<table class="socio">
                            <thead>
                                <tr>
                                    <th colspan="9" class="espelho">Comprador/SÓCIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="labels razao_label">Nome:</td>
                                    <td colspan="6" class="info-importantes destaque">'. $dados['nome_socio_3'] .'</td>
                                    <td class="labels">CPF:</td>
                                    <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf_socio_3']) .'</td>
                                </tr>
                                <tr>
                                    <td class="labels razao_label">Nacionalidade:</td>
                                    <td class="info-importantes">'. $dados['nacionalidade_socio_3'] .'</td>
                                    <td class="labels">Profissão:</td>
                                    <td colspan="4" class="info-importantes">'. $dados['profissao_socio_3'] .'</td>
                                    <td class="labels">Est. Civíl:</td>
                                    <td class="info-importantes">'. $dados['estado_civil_socio_3'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Nascimento:</td>
                                    <td class="info-importantes">'. Controller::formataData($dados['nascimento_socio_3']) .'</td>
                                    <td class="labels">RG:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['rg_socio_3'] .'</td>
                                    <td class="labels">Org. Expd.:</td>
                                    <td class="info-importantes">'. $dados['o_expedidor_socio_3'] .'</td>
                                    <td class="labels">Dt. Expd.:</td>
                                    <td class="info-importantes">'. $dados['d_expedicao_socio_3'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Endereço:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['logradouro_socio_3'] . ', ' . $dados['numero_socio_3'] . ' ' . $dados['complemento_socio_3'] . ' ' . $dados['birro_socio_3'] . ' - CEP ' . Controller::formataCEP($dados['cep_socio_3']) . ' - ' . $dados['cidade_socio_3'] . ' / ' . $dados['uf_socio_3'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Telefone:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['celular_socio_3'] .'</td>
                                    <td class="labels">E-mail:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['email_socio_3'] .'</td>
                                </tr>
                            </tbody>
                        </table>';
                    }

                    // SÓCIO 4
                    if($dados['cpf_socio_4'] !== '') {
                        $html .= '<table class="socio">
                            <thead>
                                <tr>
                                    <th colspan="9" class="espelho">Comprador/SÓCIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="labels razao_label">Nome:</td>
                                    <td colspan="6" class="info-importantes destaque">'. $dados['nome_socio_4'] .'</td>
                                    <td class="labels">CPF:</td>
                                    <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf_socio_4']) .'</td>
                                </tr>
                                <tr>
                                    <td class="labels razao_label">Nacionalidade:</td>
                                    <td class="info-importantes">'. $dados['nacionalidade_socio_4'] .'</td>
                                    <td class="labels">Profissão:</td>
                                    <td colspan="4" class="info-importantes">'. $dados['profissao_socio_4'] .'</td>
                                    <td class="labels">Est. Civíl:</td>
                                    <td class="info-importantes">'. $dados['estado_civil_socio_4'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Nascimento:</td>
                                    <td class="info-importantes">'. Controller::formataData($dados['nascimento_socio_4']) .'</td>
                                    <td class="labels">RG:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['rg_socio_4'] .'</td>
                                    <td class="labels">Org. Expd.:</td>
                                    <td class="info-importantes">'. $dados['o_expedidor_socio_4'] .'</td>
                                    <td class="labels">Dt. Expd.:</td>
                                    <td class="info-importantes">'. $dados['d_expedicao_socio_4'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Endereço:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['logradouro_socio_4'] . ', ' . $dados['numero_socio_4'] . ' ' . $dados['complemento_socio_4'] . ' ' . $dados['birro_socio_4'] . ' - CEP ' . Controller::formataCEP($dados['cep_socio_4']) . ' - ' . $dados['cidade_socio_4'] . ' / ' . $dados['uf_socio_4'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Telefone:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['celular_socio_4'] .'</td>
                                    <td class="labels">E-mail:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['email_socio_4'] .'</td>
                                </tr>
                            </tbody>
                        </table>';
                    }
                }
            }

            // PROCURADOR COMPRADOR
            $proc_comprador = Compradores_Procuradore::select()->where('num_processo_proc_comprador', $item_pesquisado)->execute();
            if(count($proc_comprador) !== 0) {
                foreach($proc_comprador as $values) {
                    $campos_proc_comprador = Cliente::select()->where('cpf', $values['cpf_cnpj_proc_comprador'])->execute();
                    foreach($campos_proc_comprador as $dados) {
                        array_push($dados_proc_comprador, $dados);
                    }
                }
            }
            
            if(isset($dados_proc_comprador)) {
                foreach($dados_proc_comprador as $dados) {
                    $html .= '<table class="procurodro-comprador">
                        <thead>
                            <tr>
                                <th colspan="9" class="espelho">PROCURADOR DO COMPRADOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels nome_label">Nome:</td>
                                <td colspan="6" class="info-importantes destaque">'. $dados['nome'] .'</td>
                                <td class="labels">CPF:</td>
                                <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Nacionalidade:</td>
                                <td colspan="2" class="info-importantes">'. $dados['nacionalidade'] .'</td>
                                <td class="labels">Profissão:</td>
                                <td colspan="3" class="info-importantes">'. $dados['profissao'] .'</td>
                                <td class="labels">Nascimento:</td>
                                <td class="info-importantes">'. Controller::formataData($dados['nascimento']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Dt Casamento:</td>
                                <td colspan="2" class="info-importantes">'. Controller::formataData($dados['data_casamento']) .'</td>
                                <td class="labels">Est. Civíl:</td>
                                <td colspan="3" class="info-importantes">'. $dados['regime'] .'</td>
                                <td class="labels">RG:</td>
                                <td class="info-importantes">'. $dados['rg'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Org. Exp.:</td>
                                <td class="info-importantes">'. $dados['o_expedidor'] .'</td>
                                <td class="labels">Exp. em:</td>
                                <td colspan="2" class="info-importantes">'. $dados['d_expedicao'] .'</td>
                                <td class="labels">Ass. Cartório</td>
                                <td colspan="3" class="info-importantes">'. Controller::formataPessoa($dados['ass_cartorio']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Endereço:</td>
                                <td colspan="8" class="info-importantes">'. $dados['logradouro'] . ', ' . $dados['numero'] . ' '. $dados['complemento'] . ' ' . $dados['bairro'] . ' - CEP ' . Controller::formataCEP($dados['cep']) .'</td>
                            </tr>
                        </tbody>
                    </table>';
                }
            }

            // VENDEDOR
            $vendedor = Vendedore::select()->where('num_processo_vendedor', $item_pesquisado)->execute();
            if(count($vendedor) !== 0) {
                foreach($vendedor as $values) {
                    if(strlen($values['cpf_cnpj_vendedor']) === 11) {
                        $campos_vendedor_pf = Cliente::select()->where('cpf', $values['cpf_cnpj_vendedor'])->execute();
                        foreach($campos_vendedor_pf as $dados) {
                            array_push($dados_vendedor_pf, $dados);
                        }
                    }
                    if(strlen($values['cpf_cnpj_vendedor']) === 14) {
                        $campos_vendedor_pj = PJCliente::select()->where('cnpj', $values['cpf_cnpj_vendedor'])->execute();
                        foreach($campos_vendedor_pj as $dados) {
                            array_push($dados_vendedor_pj, $dados);
                        }
                    }
                }
            }

            // VENDEDOR PESSOA FÍSICA
            if(isset($dados_vendedor_pf)) {
                foreach($dados_vendedor_pf as $dados) {
                    $html .= '<table>
                        <thead class="vendedor-pf">
                            <tr>
                                <th colspan="9" class="espelho">VENDEDOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels nome_label">Nome:</td>
                                <td colspan="5" class="info-importantes destaque">'. $dados["nome"] .'</td>
                                <td class="labels">CPF:</td>
                                <td class="info-importantes destaque">'. Controller::formataPessoa($dados["cpf"]) .'</td>
                            </tr>
                            <tr>
                            <td class="labels">Nacionalidade:</td>
                            <td class="info-importantes">'. $dados["nacionalidade"] .'</td>
                            <td class="labels">Profissão:</td>
                            <td colspan="3" class="info-importantes profissao">'. $dados["profissao"] .'</td>
                            <td class="labels">Nasc.:</td>
                            <td class="info-importantes">'.Controller::formataData($dados["nascimento"]) .'</td>
                            </tr>
                            <tr>
                            <td class="labels">Dat Casamento:</td>
                            <td class="info-importantes">'. Controller::formataData($dados["data_casamento"]) .'</td>
                            <td class="labels">Est. Civíl:</td>
                            <td colspan="3" class="info-importantes">'. $dados["tipo_regime"] . '/' . $dados['regime'] .'</td>
                            <td class="labels">União Estável:</td>
                            <td class="info-importantes">'. Controller::formataRegime($dados['regime']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">RG:</td>
                                <td class="info-importantes">'. $dados['rg'] .'</td>
                                <td class="labels">Exped. em:</td>
                                <td class="info-importantes">'. Controller::formataData($dados['d_expedicao']) .'</td>
                                <td class="labels">Org. Exp.:</td>
                                <td colspan="3" class="info-importantes">'. $dados['o_expedidor'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Ass. Cartório:</td>
                                <td colspan="8" class="info-importantes">'. $dados['ass_cartorio'] .'</td>
                            </tr>
                        </tbody>
                    </table>';

                    // CÔNJUGE VENDEDOR
                    if($dados['cpf_conjuge'] !== '') {
                        $html .= '<table class="conjuge_vendedor">
                                    <thead>
                                        <tr>
                                            <th colspan="9" class="espelho">Vendedor/CÔNJUGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="labels nome_label">Nome:</td>
                                            <td colspan="5" class="info-importantes destaque">'. $dados["nome_conjuge"] .'</td>
                                            <td class="labels">CPF:</td>
                                            <td class="info-importantes destaque">'. Controller::formataPessoa($dados["cpf_conjuge"]) .'</td>
                                        </tr>
                                        <tr>
                                        <td class="labels">Nacionalidade:</td>
                                        <td class="info-importantes">'. $dados["nacionalidade_conjuge"] .'</td>
                                        <td class="labels">Profissão:</td>
                                        <td colspan="3" class="info-importantes profissao">'. $dados["profissao_conjuge"] .'</td>
                                        <td class="labels">Nasc.:</td>
                                        <td class="info-importantes">'.Controller::formataData($dados["nascimento_conjuge"]) .'</td>
                                        </tr>
                                        <tr>
                                        <td class="labels">Dat Casamento:</td>
                                        <td class="info-importantes">'. Controller::formataData($dados["data_casamento"]) .'</td>
                                        <td class="labels">Est. Civíl:</td>
                                        <td colspan="3" class="info-importantes">'. $dados["tipo_regime"] . '/' . $dados['regime'] .'</td>
                                        <td class="labels">União Estável:</td>
                                        <td class="info-importantes">'. Controller::formataRegime($dados['regime']) .'</td>
                                        </tr>
                                        <tr>
                                            <td class="labels">RG:</td>
                                            <td class="info-importantes">'. $dados['rg_conjuge'] .'</td>
                                            <td class="labels">Exped. em:</td>
                                            <td class="info-importantes">'. Controller::formataData($dados['d_expedicao_conjuge']) .'</td>
                                            <td class="labels">Org. Exp.:</td>
                                            <td colspan="3" class="info-importantes">'. $dados['o_expedidor_conjuge'] .'</td>
                                        </tr>
                                        <tr>
                                            <td class="labels">Ass. Cartório:</td>
                                            <td colspan="8" class="info-importantes">'. $dados['ass_cartorio_conjuge'] .'</td>
                                        </tr>
                                    </tbody>
                                </table>';
                    }

                    // ENDEREÇO VENDEDOR
                    $html .= '<table class="endereco">
                        <thead>
                            <tr>
                                <th colspan="9" class="espelho">ENDEREÇO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels nome_label">Endereço:</td>
                                <td colspan="5" class="info-importantes">'. $dados['logradouro'] .'</td>
                                <td class="labels">Número:</td>
                                <td colspan="2" class="info-importantes">'. $dados['numero'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Bairro:</td>
                                <td colspan="4" class="info-importantes">'. $dados['bairro'] .'</td>
                                <td class="labels nome_label">Complemento:</td>
                                <td colspan="3" class="info-importantes">'. $dados['complemento'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">CEP:</td>
                                <td colspan="3" class="info-importantes">'. Controller::formataCEP($dados['cep']) .'</td>
                                <td class="labels">Cidade/UF:</td>
                                <td colspan="4" class="info-importantes">'. $dados['cidade'] . ' / ' . $dados['uf'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Celular:</td>
                                <td class="info-importantes">'. $dados['celular'] .'</td>
                                <td class="labels">Comercial:</td>
                                <td class="info-importantes">'. $dados['comercial'] .'</td>
                                <td class="labels">E-mail:</td>
                                <td colspan="4" class="info-importantes">'. $dados['email_1'] .'</td>
                            </tr>
                        </tbody>
                    </table>';
                }
            }

            //  VENDEDOR PESSOA JURÍDICA
            if($dados_vendedor_pj) {
                foreach($dados_vendedor_pj as $dados) {
                    $html .= '<table class="vendedor-pj">
                        <thead>
                            <tr>
                                <th colspan="9" class="espelho">VENDEDOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels razao_label">Razão Social:</td>
                                <td class="info-importantes destaque">'. $dados['razao_social'] .'</td>
                                <td colspan="5" class="labels">CNPJ:</td>
                                <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cnpj']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Endereço:</td>
                                <td colspan="8" class="info-importantes">'. $dados['logradouro'] . ', ' . $dados['numero'] . ' ' . $dados['complemento'] . ' ' . $dados['birro'] . ' - CEP ' . $dados['cep'] . ' - ' . $dados['cidade'] . ' / ' . $dados['uf'] .'</td>
                            </tr>
                        </tbody>
                    </table>';
                    
                    // SÓCIO 1
                    $html .= '<table class="socio">
                        <thead>
                            <tr>
                                <th colspan="9" class="espelho">Vendedor/SÓCIO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels razao_label">Nome:</td>
                                <td colspan="6" class="info-importantes destaque">'. $dados['nome_socio_1'] .'</td>
                                <td class="labels">CPF:</td>
                                <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf_socio_1']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels razao_label">Nacionalidade:</td>
                                <td class="info-importantes">'. $dados['nacionalidade_socio_1'] .'</td>
                                <td class="labels">Profissão:</td>
                                <td colspan="4" class="info-importantes">'. $dados['profissao_socio_1'] .'</td>
                                <td class="labels">Est. Civíl:</td>
                                <td class="info-importantes">'. $dados['estado_civil_socio_1'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Nascimento:</td>
                                <td class="info-importantes">'. Controller::formataData($dados['nascimento_socio_1']) .'</td>
                                <td class="labels">RG:</td>
                                <td colspan="2" class="info-importantes">'. $dados['rg_socio_1'] .'</td>
                                <td class="labels">Org. Expd.:</td>
                                <td class="info-importantes">'. $dados['o_expedidor_socio_1'] .'</td>
                                <td class="labels">Dt. Expd.:</td>
                                <td class="info-importantes">'. $dados['d_expedicao_socio_1'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Endereço:</td>
                                <td colspan="8" class="info-importantes">'. $dados['logradouro_socio_1'] . ', ' . $dados['numero_socio_1'] . ' ' . $dados['complemento_socio_1'] . ' ' . $dados['birro_socio_1'] . ' - CEP ' . Controller::formataCEP($dados['cep_socio_1']) . ' - ' . $dados['cidade_socio_1'] . ' / ' . $dados['uf_socio_1'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Telefone:</td>
                                <td colspan="2" class="info-importantes">'. $dados['celular_socio_1'] .'</td>
                                <td class="labels">E-mail:</td>
                                <td colspan="7" class="info-importantes">'. $dados['email_socio_1'] .'</td>
                            </tr>
                        </tbody>
                    </table>';

                    // SÓCIO 2
                    if($dados['cpf_socio_2'] !== '') {
                        $html .= '<table class="socio">
                            <thead>
                                <tr>
                                    <th colspan="9" class="espelho">Vendedor/SÓCIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="labels razao_label">Nome:</td>
                                    <td colspan="6" class="info-importantes destaque">'. $dados['nome_socio_2'] .'</td>
                                    <td class="labels">CPF:</td>
                                    <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf_socio_2']) .'</td>
                                </tr>
                                <tr>
                                    <td class="labels razao_label">Nacionalidade:</td>
                                    <td class="info-importantes">'. $dados['nacionalidade_socio_2'] .'</td>
                                    <td class="labels">Profissão:</td>
                                    <td colspan="4" class="info-importantes">'. $dados['profissao_socio_2'] .'</td>
                                    <td class="labels">Est. Civíl:</td>
                                    <td class="info-importantes">'. $dados['estado_civil_socio_2'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Nascimento:</td>
                                    <td class="info-importantes">'. Controller::formataData($dados['nascimento_socio_2']) .'</td>
                                    <td class="labels">RG:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['rg_socio_2'] .'</td>
                                    <td class="labels">Org. Expd.:</td>
                                    <td class="info-importantes">'. $dados['o_expedidor_socio_2'] .'</td>
                                    <td class="labels">Dt. Expd.:</td>
                                    <td class="info-importantes">'. $dados['d_expedicao_socio_2'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Endereço:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['logradouro_socio_2'] . ', ' . $dados['numero_socio_2'] . ' ' . $dados['complemento_socio_2'] . ' ' . $dados['birro_socio_2'] . ' - CEP ' . Controller::formataCEP($dados['cep_socio_2']) . ' - ' . $dados['cidade_socio_2'] . ' / ' . $dados['uf_socio_2'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Telefone:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['celular_socio_2'] .'</td>
                                    <td class="labels">E-mail:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['email_socio_2'] .'</td>
                                </tr>
                            </tbody>
                        </table>';
                    }

                    // SÓCIO 3
                    if($dados['cpf_socio_3'] !== '') {
                        $html .= '<table class="socio">
                            <thead>
                                <tr>
                                    <th colspan="9" class="espelho">Vendedor/SÓCIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="labels razao_label">Nome:</td>
                                    <td colspan="6" class="info-importantes destaque">'. $dados['nome_socio_3'] .'</td>
                                    <td class="labels">CPF:</td>
                                    <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf_socio_3']) .'</td>
                                </tr>
                                <tr>
                                    <td class="labels razao_label">Nacionalidade:</td>
                                    <td class="info-importantes">'. $dados['nacionalidade_socio_3'] .'</td>
                                    <td class="labels">Profissão:</td>
                                    <td colspan="4" class="info-importantes">'. $dados['profissao_socio_3'] .'</td>
                                    <td class="labels">Est. Civíl:</td>
                                    <td class="info-importantes">'. $dados['estado_civil_socio_3'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Nascimento:</td>
                                    <td class="info-importantes">'. Controller::formataData($dados['nascimento_socio_3']) .'</td>
                                    <td class="labels">RG:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['rg_socio_3'] .'</td>
                                    <td class="labels">Org. Expd.:</td>
                                    <td class="info-importantes">'. $dados['o_expedidor_socio_3'] .'</td>
                                    <td class="labels">Dt. Expd.:</td>
                                    <td class="info-importantes">'. $dados['d_expedicao_socio_3'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Endereço:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['logradouro_socio_3'] . ', ' . $dados['numero_socio_3'] . ' ' . $dados['complemento_socio_3'] . ' ' . $dados['birro_socio_3'] . ' - CEP ' . Controller::formataCEP($dados['cep_socio_3']) . ' - ' . $dados['cidade_socio_3'] . ' / ' . $dados['uf_socio_3'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Telefone:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['celular_socio_3'] .'</td>
                                    <td class="labels">E-mail:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['email_socio_3'] .'</td>
                                </tr>
                            </tbody>
                        </table>';
                    }

                    // SÓCIO 4
                    if($dados['cpf_socio_4'] !== '') {
                        $html .= '<table class="socio">
                            <thead>
                                <tr>
                                    <th colspan="9" class="espelho">Vendedor/SÓCIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="labels razao_label">Nome:</td>
                                    <td colspan="6" class="info-importantes destaque">'. $dados['nome_socio_4'] .'</td>
                                    <td class="labels">CPF:</td>
                                    <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf_socio_4']) .'</td>
                                </tr>
                                <tr>
                                    <td class="labels razao_label">Nacionalidade:</td>
                                    <td class="info-importantes">'. $dados['nacionalidade_socio_4'] .'</td>
                                    <td class="labels">Profissão:</td>
                                    <td colspan="4" class="info-importantes">'. $dados['profissao_socio_4'] .'</td>
                                    <td class="labels">Est. Civíl:</td>
                                    <td class="info-importantes">'. $dados['estado_civil_socio_4'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Nascimento:</td>
                                    <td class="info-importantes">'. Controller::formataData($dados['nascimento_socio_4']) .'</td>
                                    <td class="labels">RG:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['rg_socio_4'] .'</td>
                                    <td class="labels">Org. Expd.:</td>
                                    <td class="info-importantes">'. $dados['o_expedidor_socio_4'] .'</td>
                                    <td class="labels">Dt. Expd.:</td>
                                    <td class="info-importantes">'. $dados['d_expedicao_socio_4'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Endereço:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['logradouro_socio_4'] . ', ' . $dados['numero_socio_4'] . ' ' . $dados['complemento_socio_4'] . ' ' . $dados['birro_socio_4'] . ' - CEP ' . Controller::formataCEP($dados['cep_socio_4']) . ' - ' . $dados['cidade_socio_4'] . ' / ' . $dados['uf_socio_4'] .'</td>
                                </tr>
                                <tr>
                                    <td class="labels">Telefone:</td>
                                    <td colspan="2" class="info-importantes">'. $dados['celular_socio_4'] .'</td>
                                    <td class="labels">E-mail:</td>
                                    <td colspan="8" class="info-importantes">'. $dados['email_socio_4'] .'</td>
                                </tr>
                            </tbody>
                        </table>';
                    }
                }
            }

            // PROCURADOR DO VENDEDOR
            $proc_vendedor = Vendedores_Procuradore::select()->where('num_processo_proc_vendedor', $item_pesquisado)->execute();
            if(count($proc_vendedor) !== 0) {
                foreach($proc_vendedor as $values) {
                    $campos_proc_vendedor = Cliente::select()->where('cpf', $values['cpf_cnpj_proc_vendedor'])->execute();
                    foreach($campos_proc_vendedor as $dados) {
                        array_push($dados_proc_vendedor, $dados);
                    }
                }
            }

            if(isset($dados_proc_vendedor)) {
                foreach($dados_proc_vendedor as $dados) {
                    $html .= '<table class="procurodro-vendedor">
                        <thead>
                            <tr>
                                <th colspan="9" class="espelho">PROCURADOR DO VENDEDOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels nome_label">Nome:</td>
                                <td colspan="6" class="info-importantes destaque">'. $dados['nome'] .'</td>
                                <td class="labels">CPF:</td>
                                <td class="info-importantes destaque">'. Controller::formataPessoa($dados['cpf']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Nacionalidade:</td>
                                <td colspan="2">'. $dados['nacionalidade'] .'</td>
                                <td class="labels">Profissão:</td>
                                <td colspan="3">'. $dados['profissao'] .'</td>
                                <td class="labels">Nascimento:</td>
                                <td>'. Controller::formataData($dados['nascimento']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Dt Casamento:</td>
                                <td colspan="2">'. Controller::formataData($dados['data_casamento']) .'</td>
                                <td class="labels">Est. Civíl:</td>
                                <td colspan="3">'. $dados['regime'] .'</td>
                                <td class="labels">RG:</td>
                                <td>'. $dados['rg'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Org. Exp.:</td>
                                <td>'. $dados['o_expedidor'] .'</td>
                                <td class="labels">Exp. em:</td>
                                <td colspan="2">'. $dados['d_expedicao'] .'</td>
                                <td class="labels">Ass. Cartório</td>
                                <td colspan="3">'. Controller::formataPessoa($dados['ass_cartorio']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Endereço:</td>
                                <td colspan="8">'. $dados['logradouro'] . ', ' . $dados['numero'] . ' '. $dados['complemento'] . ' ' . $dados['bairro'] . ' - CEP ' . Controller::formataCEP($dados['cep']) .'</td>
                            </tr>
                        </tbody>
                    </table>';
                }
            }

            // IMÓVEL
            function formataCartorio($cartorio) {
                switch($cartorio) {
                    case '1':
                        return '1º Ofício - Toscano';
                        break;
                    case '2':
                        return '2º Ofício - Massote';
                        break;
                    case '3':
                        return '3º Ofício - Olavo Costa';
                        break;
                }
            }
            $imovel = Processo::select('matricula_processo')->where('numero_processo', $item_pesquisado)->execute();
            if(count($imovel) !== 0) {
                $campos_imovel = Imovei::select()->where('matricula', $imovel[0]['matricula_processo'])->execute();
                foreach($campos_imovel as $dados) {
                    $html .= '<table class="imovel">
                        <thead>
                            <tr>
                                <th colspan="9" class="espelho">IMÓVEL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels nome_label">Endereço:</td>
                                <td colspan="8" class="info-importantes">'. $dados['logradouro'] . ', ' . $dados['numero'] . ' ' . $dados['complemento'] . ' - ' . $dados['bairro'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">CEP:</td>
                                <td class="info-importantes">'. Controller::formataCEP($dados['cep']) .'</td>
                                <td class="labels">Cidade:</td>
                                <td colspan="4" class="info-importantes">'. $dados['cidade'] .'</td>
                                <td class="labels">Estado:</td>
                                <td class="info-importantes">'. $dados['uf'] .'</td>
                            </tr>
                            <tr>
                                <td class="labels">REGISTRO:</td>
                                <td class="info-importantes">'. $dados['matricula'] .'</td>
                                <td class="labels">Catório:</td>
                                <td colspan="4" class="info-importantes">'. formataCartorio($dados['cartorio']) .'</td>
                                <td class="labels">IPTU:</td>
                                <td class="info-importantes">'. Controller::formataIPTU($dados['iptu']) .'</td>
                            </tr>
                            <tr>
                                <td class="labels">Preço:</td>
                                <td colspan="8" class="info-importantes">'. $dados['v_venda'] .'</td>
                            </tr>
                        </tbody>
                    </table>';
                }
            }

            // HONORÁRIOS, CERTIDÕES E OUTROS
            $html .= '<table class="honorarios">
                <tbody>
                    <tr>
                        <td>Honorários</td>
                        <td class="valor">'. $processo[0]['honorarios'] .'</td>
                        <td>Certidões</td>
                        <td class="valor">'. $processo[0]['certidoes'] .'</td>
                        <td>Outros</td>
                        <td class="valor">'. $processo[0]['outros'] .'</td>
                    </tr>
                </tbody>
            </table>';

            // OBSERVAÇÕES
            $html .= '<textarea class="obs" cols="230" rows="64">'. $processo[0]['obs'] .'</textarea>';

            $mpdf->WriteHTML($css, 1);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            // 'Espelho '.$processo[0]["numero_processo"].'.pdf', 'D'
            // essa parte acima sever para abrir a janela de download do pdf
        }
    }
?>