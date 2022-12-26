<?php


spl_autoload_register(function ($class) {
    require_once __DIR__ . '/Class_Siswa/' . $class . '.php';
});
$sql = new Database("34.28.59.144:3306", "root", "yadiprime009", "oopphp");
$konek = $sql->konek();
$siswa = new Query("Yadi Apriyadi", 12, "SMK PUSDIKHUBAD CIMAHI", "RPL", "1", $konek);
$user = new User('yadi', '123', '321', '1', $konek);
