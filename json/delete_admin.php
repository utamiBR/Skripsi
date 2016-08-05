<?php

/*
 * kode untuk menghapus data admin
 */

$response = array();

if (isset($_POST['id'])) {
    $id_admin = $_POST['id'];

    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // konekin ke db
    $db = new DB_CONNECT();

    // update by admin id (ID)
    $result = mysql_query("DELETE FROM admin WHERE id = $id_admin");
    
    // cek aksi
    if (mysql_affected_rows() > 0) {
        // jika sukses
        $response["success"] = 1;
        $response["message"] = "Data berhasil di hapus";

        // echoing JSON response
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Tidak ada data yang tersedia";

        // echo no users JSON
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Aksi tidak bisa di lakukan";

    // echoing JSON response
    echo json_encode($response);
}
?>
