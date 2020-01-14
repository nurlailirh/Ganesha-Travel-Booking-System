<?php
	session_start();
?>

<html>
	<body style = "background-color : #FEE680;">
	<head> 
		<style>
		.button {
		  display: inline-block;
		  padding: 10px 20px;
		  font-size: 20px;
		  cursor: pointer;
		  text-align: center;	
		  text-decoration: none;
		  outline: none;
		  color: #fff;
		  background-color: #4CAF50;
		  border: none;
		  border-radius: 10px;
		  box-shadow: 0 5px #999;
		  width: 300px;
		}

		.button:hover {background-color: #3e8e41}

		.button:active {
		  background-color: #3e8e41;
		  box-shadow: 0 3px #666;
		  transform: translateY(4px);
		}
		</style>
		<br>
		<h1 align = "center">
		<img src="fix.png"></h1>
	</head>
	<body>
		
		<h2 align = "center" style = "background-color : maroon">
	<font face="arial" size ="5" color ="white">
		
		Menu
		<?php
		echo $_SESSION["namaPegawai"];
		?>
		
	</font></h2>
		
		<div style="text-align:center">
			<button class="button" onclick="location.href='daftarRute.php';"><span>Daftar Rute dan Jadwal</span>
			</button>
			<br><br>
		</div>
		<div style="text-align:center">
			<button class="button" onclick="location.href='seat.php';"><span>Reservasi</span>
			</button>
			<br><br>
		</div>
		</div>
		<div style="text-align:center">
			<button class="button" onclick="location.href='infoReservasi.php';"><span>Info Reservasi</span>
			</button>
			<br><br>
		</div>
		<div style="text-align:center">
			<button class="button" onclick="location.href='edit.php';"><span>Edit Reservasi</span>
			</button>
			<br><br>
		</div>
		</div>
		<div style="text-align:center">
			<button class="button" onclick="location.href='logout.php';"><span>Logout</span>
			</button>
			<br><br>
		</div>	
	</body>	
</html>
