<?php

interface Aksi
{
    public function getAllData($sql);
    public function getSingleData();
    public function CariData($id);
    public function CreateData();
    public function UpdateData();
    public function DeleteData();
}
