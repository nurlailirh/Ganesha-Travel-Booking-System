
<html>
	<body style = "background-color : #FEE680;">
   <head>
        <link rel="stylesheet" type="text/css" href="style.css">
		<br> 
		<h1 align = "center">
		<font face="mv boli" size ="6" color ="maroon">Login</font><br> 
		<img src="fix.png"></h1></br>		
    </head>
    <body>
		
		<h2 align = "center">
			
        <div id="kotak">
            <div id="atas">
                LOGIN KARYAWAN
            </div>
            <div id="bawah">
                <form method="post">
                    <input class="masuk" type="text" autocomplete="on" placeholder="username" name="username"><br/>
                    <input class="masuk" type="password" autocomplete="on" placeholder="password" name="password"><br/>
                    <input id="tombol" type="submit" value="Login" name="login">
                </form>
            </div>
        </div>
			

		<?php
		session_start(); 		//mulai session, krena kita akan menggunakan session pd file php ini
		include('config.php');
			
		if (isset($_POST['login'])) {
		$username=$_POST['username']; 	//tangkap data yg di input dari form login input username
		$password=$_POST['password']; 	//tangkap data yg di input dari form login input password
	 
		$query = mysqli_query($con,"select * from pegawai where username='$_POST[username]' and password='$_POST[password]'");	 //melakukan pengampilan data dari database untuk di cocokkan
		$xxx = mysqli_fetch_array($query);
		$namaPegawai = $xxx['namaPegawai'];
		
		if(!empty($xxx['username']) AND !empty($xxx['password'])){ 		// melakukan pemeriksaan kecocokan dengan percabangan.
			if ($xxx['jenis'] == "Admin"){
				$_SESSION['namaPegawai']=$namaPegawai;  //jika cocok, buat session dengan nama sesuai dengan username
				$_SESSION['username']=$username;
				header("location:menuAdmin.php");     // dan alihkan ke gudang.php
			}
			else if ($xxx['jenis'] == "Front Officer"){
				$_SESSION['namaPegawai']=$namaPegawai;  //jika cocok, buat session dengan nama sesuai dengan username
				$_SESSION['username']=$username;
				header("location:menu.php");     // dan alihkan ke showroom.php
			}
		}else{   
		//jika tidak tampilkan pesan gagal login
		  $message = "Username dan Password salah.\\nSilahkan coba lagi.";
		echo "<script type='text/javascript'>alert('$message');</script>";
			
		}
				}
	?>
</h2>
    </body>
</html>
