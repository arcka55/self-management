<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!-- load library function -->
<?php require_once(APPPATH . 'libraries/function.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- load file head.php -->
  <?php $this->load->view("template/_partials/head"); ?>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
  </svg>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login</h4>
                  <p class="text-white text-center mt-2 mb-0">Self Management</p>
                </div>
              </div>
              <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <form role="form" action="<?= base_url('auth') ?>" method="post" class="text-start">
                  <div class="form-group">
                    <div class="input-group input-group-static my-3">
                      <label>Email</label>
                      <input type="text" placeholder="Masukkan Email atau Username.." class="form-control" name="username_email" id="username_email" value="<?= $this->session->flashdata('email_username_value'); ?>" required>
                    </div>
                    <div class="help-block text-danger form-text mt-n2"></div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-static mb-3">
                      <label>Password</label>
                      <input type="password" placeholder="Masukkan Password.." class="form-control" name="password" id="password" required>
                    </div>
                    <div class="help-block text-danger form-text mt-n2"></div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" id="btnSubmit">Submit</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Belum punya akun?
                    <a href="#" class="text-primary text-gradient font-weight-bold" data-bs-toggle="modal" data-bs-target="#signUpModal">Daftar disini</a>, lalu mulai isi kuesionernya
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">
                    Self Management - © <script>
                      document.write(new Date().getFullYear())
                    </script>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <!-- modal add -->
      <div class="modal fade top-2" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-center text-capitalize ps-3">Register <span class="fa fa-user-plus"></span></h6>
              </div>
            </div>
            <div class="modal-body my-2 px-5 form">
              <div class="form-group" id="error_daftar" style="display: none">
                <div>
                  <input type="hidden" name="message_daftar">
                </div>
                <div class="alert alert-danger d-flex align-items-center text-white help-block form-text mt-n2" style="font-size:13px;" role="alert">

                </div>
              </div>
              <form class="form_daftar" id="form_daftar" action="#" enctype="multipart/form-data">
                <fieldset>
                  <legend>Data User</legend>
                  <div class="form-group mb-4">
                    <div class="input-group input-group-outline my-3">
                      <label id="label_email" for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="help-block form-text mt-n2"></div>
                  </div>
                  <div class="form-group mb-4">
                    <div class="input-group input-group-outline my-3">
                      <label id="label_password" for="password2" class="form-label">Password</label>
                      <input type="password" name="password2" class="form-control" id="password2" required>
                    </div>
                    <div class="help-block form-text mt-n2"></div>
                  </div>
                  <div class="form-group mb-4">
                    <div class="input-group input-group-outline my-3">
                      <label id="label_confirm_password" for="confirm_password" class="form-label">Confrim Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                    </div>
                    <div class="help-block form-text mt-n2"></div>
                  </div>
                </fieldset>
                <fieldset>
                  <legend>Data Demografi</legend>
                  <div class="form-group mb-4">
                    <div class="input-group input-group-outline my-3">
                      <label id="label_nama" for="nama" class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="help-block form-text mt-n2"></div>
                  </div>

                  <div class="form-group mb-4">
                    <div class="input-group input-group-outline my-3">
                      <label id="label_usia" for="usia" class="form-label">Usia</label>
                      <input type="number" name="usia" class="form-control" id="usia" required>
                    </div>
                    <div class="help-block form-text mt-n2"></div>
                  </div>
                  <div class="form-group mb-4">
                    <div class="input-group input-group-static my-3">
                      <label for="gender" class="ms-0">Gender</label>
                      <select class="form-control mx-1" name="gender" id="gender">
                        <option value="pilih" disabled selected>Pilih Gender..</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                      </select>
                    </div>
                    <div class="help-block form-text mt-n2"></div>
                  </div>
                  <div class="form-group mb-4">
                    <div>
                      <p class="text-bold mb-2">Pendidikan :</p>
                      <input type="radio" name="pendidikan" id="sd" value="SD"> <label for="sd">SD</label>
                      <br>
                      <input type="radio" name="pendidikan" id="smp" value="SMP"> <label for="smp">SMP</label>
                      <br>
                      <input type="radio" name="pendidikan" id="sma" value="SMA"> <label for="sma">SMA</label>
                      <br>
                      <input type="radio" name="pendidikan" id="kuliah" value="Perguruan Tinggi"> <label for="kuliah">Perguruan Tinggi</label>
                      <br>
                      <input type="radio" name="pendidikan" id="tidak-sekolah" value="Tidak Sekolah"> <label for="tidak-sekolah">Tidak Sekolah</label>
                    </div>
                    <div class="help-block form-text"></div>
                  </div>
                  <div class="form-group mb-4">
                    <div>
                      <p class="text-bold mb-2">Pekerjaan :</p>
                      <input type="radio" name="pekerjaan" id="bertani" value="Bertani"> <label for="bertani">Bertani</label>
                      <br>
                      <input type="radio" name="pekerjaan" id="pegawai-swasta" value="Pegawai Swasta"> <label for="pegawai-swasta">Pegawai Swasta</label>
                      <br>
                      <input type="radio" name="pekerjaan" id="pns" value="PNS"> <label for="pns">PNS</label>
                      <br>
                      <input type="radio" name="pekerjaan" id="irt" value="IRT"> <label for="irt">IRT</label>
                      <br>
                      <input type="radio" name="pekerjaan" id="wiraswasta" value="Wiraswasta"> <label for="wiraswasta">Wiraswasta</label>

                    </div>
                    <div class="help-block form-text"></div>
                  </div>
                  <div class="form-group mb-4">
                    <div>
                      <p class="text-bold mb-2">Riwayat Merokok :</p>
                      <input type="radio" name="riwayat-merokok" id="pernah-merokok" value="Pernah Merokok"> <label for="pernah-merokok">Pernah Merokok</label>
                      <br>
                      <input type="radio" name="riwayat-merokok" id="masih-merokok" value="Masih Merokok"> <label for="masih-merokok">Masih Merokok</label>
                      <br>
                      <input type="radio" name="riwayat-merokok" id="rm-tidak-pernah" value="Tidak Pernah"> <label for="rm-tidak-pernah">Tidak Pernah</label>

                    </div>
                    <div class="help-block form-text"></div>
                  </div>
                  <div class="form-group mb-4">
                    <div>
                      <p class="text-bold mb-2">Konsumsi Alkohol :</p>
                      <input type="radio" name="konsumsi-alkohol" id="2-4xperbulan" value="2-4x/bulan"> <label for="2-4xperbulan">2-4x/bulan</label>
                      <br>
                      <input type="radio" name="konsumsi-alkohol" id="2-3xperminggu" value="2-3x/minggu"> <label for="2-3xperminggu">2-3x/minggu</label>
                      <br>
                      <input type="radio" name="konsumsi-alkohol" id="4xperminggu" value=">4x/minggu"> <label for="4xperminggu">>4x/minggu</label>
                      <br>
                      <input type="radio" name="konsumsi-alkohol" id="ka-tidak-pernah" value="Tidak Pernah"> <label for="ka-tidak-pernah">Tidak Pernah</label>

                    </div>
                    <div class="help-block form-text"></div>
                  </div>
                  <div class="form-group mb-4">
                    <div>
                      <p class="text-bold mb-2">Apakah anda memiliki komplikasi penyakit lain selain hipertensi ?</p>
                      <input type="radio" name="penyakit" id="ya" value="Ya"> <label for="ya">Ya</label>
                      <br>
                      <div class="div_desc_penyakit form-group mb-4" id="div_desc_penyakit" style="display:none;">
                        <div class="input-group input-group-static my-3">
                          <input type="text" name="desc_penyakit" class="form-control" id="desc_penyakit" placeholder="Masukkan deskripsi penyakit..">
                        </div>
                        <div class="help-block form-text"></div>
                      </div>
                      <input type="radio" name="penyakit" id="tidak" value="Tidak"> <label for="tidak">Tidak</label>
                      <br>
                    </div>
                    <div class="help-block form-text"></div>
                  </div>
                </fieldset>


              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn bg-gradient-primary" id="btnSubmit2" onclick="submit_daftar()">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal add -->
    </div>
  </main>


  <!-- load file js -->
  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="<?= site_url('assets/template/js/core/popper.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/plugins/chartjs.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/plugins/moment.min.js') ?>"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= site_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?= site_url('assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') ?>"></script>
  <script src="<?= site_url('assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.fr.js') ?>"></script>
  <!-- <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.js'); ?>"></script> -->
  <script src="<?php echo base_url('assets/template/js/core/bootstrap.bundle.min.js'); ?>"></script>
  <!-- <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script> -->
  <script src="<?php echo base_url('assets/plugin-berita/modules/ckeditor/ckeditor.js'); ?>"></script>
  <!-- <script src="modules/ckeditor/ckeditor.js"></script> -->

  <!-- script for materi -->
  <script>
    // modal ajax
    $(document).ready(function() {

      table = $('#tabel').DataTable({
        language: {
          paginate: {
            next: '&#8594;', // or '→'
            previous: '&#8592;' // or '←' 
          }
        },
        // "scrollX": true,
        aLengthMenu: [
          [4, 8, 16, 50, -1],
          [4, 8, 16, 50, "All"]
        ],
        iDisplayLength: 8,
        "order": []
      });

      $('#username_email').keypress(function(e) {
        var key = e.which;
        if (key == 13) // the enter key code
        {
          $('#btnSubmit').click();
          return false;
        }
      });

      $('#password').keypress(function(e) {
        var key = e.which;
        if (key == 13) // the enter key code
        {
          $('#btnSubmit').click();
          return false;
        }
      });

      $('#nama').keypress(function(e) {
        var key = e.which;
        if (key == 13) // the enter key code
        {
          $('#btnSubmit2').click();
          return false;
        }
      });

      $("#role").change(function() {
        var val = $(this).val();
        if (val === "Startup") {
          $('#labelNama').text("Nama Startup : ");
          $('#nama').attr("placeholder", "Masukkan Nama Startup...");
        } else if (val === "Coach") {
          $('#labelNama').text("Nama Coach : ");
          $('#nama').attr("placeholder", "Masukkan Nama Coach...");
        }
      });

      //set input/textarea/select event when change value, remove class error and remove text help block
      $("input").change(function() {
        $(this).parent().parent().removeClass("has-error");
        $(this).parent().next().empty();
      });
      $("textarea").change(function() {
        $(this).parent().parent().removeClass("has-error");
        $(this).parent().next().empty();
      });
      $("select").change(function() {
        $(this).parent().parent().removeClass("has-error");
        $(this).parent().next().empty();
      });
    });

    // if radio button selected
    $("input[name$='penyakit']").click(function() {
      var test = $(this).val();
      if (test == "Ya") {
        $("div.div_desc_penyakit").show();
      } else if (test == "Tidak") {
        $("div.div_desc_penyakit").hide();
      }
    });

    // validation modal
    function login() {
      $("#form")[0].reset(); // reset form on modals
      $(".form-group").removeClass("has-error"); // clear error class
      $(".help-block").empty(); // clear error string
    }

    function tes() {
      console.log('tess');
    }

    function submit() {
      $("#btnSubmit").text("Submiting..."); //change button text
      $("#btnSubmit").attr("disabled", true); //set button disable

      var url = "<?php echo site_url('Auth') ?>";
      // ajax adding data to database
      $.ajax({
        url: url,
        type: "POST",
        data: $("#form_login").serialize(),
        dataType: "JSON",
        success: function(data) {
          console.log('tessss');
          if (data.status) {
            //if success close modal
            if (data.role_id == 1) {
              window.location.href = "<?php echo base_url("admin/"); ?>" + data.id;
            } else if (data.role_id == 2) {
              window.location.href = "<?php echo base_url('coach/'); ?>" + data.id;
            } else {
              window.location.href = "<?php echo base_url('startup/'); ?>" + data.id;

            }
          } else {
            for (var i = 0; i < data.inputerror.length; i++) {
              $('[name="' + data.inputerror[i] + '"]')
                .parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
              $('[name="' + data.inputerror[i] + '"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
            }
          }
          $("#btnSubmit").text("submit"); //change button text
          $("#btnSubmit").attr("disabled", false); //set button enable
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert("Login Gagal, Email atau Password Anda tidak valid !");
          $("#btnSubmit").text("submit"); //change button text
          $("#btnSubmit").attr("disabled", false); //set button enable
        },
      });
    }

    function submit_daftar() {
      $("#btnSubmit2").text("Submiting..."); //change button text
      $("#btnSubmit2").attr("disabled", true); //set button disable

      var url = "<?php echo site_url('Auth/daftar') ?>";
      // ajax adding data to database
      $.ajax({
        url: url,
        type: "POST",
        data: $("#form_daftar").serialize(),
        dataType: "JSON",
        success: function(data) {
          if (data.status) {
            //if success close modal
            $("#signUpModal").modal("hide");

            window.location.href = "<?php echo base_url('home'); ?>";
          } else {
            for (var i = 0; i < data.inputerror.length; i++) {
              $('[name="' + data.inputerror[i] + '"]')
                .parent().parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
              if (data.inputerror[i] == "message_daftar") {
                $("#error_daftar").show();
              } else {
                $("#error_daftar").hide();
              }
              $('[name="' + data.inputerror[i] + '"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
            }
          }
          $("#btnSubmit2").text("submit"); //change button text
          $("#btnSubmit2").attr("disabled", false); //set button enable
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert("Daftar Gagal, Form yang anda submit tidak valid !");
          $("#btnSubmit2").text("submit"); //change button text
          $("#btnSubmit2").attr("disabled", false); //set button enable
        },
      });
    }
  </script>

  <script>
    mybutton = document.getElementById("myBtn");

    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/template/js/material-dashboard.min.js?v=3.0.0') ?>"></script>
</body>

</html>