<?php
    namespace MyProject\Models\Comments;
    use MyProject\Models\Users\User;
    use MyProject\Services\Db;
    use MyProject\Models\ActiveRecordEntity;


    class Comment extends ActiveRecordEntity{
        protected $authorId;
        protected $text;
        protected $articleId;
        protected $createdAt;

        public function getText(){
            return $this->text;
        }

        public function setText(string $text){
            $this->text = $text;
        }
        public function setAuthor(User $author){
            $this->authorId = $author->id;
        }
        public function setArticleId($articleId){
            $this->articleId = $articleId;
        }
        public static function getTableName():string 
        {
            return 'comments';
        }
    }
?>
