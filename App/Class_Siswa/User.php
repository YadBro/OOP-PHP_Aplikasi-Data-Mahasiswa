<?php

class User extends Database
{
    public $username,
        $password,
        $password2,
        $id,
        $sql;

    // form
    public function __construct($username = '', $password = '', $password2, $id, $sql)
    {
        $this->username = $username;
        $this->password = $password;
        $this->password2 = $password2;
        $this->id = $id;
        $this->sql = $sql;
    }

    public function Login()
    {
        $query = "SELECT * FROM user WHERE username = '$this->username'";
        $result = mysqli_query($this->sql, $query);
        return $result;
    }

    public function Register()
    {
        $this->username = strtolower($this->username);
        $this->password = mysqli_real_escape_string($this->sql, $this->password);
        $this->password2 = mysqli_real_escape_string($this->sql, $this->password2);
        // cek
        $result = mysqli_query($this->sql, "SELECT * FROM user WHERE username = '$this->username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('username sudah terdaftar!');
        </script>";
            return false;
        }

        // cek konfirmasi password
        if ($this->password !== $this->password2) {
            echo "<script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
            return false;
        }


        $password = password_hash($this->password, PASSWORD_DEFAULT);

        mysqli_query($this->sql, "INSERT INTO user VALUES('','$this->username','$password')");

        return mysqli_affected_rows($this->sql);
    }
}
