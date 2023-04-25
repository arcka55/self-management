
    <div class="sidenav-header mb-3">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" style="<?= ($active == "profile") ? "background-color: rgba(199, 199, 199, 0.2);" : "" ?>" href="<?= site_url('admin/profile/').$id_user ?>">  
        <img src="<?= site_url('assets/admin/upload/images/profile/').$admin['gambar'] ?>" class="navbar-brand-img h-100 rounded-circle me-1" style="min-width: 45px !important; min-height: 45px;" alt="main_logo">
        <span data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $admin['nama'] ?>" class="ms-1 font-weight-bold text-white text-wrap" style="width: 6rem;"><?= $firstname ?></span>
        <!-- <?php //site_url('assets/template/img/logo-ct.png') ?> -->
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= ($active == "dashboard") ? "active" : "" ?>" href="<?= base_url("admin/$id_user") ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= ($active == "materi") ? "active" : "" ?>" href="<?= base_url("admin/materi/$id_user") ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1">Materi Ajar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= ($active == "data_responden") ? "active" : "" ?>" href="<?= base_url("admin/data_responden/$id_user") ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">task</i>
            </div>
            <span class="nav-link-text ms-1">Data Responden</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= ($active == "user") ? "active" : "" ?>" href="<?= base_url("admin/user/$id_user") ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">User</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="javascript:;" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
          <i class="material-icons opacity-10">logout</i>
          <span class="nav-link-text ms-1">Log Out</span>
        </a>
      </div>
    </div>

