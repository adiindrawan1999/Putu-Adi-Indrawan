<html>
<head>
	<title>SISTEM PENJUALAN BENGKEL</title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN PENJUALAN</h2>
		<h4>TEGUH MOTOR</h4>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
        		<th width="1%">Id</th>
				<th>Nama Barang</th>
				<th width="5%">Jumlah</th>
                <th>total</th>
                <th>Tanggal</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"SELECT detail_penjualan.id, barang.nama, detail_penjualan.jumlah, penjualan.total, penjualan.tanggal  
        FROM detail_penjualan
		JOIN penjualan ON penjualan.id = detail_penjualan.penjualan_id
		JOIN barang ON barang.id = detail_penjualan.barang_id");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
                <td><?php echo $data['id']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['total']; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>