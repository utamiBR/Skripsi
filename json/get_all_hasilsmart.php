<?php



$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// konekin ke db
$db = new DB_CONNECT();


    $query_kelayakan = "SELECT * FROM kelayakan";
    $result_kelayakan = mysql_query($query_kelayakan);
    $count_kelayakan = mysql_num_rows($result_kelayakan);
    $response["hasil_smart"] = array();

    while ($data = mysql_fetch_array($result_kelayakan)) {
        $kode_kelayakan = $data['kelayakan'];
        //QUERY MENGHITUNG JUMLAH KELAYAKAN SESUAI DENGAN KODE KELAYAKAN
        $query_jumlah = "SELECT kelayakan, COUNT(*) AS jumlah_kelayakan FROM hasil_smart WHERE kelayakan='$kode_kelayakan'";
        $result_jumlah = mysql_query($query_jumlah);
        $row = mysql_fetch_array($result_jumlah);

        $hasil_smart["kelayakan"] = $row["kelayakan"];
        $hasil_smart["jumlah_kelayakan"] = $row['jumlah_kelayakan'];
        array_push($response["hasil_smart"], $hasil_smart);
        
        }
        $response["success"] = 1;
        echo json_encode($response);
 
 /*  if (mysql_num_rows($result_jumlah) > 0) {
    // looping hasil
    // admin node
    $response["hasil_knn"] = array();
    
    while ($row = mysql_fetch_array($result_jumlah)) {
        $hasil_knn = array();
        $hasil_knn["kelayakan"] = $row["kelayakan"];
        $hasil_knn["jumlah_kelayakan"] = $row['jumlah_kelayakan'];
  
       

        // masukan admin pada $response
        array_push($response["hasil_knn"], $hasil_knn);
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

    */  
?>
