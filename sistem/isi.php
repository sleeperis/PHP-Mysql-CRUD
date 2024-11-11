
<!-- <br> <br><br><br> -->
<div class="row">
  <div class="leftcolumn">
  <h2> Praktik dokter hewan mandiri Digita </h2>
    <div class="card">
<br>
      <div class="fakeimg" style="height:50%;"> 


      <div class="slideshow-container" >

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides ">
                      <div class="numbertext">1 / 4</div>
                      <!-- <img src="img1.png" style="width:100%"> -->
                      <IMG src="img/1.png" style="width:100%" >
                      <!-- 1920 x 540 -->
                      <!-- <div class="text">Caption one</div> -->
                    </div>

                    <div class="mySlides ">
                      <div class="numbertext">2 / 4</div>
                      <img src="img/2.png" style="width:100%">
                      <!-- <div class="text">Caption Two</div> -->
                    </div>

                    <div class="mySlides ">
                      <div class="numbertext">3 / 4</div>
                      <img src="img/3.png" style="width:100%">
                      <!-- <div class="text">Caption Three</div> -->
                    </div>

                    <div class="mySlides ">
                      <div class="numbertext">4 / 4</div>
                      <img src="img/4.png" style="width:100%">
                      <!-- <div class="text">Caption Three</div> -->
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                   
<br>
                    <!-- The dots/circles -->
                    <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                    </div>

      <!-- <img src="img/img1.jpeg"  height = "180px"><img src="img/img1.jpeg"  height = "180px"><img src="img/img1.jpeg"  height = "180px"></div><br> -->
      <div class="fakeimg" style="height:50%;">
        <a class= "gbtn" href="https://www.bing.com/maps?q=drh+digita&FORM=HDRSC6&cp=-6.733038~110.864089&lvl=16.0" target="blank">Lokasi</a><br><?php include "map.php";?></div>
      </div>
  </div>
  </div>
  <!-- <br> -->
  
<!-- <div class="leftcolumn">
<h2>Berita minggu ini (note: ambil dari db)</h2>
    <div class="card">
      <br>
      <h5>Senin, 15 januari 2020</h5>
      <div class="fakeimg" style="height:200px;">Image
      <p>saat di click Deskripsi dari berita</p></div>
      
    </div>
  </div> -->
  
  <div class="rightcolumn">
  <h2>Anggota</h2>
    <div class="card">
      <br>
      <div class="fakeimg" align="center" ><img style="margin-right: 6%;" src="img/img1.jpg" onclick="document.getElementById('petugas1').style.display='block'" width = "25%">
      <img src="img/img2.jpg" onclick="document.getElementById('petugas2').style.display='block'" width = "25%">
      <img style="margin-left: 6%;" src="img/img3.jpg" onclick="document.getElementById('petugas3').style.display='block'" width = "25%"></div>
      <!-- <div class="fakeimg" style="height:100px;">gambar petugas</div> -->
      <!-- <div class="fakeimg" style="height:100px;">gambar petugas</div> -->
      <p>klik untuk lebih detail</p>
    </div>
    </div>

  <div class="rightcolumn">
  <h2>Mini-Game</h2>
    <div class="card">
    <h2 align="center">WASD(capital) and Enter</h2>
  <?php
  if (fmod($_SESSION['game'],2) == 1 ) {
    include_once "game.html";?>
    <form action="./" method="post">
  <button class= "gbtn" name ="game" >Stop</button>
  
	</form>
  <?php
    
  }else{
  
  ?>
  <form action="./" method="post">
  <button class= "gbtn" name ="game" >Play</button>
  
	</form>
  <?php
  }
  ?>
      
    </div>
    </div>
    

    <!-- <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div> -->

<div id="petugas1" class="w3-modal">
  <div class="w3-modal-content">

      <span onclick="document.getElementById('petugas1').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
   
  <img src="img/Profil A1.png" style="width:100%;" alt="" >

 
</div>
</div>

<div id="petugas2" class="w3-modal">
  <div class="w3-modal-content">

      <span onclick="document.getElementById('petugas2').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
   
  <img src="img/Profil A2.png" style="width:100%;" alt="" >

 
</div>
</div>

<div id="petugas3" class="w3-modal">
  <div class="w3-modal-content">

      <span onclick="document.getElementById('petugas3').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
   
  <img src="img/Profil A3.png" style="width:100%;" alt="" >

 
</div>
</div>

<div id="petugas4" class="w3-modal" >
  <div class="w3-modal-content" style="background-color: rgb(93, 0, 105);">

      <span onclick="document.getElementById('petugas4').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
   
      <table class="w3-table" border=1>
      <tr>
    <th>ISTILAH</th>
    <th>PENGERTIAN</th>
    </tr>
    <tr>
    <td>Pawrent</td>
    <td>Nama Pemilik Hewan</td>
  </tr>
  <tr>
    <td>Anabul</td>
    <td>Nama Panggilan Hewan</td>
         </tr>
        </table>

 
  </div>
</div>