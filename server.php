<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "spkspinti";

mysql_connect($server, $username, $password) or die("<h1>Koneksi Mysql Error : </h1>" . mysql_error());
mysql_select_db($database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysql_error());

@$operasi = $_GET['operasi'];

switch ($operasi) {
    case "viewtraining":
        /* Source code untuk Menampilkan training */

        $query_tampil_training = mysql_query("SELECT * FROM training") or die(mysql_error());
        $data_array = array();
        while ($data = mysql_fetch_assoc($query_tampil_training)) {
            $data_array[] = $data;
        }
        echo json_encode($data_array);

       //print json_encode($data_array);

        break;
    case "inserttraining":
        /* Source code untuk Insert data */
        @$id_training = $_GET['id_training'];
        @$bidang = $_GET['bidang'];
        @$pelanggan = $_GET['pelanggan'];
        @$proyek = $_GET['proyek'];
        @$total_harga_jual = $_GET['total_harga_jual'];
        @$kelayakan = $_GET['kelayakan'];
        $query_insert_data = mysql_query("INSERT INTO training (id_training, bidang, pelanggan, proyek, total_harga_jual, kelayakan) VALUES('$id_training', '$bidang', '$pelanggan', '$proyek', '$total_harga_jual', '$kelayakan')");
        if ($query_insert_data) {
            echo "Data Berhasil Disimpan";
        } else {
            echo "Error Insert Training" . mysql_error();
        }

        break;
    case "get_training_by_id":
        /* Source code untuk Edit data dan mengirim data berdasarkan id yang diminta */
        @$id_training = $_GET['id_training'];

        $query_tampil_training = mysql_query("SELECT * FROM training WHERE id_training='$id_training'") or die(mysql_error());
        $data_array = array();
        $data_array = mysql_fetch_assoc($query_tampil_training);
        echo "[" . json_encode($data_array) . "]";


        break;
    case "updatetraining":
        /* Source code untuk Update training */
        @$id_training = $_GET['id_training'];
        @$bidang = $_GET['bidang'];
        @$pelanggan = $_GET['pelanggan'];
        @$proyek = $_GET['proyek'];
        @$total_harga_jual = $_GET['total_harga_jual'];
        @$kelayakan = $_GET['kelayakan'];
        $query_update_training = mysql_query("UPDATE training SET bidang='$bidang', pelanggan='$pelanggan', proyek='$proyek', total_harga_jual='$total_harga_jual', kelayakan='$kelayakan' WHERE id_training='$id_training'");
        if ($query_update_training) {
            echo "Update Data Berhasil";
        } else {
            echo mysql_error();
        }

        break;
    case "deletetraining":
        /* Source code untuk Delete training */
        @$id_training = $_GET['id_training'];
        $query_delete_training = mysql_query("DELETE FROM training WHERE id_training='$id_training'");
        if ($query_delete_training) {
            echo "Delete Data Berhasil";
        } else {
            echo mysql_error();
        }

        break;
    case "viewtesting":
        /* Source code untuk Menampilkan testing */

        $query_tampil_testing = mysql_query("SELECT * FROM transaksi limit 200") or die(mysql_error());
        $data_array = array();
        while ($data = mysql_fetch_assoc($query_tampil_testing)) {
            $data_array[] = $data;
        }
        echo json_encode($data_array);

       //print json_encode($data_array);

        break;
    case "inserttesting":
        /* Source code untuk Insert data */
        @$id_transaksi = $_GET['id_transaksi'];
        @$bidang = $_GET['bidang'];
        @$produk = $_GET['produk'];
        @$pelanggan = $_GET['pelanggan'];
        @$proyek = $_GET['proyek'];
        @$total_harga_jual = $_GET['total_harga_jual'];
        @$tgl_transaksi = $_GET['tgl_transaksi'];
        $query_insert_data = mysql_query("INSERT INTO transaksi (id_transaksi, bidang, produk, pelanggan, proyek, total_harga_jual, tgl_transaksi) VALUES('$id_transaksi', '$bidang', '$produk', '$pelanggan', '$proyek', '$total_harga_jual', '$tgl_transaksi')");
        if ($query_insert_data) {
            echo "Data Berhasil Disimpan";
        } else {
            echo "Error Insert Testing" . mysql_error();
        }

        break;
    case "get_testing_by_id":
        /* Source code untuk Edit data dan mengirim data berdasarkan id yang diminta */
        @$id_transaksi = $_GET['id_transaksi'];

        $query_tampil_testing = mysql_query("SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysql_error());
        $data_array = array();
        $data_array = mysql_fetch_assoc($query_tampil_testing);
        echo "[" . json_encode($data_array) . "]";


        break;
    case "updatetesting":
        /* Source code untuk Update testing */
        @$id_transaksi = $_GET['id_transaksi'];
        @$bidang = $_GET['bidang'];
        @$produk = $_GET['produk'];
        @$pelanggan = $_GET['pelanggan'];
        @$proyek = $_GET['proyek'];
        @$total_harga_jual = $_GET['total_harga_jual'];
        @$tgl_transaksi = $_GET['tgl_transaksi'];
        $query_update_testing = mysql_query("UPDATE transaksi SET bidang='$bidang', produk='$produk', pelanggan='$pelanggan', proyek='$proyek', total_harga_jual='$total_harga_jual', tgl_transaksi='$tgl_transaksi' WHERE id_transaksi='$id_transaksi'");
        if ($query_update_testing) {
            echo "Update Data Berhasil";
        } else {
            echo mysql_error();
        }

        break;
    case "deletetesting":
        /* Source code untuk Delete testing */
        @$id_transaksi = $_GET['id_transaksi'];
        $query_delete_testing = mysql_query("DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
        if ($query_delete_testing) {
            echo "Delete Data Berhasil";
        } else {
            echo mysql_error();
        }

        break;

    default:
        break;
}
?>