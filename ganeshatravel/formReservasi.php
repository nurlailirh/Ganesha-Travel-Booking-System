<!DOCTYPE html>
<html lang=en>
<body style = "background-color : #FEE680;">
	<head> 
		<h1 align = "center">
		<img src="fix.png"></h1>
		<style>
			table {
				border-collapse: collapse;
				width: 60%;
			}

			th, td {
				text-align: center;
				padding: 3px;
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
		</style>
	</head>

<h2 align = "center" style = "background-color : maroon">
<body>
	<font face="arial" size ="5" color ="white">Ganesha Travel</font></h2>
	<form method="post">
		<div style="text-align:center">
			Nama : <input name="nama" type="text" id= nama style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>
		</div>
		<div style="text-align:center">
			Alamat : <input name="alamat" type="text" id = alamat style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>
		</div>
		<div style="text-align:center">
			No. Telepon : <input name="notelepon" type="text" id = notelepon style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>
		</div>
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
		<br>
		<div style="text-align:center">
			Seat : <input name="seat" type="text" id = seat style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>
		</div>
		<p align="center" id="pesan"><button class="button" style="text-align:center;" type="pesan" name="pesan">Pesan</button></p>
	</form>
	
	<?php
		if (isset($_POST['pesan'])) {
			$namaP = $_POST['nama'];
			$alamatP = $_POST['alamat'];
			$noteleponP = $_POST['notelepon'];
			$ruteP = $_POST['rute'];
			$haritanggalP = $_POST['haritanggal'];
			$jadwalP = $_POST['jadwal'];
			$seatP = $_POST['seat'];
			
			if((empty($_POST['nama'])) OR (empty($_POST['alamat'])) OR (empty($_POST['notelepon']))){
				echo "<script type='text/javascript'>alert('Kolom tidak boleh kosong')</script>";
			}
			else{
				$sql = "INSERT INTO reservasi (namaPelanggan,nomorSeat,tanggalPerjalanan,waktuPerjalanan,asalTujuan) VALUES ('$namaP','$seatP','$haritanggalP','$jadwalP','$ruteP')";
				$tambah = mysqli_query($con, $sql);
				
				$sql2 = "INSERT INTO pelanggan (namaPelanggan, alamat, telepon) VALUES ('$namaP', '$alamatP', '$noteleponP')";
				$tambah2 = mysqli_query($con, $sql2);
				
				if (($tambah) AND ($tambah2)) {
					echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
				} else{
					echo "<script type='text/javascript'>alert('failed!')</script>";
					}
				}
			}
		
		mysqli_close($con);
?>

	<div style="text-align:center">
			<button class="button" onclick="javascript:history.go(-1)" style="text-align:center;"><span>Kembali</span>
			</button>
			<br><br>
		</div>
	</div>
</body>

</html>
