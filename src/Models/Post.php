<?php

namespace Black\Asm\Models;

use Black\Asm\Commons\Model;

class Post extends Model
{
    public function getAll()
    {
        try {
            $sql = "SELECT posts.*, categories.name AS category_name
                    FROM posts
                    JOIN categories ON posts.category_id = categories.id
                    ORDER BY posts.id DESC;";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getFirstLatest()
    {
        try {
            $sql = "SELECT posts.*, categories.name AS category_name
                    FROM posts
                    JOIN categories ON posts.category_id = categories.id
                    ORDER BY posts.id DESC
                    LIMIT 1";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getTop6()
    {
        try {
            $sql = "SELECT posts.*, categories.name AS category_name
                    FROM posts
                    JOIN categories ON posts.category_id = categories.id
                    ORDER BY id DESC
                    LIMIT 6";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }


    public function getAllCategories()
    {
        try {
            $sql = "SELECT * FROM categories";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getByID($id)
    {
        try {
            $sql = "SELECT posts.*, categories.name AS category_name
                    FROM posts
                    JOIN categories ON posts.category_id = categories.id
                    WHERE posts.id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function insert($category_id, $title, $content, $excerpt = null, $image = null)
    {
        try {
            $sql = "
                INSERT INTO posts(category_id, title, excerpt, content, image) 
                VALUES (:category_id, :title, :excerpt, :content, :image)
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function updateById($id, $category_id, $title, $excerpt, $content, $image = null)
    {
        try {
            $sql = "
                UPDATE posts
                SET category_id = :category_id,
                    title = :title,
                    excerpt = :excerpt,
                    content = :content,
                    image = :image
                WHERE id = :id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM posts WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function incrementViewCount($id)
    {
        try {
            $sql = "UPDATE posts SET view = view + 1 WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getPostByCategoryID($id)
    {
        try {
            $sql = "SELECT posts.*, 
                categories.name AS category_name,
                categories.id AS cate_id
                FROM posts
                JOIN categories ON posts.category_id = categories.id
                WHERE categories.id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getTrending()
    {
        try {
            $sql = "SELECT posts.*, 
                categories.name AS category_name
                FROM posts
                JOIN categories ON posts.category_id = categories.id
                ORDER BY view DESC";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
