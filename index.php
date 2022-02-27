<?php

include "header.php";
$AllData = $siswa->getAllData($konek);
// var_dump($data);
$number = 1;
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<div class="container">
    <div class="row m-5 text-center">
        <h1>DAFTAR MAHASISWA</h1>
        <table class="table table-responsive table-hover table-bordered">
            <tr class="table-active">
                <th>No</th>
                <th>Name</th>
                <th>Class</th>
                <th>Sekolah</th>
                <th>Jurusan</th>
                <th>Actions</th>
            </tr>
            <?php
            if (empty($AllData)) : ?>
                <h3>DATA SISWA TIDAK ADA</h3>
            <?php else : ?>
                <?php foreach ($AllData as $key => $data) : ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['class'] ?></td>
                        <td><?= $data['school'] ?></td>
                        <td><?= $data['jurusan'] ?></td>
                        <td>
                            <!-- onclick="var link= 'delete.php?id=<?= $data['id'] ?>';(confirm('yakin?') === true) ? 'document.location.href = '+link : alert('no');" -->
                            <a href="delete.php?id=<?= $data['id'] ?>">Delete</a>
                            <a href="update.php?id=<?= $data['id'] ?>">Update</a>
                        </td>
                    </tr>
            <?php endforeach;
            endif; ?>
        </table>
        <a href="create.php" class="btn btn-info text-white"><b>TAMBAH MAHASISWA<b></a>
    </div>

</div>
<?php
include "footer.php"
?>
<!-- <script>
    const hapus = document.querySelector('#hapus_data_siswa');
    hapus.addEventListener('click', function() {
        var tes = confirm("yakin?");
        console.log(tes);
        if (tes == true) {
            document.location.href = 'delete.php?id=<?= $data['id'] ?>';
        }
    });
</script> -->