<?php

    class CommentManager {
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

    public function add(Comment $comment){
        $req = $this->db->prepare("INSERT INTO `comment` (id,content,author,article_id) VALUES (:id,:content,:author,:article_id)");
        
        $req->bindValue(":id", $comment->getId(),PDO::PARAM_INT);
        $req->bindValue(":content", $comment->getContent(),PDO::PARAM_STR);
        $req->bindValue(":author", $comment->getAuthor(),PDO::PARAM_STR);
        $req->bindValue(":article_id", $comment->getArticle_Id(),PDO::PARAM_INT);
       
        $req->execute();
    }

    public function get(int $id): Comment{
        $req = $this->db->prepare("SELECT * FROM `comment` WHERE id = :id" );
        $req->bindValue(":id", $id,PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $comment = new Comment($data);
        return $comment;
    }

    public function getAll():array{
        $comments = [];
        $req = $this->db->prepare("SELECT * FROM `comment` ORDER BY id DESC");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data){
            $comments[] = new Comment($data);
        }
        return $comments;
    }


    public function update(Comment $comment){
        $req = $this->db->prepare("UPDATE `comment` SET nom = :id, content = :content, author = :author, article_id = :article_id)");
        
        $req->bindValue(":id", $comment->getId(),PDO::PARAM_INT);
        $req->bindValue(":content", $comment->getContent(),PDO::PARAM_STR);
        $req->bindValue(":author", $comment->getAuthor(),PDO::PARAM_STR);
        $req->bindValue(":article_id", $comment->getArticle_Id(),PDO::PARAM_INT);

        $req->execute();
    }

    public function delete(int $id){
        $req = $this->db->prepare("DELETE FROM `comment` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

}
?>