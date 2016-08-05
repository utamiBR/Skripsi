<?php

/*
 * Buat admin baru
 */

$response = array();

// cek form
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

    // koneksikan db
    $db = new DB_CONNECT();

    // insert ke db
    $result = mysql_query("INSERT INTO admin(id, username, password, nama, email, tgl_lahir, tgl_dibuat) VALUES ('$id_admin', '$username', '$password', '$nama', '$email', '$tgl_lahir', $tgl_dibuat)");

    // cek data udah masuk belum
    if ($result) {
        // kalo sukses
        $response["success"] = 1;
        $response["message"] = "Insert data Anda berhasil";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // kalo gagal
        $response["success"] = 0;
        $response["message"] = "Sistem mendeteksi kesalahan, silahkan coba lagi";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Silahkan lengkapi aksi sebelum memulai permintaan Anda";

    // echoing JSON response
    echo json_encode($response);
}
?>
