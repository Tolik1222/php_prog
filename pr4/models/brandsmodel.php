<?php
class BrandsModel extends Model {
    public function getAll() {
        return $this->db->fetchAll("SELECT id, name, description, created_at FROM brands ORDER BY id DESC");
    }

    public function getById($id) {
        return $this->db->fetchOne("SELECT * FROM brands WHERE id = ?", [$id]);
    }

    public function add($name, $description) {
        $this->db->query("INSERT INTO brands (name, description) VALUES (?, ?)", [$name, $description]);
        return $this->db->lastInsertId();
    }

    public function update($id, $name, $description) {
        $this->db->query("UPDATE brands SET name = ?, description = ? WHERE id = ?", [$name, $description, $id]);
    }

    public function delete($id) {
        $this->db->query("DELETE FROM brands WHERE id = ?", [$id]);
    }
}