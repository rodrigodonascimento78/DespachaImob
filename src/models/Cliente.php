<?php
    namespace src\models;

    use \core\Database;
    use \core\Model;
    
    class Cliente extends Model
    {
        public function getAniversariante()
        {
            $data_atual = date('d/m/Y');
            $current_date = explode('/', $data_atual);
            $current_day = $current_date[0];
            $current_month = $current_date[1];
            
            $pdo = Database::getInstance();
            $sql = $pdo->prepare("SELECT cpf,nome, celular, DAY(nascimento) as dia, MONTH(nascimento) as mes FROM clientes WHERE DAY(nascimento) = $current_day AND MONTH(nascimento) = $current_month");
            $sql->execute();
            $rows = $sql->fetchAll();
            return $rows;
            exit;
        }
    }
?>