<?php

/*
 * kode untuk tampilan semua admin
 */

$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();

//  get by admin
$result = mysql_query("SELECT *FROM admin") or die(mysql_error());

// cek
if (mysql_num_rows($result) > 0) {
    // looping hasil
    // admin node
    $response["admin"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        $admin = array();
        $admin["id"] = $row["id"];
        $admin["username"] = $row['username'];
        $admin["password"] = $row['password'];
        $admin["nama"] = $row['nama'];
        $admin["email"] = $row['email'];
        $admin["tgl_lahir"] = $row['tgl_lahir'];
        $admin["tgl_dibuat"] = $row['tgl_dibuat'];
       

        // masukan admin pada $response
        array_push($response["admin"], $admin);
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
