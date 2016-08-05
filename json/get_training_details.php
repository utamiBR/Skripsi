<?php

/*
 * kode untuk single training
 */

$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();

// cek data
if (isset($_GET["id_training"])) {
    $id_training = $_GET['id_training'];

    $result = mysql_query("SELECT *FROM training WHERE id_training = $id_training");

    if (!empty($result)) {
        // cek kesediaan data
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);
        
            $training = array();
            $training["id_training"] = $result["id_training"];
            $training["bidang"] = $result['bidang'];
            $training["pelanggan"] = $result['pelanggan'];
            $training["proyek"] = $result['proyek'];
            $training["total_harga_jual"] = $result['total_harga_jual'];
            $training["kelayakan"] = $result['kelayakan'];
            
            
            // maka
            $response["success"] = 1;

            // node
            $response["training"] = array();

            array_push($response["training"], $training);

            // echoing JSON response
            echo json_encode($response);
        } else {
            // jika kosong
            $response["success"] = 0;
            $response["message"] = "Tidak ada data";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        $response["success"] = 0;
        $response["message"] = "Tidak ada data";

        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Silahkan lengkapi permintaan Anda";

    echo json_encode($response);
}
?>
