<?php
    namespace src\controllers;

    use \core\Controller;

    class CertidoesController extends Controller
    {
        public function index()
        {
            $this->render('certidoes');
        }
    }
?>