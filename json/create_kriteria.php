<?php

/*
 * Buat data kriteria baru
 */

$response = array();

// cek form
if (isset($_POST['id_kriteria']) && isset($_POST['kriteria']) && isset($_POST['tgl_dibuat'])) {
    
    $id_kriteria = $_POST['id_kriteria'];
    $kriteria = $_POST['kriteria'];
    $tgl_dibuat = $_POST['tgl_dibuat'];
    
   

    // include db connect
    require_once __DIR__ . '/db_connect.php';

    // koneksikan db
    $db = new DB_CONNECT();

    // insert ke db
    $result = mysql_query("INSERT INTO kriteria (id_kriteria, kriteria, tgl_dibuat)
        VALUES ('$id_kriteria', '$kriteria', '$tgl_dibuat')");

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
