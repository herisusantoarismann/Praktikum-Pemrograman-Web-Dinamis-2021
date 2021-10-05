<?php
$myDir = "C:/xampp/htdocs/Praktikum-Pemrograman-Web-Dinamis-2021/Pertemuan-1/Upload-File/storage/";
$dir = opendir($myDir);
echo "Isi folder (klik link untuk download) : <br>";
while ($tmp = readdir($dir)) {
    echo "<a href='$tmp' target='_blank'>$tmp</a><br>";
}
closedir($dir);