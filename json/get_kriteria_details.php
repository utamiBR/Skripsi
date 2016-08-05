<?php

/*
 * kode untuk single kriteria
 */

$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();

// cek data
if (isset($_GET["id_kriteria"])) {
    $id_kriteria = $_GET['id_kriteria'];

    $result = mysql_query("SELECT *FROM kriteria WHERE id_kriteria = $id_kriteria");

    if (!empty($result)) {
        // cek kesediaan data
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $kriteria= array();
            $kriteria["id_kriteria"] = $result["id_kriteria"];
            $kriteria["kriteria"] = $result['kriteria'];
            $kriteria["tgl_dibuat"] = $restult['tgl_dibuat'];

            
            // maka
            $response["success"] = 1;

            // node
            $response["kriteria"] = array();

            array_push($response["kriteria"], $kriteria);

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
