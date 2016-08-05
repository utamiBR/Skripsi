<?php

/*
 * Buat data training baru
 */

$response = array();

// cek form
if (isset($_POST['id_training']) && isset($_POST['bidang']) && isset($_POST['pelanggan']) && isset($_POST['proyek'])
    && isset($_POST['total_harga_jual']) && isset($_POST['keputusan']) && isset($_POST['kedekatan'])) {
    
    $id_training = $_POST['id_training'];
    $bidang = $_POST['bidang'];
    $pelanggan = $_POST['pelanggan'];
    $proyek = $_POST['proyek'];
    $total_harga_jual = $_POST['total_harga_jual'];
    $keputusan = $_POST['keputusan'];
    $kedekatan = $_POST['kedekatan'];

   

    // include db connect
    require_once __DIR__ . '/db_connect.php';

    // koneksikan db
    $db = new DB_CONNECT();

    // insert ke db
    $result = mysql_query("INSERT INTO training (id_training, bidang, pelanggan, proyek, total_harga_jual, keputusan, kedekatan) 
        VALUES ('$id_training', '$bidang', '$pelanggan', '$proyek', '$total_harga_jual', $keputusan, $kedekatan)");

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
