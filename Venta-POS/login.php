<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VENTA</title>
  <link rel="icon" type="image/x-icon" href="./logo.png">

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    position: fixed;
	    top:0;
	    left: 0
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		display: flex;
	}
	#venta {
		font-size: 120px;
		font-family:"Lucida Handwriting";
		
	}
	#pos{
		width: 80%;
		height: 80%;
	}
	.vl {
  border-left: 10px solid limegreen;
  height: 100%;
 
}
	hr{
	border: 6px solid limegreen;
  	width: 50%;
	margin-right: 0px;
	position: absolute;
  bottom: 0px;
  right: 0px;
  margin-bottom: 0px;
	}

</style>

<body class="bg-white">


  <main id="main" >
  <div class="vl"></div>	 
  	<div class="align-self-start p-5 w-100">
		<h4 class="text-dark justify-content-start ml-5 p-4" id="venta">VENTA</h4>
  		<div id="login-center" class="bg-white row justify-content-start ml-5 p-5">
  			<div class="card col-md-8">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-wave col-md-4 btn-success">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
	  <img id="pos" src="./pos.jpg" alt="venta pos system" class="mr-5 pr-5">
		 
		  <hr>
		 
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
	$('.number').on('input',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9 \,]/, '');
        $(this).val(val)
    })
</script>	
</html>