<?php

/*
 * Buat transaksi baru
 */

$response = array();

// cek form
if (isset($_POST['id_transaksi']) && isset($_POST['bidang']) && isset($_POST['produk']) && isset($_POST['pelanggan'])
    && isset($_POST['proyek']) && isset($_POST['total_harga_jual']) && isset($_POST['tgl_transaksi'])) {
    
    $id_transaksi = $_POST['id_transaksi'];
    $bidang = $_POST['bidang'];
    $produk = $_POST['produk'];
    $pelanggan = $_POST['pelanggan'];
    $proyek = $_POST['proyek'];
    $total_harga_jual = $_POST['total_harga_jual'];
    $tgl_transaksi = $_POST['tgl_transaksi'];
   

    // include db connect
    require_once __DIR__ . '/db_connect.php';

    // koneksikan db
    $db = new DB_CONNECT();

    // insert ke db
    $result = mysql_query("INSERT INTO transaksi (id_transaksi, bidang, produk, pelanggan, proyek, total_harga_jual, tgl_transaksi) 
        VALUES ('$id_transaksi', '$bidang', '$produk', '$pelanggan', '$proyek', '$total_harga_jual', '$tgl_transaksi')");

    // cek data udah masuk belum
    if ($result) {
        // kalo sukses
        $response["success"] = 1;
        $response["message"] = "Insert data Anda berhasil";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // kalo gagal
        $response["success"] = 0;
        $response["message"] = "Sistem mendeteksi kesalahan, silahkan coba lagi";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Silahkan lengkapi aksi sebelum memulai permintaan Anda";

    // echoing JSON response
    echo json_encode($response);
}
?>
