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
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <!-- load file sidebar.php -->
    <?php $this->load->view('template/coach/_partials_coach/sidebar.php', $name_explode); ?>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <!-- load file navbar.php -->
      <?php $this->load->view('template/coach/_partials_coach/navbar.php'); ?>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid mt-n3">
      <div class="row">
        <div class="col-md-2">
          <a class="btn bg-gradient-secondary mt-4 w-100" href="#"><?= ($active) ? $active : "" ?></a>
        </div>
      </div>
      <hr>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Approve Zoom Request</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                <div class="row my-7 mx-3">
                  <div class="col-4">
                    <div class="card" data-animation="true">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <a class="d-block blur-shadow-image">
                          <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                        </a>
                        <div class="colored-shadow" style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);"></div>
                      </div>
                      <div class="card-body text-center">
                        <div class="d-flex mt-n6 mx-auto">
                          <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Refresh">
                            <i class="material-icons text-lg">refresh</i>
                          </a>
                          <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                            <i class="material-icons text-lg">edit</i>
                          </button>
                        </div>
                        <h5 class="font-weight-normal mt-3">
                          <a href="javascript:;">Cozy 5 Stars Apartment</a>
                        </h5>
                        <p class="mb-0">
                          The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                        </p>
                      </div>
                      <hr class="dark horizontal my-0">
                      <div class="card-footer d-flex">
                        <p class="font-weight-normal my-auto">$899/night</p>
                        <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                        <p class="text-sm my-auto"> Barcelona, Spain</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card" data-animation="true">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <a class="d-block blur-shadow-image">
                          <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                        </a>
                        <div class="colored-shadow" style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);"></div>
                      </div>
                      <div class="card-body text-center">
                        <div class="d-flex mt-n6 mx-auto">
                          <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Refresh">
                            <i class="material-icons text-lg">refresh</i>
                          </a>
                          <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                            <i class="material-icons text-lg">edit</i>
                          </button>
                        </div>
                        <h5 class="font-weight-normal mt-3">
                          <a href="javascript:;">Cozy 5 Stars Apartment</a>
                        </h5>
                        <p class="mb-0">
                          The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                        </p>
                      </div>
                      <hr class="dark horizontal my-0">
                      <div class="card-footer d-flex">
                        <p class="font-weight-normal my-auto">$899/night</p>
                        <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                        <p class="text-sm my-auto"> Barcelona, Spain</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card" data-animation="true">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <a class="d-block blur-shadow-image">
                          <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                        </a>
                        <div class="colored-shadow" style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);"></div>
                      </div>
                      <div class="card-body text-center">
                        <div class="d-flex mt-n6 mx-auto">
                          <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Refresh">
                            <i class="material-icons text-lg">refresh</i>
                          </a>
                          <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                            <i class="material-icons text-lg">edit</i>
                          </button>
                        </div>
                        <h5 class="font-weight-normal mt-3">
                          <a href="javascript:;">Cozy 5 Stars Apartment</a>
                        </h5>
                        <p class="mb-0">
                          The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                        </p>
                      </div>
                      <hr class="dark horizontal my-0">
                      <div class="card-footer d-flex">
                        <p class="font-weight-normal my-auto">$899/night</p>
                        <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                        <p class="text-sm my-auto"> Barcelona, Spain</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <footer class="footer py-4  ">
        <!-- load file footer.php -->
        <?php $this->load->view('template/_partials/footer.php'); ?>
      </footer>
    </div>
  </main>
    <!-- load file js.php -->
    <?php $this->load->view('template/_partials/js.php'); ?>
</body>

</html>