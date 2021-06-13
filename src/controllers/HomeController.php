<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Cliente;
    use \src\models\Imovei;
    use \src\models\Processo;
    use \src\models\Tarefa;

    class HomeController extends Controller
    {
        public function index()
        {
            $data_atual = date('Y-m-d');

            $t = new Tarefa();
            $tarefas = $t->joinDataBase();

            $u = new Cliente();
            $aniversariantes = $u->getAniversariante();

            $this->render('home',[
                'aniversariantes' => $aniversariantes,
                'data_atual' => $data_atual,
                'tarefas' => $tarefas,
            ]);
        }
    }