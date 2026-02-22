<?php
class NewsModel extends Model {
    public function getAll() {
        return $this->db->fetchAll("SELECT id, title, content, created_at FROM news ORDER BY id DESC");
    }

    public function getById($id) {
        return $this->db->fetchOne("SELECT * FROM news WHERE id = ?", [$id]);
    }

    public function add($title, $content) {
        $this->db->query("INSERT INTO news (title, content) VALUES (?, ?)", [$title, $content]);
        return $this->db->lastInsertId();
    }

    public function update($id, $title, $content) {
        $this->db->query("UPDATE news SET title = ?, content = ? WHERE id = ?", [$title, $content, $id]);
    }

    public function delete($id) {
        $this->db->query("DELETE FROM news WHERE id = ?", [$id]);
    }
}