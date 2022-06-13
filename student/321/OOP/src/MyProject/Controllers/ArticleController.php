<?php
    namespace MyProject\Controllers;
    use MyProject\View\View;
    use MyProject\Models\Articles\Article;
    use MyProject\Models\Users\User;


    class ArticleController{
        private $view;
        private $db;
        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
        }

        public function view(int $idArticle){
            $result = Article::getById($idArticle);
            if ($result === []){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            // var_dump($result);
            $this->view->renderHtml('articles/view.php', ['article' => $result]);
        }

        public function edit(int $articleId): void{
            $result = Article::getById($articleId);
            if ($result === []){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
                $result->setName('Статья летняя');
                $result->setText('Жара');
            $result->save();
        }
        public function add(){
            $author = User::getById(1);
            $article = new Article();
            $article->setAuthor($author);
            $article->setName('new author');
            $article->setText('new text');
            $article->save();
            // var_dump($article);
        }
        public function delete(int $articleId): void{
            $result = Article::getById($articleId);
            if ($result === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $result->delete();
        }
        
        
    }
?>