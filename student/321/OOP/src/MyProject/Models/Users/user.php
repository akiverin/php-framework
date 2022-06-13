<?php
    namespace MyProject\Models\Users;
    use MyProject\Models\ActiveRecordEntity;

    
    class User extends ActiveRecordEntity{
        private $name;

        public function getName(){
            return $this->name;
        }

        public static function getTableName():string 
        {
            return 'users';
        }
    }
?>