<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Tarefa;

    class DeletaTarefaAjaxController extends Controller
    {
        public function index()
        {
            $id = filter_input(INPUT_POST, 'id');
            Tarefa::delete()->where('id', $id)->execute();
        }
    }
?>