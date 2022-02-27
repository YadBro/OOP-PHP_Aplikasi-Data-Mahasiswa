<?php

class Query extends Database implements Aksi
{
    public $name,
        $class,
        $school,
        $jurusan,
        $id,
        $sql;

    public function __construct($name = "", $class = "", $school = "", $jurusan = "", $id = "1", $sql)
    {
        $this->name = $name;
        $this->class = $class;
        $this->school = $school;
        $this->jurusan = $jurusan;
        $this->id = $id;
        $this->sql = $sql;
    }

    // READ
    public function getAllData($sql)
    {

        $result = mysqli_query($this->sql, "SELECT * FROM mahasiswa");
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function data()
    {
        echo $this->id, $this->name, $this->class, $this->school, $this->jurusan;
    }
    public function getSingleData()
    {
        $result = mysqli_query($this->sql, "SELECT * FROM mahasiswa WHERE id = $this->id");
        return mysqli_fetch_assoc($result);
    }

    public function CariData($id)
    {
    }

    public function CreateData()
    {
        $query = "INSERT INTO mahasiswa VALUES('', '$this->name', '$this->class', '$this->school', '$this->jurusan')";

        mysqli_query($this->sql, $query);

        return mysqli_affected_rows($this->sql);
    }

    public function UpdateData()
    {
        //     $query  = "UPDATE mahasiswa SET
        //     name = '$this->name',
        //     class = '$this->class',
        //     school = '$this->school',
        //     jurusan = '$this->jurusan', 

        //     WHERE id = '$this->id'
        // ";
        $query = "UPDATE `mahasiswa` SET `name`='$this->name',`class`='$this->class',`school`='$this->school',`jurusan`='$this->jurusan' WHERE `id`=$this->id";
        mysqli_query($this->sql, $query);
        return mysqli_affected_rows($this->sql);
    }

    public function DeleteData()
    {
        mysqli_query($this->sql, "DELETE FROM mahasiswa WHERE id = $this->id");

        return mysqli_affected_rows($this->sql);
    }
}
