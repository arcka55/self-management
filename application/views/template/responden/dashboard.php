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
  <style>
    div.dataTables_filter input 
        { 
            background: none;
            border: 1px solid #d2d6da;
            border-radius: 0.375rem;
            border-top-left-radius: 0.375rem !important;
            border-bottom-left-radius: 0.375rem !important;
            padding: 0.625rem 0.75rem !important;
            line-height: 1.3 !important;
        }

        div.dataTables_filter input:focus{
            border-color: #e91e63 !important;
        }

        .dataTables_paginate {
            margin-top: 20px !important;
            margin-bottom: 10px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            margin-top: 15px;
            margin-bottom: 10px !important;

        }
  </style>
</head>
<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <!-- load file sidebar.php -->
    <?php $this->load->view('template/responden/_partials_responden/sidebar.php', $name_explode); ?>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <!-- load file navbar.php -->
      <?php $this->load->view('template/responden/_partials_responden/navbar.php'); ?>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid mt-n3">
      <div class="row">
        <div class="col-md-2">
          <a class="btn bg-gradient-secondary mt-4 w-100" href="#">Dashboard</a>
        </div>
      </div>
      <hr>
    </div>
    <div class="container-fluid py-4">
      <div class="row mb-5">
        <div class="col">
          <div class="alert alert-white shadow border-radius-xl" role="alert">
            <div class="py-3 text-center">
                <i class="material-icons text-warning" style="font-size: 50px">
                  notifications_active
                </i>
                <h4 class="text-gradient text-info mt-4">Responden Portal</h4>
                <p>Selamat Datang <strong><?= $responden['nama'] ?></strong></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="alert alert-info alert-dismissible text-white fade show" role="alert">
            <span class="alert-icon align-middle">
              <span class="material-icons text-lg">
                tips_and_updates 
              </span>
            </span>
            <span class="alert-text"><strong>Halo Kak ^-^,</strong><br> Jangan lupa mengisi kuesioner yah, kamu bisa memulai dengan melengkapi profile terlebih dahulu lalu mengisi kuesioner.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
      <footer class="footer py-4  ">
        <!-- load file footer.php -->
        <?php $this->load->view('template/_partials/footer.php'); ?>
      </footer>
    </div>
  </main>
  <!-- <div class="fixed-plugin">  
  
  </div> -->
    <!-- load file js.php -->
    <?php $this->load->view('template/_partials/js.php'); ?>
</body>

</html>