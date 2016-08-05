<!--Fungsi Load Javascript fusioncharts-->

<script type="text/javascript" src="JS/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="JS/jquery-1.4.js"></script>
<script type="text/javascript" src="JS/jquery.fusioncharts.js"></script>
<!--GRAFIK JUMLAH KELAYAKAN DENGAN METODE KNN-->
<p>Keterangan:</p>
     <p>kurang = 2</p>
     <p>cukup = 3</p>
     <p>baik = 4</p>
<div class="tengah_judul">
   	Grafik Jumlah Kelayakan Dengan Metode KNN Tahun 2014-2015<hr align="left" size="1" color="#cccccc">
</div>

<table id="TableKelayakan" border="0" align="center" cellpadding="10">
    <tr bgcolor="#FF9900" style='display:none;'> <th>Kelayakan</th> <th>Jumlah Kelayakan</th></tr>
    <?php
	//KONEKSI KE DATABASE
	mysql_connect("localhost", "root", "") ;
    mysql_select_db("spkspinti");
	//QUERY AMBIL DATA KELAYAKAN
    $query_kelayakan = "SELECT * FROM kelayakan";
    $result_kelayakan = mysql_query($query_kelayakan);
    $count_kelayakan = mysql_num_rows($result_kelayakan);

    while ($data = mysql_fetch_array($result_kelayakan)) {
        $kode_kelayakan = $data['kelayakan'];
		//QUERY MENGHITUNG JUMLAH KELAYAKAN SESUAI DENGAN KODE KELAYAKAN
        $query_jumlah = "SELECT COUNT(*) AS jumlah_kelayakan FROM hasil_knn WHERE kelayakan='$kode_kelayakan'";
        $result_jumlah = mysql_query($query_jumlah);
        $data_kelayakan = mysql_fetch_array($result_jumlah);

        $query_baik = "SELECT COUNT(*) AS jumlah_kelayakan1 FROM hasil_knn WHERE kelayakan='4'";
        $result_jumlah1 = mysql_query($query_baik);
        $data_baik = mysql_fetch_array($result_jumlah1);

        $query_cukup = "SELECT COUNT(*) AS jumlah_kelayakan2 FROM hasil_knn WHERE kelayakan='3'";
        $result_jumlah2 = mysql_query($query_cukup);
        $data_cukup = mysql_fetch_array($result_jumlah2);

        $query_kurang = "SELECT COUNT(*) AS jumlah_kelayakan3 FROM hasil_knn WHERE kelayakan='2'";
        $result_jumlah3 = mysql_query($query_kurang);
        $data_kurang = mysql_fetch_array($result_jumlah3);

        echo "<tr bgcolor='#D5F35B' style='display:none;'>
              <td>Kode Kelayakan $data[kelayakan]</td>
              <td align='center'>$data_kelayakan[jumlah_kelayakan]</td>
              </tr>";

      
    }
        
    ?>

     

</table>
<!--LOAD HTML KE JQUERY FUSION CHART BERDASARKAN ID TABLE-->
<script type="text/javascript">
    $('#TableKelayakan').convertToFusionCharts({
        swfPath: "Charts/",
        type: "MSColumn3D",
        data: "#TableKelayakan",
        dataFormat: "HTMLTable"
    });

</script>


<!--GRAFIK JUMLAH KELAYAKAN DENGAN METODE SMART-->
<div class="tengah_judul">
   	Grafik Jumlah Kelayakan Dengan Metode SMART Tahun 2014-2015<hr align="left" size="1" color="#cccccc">
</div>

<table id="TableKelayakan1" border="0" align="center" cellpadding="10">
    <tr bgcolor="#FF9900" style='display:none;'> <th>Kelayakan</th> <th>Jumlah Kelayakan</th></tr>
    <?php
	//KONEKSI KE DATABASE
	mysql_connect("localhost", "root", "") ;
    mysql_select_db("spkspinti");
	//QUERY AMBIL DATA KELAYAKAN
    $query_kelayakan1 = "SELECT * FROM kelayakan";
    $result_kelayakan1 = mysql_query($query_kelayakan1);
    $count_kelayakan1 = mysql_num_rows($result_kelayakan1);

    while ($data1 = mysql_fetch_array($result_kelayakan1)) {
        $kode_kelayakan1 = $data1['kelayakan'];
		//QUERY MENGHITUNG JUMLAH KELAYAKAN SESUAI DENGAN KODE KELAYAKAN
        $query_jumlah1 = "SELECT COUNT(*) AS jumlah FROM hasil_smart WHERE kelayakan='$kode_kelayakan1'";
        $result_jumlah1 = mysql_query($query_jumlah1);
        $data_kelayakan1 = mysql_fetch_array($result_jumlah1);

        echo "<tr bgcolor='#D5F35B' style='display:none;'>
              <td>Kode Kelayakan $data1[kelayakan]</td>
              <td align='center'>$data_kelayakan1[jumlah]</td>
              </tr>";
    }
  
    ?>

