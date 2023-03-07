<?php

    class Article {
        private $id;
        private $title;
        private $content;
        private $created_at;
        private $author;
        private $image;
        private $category;
    

    public function __construct(array $article){
        $this->hydrate($article);
    }

    public function hydrate(array $article){
        foreach ($article as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getCreated_at(){
        return $this->created_at;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getImage(){
        return $this->image;
    }

    public function getCategory(){
        if  ($this->category = 'Marvel' or $this->category = 'Dc'){
            return $this->category;
        }
    }

    public function setId($id){
        $id = (int) $id;
        if ($id > 0){
            $this -> id = $id;
        }
    }

    public function setTitle($title){
        if (is_string($title)){
            $this ->title = $title;
        }
    }

    public function setContent($content){
        $content = (string) $content;
        $this -> content = $content;  
    }

    public function setCreated_at($created_at){
        $this -> created_at = $created_at;  
    }

    public function setAuthor($author){
        $author = (string) $author;
        $this -> author = $author;  
    }

    public function setImage($image){
        $this -> image = $image;
    }

    public function setCategory($category){
        $this -> category = $category;
    }
}


?>