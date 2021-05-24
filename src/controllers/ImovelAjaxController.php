<?php
    namespace src\controllers;
    use \core\Controller;
    use \src\models\Imovei;

    class ImovelAjaxController extends Controller
    {
        public function index()
        {
            $matricula_imovel = filter_input(INPUT_POST, 'matricula_imovel');
            $data = Imovei::select()->where('matricula', $matricula_imovel)->execute();

            if(count($data) !== 0) {
                $this->render('imovelajax', [
                    'imovel' => $data,
                    'tem' => 's',
                ]);
            } else {
                $this->render('imovelajax', [
                    'mensagem'=> 'Não existe esse cliente na base de dados.',
                    'tem' => 'n',
                ]);
            }
        }
    }
?>