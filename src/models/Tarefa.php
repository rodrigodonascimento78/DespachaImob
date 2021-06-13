<?php
    namespace src\models;

    use \core\Database;
    use \core\Model;

    class Tarefa extends Model
    {
        public function joinDataBase()
        {
            $pdo = Database::getInstance();
            $sql = $pdo->prepare("SELECT t.id, t.tarefa, t.data_cadastrado, ts.status FROM tarefas AS t LEFT JOIN tarefa_status AS ts ON t.id_status = ts.id");
            $sql->execute();
            $rows = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $rows;
        }
    }