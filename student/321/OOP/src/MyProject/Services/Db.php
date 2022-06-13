<?php
    namespace MyProject\Services;

    class Db{
        private $connect;
        private static $instance;

        private function __construct(){
            $dbOptions = (require __DIR__.'/../../settings.php')['db'];
            $this->connect = new \PDO(
                'mysql:host='. $dbOptions['host']. ';dbname='.$dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->connect->exec('SET NAMES UTF8');
        }

        public static function getInstance(){
            if (self::$instance === null)
            {
                self::$instance = new self();
            }

            return self::$instance;
        }
        public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
        {
            $stm = $this->connect->prepare($sql);
            $result = $stm->execute($params);
            if ($result === false) return null;
            
            return $stm->fetchAll(\PDO::FETCH_CLASS, $className);
        }
    }
?>