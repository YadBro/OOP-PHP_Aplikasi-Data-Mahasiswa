<?php

class Database
{
    protected $host,
        $username,
        $password,
        $database;
    public function __construct(string $host, string $username, string $password, string $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    public function konek()
    {
        $konek = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            echo "Koneksi gagal " . mysqli_connect_error();
        }
        return $konek;
    }
}
