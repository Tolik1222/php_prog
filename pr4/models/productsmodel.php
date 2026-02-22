<?php
class ProductsModel extends Model {
    public function getAll() {
        return $this->db->fetchAll("SELECT p.id, p.name, b.name as brand_name, p.price, p.description, p.created_at FROM products p LEFT JOIN brands b ON p.brand_id = b.id ORDER BY p.id DESC");
    }

    public function getById($id) {
        return $this->db->fetchOne("SELECT * FROM products WHERE id = ?", [$id]);
    }

    public function add($name, $brand_id, $price, $description) {
        $this->db->query("INSERT INTO products (name, brand_id, price, description) VALUES (?, ?, ?, ?)", [$name, $brand_id, $price, $description]);
        return $this->db->lastInsertId();
    }

    public function update($id, $name, $brand_id, $price, $description) {
        $this->db->query("UPDATE products SET name = ?, brand_id = ?, price = ?, description = ? WHERE id = ?", [$name, $brand_id, $price, $description, $id]);
    }

    public function delete($id) {
        $this->db->query("DELETE FROM products WHERE id = ?", [$id]);
    }
}