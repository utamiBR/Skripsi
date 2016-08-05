<?php

/*
 * kode untuk tampilan semua transaksi pada halaman home
 */

$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();

//  get by transaksi
$result = mysql_query("SELECT *FROM transaksi") or die(mysql_error());

// cek
if (mysql_num_rows($result) > 0) {
    // looping hasil
    // transaksi node
    $response["transaksi"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        $transaksi = array();
        $transaksi["id_transaksi"] = $row["id_transaksi"];
        $transaksi["bidang"] = $row['bidang'];
        $transaksi["produk"] = $row['produk'];
        $transaksi["pelanggan"] = $row['pelanggan'];
        $transaksi["proyek"] = $row['proyek'];
        $transaksi["total_harga_jual"] = $row['total_harga_jual'];
        $transaksi["tgl_transaksi"] = $row['tgl_transaksi'];
        

        // masukan transaksi pada $response
        array_push($response["transaksi"], $transaksi);
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
