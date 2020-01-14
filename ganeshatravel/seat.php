<!DOCTYPE html>
<html lang="en">
	<body style = "background-color : #FEE680;">
	<head>
		<style>
			table {
				border-collapse: collapse;
				width: 20%;
			}

			th, td {
				text-align: center;
				padding: 8px;
			}

			tr:nth-child(even){background-color: #f2f2f2}

			th {
				background-color: #4CAF50;
				color: white;
			}
			.button {
			  display: inline-block;
			  padding: 8px 18px;
			  font-size: 15px;
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
		</style>
		<h1 align = "center">
		<img src="fix.png"></h1>
	</head>
	
	<body>
	<h3  align="center" style = "background-color : maroon">
	<font face="arial" size ="5" color ="white">Cek Ketersediaan Seat </font></h3>
	<form method="POST">
	<div style="text-align:center">
			Rute :
			<select id="rute" name ="rute" style="background-color:#4CAF50; color:#FFFFFF">
			<?php
				include('config.php');
				
				$result = $con->query("SELECT DISTINCT asalTujuan FROM rute");
			
				while ($row = $result->fetch_assoc()) {
							  //unset($asalTujuan);
							  $rute = $row['asalTujuan'];
							  echo '<option value="'.$rute.'">'.$rute.'</option>';

				}	
			?>
			</select>
			<br><br>
		</div>
	<div style="text-align:center">
			Hari/Tanggal : <input name="haritanggal" type="date" id = "haritanggal" style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>
			<script>
			function dateFunction() {
				var x = document.getElementById("haritanggal").value;
				document.getElementById("demo").innerHTML = x;
			}
			</script>

		</div>
	<div style="text-align:center">
			Jadwal :
			<select id= jadwal name ="jadwal" style="background-color:#4CAF50; color:#FFFFFF">
			<?php
				$result = $con->query("SELECT DISTINCT waktu FROM rute");
			
				while ($row = $result->fetch_assoc()) {
							  //unset($asalTujuan);
							  $jadwal = $row['waktu'];
							  echo '<option value="'.$jadwal.'">'.$jadwal.'</option>';

				}
			?>
			</select>
		</div>
	
	<p align="center"><button class="button" style="text-align:center;" type="submit" name="kirim">Lihat Seat Terisi</button></p>
	</form>
	
	<h2 align = "center" style = "background-color : maroon">
	<font face="arial" size ="5" color ="white">Denah Seat</font></h2>
		<h3 align = "center">
		<img src="kursi.png" height = "200"></h3>
	
	<table align="center">
				<thead>
					<th>Seat Terisi</th>
				</thead>
<?php
		if (isset($_POST['kirim'])) {
			$rute = $_POST['rute'];
			$haritanggal = $_POST['haritanggal'];
			$jadwal = $_POST['jadwal'];
			
		$result = mysqli_query($con,"SELECT nomorSeat FROM reservasi WHERE asalTujuan = '$rute' AND tanggalPerjalanan = '$haritanggal' AND waktuPerjalanan = '$jadwal' ORDER BY 'nomorSeat' ASC ");

			while ($row = mysqli_fetch_array($result)) {
			   
			echo "<tr>
				<td align ='center'>".$row['nomorSeat']."</td>
			
			</tr>";
				}
			
		}
		mysqli_close($con);
	 ?>	
	 
		
	</h2>
	
	</table> <br>
	<h3  style = "background-color : maroon" align="center">
	<font face="arial" size ="5" color ="maroon">DATA BAHAN KELUAR</font></h3>
	
	<div style="text-align:center">
			<button class="button" onclick="javascript:history.go(-1)" style="text-align:center;"><span>Kembali</span>
			</button>
			<br><br>
	</div>
		
	<div style="text-align:center">
		<button class="button" onclick="location.href='formReservasi.php';"><span>Lanjut Ke Pemesanan</span>
		</button>
		<br><br>
	</div>
	
	</body>
</html>
