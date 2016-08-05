<?php

/*
 * kode untuk single admin
 */

$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();

// cek data
if (isset($_GET["id"])) {
    $id_admin = $_GET['id'];

    $result = mysql_query("SELECT *FROM admin WHERE id = $id_admin");

    if (!empty($result)) {
        // cek kesediaan data
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $admin = array();
            $admin["id"] = $result["id"];
            $admin["username"] = $result['username'];
            $admin["password"] = $result['password'];
            $admin["nama"] = $result['nama'];
            $admin["email"] = $result['email'];
            $admin["tgl_lahir"] = $result['tgl_lahir'];
            $admin["tgl_dibuat"] = $result['tgl_dibuat'];
           
            // maka
            $response["success"] = 1;

            // node
            $response["admin"] = array();

            array_push($response["admin"], $admin);

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
