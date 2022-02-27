<?php
include "header.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id_update = $_GET['id'];
if ($id_update == NULL) {
    header("Location: index.php");
    exit;
}
$siswa->id = $id_update;
$mhs = $siswa->getSingleData();

if ($mhs > 0) {
    $mhs;
} else {
    header("Location: index.php");
    exit;
}


if (isset($_POST['submit'])) {
    $siswa->name = htmlspecialchars($_POST['name']);
    $siswa->class = htmlspecialchars($_POST['class']);
    $siswa->school = htmlspecialchars($_POST['school']);
    $siswa->jurusan = htmlspecialchars($_POST['jurusan']);
    $siswa->id = htmlspecialchars($_POST['id']);
    $create = $siswa->UpdateData();
    if ($create > 0) {
        echo "<script>
        alert('Berhasil mengupdate data siswa.');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>alert('Gagal mengupdate siswa.')</script>";
    }
}

?>
<div class="container">
    <div class="row">
        <div class="p-5">
            <center>
                <h4>FORM UBAH SISWA</h4>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
                    <div class="col-4">
                        <label for="">Name</label>
                        :<input type="text" name="name" class="form-control" required autocomplete="TRUE" value="<?= $mhs['name'] ?>">
                    </div><br>
                    <div class="col-4">
                        <label for="">Class</label>
                        :<input type="number" name="class" class="form-control" autocomplete="TRUE" required value="<?= $mhs['class'] ?>">
                    </div><br>
                    <div class="col-4">
                        <label for="">School</label>
                        :<input type="text" name="school" class="form-control" autocomplete="TRUE" required value="<?= $mhs['school'] ?>">
                    </div><br>
                    <div class="col-4">
                        <label for="">Jurusan</label>
                        :<input type="text" name="jurusan" class="form-control" autocomplete="TRUE" required value="<?= $mhs['jurusan'] ?>">
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-success" name="submit">SUBMIT</button>
                    <a href="index.php" class="btn btn-warning">KEMBALI</a>
                </form>
            </center>
        </div>
    </div>
</div>
<?php
include "footer.php"
?>