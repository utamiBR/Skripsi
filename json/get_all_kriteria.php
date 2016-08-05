<?php

/*
 * kode untuk tampilan semua kriteria, pada halaman home
 */

$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();

//  get by kriteria
$result = mysql_query("SELECT *FROM kriteria") or die(mysql_error());

// cek
if (mysql_num_rows($result) > 0) {
    // looping hasil
    // kriteria node
    $response["kriteria"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        $kriteria = array();
        $kriteria["id_kriteria"] = $row["id_kriteria"];
        $kriteria["kriteria"] = $row['kriteria'];
        $kriteria["tgl_dibuat"] = $row['tgl_dibuat'];
 
        
        // masukan kriteria pada $response
        array_push($response["kriteria"], $kriteria);
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
