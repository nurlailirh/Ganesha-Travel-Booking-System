<?php

$dsn = 'mysql:host=localhost;dbname=ganeshatravel';
$username = 'root';
$password = '';

try{
    
    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $ex) {

    echo 'Not Connected '.$ex->getMessage();
}


$epr='';
$tableContent = '';
$start = '';
$selectStmt = $con->prepare('SELECT * FROM rute');
$selectStmt->execute();
$users = $selectStmt->fetchAll();

foreach ($users as $user)
{
     $tableContent = $tableContent.'<tr>'.
			'<td>'.$user['idRute'].'</td>'
            .'<td>'.$user['asalTujuan'].'</td>'
            .'<td>'.$user['waktu'].'</td>'
            .'<td>'.$user['harga'].'</td>'
            .'<td><a href="gantiRute.php?epr=Hapus&idRute='.$user['idRute'].'">Hapus</a></td>';
    
}

if(isset($_GET['epr']))
	$epr=$_GET['epr'];		
	if($epr=='Hapus'){
		$idRute=$_GET['idRute'];
		$sql = $con->prepare('DELETE FROM rute WHERE idRute=:idRute');
		$sql->execute(array(
        
         ':idRute'=>$idRute
    
		));
		if($sql)
			header("location:gantiRute.php");
		else
			$msg='Error : '.mysql_error();
	}

if(isset($_POST['search']))
{
	$start = $_POST['start'];
	$tableContent = '';
	$selectStmt = $con->prepare('SELECT * FROM rute WHERE asalTujuan=:start');
	$selectStmt->execute(array(
			
			 ':start'=>$start
		
	));
	$users = $selectStmt->fetchAll();
		
	foreach ($users as $user)
	{
	   $tableContent = $tableContent.'<tr>'.
				'<td>'.$user['idRute'].'</td>'
				.'<td>'.$user['asalTujuan'].'</td>'
				.'<td>'.$user['waktu'].'</td>'
				.'<td>'.$user['harga'].'</td>'
				.'<td><a href="gantiRute.php?epr=Hapus&idRute='.$user['idRute'].'">Hapus</a></td>';
	}    
}

if(isset($_POST['kirim']))
{
	$asalTujuan = $_POST['asalTujuan'];
	$waktu = $_POST['waktu'];
	$harga = $_POST['harga'];
	if((empty($_POST['asalTujuan'])) OR (empty($_POST['waktu'])) OR (empty($_POST['harga']))){
		echo "Kolom tidak boleh kosong";
	}else{
		
		$sql = $con->prepare('INSERT INTO rute(asalTujuan, waktu, harga) VALUES (:asalTujuan, :waktu, :harga)');
		$sql->execute(array(
			':asalTujuan'=>$asalTujuan,
			':waktu'=>$waktu,
			':harga'=>$harga
			
		));
		
		if(!$sql ){
			die('Gagal tambah data: ' . mysql_error());
		} else{
			header("location:gantiRute.php"); 

		}
	}		
}



?>

<!DOCTYPE html>
<html>
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
			<font face="arial" size ="5" color ="white">Rute Ganesha Travel</font></h2>
		</body>

    <body>
        
        <form action="gantiRute.php" method="POST">
            <!-- 
For The First Time The Table Will Be Populated With All Data
But When You Choose An Option From The Select Options And Click The Find Button, The Table Will Be Populated With specific Data 
             -->
            <div style="text-align:center">
            <select name="start">
                <option value="">...</option>
                <?php
					$selectStmt = $con->prepare('SELECT DISTINCT asalTujuan FROM rute');
					$selectStmt->execute();
					$results= $selectStmt->fetchAll();
					foreach ($results as $result)
					{
						$asalTujuan = $result['asalTujuan'];
						echo '<option value="'.$asalTujuan.'">'.$asalTujuan.'</option>';
					}
				?>			
            </select>
            </div>
            
            <div style="text-align:center">
				<input type="submit" name="search" value="Find">
            </div>
            
            <form method="post">
				<span style="float:right;">
				<div align="right">
					Asal-Tujuan : <input name="asalTujuan" type="text" id=asalTujuan  style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>
				</div>
				
				<div align="right">
					Waktu: <input name="waktu" type="text" id = "waktu" style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>
				</div>
				
				<div align="right">
					Harga: <input name="harga" type="text" id = "harga" style="background-color:#4CAF50; color:#FFFFFF"/> <br><br>
				</div>
				
				<p align="right"><button class="button" style="text-align:right;" type="submit" name="kirim">Tambah</button></p>
				</span>
			</form>
            
            <table align="center">
                <tr>
                    <td>ID</td>
                    <td>Asal-Tujuan</td>
                    <td>Waktu</td>
                    <td>Harga</td>
                    <td>Opsi</td>
                </tr>
                
                <?php
                
                echo $tableContent;
                
                ?>
            </table> 
        </form>
        <div style="text-align:center">
			<button class="button" onclick="javascript:history.go(-1)" style="text-align:center;"><span>Kembali</span>
			</button>
			<br><br>
		</div>
    </body>  
  </body>  
</html>


