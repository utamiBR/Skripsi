<?php

/*
 * kode untuk tampilan semua profil
 */

$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();

//  get by profil
$result = mysql_query("SELECT *FROM profil") or die(mysql_error());

// cek
if (mysql_num_rows($result) > 0) {
    // looping hasil
    // profil node
    $response["profil"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        $profil = array();
        $profil["id_profil"] = $row["id_profil"];
        $profil["keterangan"] = $row['keterangan'];
       

        // masukan profil pada $response
        array_push($response["profil"], $profil);
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
