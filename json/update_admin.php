<?php

/*
 * syntax untuk update form admin
 */

// array JSON response
$response = array();

if (isset($_POST['id_admin']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nama'])
    && isset($_POST['email']) && isset($_POST['tgl_lahir']) && isset($_POST['tgl_dibuat'])) {
    
    $id = $_POST['id_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $tgl_dibuat = $_POST['tgl_dibuat'];

    // include db connect
    require_once __DIR__ . '/db_connect.php';

    // konek ke db
    $db = new DB_CONNECT();

    // update data admin by admin id (ID)
    $result = mysql_query("UPDATE  admin SET id='$id_admin', username='$username', password='$password', nama='$nama', email='$email', tgl_lahir='$tgl_lahir', tgl_dibuat='$tgl_dibuat'");

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
