<?php
    namespace src\controllers;
    use \core\Controller;

    class PesquisaController extends Controller
    {
        public function index()
        {
            $cpf = filter_input(INPUT_GET, 'cpf');
            $this->render('pesquisa', ['cpf' => $cpf]);
        }
    }
?>