<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Demo Cek Raja Ongkir</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Cek Raja Ongkir</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://surdaysoft.blogspot.com">Blog <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="wrapper">
<div class="row">
	<div class="col-md-12">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- test -->
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-1762934784326172"
		     data-ad-slot="6122588643"
		     data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title">Asal</h3>
				  </div>
				  <div class="panel-body">
				    <select class="form-control" name="propinsi_asal" id="propinsi_asal">
						<option value="" selected="" disabled="">Pilih Provinsi</option>
						<?php $this->load->view('rajaongkir/getProvince'); ?>
					</select>
					<br>
					<select class="form-control" name="origin" id="origin">
						<option value="" selected="" disabled="">Pilih Kota</option>
					</select>
				  </div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="panel panel-success">
				  <div class="panel-heading">
				    <h3 class="panel-title">Tujuan</h3>
				  </div>
				  <div class="panel-body">
				    <select class="form-control" name="propinsi_tujuan" id="propinsi_tujuan">
						<option value="" selected="" disabled="">Pilih Provinsi</option>
						<?php $this->load->view('rajaongkir/getProvince'); ?>
					</select>
					<br>
					<select class="form-control" name="destination" id="destination">
						<option value="" selected="" disabled="">Pilih Kota</option>
					</select>
				  </div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-success">
				  <div class="panel-heading">
				    <h3 class="panel-title">Berat</h3>
				  </div>
				  <div class="panel-body">
				    <input type="text" name="berat" placeholder="gram" id="berat" class="form-control">
				    <br>
				    <select class="form-control" name="courier" id="courier">
				    	<option value="">Pilih Kurir</option>
				    	<option value="jne">JNE</option>
				    	<option value="pos">POS</option>
				    	<option value="tiki">TIKI</option>
				    </select>
					<br>
				    <button type="button" onclick="tampil_data('data')" class="btn btn-info">Cek Ongkir</button>
				  </div>
				</div>
				<script>
					function tampil_data(act){
					      var w = $('#origin').val();
					      var x = $('#destination').val();
					      var y = $('#berat').val();
					      var z = $('#courier').val();

					      $.ajax({
					          url: "rajaongkir/getCost",
					          type: "GET",
					          data : {origin: w, destination: x, berat: y, courier: z},
					          success: function (ajaxData){
					              //$('#tombol_export').show();
					              //$('#hasilReport').show();
					              $("#hasil").html(ajaxData);
					          }
					      });
					  };
				</script>
			</div>

			<div class="col-md-8">
				<div class="panel panel-success">
				  <div class="panel-heading">
				    <h3 class="panel-title">Hasil</h3>
				  </div>
				  <div class="panel-body">
				  	<ol>
					    <div id="hasil">
					    	
					    </div>
				    </ol>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/JQuery.min.js"></script>

<script>
$(document).ready(function(){

	$("#propinsi_asal").click(function(){
		$.post("<?php echo base_url(); ?>index.php/rajaongkir/getCity/"+$('#propinsi_asal').val(),function(obj){
			$('#origin').html(obj);
		});
			
	});

	$("#propinsi_tujuan").click(function(){
		$.post("<?php echo base_url(); ?>index.php/rajaongkir/getCity/"+$('#propinsi_tujuan').val(),function(obj){
			$('#destination').html(obj);
		});
			
	});

	/*
	$("#cari").click(function(){
		$.post("<?php echo base_url(); ?>index.php/rajaongkir/getCost/"+$('#origin').val()+'&dest='+$('#destination').val()+'&berat='+$('#berat').val()+'&courier='+$('#courier').val(),function(obj){
			$('#hasil').html(obj);
		});
	});

	*/

	
});
</script>
</body>
</html>



