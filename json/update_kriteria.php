<?php

/*
 * syntax untuk update form kriteria
 */

// array JSON response
$response = array();

if (isset($_POST['id_kriteria']) && isset($_POST['kriteria']) && isset($_POST['tgl_dibuat'])) {
    
    $id_kriteria = $_POST['id_kriteria'];
    $kriteria = $_POST['kriteria'];
    $tgl_dibuat = $_POST['tgl_dibuat'];
   

    // include db connect
    require_once __DIR__ . '/db_connect.php';

    // konek ke db
    $db = new DB_CONNECT();

    // update data kriteria by kriteria id (ID)
    $result = mysql_query("UPDATE kriteria SET kriteria='$kriteria', tgl_dibuat='$tgl_dibuat' WHERE id_kriteria='$id_kriteria'");

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
