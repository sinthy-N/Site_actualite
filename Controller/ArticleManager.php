<?php

    class ArticleManager {
        private $db;
    

    public function __construct(){
        $dbName = "blog";
        $port = 3306;
        $userName = "root";
        $password = "root";

        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;charset=utf8mb4", $userName, $password));
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }


    public function setDb($db){
        $this->db = $db;
    }

    public function add(Article $article){
        $req = $this->db->prepare("INSERT INTO `article` (id,title,content,created_at,author,image,category) VALUES (:id,:title,:content,:created_at,:author,:image,:category)");

        $req->bindValue(":id", $article->getId(),PDO::PARAM_INT);
        $req->bindValue(":title", $article->getTitle(),PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(),PDO::PARAM_STR);
        $req->bindValue(":created_at", date("Y-m-d H:i:s"),PDO::PARAM_STR);
        $req->bindValue(":author", $article->getAuthor(),PDO::PARAM_STR);
        $req->bindValue(":image", $article->getImage(),PDO::PARAM_STR);
        $req->bindValue(":category", $article->getCategory(),PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id): Article{
        $req = $this->db->prepare("SELECT * FROM `article` WHERE id = :id" );
        $req->bindValue(":id", $id,PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $article = new Article($data);
        return $article;
    }

    public function getAll():array{
        $articles = [];
        $req = $this->db->query("SELECT * FROM `article` ORDER BY id DESC");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data){
            $articles[] = new Article($data);
        }
        return $articles;
    }

    public function getAllMarvel():array{
        $articles = [];
        $req = $this->db->query("SELECT * FROM article WHERE category = 'Marvel'");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data){
            $articles[] = new Article($data);
        }
        return $articles;
    }

    public function getAllDc():array{
        $articles = [];
        $req = $this->db->query("SELECT * FROM article WHERE category = 'Dc'");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data){
            $articles[] = new Article($data);
        }
        return $articles;
    }

    public function update(Article $article){
        $req = $this->db->prepare("UPDATE `article` SET nom = :id, title = :title, content = :content, created_at = :created_at, author = :author, image = :image)");
        
        $req->bindValue(":id", $article->getId(),PDO::PARAM_INT);
        $req->bindValue(":title", $article->getTitle(),PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(),PDO::PARAM_STR);
        $req->bindValue(":created_at", date("Y-m-d H:i:s"),PDO::PARAM_INT);
        $req->bindValue(":author", $article->getAuthor(),PDO::PARAM_STR);
        $req->bindValue(":image", $article->getImage(),PDO::PARAM_STR);
        $req->bindValue(":category", $article->getCategory(),PDO::PARAM_STR);
 
    
        $req->execute();
    }

    public function delete(int $id){
        $req = $this->db->prepare("DELETE FROM `article` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }


    /*public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getCreate_at(){
        return $this->created_at;
    }

    public function getauthor(){
        return $this->author;
    }

    public function setId(){
        $id = (int) $id;
        if ($id > 0){
            $this -> id = $id;
        }
    }

    public function setTitle(){
        if (is_string($title)){
            $this ->_title = $title;
        }
    }

    public function setContent(){
        $content = (string) $content;
        if ($id > 8){
            $this -> content = $content;
        }
    }

    public function setCreate_at(){
        $create_at = (int) $create_at;
        if ($id >= 1 && $create_at <= 100){
            $this -> create_at = $create_at;
        }
    }

    public function setauthor(){
        $author = (string) $author;
        if ($id > 8){
            $this -> author = $author;
        }
    }*/
}
