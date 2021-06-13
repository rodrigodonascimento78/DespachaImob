<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Imovei;
    use \src\models\Processo;

    class PesquisaImovelAjaxController extends Controller
    {
        public function index()
        {
            $item_pesquisado = filter_input(INPUT_POST, trim('item_pesquisado'));

            $imovel_data = Imovei::select()->where('matricula', $item_pesquisado)->execute();
            $processo = Processo::select()->where('matricula_processo', $item_pesquisado)->execute();

            if(count($processo) > 0) {
                $processo_data = $processo;
            } else {
                $processo_data = [];
            }

            if(count($imovel_data) > 0) {
                $arquivos = array();

                if(is_dir('assets/arquivos/'.$item_pesquisado)) {
                    if($handle = opendir('assets/arquivos/'.$item_pesquisado)) {
                        while($file = readdir($handle)) {
                            if($file == '.' || $file == '..') {
                                continue;
                            }
                            array_push($arquivos, $file);
                        }
                    }
                } else {
                    array_push($arquivos, ['mensagem' => 'Ainda não existe documentos vinculados a essa pesquisa.']);
                }

                $this->render('pesquisaimovelajax', [
                    'imovel' => $imovel_data,
                    'processo' => $processo_data,
                    'arquivos' => $arquivos,
                    'existe_imovel' => 'sim',
                ]);
            } else {
                $this->render('pesquisaimovelajax', [
                    'mensagem' => 'Imóvel não encontrado na base de dados',
                    'existe_imovel' => 'nao',
                ]);
            }
        }
    }