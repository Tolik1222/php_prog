<?php
class UserModel extends Model {
    public function getAll() {
        return $this->db->fetchAll("SELECT id, login, created_at FROM users ORDER BY id DESC");
    }

    public function getById($id) {
        return $this->db->fetchOne("SELECT * FROM users WHERE id = ?", [$id]);
    }

    public function add($login, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO users (login, password) VALUES (?, ?)", [$login, $hash]);
        return $this->db->lastInsertId();
    }

    public function update($id, $login, $password = null) {
        if ($password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->db->query("UPDATE users SET login = ?, password = ? WHERE id = ?", [$login, $hash, $id]);
        } else {
            $this->db->query("UPDATE users SET login = ? WHERE id = ?", [$login, $id]);
        }
    }

    public function delete($id) {
        $this->db->query("DELETE FROM users WHERE id = ?", [$id]);
    }

    public function login($login, $password) {
        $user = $this->db->fetchOne("SELECT * FROM users WHERE login = ?", [$login]);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}