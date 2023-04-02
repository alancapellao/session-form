<?php

class Usuario
{
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct($id, $username, $email, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function register()
    {
        global $conn;

        $options = [
            'cost' => 12,
        ];

        $query = $conn->prepare("SELECT username, email FROM usuarios WHERE username = ? or email = ?");
        $query->execute(array($this->username, $this->email));

        if ($query->rowCount()) {

            return false;
        } else {
            $query = $conn->prepare("INSERT INTO usuarios(username, email, password) values(?, ?, ?)");
            $query->execute(array($this->username, $this->email, password_hash($this->password, PASSWORD_BCRYPT, $options)));

            return true;
        }
    }

    public function login()
    {
        global $conn;

        $query = $conn->prepare("SELECT * FROM usuarios WHERE username = ? or email = ?");
        $query->execute(array($this->username, $this->username));

        if ($query->rowCount()) {

            $user = $query->fetch();

            if (password_verify($this->password, $user['password'])) {

                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                return true;
            } else {

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
        global $conn;
        $array = array();

        $query = $conn->prepare("SELECT id, username, email FROM usuarios WHERE username = ? or email = ?");
        $query->execute(array($_SESSION['username'], $_SESSION['email']));

        if ($query->rowCount()) {

            $array = $query->fetch();
        }

        return $array;
    }

    public function update()
    {
        global $conn;

        $query = $conn->prepare("UPDATE usuarios SET username = ?, email = ? where id = ?");
        $query->execute(array($this->username, $this->email, $this->id));

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}
