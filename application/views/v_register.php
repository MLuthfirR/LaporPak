<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('status')=='login' && $this->session->userdata('otoritas')!=4){ ?>

  <!DOCTYPE html>
  <html>
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <title>Register</title>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/style_register.css">
  </head>

  <body>
      <div class="container" id="registration-form">
          <div class="image"></div>
          <div class="frm">
              <h3>Tambah User</h3>
              <p><?php echo validation_errors(); ?></p>
              <p><?php echo $error;?></p>
              <form action="<?php echo base_url(). 'register/action_input'; ?>" method="post">
                  <div class="form-group">
                      <label for="no_rmh">No Rumah:</label>
                      <?php if($this->session->userdata('otoritas')==3){ ?>
                      <input name="no_rmh" required type="number" class="form-control" maxlength="3"  value="<?php $this->session->userdata('nomor_rumah') ?>">
                    <?php } else { ?>
                      <input name="no_rmh" required type="number" class="form-control" maxlength="3"  placeholder="Masukan Nomor Rumah">
                    <?php } ?>
                  </div>
                  <div class="form-group">
                      <label for="username">Nomor KTP:</label>
                      <input type="text" class="form-control" id="username" placeholder="Masukan nomor KTP" name="no_KTP" maxlength="16" required>
                  </div><div class="form-group">
                  <div class="form-group">
                          <center><select name="otoritas">
                          <option value="4">Penghuni</option>
                          <option value="3">Pemilik Rumah</option>
                          <?php if($this->session->userdata('otoritas')==1){ ?>
                          <option value="2">Ketua RT</option>
                          <?php } ?>
                          </select></center>
                  </div>
                      <label for="pwd">Nama:</label>
                      <input name="nama" required type="text" class="form-control" id="nama" placeholder="Masukan nama">
                  </div>
                  <div class="form-group">
                          <center><select name="jenis_k">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="L">Laki-laki</option>
                          <option value="P">Perempuan</option>
                        </select></center>
                  </div>
                  <div class="form-group">
                      <label for="username">Username:</label>
                      <input type="text" class="form-control" id="username" placeholder="Masukan username" name="username" maxlength="10" required>
                  </div>
                  <div class="form-group">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Masukan password" name="pass" maxlength="10" required>
                  </div>
                  <div class="form-group">
                      <label for="pwd">Konfirmasi Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Masukan ulang password" name="konfirm" maxlength="10" required>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-success btn-lg" value="Tambah">
                      <?php if($this->session->userdata('otoritas')>2){ ?>
                      <a href="<?php echo base_url().'profile/index/'.$this->session->userdata('no_KTP')?>"><input type="button" name="submit" class="btn btn-fail btn-lg" value="Batal"></a>
                    <?php } else { ?>
                      <a href="<?php echo base_url().'Dashboard'?>"><input type="button" name="submit" class="btn btn-fail btn-lg" value="Batal"></a> <?php } ?>
                  </div>
              </form>
          </div>
      </div>
  </body>

  </html>

<?php }
else if($this->session->userdata('otoritas')==4)
  redirect('home');
else
  redirect('login');?>
