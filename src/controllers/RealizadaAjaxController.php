<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Tarefa;

    class RealizadaAjaxController extends Controller
    {
        public function index()
        {
            $id = filter_input(INPUT_POST, trim('id'));
            Tarefa::update()->set('id_status', 2)->where('id', $id)->execute();

        }
    }
?>