</table>
<!--LOAD HTML KE JQUERY FUSION CHART BERDASARKAN ID TABLE-->
<script type="text/javascript">
    $('#TableKelayakan1').convertToFusionCharts({
        swfPath: "Charts/",
        type: "MSColumn3D",
        data: "#TableKelayakan1",
        dataFormat: "HTMLTable"
    });

</script>

 <?php
    //KONEKSI KE DATABASE
    mysql_connect("localhost", "root", "") ;
    mysql_select_db("spkspinti");
    //QUERY AMBIL DATA KELAYAKAN
    $query_kelayakan = "SELECT * FROM kelayakan";
    $result_kelayakan = mysql_query($query_kelayakan);
    $count_kelayakan = mysql_num_rows($result_kelayakan);

    while ($data = mysql_fetch_array($result_kelayakan)) {
        $kode_kelayakan = $data['kelayakan'];
        //QUERY MENGHITUNG JUMLAH KELAYAKAN SESUAI DENGAN KODE KELAYAKAN

        $query_baik_knn = "SELECT COUNT(*) AS jumlah_kelayakan1 FROM hasil_knn WHERE kelayakan='4'";
        $result_jumlah1 = mysql_query($query_baik_knn);
        $data_baik_knn = mysql_fetch_array($result_jumlah1);

        $query_cukup_knn = "SELECT COUNT(*) AS jumlah_kelayakan2 FROM hasil_knn WHERE kelayakan='3'";
        $result_jumlah2 = mysql_query($query_cukup_knn);
        $data_cukup_knn = mysql_fetch_array($result_jumlah2);

        $query_kurang_knn = "SELECT COUNT(*) AS jumlah_kelayakan3 FROM hasil_knn WHERE kelayakan='2'";
        $result_jumlah3 = mysql_query($query_kurang_knn);
        $data_kurang_knn = mysql_fetch_array($result_jumlah3);

        $query_baik_smart = "SELECT COUNT(*) AS jumlah1 FROM hasil_smart WHERE kelayakan='4'";
        $result_jumlah1 = mysql_query($query_baik_smart);
        $data_baik_smart = mysql_fetch_array($result_jumlah1);

        $query_cukup_smart = "SELECT COUNT(*) AS jumlah2 FROM hasil_smart WHERE kelayakan='3'";
        $result_jumlah2 = mysql_query($query_cukup_smart);
        $data_cukup_smart = mysql_fetch_array($result_jumlah2);

        $query_kurang_smart = "SELECT COUNT(*) AS jumlah3 FROM hasil_smart WHERE kelayakan='2'";
        $result_jumlah3 = mysql_query($query_kurang_smart);
        $data_kurang_smart = mysql_fetch_array($result_jumlah3);
    }
        echo "<p>Kesimpulan:</p>
        <p>Dari Hasil Grafik perhitungan KNN dan SMART di atas disimpulkan bahwa transaksi penjualan pada Tahun 2014-2015 yaitu
        dengan hasil perhitungan KNN memiliki jumlah kelayakan baik mencapai angka $data_baik_knn[jumlah_kelayakan1], cukup mencapai angka $data_cukup_knn[jumlah_kelayakan2], kurang mencapai angka $data_kurang_knn[jumlah_kelayakan3]
        dan hasil perhitungan SMART memiliki jumlah kelayakan baik mencapai angka $data_baik_smart[jumlah1], cukup mencapai angka $data_cukup_smart[jumlah2], kurang mencapai angka $data_kurang_smart[jumlah3]
        maka strategi penjualan yang harus dilakukan pada Tahun berikutnya adalah meningkatkan produk penjualan yang memiliki kelayakan baik</p>
        <p>Catatan: Hasil dari sistem bukan sebagai penentu akhir dalam proses seleksi, keputusan akhir tertinggi tetap berada dalam pihak pengambil keputusan.</p>";
    ?>
