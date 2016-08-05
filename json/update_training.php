<?php

/*
 * syntax untuk update form training
 */

// array JSON response
$response = array();

if (isset($_POST['id_training']) && isset($_POST['bidang']) && isset($_POST['pelanggan']) && isset($_POST['proyek']) && isset($_POST['total_harga_jual'])
    && isset($_POST['keputusan']) && isset($_POST['kedekatan'])) {
    
    $id_training = $_POST['id_training'];
    $bidang = $_POST['bidang'];
    $pelanggan = $_POST['pelanggan'];
    $proyek = $_POST['proyek'];
    $total_harga_jual = $_POST['total_harga_jual'];
    $keputusan = $_POST['keputusan'];
    $kedekatan = $_POST['kedekatan'];
   

    // include db connect
    require_once __DIR__ . '/db_connect.php';

    // konek ke db
    $db = new DB_CONNECT();

    // update data training by training id (PID)
    $result = mysql_query("UPDATE training SET bidang='$bidang', pelanggan='$pelanggan', proyek='$proyek', total_harga_jual='$total_harga_jual', 
        keputusan='$keputusan', kedekatan='$kedekatan' WHERE id_training='$id_training'");

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
