<?php
include 'koneksi.php';
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mhs</th>
        <th>Kode MK</th>
        <th>Nama MK</th>
        <th>Nilai</th>
    </tr>
    <?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $sql = "SELECT mahasiswa.nim AS 'NIM', mahasiswa.nama AS 'Nama mhs', matakuliah.kode AS 'Kode Matkul', matakuliah.nama AS 'Nama Matkul', khs.nilai AS 'Nilai' from KHS JOIN mahasiswa ON khs.nim = mahasiswa.nim JOIN matakuliah ON khs.kodeMK = matakuliah.kode WHERE mahasiswa.nim = '".$cari."'";
    $tampil = mysqli_query($con, $sql);
} else {
    $sql="SELECT mahasiswa.nim AS 'NIM', mahasiswa.nama AS 'Nama mhs', matakuliah.kode AS 'Kode Matkul', matakuliah.nama AS 'Nama Matkul', khs.nilai AS 'Nilai' from KHS JOIN mahasiswa ON khs.nim = mahasiswa.nim JOIN matakuliah ON khs.kodeMK = matakuliah.kode";
    $tampil = mysqli_query($con, $sql);
}
$no = 1;
while ($r = mysqli_fetch_array($tampil)) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $r['NIM']; ?></td>
        <td><?php echo $r['Nama mhs']; ?></td>
        <td><?php echo $r['Kode Matkul']; ?></td>
        <td><?php echo $r['Nama Matkul']; ?></td>
        <td><?php echo $r['Nilai']; ?></td>
    </tr>
    <?php
} ?>
</table>