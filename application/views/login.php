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
<?php require_once(APPPATH.'libraries/function.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- load file head.php -->
  <?php $this->load->view("template/_partials/head"); ?>
</head>
<body class="g-sidenav-show  bg-gray-200">
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
                  <p class="text-white text-center mt-2 mb-0">Welcome to Ita Apps</p>
                </div>
              </div>
              <div class="card-body">
                <form role="form" action="<?= base_url('auth') ?>" method="post" class="text-start">
                  <div class="form-group input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="username_email" id="username_email" required>
                    <div class="help-block text-danger form-text mt-n2"></div>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required >
                    <div class="help-block text-danger form-text mt-n2"></div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2" id="btnSubmit" onclick="submit()">Submit</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Belum punya akun?
                    <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Daftar</a>
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
                    Ita Apps - © <script>
                  document.write(new Date().getFullYear())
                </script>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
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
  <script src="<?= site_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
  <script src="<?= site_url('assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')?>"></script>
  <script src="<?= site_url('assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.fr.js')?>"></script>
  <!-- <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.js');?>"></script> -->
    <script src="<?php echo base_url('assets/template/js/core/bootstrap.bundle.min.js');?>"></script>
    <!-- <script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script> -->
    <script src="<?php echo base_url('assets/plugin-berita/modules/ckeditor/ckeditor.js');?>"></script>
    <!-- <script src="modules/ckeditor/ckeditor.js"></script> -->
 
  <!-- script for materi -->
  <script>
     
      // modal ajax
      $(document).ready(function () {

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

        $('#username_email').keypress(function (e) {
          var key = e.which;
          if(key == 13)  // the enter key code
            {
              $('#btnSubmit').click();
              return false;  
            }
        });  

        $('#password').keypress(function (e) {
          var key = e.which;
          if(key == 13)  // the enter key code
            {
              $('#btnSubmit').click();
              return false;  
            }
        });

        $('#nama').keypress(function (e) {
          var key = e.which;
          if(key == 13)  // the enter key code
            {
              $('#btnSubmit2').click();
              return false;  
            }
        });

        $("#role").change(function () {
          var val = $(this).val();
          if(val === "Startup"){
            $('#labelNama').text("Nama Startup : ");
            $('#nama').attr("placeholder", "Masukkan Nama Startup...");
          }else if(val === "Coach"){
            $('#labelNama').text("Nama Coach : ");
            $('#nama').attr("placeholder", "Masukkan Nama Coach...");
          }
        });
        
        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function () {
          $(this).parent().removeClass("has-error");
          $(this).next().empty();
        });
        $("textarea").change(function () {
          $(this).parent().removeClass("has-error");
          $(this).next().empty();
        });
        $("select").change(function () {
          $(this).parent().removeClass("has-error");
          $(this).next().empty();
        });
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
        console.log('oi');
        $("#btnSubmit").text("Submiting..."); //change button text
        $("#btnSubmit").attr("disabled", true); //set button disable

        var url = "<?php echo site_url('Auth')?>";
        // ajax adding data to database
        $.ajax({
          url: url,
          type: "POST",
          data: $("#form_login").serialize(),
          dataType: "JSON",
          success: function (data) {
            console.log('tessss');
            if (data.status) {
              //if success close modal
              if(data.role_id == 1) {
                window.location.href = "<?php echo base_url("admin/"); ?>"+data.id;
              }else if(data.role_id == 2) {
                window.location.href = "<?php echo base_url('coach/'); ?>"+data.id;
              }else{
                window.location.href = "<?php echo base_url('startup/'); ?>"+data.id;

              }
            } else {
              for (var i = 0; i < data.inputerror.length; i++) {
                $('[name="' + data.inputerror[i] + '"]')
                  .parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
              }
            }
            $("#btnSubmit").text("submit"); //change button text
            $("#btnSubmit").attr("disabled", false); //set button enable
          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert("Login Gagal, Email atau Password Anda tidak valid !");
            $("#btnSubmit").text("submit"); //change button text
            $("#btnSubmit").attr("disabled", false); //set button enable
          },
        });
      }

      function submit_daftar(){
        $("#btnSubmit").text("Submiting..."); //change button text
        $("#btnSubmit").attr("disabled", true); //set button disable

        var url = "<?php echo site_url('Auth/daftar')?>";
        // ajax adding data to database
        $.ajax({
          url: url,
          type: "POST",
          data: $("#form_daftar").serialize(),
          dataType: "JSON",
          success: function (data) {
            if (data.status) {
              //if success close modal
              $("#signUpModal").modal("hide");
              window.location.href = "<?php echo base_url('home'); ?>";
            } else {
              for (var i = 0; i < data.inputerror.length; i++) {
                $('[name="' + data.inputerror[i] + '"]')
                  .parent().addClass("has-error"); //select parent twice to select div form-group class and add has-error class
                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
              }
            }
            $("#btnSubmit").text("submit"); //change button text
            $("#btnSubmit").attr("disabled", false); //set button enable
          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert("Daftar Gagal, Form yang anda submit tidak valid !");
            $("#btnSubmit").text("submit"); //change button text
            $("#btnSubmit").attr("disabled", false); //set button enable
          },
        });
      }
    </script>

    <script>
      mybutton = document.getElementById("myBtn");

      window.onscroll = function () {
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
  <script src="<?= site_url('assets/template/js/material-dashboard.min.js?v=3.0.0') ?>"></script>
</body>

</html>