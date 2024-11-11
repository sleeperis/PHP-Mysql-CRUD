
<?php 
session_start();
if (isset($_SESSION['login'])) {
    // code...
    header("location: ../index.php?fname=' '");
    exit;
  }

	if (isset($_POST["login"])) {
		if (isset($_COOKIE['user'])) {
		$username = $_POST['username'];
		$password = $_POST['pass'];
		// var_dump($isi);
		if ("digita" === $username && "111111" === $password){    
			$_SESSION['login'] = false;
			header("location: ../index.php?fname=' '");
		   exit();
		}elseif("ariq" === $username && "222222" === $password){ 
			 $_SESSION['login'] = true;
			 header("location: ../index.php?fname=' '");
			exit();
	    	}
		}else{
			Echo "Terdeteksi device baru, Bilang dulu ke pembuat untuk di setting";
		}
	}
	include_once 'menu.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 
 	<link rel="stylesheet" type="text/css" href="../css/login.css">

 	<title>login</title>

	<style>
		body { 
  width: 100%;
  height:100%;
  font-family: 'Open Sans', sans-serif;
    opacity: 0.9;
    background-color: black;
    }
		.login { 
  position: absolute;
  top: 30%;}
		
		 body {margin:0;}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

li {
  float: left;
}
.login1{
	float: right;
	background-color: blue;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}


.active {
  background-color: #04AA6D;
}
    .split{
      float: right;
    }
	
	<?php include_once "../../sistem/sidebar.php"; ?>
    /* h1{
    

  } */
   label{
	color:white;
	font-size:25px;
   }
	</style>
 	
 </head>
 <body class="body" style="
	background: rgb(2,0,36);
background: linear-gradient(331deg, rgba(2,0,36,1) 0%, rgba(135,235,212,0.9836309523809523) 0%, rgba(3,218,86,1) 33%, rgba(155,223,94,1) 53%, rgba(85,200,30,1) 70%, rgba(190,200,30,1) 83%);
">
	
 <div class="gl" 
 style="position: absolute; left:70%; top:10%;"> <img src="Login.png" alt="" width="100%"
 > <label>nama digita pass 111111 <br>nama ariq pass 222222</label></div>
 	<div class="login" style="
	width:30%;
	height:50%;"
	>
		
		
 	<form action="" method="post">
		<br><br>
		<label><h1 style="color: white;
    font-weight: 900;
	font-family: 'Lucida Handwriting', cursive;">
 			PDHM Digita
 		</h1> </label>
 		
 				<label for="username">Username : </label><br>
 				<input type="text" name="username" id="username" autocomplete="off" autofocus><br>
 				<label for="pass">Password : </label><br>
 				<input type="Password" name="pass" id="pass" autofocus><br>
 			
 				<button type="submit" name="login" class="btn btn-primary" style="
				font-size:20px">Login</button>
 		        <!-- <a style="color : white" href="../customer"><h4>Data pet client</h4></a> -->
 	</form>
 	</div>	
 
 

 </body>
<script>
	window.addEventListener("keydown", e => {
  if(e.key === "K"){
    window.location.href = '../../verif.php';
  }
})
</script>
 </html>