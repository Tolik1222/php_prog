<?php
class PagesModel extends Model {
    public function getAll() {
        return $this->db->fetchAll("SELECT id, title, created_at FROM pages ORDER BY id DESC");
    }

    public function getById($id) {
        return $this->db->fetchOne("SELECT * FROM pages WHERE id = ?", [$id]);
    }

    public function add($title, $keywords, $description, $h1, $content) {
        $this->db->query("INSERT INTO pages (title, keywords, description, h1, content) VALUES (?, ?, ?, ?, ?)", [$title, $keywords, $description, $h1, $content]);
        return $this->db->lastInsertId();
    }

    public function update($id, $title, $keywords, $description, $h1, $content) {
        $this->db->query("UPDATE pages SET title = ?, keywords = ?, description = ?, h1 = ?, content = ? WHERE id = ?", [$title, $keywords, $description, $h1, $content, $id]);
    }

    public function delete($id) {
        $this->db->query("DELETE FROM pages WHERE id = ?", [$id]);
    }
}