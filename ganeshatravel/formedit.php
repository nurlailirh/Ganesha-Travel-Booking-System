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
<body>

<?php
	include('config.php');
		if(isset($_GET['idReservasi']))
		{
			$id=$_GET['idReservasi'];
			if(isset($_POST['submit']))
			{
				//Inisialisasi
				$namaPelanggan=$_POST['namaPelanggan'];
				$asalTujuan=$_POST['asalTujuan'];
				$tanggalPerjalanan=$_POST['tanggalPerjalanan'];
				$waktuPerjalanan=$_POST['waktuPerjalanan'];
				$nomorSeat=$_POST['nomorSeat'];
				//QUERY
				
				//Update tabel reservasi
				$update=mysqli_query($con,
					"UPDATE reservasi SET 
					waktuReservasi=NOW(),
					tanggalPerjalanan='$tanggalPerjalanan',
					waktuPerjalanan='$waktuPerjalanan',
					nomorSeat='$nomorSeat',
					namaPelanggan='$namaPelanggan',
					asalTujuan='$asalTujuan'
					WHERE idReservasi='$id'");
				
				echo 'Cekupdate';
				
				if(!$update){
					die('Gagal tambah data: ' . mysql_error());
				} else {
					echo "Berhasil";
					header('location: edit.php');
				}
			}
			
			//Query tampilkan
			$query1=mysqli_query($con,
				"SELECT waktuReservasi, 
				namaPelanggan, 
				asalTujuan, 
				tanggalPerjalanan, 
				waktuPerjalanan,
				nomorSeat 
				FROM reservasi
				WHERE idReservasi='$id'");
			
			$fquery1=mysqli_fetch_array($query1);	
			
		}
		?>	
	<h2 align = "center" style = "background-color : maroon">
		<font face="arial" size ="5" color ="white"> 
			MENGUBAH DATA RESERVASI 
		</font>
	</h2>
	
	<!-- Form update reservasi -->
	<form method="post" action="">
		<div style="text-align:center">
			Tanggal reservasi: <input type="text" name="waktuReservasi" value="<?php echo $fquery1['waktuReservasi']; ?>" style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>		
		</div>
		<div style="text-align:center">
			Nama: <input type="text" name="namaPelanggan" value="<?php echo $fquery1['namaPelanggan']; ?>" style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>		
		</div>
		<div style="text-align:center">
			Rute: <input type="text" name="asalTujuan" value="<?php echo $fquery1['asalTujuan']; ?>" style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>		
		</div>
		<div style="text-align:center">
			Tanggal Perjalanan: <input type="text" name="tanggalPerjalanan" value="<?php echo $fquery1['tanggalPerjalanan']; ?>" style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>		
		</div>
		<div style="text-align:center">
			Waktu Perjalanan: <input type="text" name="waktuPerjalanan" value="<?php echo $fquery1['waktuPerjalanan']; ?>" style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>		
		</div>
		<div style="text-align:center">
			Nomor Seat: <input type="text" name="nomorSeat" value="<?php echo $fquery1['nomorSeat']; ?>" style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>		
		</div>
		
		<p align="center">
			<button class="button" style="text-align:center;" type="submit" name="submit">
				Update
			</button>
		</p>
	</form>		
	
	<div style="text-align:center">
		<button class="button" onclick="javascript:history.go(-1)" style="text-align:center;"><span>Kembali</span>
		</button>
		<br><br>
	</div>
		
</body>
</html>

