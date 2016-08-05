<?php

/*
 * syntax untuk update form transaksi
 */

// array JSON response
$response = array();

if (isset($_POST['id_transaksi']) && isset($_POST['bidang']) && isset($_POST['produk']) && isset($_POST['pelanggan']) && isset($_POST['proyek'])
    && isset($_POST['total_harga_jual']) && isset($_POST['tgl_transaksi'])) {
    
    $id_transaksi = $_POST['id_transaksi'];
    $bidang = $_POST['bidang'];
    $produk = $_POST['produk'];
    $pelanggan = $_POST['pelanggan'];
    $proyek = $_POST['proyek'];
    $total_harga_jual = $_POST['total_harga_jual'];
    $tgl_transaksi = $_POST['tgl_transaksi'];

    // include db connect
    require_once __DIR__ . '/db_connect.php';

    // konek ke db
    $db = new DB_CONNECT();

    // update data transaksi by transaksi id (PID)
    $result = mysql_query("UPDATE transaksi SET bidang='$bidang', produk='$produk', pelanggan='$pelanggan', proyek='$proyek', total_harga_jual='$total_harga_jual', tgl_transaksi='$tgl_transaksi' WHERE id_transaksi ='$id_transaksi'");

    // cek data sudah masuk apa belum
    if ($result) {
        // kalo sukses
        $response["success"] = 1;
        $response["message"] = "Data anda berhasil di perbarui";
        
        // echo JSON response
        echo json_encode($response);
    } else {
        
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Mohon kelengkapan data Anda";

    // echoJSON response
    echo json_encode($response);
}
?>
