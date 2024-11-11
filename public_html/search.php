 <!-- MODALLLLLLLLL -->
 <div id="update" class="w3-modal" style="color: black">
    <form action="" method="post">
  <div class="w3-modal-content"  > 
    <div class="w3-container">
      <span onclick="update()"
      class="w3-button w3-display-topright">&times;</span>
      <br>
      <div class="w3-container w3-teal">
  <h3>cari date antara</h3>
  
</div>
              <!-- <div class="colu">
              <H3 for="jenis" class="form-H3">Breed-Jenis Hewan</H3>
              <select class name="jenis" id="jenis" value="">
              <option></option>
              <option value="kucing Dom">kucing Domisili(kampung)</option>
              <option value="kucing Bengal">kucing Bengal</option>
              <option value="kucing BSH(British Short Hair)">kucing BSH(British Short Hair)</option>
              <option value="kucing Persia">kucing Persia</option>
              <option value="anjing">Anjing</option>
              <option value="sapi">Sapi</option>
              <option value="kerbau">Kerbau</option>
              <option value="kambing">kambing</option>
              <option value="lainnya">lainnya</option>
            </select>
            </div>
            <div class="colu">
              <H3 for="jekal" class="form-H3">Sex-Jenis Kelamin</H3>
              <select name="jekal" id="jekal" value="male">
              <option></option>
              <option value="Jantan">Jantan</option>
              <option value="Betina">Betina</option>
            </select>
             
            </div> -->
            <div class="colu">
              <H3 for="umur" class="form-H3">date 1</H3>
             <input type="date" name="umur" id="umur" value="<?= date('Y-m-d', strtotime("-1 months")); ?>">
             
            </div>
            <div class="colu">
              <H3 for="ciri" class="form-H3">date 2</H3>
             <input type="date" name="ciri" id="ciri" value="<?= date('Y-m-d'); ?>">
             
            </div>
<br>
<!-- <button class="w3-btn w3-green" name="update" onclick="update()">update</button> -->
<input class="btn btn-primary btn-sm" type="submit" name="BSAS" value="cari"><br> <br>

    </div>
  </div>
  </form>
</div>
<!-- </body> -->
<script>

  function BSAS(){
    document.getElementById('update').style.display='block';
    
}
function update(){
//   a = document.getElementById('jenis').value;
//   b = document.getElementById('jekal').value;
//   c =  document.getElementById('umur').value;
//   d =  document.getElementById('ciri').value;
//   console.log(a + ', ' + b + ', ' + c );
//   document.getElementById('gender').value= a + '; ' + b + '; ' + c + '; ' + d;
  document.getElementById('update').style.display='none';
  
}
// Get the modal
var modal = document.getElementById('update');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
//     a = document.getElementById('jenis').value;
//   b = document.getElementById('jekal').value;
//   c =  document.getElementById('umur').value;
//   d =  document.getElementById('ciri').value;
//   console.log(a + ', ' + b + ', ' + c );
//   document.getElementById('gender').value= a + '; ' + b + '; ' + c + '; ' + d;
    modal.style.display = "none";
  }
}
  
  </script>
