<!DOCTYPE html>
<html lang="en">
<head>
  <title>Harga Kebutuhan Pokok Nasional </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script src="assets/action.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/style.css"/>
  <style>
	body {
		background: url(assets/bg.jpg) no-repeat center center fixed gray;
		-webkit-background-size: cover; /* For WebKit*/
		-moz-background-size: cover;    /* Mozilla*/
		-o-background-size: cover;      /* Opera*/
		background-size: cover;         /* Generic*/
	}
	.navbar-default {
		background-color: #2196F3;
		border-color: #2196F3;
		border-radius:0px;
		box-shadow:0px 0px 5px black;
	}
	.navbar-default .navbar-brand {
		color:white;
	}
	.navbar-default .navbar-brand:hover{
		color:white;
	}
	.navbar-default .navbar-brand:after{
		color:white;
	}
	.panel-primary {
		border-color: #E91E63;
		box-shadow:2px 2px 3px gray;
	}
	.panel-primary>.panel-heading {
		color: #fff;
		background-color: #E91E63;
		border-color: #E91E63;
	}
	.table{
		background:white;
		box-shadow:2px 2px 3px gray;
	}
	.table-header{
		background:#cddc39;
		color:white;
		box-shadow:0px 0px 5px black;
	}
	.box-content{
		margin-top:70px;
	}
  </style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">CEK HARGA KEBUTUHAN POKOK NASIONAL</a>
    </div>
  </div>
</nav>
  
<div class="container box-content">
  <div class="row">
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Jenis Kebutuhan Pokok</div>
			<div class="panel-body">
				<form method="post" action="index.php" enctype="multipart/form-data" >
				  <div class="form-group">
					<label for="inputdefault">Bulan</label>
					<input class="form-control input-sm" id="weight" name="bulan" type="text"/>
					</select>
				  </div>
				  <div class="form-group">
					<label for="inputdefault">Tahun</label>
					<input class="form-control input-sm" id="weight" name="tahun" type="text"/>
				  </div>
				  <input type="submit" value="Cek Harga"/>
				</form>
			</div>
		</div>
		
		
		<br><br>
	</div>
	
	<div class="col-md-9">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="table-header">
				  <tr>
					<th>No</th>
					<th>Komoditas</th>
					<th>Unit</th>
					<th>Lampau</th>
					<th>Kemarin</th>
					<th>Sekarang</th>
				  </tr>
				</thead>
				<?php
				//pengecekn data inputan
				if(isset($_POST['tahun']) && isset($_POST['bulan'])){
					$url = 'https://sites.google.com/macros/exec?service=AKfycbxoZDvBSaC2QRdzvoRlFzr6EzDLoimdqewnpeMoGoMFAT2sD3cB&tahun='.$_POST['tahun'].'&bulan='.$_POST['bulan'];
					$content = file_get_contents($url);
					$json = json_decode($content, true);
					
					for($i=0;$i<count($json['data']);$i++){
				?>
				
					<tr>
						<th><?php echo $i+1; ?></th>
						<th><?php

						echo $json['data'][$i]['komoditas'];


						?></th>
						<th><?php echo $json['data'][$i]['unit']; ?></th>
						<th><?php 
						$sub_json = substr($json['data'][$i]['mangkukna'],3);
						echo $sub_json;
						?></th>
						<th><?php 
						
						$sub_json = substr ($json['data'][$i]['kamari'],3);
						echo $sub_json;
						?></th>
						<th><?php 
						$sub_json = substr ($json['data'][$i]['ayena'],3); 
						echo $sub_json;
						?></th>
					</tr>
				
				<?php
					}
					
				}
					
				?>
				<tbody id="body-result">
				  
				</tbody>
		  </table>
		</div>
		
	</div>
  </div>
</div>
</body>
</html>