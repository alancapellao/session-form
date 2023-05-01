<?php

class Usuario
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $pdo;

    public function __construct($id, $username, $email, $password, PDO $pdo)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->pdo = $pdo;
    }

    public function register()
    {
        $query = $this->pdo->prepare("SELECT username, email FROM usuarios WHERE username = ? or email = ?");
        $query->execute(array($this->username, $this->email));

        if ($query->rowCount()) {
            return false;
        } else {
            $query = $this->pdo->prepare("INSERT INTO usuarios(username, email, password) values(?, ?, ?)");
            $query->execute(array($this->username, $this->email, password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 12])));
            return true;
        }
    }

    public function login()
    {
        $query = $this->pdo->prepare("SELECT * FROM usuarios WHERE username = ? or email = ?");
        $query->execute(array($this->username, $this->username));

        if ($query->rowCount()) {

            $user = $query->fetch();

            if (password_verify($this->password, $user['password'])) {
                $_SESSION['authenticated'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                return true;
            } else {
                unset($_SESSION['authenticated']);
                unset($_SESSION['id']);
                unset($_SESSION['username']);
                unset($_SESSION['email']);

                return false;
            }
        } else {
            return false;
        }
    }

    public function session()
    {
        $query = $this->pdo->prepare("SELECT id, username, email FROM usuarios WHERE username = ? or email = ?");
        $query->execute(array($_SESSION['username'], $_SESSION['email']));

        if ($query->rowCount()) {
            $data = $query->fetch();
        }
        return $data;
    }

    public function update()
    {
        $query = $this->pdo->prepare("UPDATE usuarios SET username = ?, email = ? where id = ?");
        $query->execute(array($this->username, $this->email, $this->id));

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $query = $this->pdo->prepare("DELETE FROM usuarios where id = ?");
        $query->execute(array($this->id));

        if ($query->rowCount()) {
            session_unset();
            session_destroy();
            return true;
        } else {
            return false;
        }
    }
}
