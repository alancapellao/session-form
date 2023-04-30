<?php

class Usuario
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $conn;

    public function __construct($id, $username, $email, $password, PDO $conn)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->conn = $conn;
    }

    public function register()
    {
        $query = $this->conn->prepare("SELECT username, email FROM usuarios WHERE username = ? or email = ?");
        $query->execute(array($this->username, $this->email));

        if ($query->rowCount()) {
            return false;
        } else {
            $query = $this->conn->prepare("INSERT INTO usuarios(username, email, password) values(?, ?, ?)");
            $query->execute(array($this->username, $this->email, password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 12])));
            return true;
        }
    }

    public function login()
    {
        $query = $this->conn->prepare("SELECT * FROM usuarios WHERE username = ? or email = ?");
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
        $query = $this->conn->prepare("SELECT id, username, email FROM usuarios WHERE username = ? or email = ?");
        $query->execute(array($_SESSION['username'], $_SESSION['email']));

        if ($query->rowCount()) {
            $data = $query->fetch();
        }
        return $data;
    }

    public function update()
    {
        $query = $this->conn->prepare("UPDATE usuarios SET username = ?, email = ? where id = ?");
        $query->execute(array($this->username, $this->email, $this->id));

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}
