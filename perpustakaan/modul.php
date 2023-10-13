<?php
$Koneksi = mysqli_connect("localhost", "root", "", "db_spp") or die (mysqli_error());

function Query($Query){
    global $Koneksi;
    $HasilQuery = mysqli_query($Koneksi, $Query);

    $Tempat =[];
    while ($Baris = mysqli_fetch_assoc($HasilQuery)){
        $Tempat[] = $Baris;
    }
    return $Tempat;
}
?>