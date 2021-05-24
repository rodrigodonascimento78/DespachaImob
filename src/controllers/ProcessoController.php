<?php

    namespace src\controllers;
    
    use \core\Controller;
    use \src\models\Processo;
    use \src\models\Compradore;
    use \src\models\Compradores_Procuradore;
    use \src\models\Vendedore;
    use \src\models\Vendedores_Procuradore;
    use \src\models\Imovei;

    class ProcessoController extends Controller
    {
        public function index()
        {
            $id = Processo::select()->max('numero_processo');
            
            if($id) {
                $this->render('processo', [
                    'proc_numero' => $id + 1,
                ]);
            } else {
                
                $this->render('processo', [
                    'proc_numero' => 400,
                ]);
            }
        }

        public function addAction()
        {
            $processo_numero = filter_input(INPUT_POST, 'processo_numero');
            $data_cadastro_processo = filter_input(INPUT_POST, 'data_cadastro_processo');
            $i_imovel = filter_input(INPUT_POST, 'i_imovel');
            $m_imovel = filter_input(INPUT_POST, 'm_imovel');
            $indicacao = filter_input(INPUT_POST, 'indicacao');
            $honorarios = filter_input(INPUT_POST, 'honorarios');
            $certidoes = filter_input(INPUT_POST, 'certidoes');
            $outros = filter_input(INPUT_POST, 'outros');
            $obs = filter_input(INPUT_POST, 'obs');
            
            
            if(isset($processo_numero)) {
                mkdir('assets/arquivos/'.$processo_numero);
                Processo::insert([
                    'numero_processo' => $processo_numero,
                    'data_cadastro_processo' => $data_cadastro_processo,
                    'id_imovel_processo' => $i_imovel,
                    'matricula_processo' => $m_imovel,
                    'indicacao' => $indicacao,
                    'honorarios' => $honorarios,
                    'certidoes' => $certidoes,
                    'outros' => $outros,
                    'obs' => $obs,
                ])->execute();

                $id = Processo::select()->max('numero_processo');

                $this->redirect('processo');
            } else {
                $id = Processo::select()->max('numero_processo');

                $this->render('processo', [
                    'divinit' => '<div class="alert alert-danger text-center conteudo_mensagem">',
                    'mensagem' => 'Algo deu errado',
                    'divfim' => '</div>',
                    'proc_numero' => $id,
                ]);
            }
        }
    }
?>