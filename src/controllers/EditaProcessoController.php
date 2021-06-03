<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Processo;

    class EditaProcessoController extends Controller
    {
        public function index()
        {
            $numero_processo = filter_input(INPUT_POST, trim('processo_numero'));
            $honorarios = filter_input(INPUT_POST, trim('honorarios'));
            $certidoes = filter_input(INPUT_POST, trim('certidoes'));
            $outros = filter_input(INPUT_POST, trim('outros'));
            $observa = filter_input(INPUT_POST, 'observa');

            Processo::update()->set([
                'honorarios' => $honorarios,
                'certidoes'=> $certidoes,
                'outros' => $outros,
                'obs' => $observa
            ])->where('numero_processo', intval($numero_processo))->execute();

            $this->redirect('pesquisa');
        }
    }
?>