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
            $processo_numero = filter_input(INPUT_POST, trim('processo_numero'));
            $data_cadastro_processo = filter_input(INPUT_POST, trim('data_cadastro_processo'));
            $i_imovel = filter_input(INPUT_POST, trim('i_imovel'));
            $m_imovel = filter_input(INPUT_POST, trim('m_imovel'));
            $indicacao = filter_input(INPUT_POST, trim('indicacao'));
            $honorarios = filter_input(INPUT_POST, trim('honorarios'));
            $certidoes = filter_input(INPUT_POST, trim('certidoes'));
            $outros = filter_input(INPUT_POST, trim('outros'));
            $obs = filter_input(INPUT_POST, 'obs');
            $btn_deletar_processo = filter_input(INPUT_POST, 'btn_deletar_processo');
            
            
            if(isset($processo_numero)) {
                if(!file_exists('assets/arquivos/'.$processo_numero)) {
                    mkdir('assets/arquivos/'.$processo_numero);
                }
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

            if(isset($btn_deletar_processo)) {
                Compradore::delete()->wher('num_processo_comprador', $processo_numero)->execute();
                Compradores_Procuradore::delete()->wher('num_processo_proc_comprador', $processo_numero)->execute();
                Vendedore::delete()->wher('num_processo_vendedor', $processo_numero)->execute();
                Vendedores_Procuradore::delete()->wher('num_processo_proc_vendedor', $processo_numero)->execute();
            }
        }
    }