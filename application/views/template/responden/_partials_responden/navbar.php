
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <!-- load file breadcrumb.php -->
          <?php $this->load->view('template/responden/_partials_responden/breadcrumb.php'); ?>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  justify-content-start">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
            <div class="ms-md-auto mt-3 mb-lg-n6 align-items-center text-end">
              Self Management <img src="<?= site_url('assets/admin/upload/images/logo/').$logo['logo'] ?>" class="img-fluid w-15 h-15" alt="">
            </div>
        </div>
      </div>
  