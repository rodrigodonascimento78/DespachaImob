<?php
    namespace src\controllers;

    use \core\Controller;

    class DocumentosController extends Controller
   {
        public function index()
        {
            $this->render('documentos');
        }

        public function addAction()
        {
            $opcao = filter_input(INPUT_POST, 'opcao');
            $item_pesquisado = filter_input(INPUT_POST, 'item_pesquisado');
            $arquivos_form = $_FILES['arquivos'];
            $acao = filter_input(INPUT_POST, 'acao');
            // $amount = count($arquivos_form['name']);
            $arquivos = array();
            
            if($item_pesquisado !== "") {
                if($opcao === 'cliente' && strlen($item_pesquisado) === 11) {
                    if($this->docValido($arquivos_form)) {
                        $arquivos_form = $this->uploadFile($arquivos_form, $item_pesquisado);
                        $this->redirect('documentos');
                    } else {
                        $mensagem = 'O arquivo enviado é muito grande, envie arquivos de até 2Mb.';
                        $classe = 'alert alert-danger text-center mt-4 conteudo_mensagem';
                        $this->render('documentos', ['mensagem' => $mensagem, 'classe' => $classe]);
                    }
                }
    
                if($opcao === 'cliente' && strlen($item_pesquisado) === 14) {
                    if($this->docValido($arquivos_form)) {
                        $arquivos_form = $this->uploadFile($arquivos_form, $item_pesquisado);
                        $this->redirect('documentos');
                    } else {
                        $mensagem = 'O arquivo enviado é muito grande, envie arquivos de até 2Mb.';
                        $classe = 'alert alert-danger text-center mt-4 conteudo_mensagem';
                        $this->render('documentos', ['mensagem' => $mensagem, 'classe' => $classe]);
                    }
                }
    
                if($opcao === 'imovel') {
                    if($this->docValido($arquivos_form)) {
                        $arquivos_form = $this->uploadFile($arquivos_form, $item_pesquisado);
                        $this->redirect('documentos');
                    } else {
                        $mensagem = 'O arquivo enviado é muito grande, envie arquivos de até 2Mb.';
                        $classe = 'alert alert-danger text-center mt-4 conteudo_mensagem';
                        $this->render('documentos', ['mensagem' => $mensagem, 'classe' => $classe]);
                    }
                }
    
                if($opcao === 'processo') {
                    if($this->docValido($arquivos_form)) {
                        $arquivos_form = $this->uploadFile($arquivos_form, $item_pesquisado);
                        $this->redirect('documentos');
                        $classe = 'alert alert-danger text-center mt-4 conteudo_mensagem';
                    } else {
                        $mensagem = 'O arquivo enviado é muito grande, envie arquivos de até 2Mb.';
                        $classe = 'alert alert-danger text-center mt-4 conteudo_mensagem';
                        $this->render('documentos', ['mensagem' => $mensagem, 'classe' => $classe]);
                    }
                }
            } else {
                $mensagem = 'Nenhum arquivo foi selecionado, favor selecionar pelo menos um arquivo.';
                $classe = 'alert alert-danger text-center mt-4 conteudo_mensagem';
                $this->render('documentos', ['mensagem' => $mensagem, 'classe' => $classe]);
            }
        }
    }
?>