<?php
    namespace core;

    use \src\Config;

    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_ALL, 'portuguese-brazilian');

    class Controller {

        protected function redirect($url) {
            header("Location: ".$this->getBaseUrl().$url);
            exit;
        }

        private function getBaseUrl() {
            $base = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://';
            $base .= $_SERVER['SERVER_NAME'];
            if($_SERVER['SERVER_PORT'] != '80') {
                $base .= ':'.$_SERVER['SERVER_PORT'];
            }
            $base .= Config::BASE_DIR;
            
            return $base;
        }

        private function _render($folder, $viewName, $viewData = []) {
            if(file_exists('../src/views/'.$folder.'/'.$viewName.'.php')) {
                extract($viewData);
                $render = fn($vN, $vD = []) => $this->renderPartial($vN, $vD);
                $base = $this->getBaseUrl();
                require '../src/views/'.$folder.'/'.$viewName.'.php';
            }
        }

        private function renderPartial($viewName, $viewData = []) {
            $this->_render('partials', $viewName, $viewData);
        }

        public function render($viewName, $viewData = []) {
            $this->_render('pages', $viewName, $viewData);
        }

        public function limpaCPF_CNPJ($valor)
        {
            $valor = trim($valor);
            $valor = str_replace(".", "", $valor);
            $valor = str_replace(",", "", $valor);
            $valor = str_replace("-", "", $valor);
            $valor = str_replace("/", "", $valor);
            return $valor;
        }

        public function docValido($doc)
        {
            $tamanho = intval($doc['size']);
            $tamanho_permitido = (1024 * 1024 * 2);

            if($tamanho_permitido < $tamanho) {
                return false;
            } else {
                return true;
            }
        }

        public function uploadFile($file, $idpasta)
        {
            if(move_uploaded_file($file['tmp_name'], 'assets/arquivos/'.$idpasta.'/'.$file['name'])) {
                return $file['name'];
            } else {
                return false;
            }
        }

        public static function formataData($data) {
            $d_data = explode('-', $data);
            if($d_data[0] === '0000') {
                return '';
            } else if($d_data[0] === '' || $d_data[0] === null) {
                return '';
            } else {
                return $d_data[2]."/".$d_data[1]."/".$d_data[0];
            }
        }

        public static function mask($val, $mask) {
            $maskared = '';
            $k = 0;
            for($i = 0; $i <= strlen($mask)-1; $i++) {
                if($mask[$i] == '#') {
                    if(isset($val[$k])) {
                        $maskared .= $val[$k++];
                    }
                } else {
                    if(isset($mask[$i])) {
                        $maskared .= $mask[$i];
                    }
                }
            }
            return $maskared;
        }

        public static function formataPessoa($val) {
            if(strlen($val) === 11) {
                return self::mask($val, '###.###.###-##');
            } else if(strlen($val) === 14) {
                return self::mask($val, '##.###.###/####-##');
            }
        }

        public static function formataIPTU($iptu) {
            return self::mask($iptu, '###.###/###');
        }

        public static function formataCEP($cep) {
            return self::mask($cep, '##.###-###');
        }

        public static function formataRegime($regime) {
            if($regime !== 'u_estavel') {
                return 'Não';
            } else {
                return 'Sim';
            }
        }

        public static function removerFormatacaoNumero( $strNumero ) {

            $strNumero = trim( str_replace( "R$", null, $strNumero ) );

            $vetVirgula = explode( ",", $strNumero );
            if ( count( $vetVirgula ) == 1 )
            {
                $acentos = array(".");
                $resultado = str_replace( $acentos, "", $strNumero );
                return $resultado;
            }
            else if ( count( $vetVirgula ) != 2 )
            {
                return $strNumero;
            }

            $strNumero = $vetVirgula[0];
            $strDecimal = mb_substr( $vetVirgula[1], 0, 2 );

            $acentos = array(".");
            $resultado = str_replace( $acentos, "", $strNumero );
            $resultado = $resultado . "." . $strDecimal;

            return $resultado;
        }

        public static function converte( $valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false ) {

            $valor = self::removerFormatacaoNumero( $valor );

            $singular = null;
            $plural = null;

            if ( $bolExibirMoeda )
            {
                $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
                $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
            }
            else
            {
                $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
                $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
            }

            $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
            $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
            $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
            $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");

            if ( $bolPalavraFeminina )
            {
                if ($valor == 1)
                    $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
                else
                    $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");

                $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
            }

            $z = 0;

            $valor = number_format( $valor, 2, ".", "." );
            $inteiro = explode( ".", $valor );

            for ( $i = 0; $i < count( $inteiro ); $i++ )
                for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ )
                    $inteiro[$i] = "0" . $inteiro[$i];

            // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
            $rt = null;
            $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
            for ( $i = 0; $i < count( $inteiro ); $i++ )
            {
                $valor = $inteiro[$i];
                $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
                $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
                $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

                $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
                $t = count( $inteiro ) - 1 - $i;
                $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
                if ( $valor == "000")
                    $z++;
                elseif ( $z > 0 )
                    $z--;

                if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) )
                    $r .= ( ($z > 1) ? " de " : "") . $plural[$t];

                if ( $r )
                    $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
            }

            $rt = mb_substr( $rt, 1 );

            return($rt ? trim( $rt ) : "zero");

        }
    }
?>