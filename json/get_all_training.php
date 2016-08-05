<?php

/*
 * kode untuk tampilan semua data training pada halaman home
 */

$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();

//  get by training
$result = mysql_query("SELECT *FROM training") or die(mysql_error());

// cek
if (mysql_num_rows($result) > 0) {
    // looping hasil
    // training node
    $response["training"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        $training = array();
        $training["id_training"] = $row["id_training"];
        $training["bidang"] = $row['bidang'];
        $training["pelanggan"] = $row['pelanggan'];
        $training["proyek"] = $row['proyek'];
        $training["total_harga_jual"] = $row['total_harga_jual'];
        $training["kelayakan"] = $row['kelayakan'];
        

        // masukan training pada $response
        array_push($response["training"], $training);
    }
    // sukses
    $response["success"] = 1;

    // echo JSON response
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "Tidak ada data yang ditemukan";

    echo json_encode($response);
}
?>
