<?php

include_once __DIR__ . '/Connection.php';

class product extends Connection
{
    public function getProducts()
    {
        $stmt = $this->conn->query('SELECT * FROM products');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($image, $name, $fragrances, $description, $price)
    {
        $stmt = $this->conn->prepare('INSERT INTO products (image, name, fragrances, description, price) VALUES (:image, :name, :fragrances, :description, :price)');
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':fragrances', $fragrances);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getProduct($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $image, $name, $fragrances, $description, $price)
    {
        $stmt = $this->conn->prepare('UPDATE products SET image = :image, name = :name, fragrances = :fragrances, description = :description, price = :price WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':fragrances', $fragrances);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM products WHERE id = :id');
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
