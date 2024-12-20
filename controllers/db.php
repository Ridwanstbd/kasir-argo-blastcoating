<?php
// Menghubungkan ke basis data
$isHostDb = 'localhost';
$isUserDb = 'root';
$isPassDb = '';
$isNameDb = 'argo-blastcoating';
$conn = mysqli_connect($isHostDb, $isUserDb, $isPassDb, $isNameDb);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>