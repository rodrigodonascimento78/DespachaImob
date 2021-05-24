<?php
    namespace src\controllers;

    use \core\Controller;
    use \src\models\Tarefa;
    use \src\models\Tarefa_Statu;

    class TarefaController extends Controller
    {
        public $data_atual;

        public function index()
        {
            $data_atual = date('Y-m-d');
            $t = new Tarefa();
            $tarefas = $t->joinDataBase();

            $this->render('tarefas', [
                'data_atual' => $data_atual,
                'tarefas' => $tarefas,
            ]);
        }

        public function novaTarefa()
        {
            $data_atual  = date('Y-m-d');

            $this->render('nova_tarefa', [
                'data_atual' => $data_atual,
            ]);
        }

        public function addNovaTarefa()
        {
            $venc_tarefa = filter_input(INPUT_POST, 'venc_tarefa');
            $desc_tarefa = filter_input(INPUT_POST, 'desc_tarefa');

            if($desc_tarefa) {
                Tarefa::insert()->values([
                    'tarefa' => $desc_tarefa,
                    'data_cadastrado' => $venc_tarefa,
                ])->execute();
            }

            $this->redirect('nova_tarefa');
        }

        public function todasTarefas()
        {
            $t = new Tarefa();
            $tarefas = $t->joinDataBase();

            $this->render('todas_tarefas', [
                'tarefas' => $tarefas,
            ]);
        }

        public function editaTarefa()
        {
            $id = filter_input(INPUT_POST, 'id');
            $venc_tarefa = filter_input(INPUT_POST, 'venc_tarefa');
            $desc_tarefa = filter_input(INPUT_POST, 'desc_tarefa');
            Tarefa::update()->set([
                'tarefa' => $desc_tarefa,
                'data_cadastrado' => $venc_tarefa,
            ])->where('id', $id)->execute();

            $this->redirect('home');
        }
    }
?>