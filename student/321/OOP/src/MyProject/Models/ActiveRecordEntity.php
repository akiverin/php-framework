<?php
    namespace MyProject\Models;
    use MyProject\Services\Db;

    abstract class ActiveRecordEntity{
       
        protected $id;

        public function getId(){
            return $this->id;
        }

        public function __set($name, $value){
            $camelCaseName = self::underScoreToCamelCase($name);
            $this->$camelCaseName = $value;
        }
        public function underScoreToCamelCase(string $name){
            return lcfirst(str_replace('_', '',ucwords($name, '_')));
        }
        public function camelCaseToUnderScore(string $name){
            return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));
        }
        private function formatDb(): array{
            $reflector = new \ReflectionObject($this);
            $properties = $reflector->getProperties();
            $propertiesNames = [];
            foreach($properties as $property){
                $propertyName = $property->getName();
                $propertyNameToDbFormat = $this->camelCaseToUnderScore($propertyName);
                $propertiesNames[$propertyNameToDbFormat] = $this->$propertyName;
            }
            return ($propertiesNames);
        }

        public function save():void{
            $propertiesNames = $this->formatDb();
            if ($this->id !== null) $this->update($propertiesNames);
            else $this->insert($propertiesNames);
        }

        public function update(array $propertiesNames):void{
            $column2params = [];
            $params2value = [];
            $index = 1;
            foreach($propertiesNames as $column => $value){
                $param = ':param'.$index;
                $column2params[] = $column. '='.$param;
                $params2value[$param] = $value;
                $index++;
            }
            $sql = 'UPDATE `'.static::getTableName().'` SET '.implode(', ', $column2params).' WHERE id = '.$this->id;
            $db = Db::getInstance();
            $db->query($sql, $params2value, static::class);
        }

        public function insert(array $propertiesNames):void{
            $filterProperties = array_filter($propertiesNames);
            $columns = [];
            $paramsName= [];
            $params2value = [];
            foreach($filterProperties as $column => $value){
                $columns[] = '`'.$column.'`';
                $param = ':'.$column;
                $paramsName[] = $param;
                $params2value[$param] = $value;
            }
            $sql = 'INSERT INTO '.static::getTableName().' ('.implode(', ',$columns).') VALUES ('.implode(', ', $paramsName).')';
            $db = Db::getInstance();
            $db->query($sql, $params2value, static::class);

        }
        public static function findAll(): array
        {
            $db = Db::getInstance();
            return $db->query('SELECT * FROM `'.static::getTableName().'`', [], static::class);
        }

        public static function getById(int $id): ?self
        {
            $db = Db::getInstance();
            $entities = $db->query('SELECT * FROM `'.static::getTableName().'` WHERE id = :id', [':id' => $id], static::class);
            return $entities ? $entities[0] : null;
        }

        public static function getByArticleId(int $id): array
        {
            $db = Db::getInstance();
            $entities = $db->query('SELECT * FROM `'.static::getTableName().'` WHERE article_id = :id', [':id' => $id], static::class);
            return $entities;
        }

        public function delete():void{
            $db = Db::getInstance();
            $db->query('DELETE FROM `'.static::getTableName().'` WHERE id = :id', [':id' => $this->id], static::class);
            $this->id = null;
        }

        abstract public static function getTableName():string;
    }


?>