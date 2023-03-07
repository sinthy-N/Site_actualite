<?php

    class Comment {
        private $id;
        private $content;
        private $author;
        private $article_id;
    

    public function __construct(array $comment){
        $this->hydrate($comment);
    }

    public function hydrate(array $comment){
        foreach ($comment as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getContent(){
        return $this->content;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getArticle_Id(){
        return $this->article_id;
    }

    public function setId($id){
        $id = (int) $id;
        if ($id > 0){
            $this -> id = $id;
        }
    }

    public function setContent($content){
        $content = (string) $content;
        $this -> content = $content;  
    }

    public function setAuthor($author){
        $author = (string) $author;
        $this -> author = $author;  
    }

    public function setArticle_Id($article_id){
        $this -> article_id = $article_id;
    }
}


?>