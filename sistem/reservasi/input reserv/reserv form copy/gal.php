<h2>Halaman Registrasi</h2>
      
     
      <!-- <a href="login/serv.php" class="btn btn-secondary">
      <i class="bi bi-plus-circle-fill"></i> Add service
    </a> -->
      <!-- form starts here -->
      <form action="index.php" class=" p-4 shadow-sm" method="post" novalidate enctype="multipart/form-data">
     
        <div class="row gy-3">
          <div class="col-lg-6">
            <label for="fname" class="form-label">Anabul/ Nama Hewan</label>
            <input type="text" class="form-control focus" name="fname" id="fname" value="<?= $_POST['fname']?>" autofocus autocomplete="off">
            <small class="text-danger"><?= $fname_err; ?></small>
          </div>
          <div class="col-lg-6">
            <label for="lname" class="form-label">Pawrent/ Nama Pemilik</label>
            <input type="text" class="form-control focus" name="lname" id="lname" value="<?= $_POST['lname']?>" autocomplete="off">
            <small class="text-danger"><?= $lname_err; ?></small>
          </div>
          <div class="col-lg-12">
            <label for="email" class="form-label">Alamat/ Address</label>
            <input type="text" class="form-control focus" name="email" id="email" value="<?= $_POST['email']?>" autocomplete="off">
            <small class="text-danger"><?= $email_err; ?></small>
          </div>
          <div class="col-lg-12">
            <label for="gender" class="form-label">BSAS</label>
            <input type="text" class="form-control" name="gender" id="gender" readonly onclick="BSAS()" value="<?= $_POST['gender']?>">
            <!-- <div class="buttondiv"  >expand</div> -->
            <small class="text-danger"><?= $gender_err; ?></small>
          </div>
        
          <div class="col-lg-12">
            <label for="designation" class="form-label">No. Hp (Whats App)</label>
            <input type="int" class="form-control focus" name="designation" id="designation" value="<?= $_POST['designation']?>" autocomplete="false">
            <small class="text-danger"><?= $designation_err; ?></small>
          </div>
          <div class="col-lg-12">
            <label for="pass" class="form-label">Password</label>
            <input type="text" class="form-control focus" name="pass" id="pass" value="<?= $_POST['pass']?>" >
            
          </div>
          
         
          <div class="col-lg-12 d-grid">
            <button type="submit" name ="submit" class="btn btn-success">Registrasi</button>
            <br>
          </div>
        </div>
      </form>

      </div>
    </div>
    <br><br>
  </div>