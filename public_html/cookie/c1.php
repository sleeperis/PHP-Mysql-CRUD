<?php 
setcookie('name','iqbal', time()+60);  //time()+60) berarti cookie hanya akan ada selamat 1 min
setcookie('name','',time()-1); // hapus cookie
 ?>