<?php 
$a = "cek";
$b = "kers";
$c = $a.$b;
echo $c;
 ?>

 <?php  if (isset($_GET['menu'])) { ?>
    <div class="div">
<h1 class="boom"><a href="tess.php">Rekam Medis</a></h1>
<h1 class="boom1"><a href="serv.php">Pelayanan (services)</a></h1>
<h1 class="boom2"><a href="../Profil/Profil.html">Profil</a></h1>
<h1 class="boom3"><a href="../store/store.php">store</a></h1>
</div>
<?php } ?>

<style type="text/css">
        .body {
            background-image: url('bg1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
background-position:50% 50%;    
        }
        .boom{
            position: absolute;
            left: 20%;
            top: 70%;
            text-align: left;
        }
        a:link {
            color: red;
        }
        a:visited {
            color: red;
        }
        .boom1{
            position: absolute;
            left: 20%;
            top: 40%;
            text-align: left;
        }
        a:link {
            color: red;
        }
        a:visited {
            color: red;
        }
        .boom2{
            position: absolute;
            left: 20%;
            top: 20%;
            text-align: left;
        }
        a:link {
            color: red;
        }
        a:visited {
            color: red;
        }
        .boom3{
            text-align: left;
            position: absolute;
            left: 20%;
            top: 0%;
        }
        a:link {
            color: red;
        }
        a:visited {
            color: red;
        }
        .div{ position: absolute;
            left: 70%;
            top: 10%;
            background-color: aqua;
            height: 400px;
            width: 200px;
        }
    </style>