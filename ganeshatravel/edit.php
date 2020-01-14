<html>
	<body style = "background-color : #FEE680;">
	<head> 
		<h1 align = "center">
			<img src="fix.png">
		</h1>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
			}
			th, td {
				text-align: center;
				padding: 4px;
				font-size: 13px;
			}
			tr:nth-child(even){background-color: #f2f2f2}
			th {
				background-color: #4CAF50;
				color: white;
			}
			.button {
			  display: inline-block;
			  padding: 8px 18px;
			  font-size: 13px;
			  cursor: pointer;
			  text-align: center;	
			  text-decoration: none;
			  outline: none;
			  color: #fff;
			  background-color: #4CAF50;
			  border: none;
			  border-radius: 8px;
			  box-shadow: 0 6px #999;
			}
			.button:hover {background-color: #3e8e41}
			.button:active {
			  background-color: #3e8e41;
			  box-shadow: 0 2px #666;
			  transform: translateY(4px);
			}
			.button onclick{
			  display: inline-block;
			  padding: 8px 18px;
			  font-size: 13px;
			  cursor: pointer;
			  text-align: center;	
			  text-decoration: none;
			  outline: none;
			  color: #fff;
			  background-color: #4CAF50;
			  border: none;
			  border-radius: 8px;
			  box-shadow: 0 6px #999;
			}
			.button onclick :hover {background-color: #3e8e41}
			.button onclick :active {
			  background-color: #3e8e41;
			  box-shadow: 0 2px #666;
			  transform: translateY(4px);
			}
		</style>
	</head>
	<body>
	<h2 align = "center" style = "background-color : maroon">
		<font face="arial" size ="5" color ="white"> INFO RESERVASI </font>
	</h2>
	<table align="center">
		<thead>
			<th>Nomor Reservasi</th>
			<th>Tanggal Reservasi</th>
			<th>Nama</th>
			<th>Rute</th>
			<th>Tanggal Perjalanan</th>
			<th>Waktu Perjalanan</th>
			<th>Status</th>
			<th>Pilihan ubah</th>
			<th>Pilihan hapus</th>
		</thead>

	<?php 
		include('config.php');
			
		//Setting status
		$from = new DateTimeZone('GMT');
		$to = new DateTimeZone('Asia/Bangkok');
		$now = new DateTime('now',$from);
		$now -> setTimezone($to);
		$currenttime = ((int)$now->getTimestamp())+21600;
		
		//TAMPILKAN DATA RESERVASI
		//Query pilih data
		$data=mysqli_query($con,"SELECT idReservasi, waktuReservasi, namaPelanggan, asalTujuan, tanggalPerjalanan, waktuPerjalanan 
			FROM reservasi");
		
		while ($row = mysqli_fetch_array($data)) {
		echo "<tr>";
		echo "<td>".$row['idReservasi']."</td>";
		echo "<td>".$row['waktuReservasi']."</td>";
		echo "<td>".$row['namaPelanggan']."</td>";
		echo "<td>".$row['asalTujuan']."</td>";
		echo "<td>".$row['tanggalPerjalanan']."</td>";
		echo "<td>".$row['waktuPerjalanan']."</td>";
		//Status
		$date = ($row['tanggalPerjalanan']);
		$time = ($row['waktuPerjalanan']);
		$routetime = strtotime($date." ".$time);
		if (($currenttime) < $routetime) {
		echo "<td>"."Belum berangkat"."</td>";
		} else {
		echo "<td>"."Sudah berangkat"."</td>";
		}
		echo "<td> <button onclick> 
				<a href='formedit.php?pil=ubah&idReservasi=".$row['idReservasi']."'> Ubah </a>
				</button> </td>";
		echo "<td> <button onclick>
				<a href='delete.php?id=".$row['idReservasi']."'> Hapus </a>
				</button> </td>";
		echo "</tr>";
		}
		echo "</table>";
	
		mysqli_free_result($data);
	?>
	<div style="text-align:center">
		<button class="button" onclick="javascript:history.go(-1)" style="text-align:center;"><span>Kembali</span>
		</button>
		<br><br>
	</div>
	</body>
	
</html>
