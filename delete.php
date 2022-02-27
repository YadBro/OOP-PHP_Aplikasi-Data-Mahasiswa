<?php
require_once "App/init.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


$id = $_GET['id'];
$siswa->id = $id;

if (intval($siswa->DeleteData()) > 0) {
    echo " <script>
            alert('Data berhasil dihapus!.');
            document.location.href = 'index.php';
            </script>
        ";
} else {
    echo " <script>
            alert('Gagal menghapus data, karena data siswa tidak di temukan!.');
            document.location.href = 'index.php';
            </script>
        ";
}
