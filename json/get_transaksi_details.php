<?php

/*
 * kode untuk single transaksi
 */

$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();

// cek data
if (isset($_GET["id_transaksi"])) {
    $id_transaksi = $_GET['id_transaksi'];

    $result = mysql_query("SELECT *FROM transaksi WHERE id_transaksi = $id_transaksi");

    if (!empty($result)) {
        // cek kesediaan data
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $transaksi = array();
            $transaksi["id_transaksi"] = $result["id_transaksi"];
            $transaksi["bidang"] = $result['bidang'];
            $transaksi["produk"] = $result['produk'];
            $transaksi["pelanggan"] = $result['pelanggan'];
            $transaksi["proyek"] = $result['proyek'];
            $transaksi["total_harga_jual"] = $result['total_harga_jual'];
            $transaksi["tgl_transaksi"] = $result['tgl_transaksi'];
            
            // maka
            $response["success"] = 1;

            // node
            $response["transaksi"] = array();

            array_push($response["transaksi"], $transaksi);

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
