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
     /* custom file upload button */
     input[type="file"] {
            display: none;
        }

    .custom-file-upload {
          margin-left: -2px;
          border: 1px solid #ccc;
          display: inline-block;
          padding: 6px 12px;
          cursor: pointer;
          margin-bottom: 1rem;
          margin-right: 10px; 
          border-radius: 0.5rem !important;
          color: #fff;
          background-color: #4CAF50;
        }

        .custom-file-upload2 {
          margin-left: -2px;
          border: 1px solid #ccc;
          display: inline-block;
          padding: 6px 12px;
          cursor: pointer;
          margin-bottom: 1rem;
          margin-right: 10px; 
          border-radius: 0.5rem !important;
          color: #fff;
          background-color: #4CAF50;
        }

        .custom-file-upload3 {
          margin-left: -2px;
          border: 1px solid #ccc;
          display: inline-block;
          padding: 6px 12px;
          cursor: pointer;
          margin-bottom: 1rem;
          margin-right: 10px; 
          border-radius: 0.5rem !important;
          color: #fff;
          background-color: #4CAF50;
        }

        .custom-file-upload:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
        }

        .custom-file-upload2:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
        }

        .custom-file-upload3:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #Cb809a;
            border-color: #7b809a;
        }

  </style>
</head>

<body class="g-sidenav-show bg-gray-200">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <!-- load file sidebar.php -->
    <?php $this->load->view('template/admin/_partials_admin/sidebar.php', $name_explode); ?>
  </aside>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <!-- load file navbar.php -->
      <?php $this->load->view('template/admin/_partials_admin/navbar.php'); ?>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid mt-n3">
      <div class="row">
        <div class="col-md-2">
          <a class="btn bg-gradient-secondary mt-4 w-100" href="#">Profil</a>
        </div>
      </div>
      <hr>
    </div>
    <div class="container-fluid px-2 px-md-4">
    <?= $this->session->flashdata('message'); ?>
      <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('<?= site_url('assets/template/img/ivancik.jpg')?>');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <a href="javascript:;" data-bs-toggle="modal" onclick="edit('edit_foto_profile', '<?= $admin['id'] ?>')" data-bs-target="#editFotoProfileModal">
                <img src="<?= site_url('assets/admin/upload/images/profile/').$admin['gambar'] ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              </a>
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo $name_explode['firstname']." "; if(isset($name_explode['lastname'])){ echo $name_explode['lastname']." "; } if(isset($name_explode['third_word'])) { echo $name_explode['third_word'][0]; } ?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                <?= $admin['email'] ?>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " id="btnBasicInfo" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">home</i>
                    <span class="ms-1">Basic Info</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " id="btnSettings" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- basic info -->
        <div class="row" id="basic_info">
          <div class="row">
            <div class="col">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Deskripsi Pribadi</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#editProfileModal" onclick="edit('<?=$active?>', '<?=$admin['id']?>')">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    <?= ($admin['deskripsi_pribadi']) ? $admin['deskripsi_pribadi'] : "-" ?>
                  </p>
                  <hr class="my-5">
                  <div class="row">
                    <div class="col mb-3">
                      <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nama Lengkap:</strong> &nbsp; <?= ($admin['nama']) ? $admin['nama'] : "-" ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Gender:</strong> &nbsp; <?= ($admin['gender']) ? $admin['gender'] : "-" ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor Telp:</strong> &nbsp; <?= ($admin['nomor_telp']) ? $admin['nomor_telp'] : "-" ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong> &nbsp; <?= ($admin['alamat']) ? $admin['alamat'] : "-" ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end basic info -->
        <!-- Settings -->
        <div class="row" id="settings_profile" style="display: none;">
          <div class="row">
            <div class="col">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Password Settings</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    Change Your Password :
                  </p>
                  <form action="<?= base_url('admin/change_password/').$id_user ?>" method="post">
                    <div class="row">
                      <div class="col">
                        <div class="input-group input-group-outline mb-6">
                          <input type="password" name="old_password" class="form-control" placeholder="Old Password.." required>
                        </div>
                        <div>
                          <input type="hidden" name="id_admin" value="<?= $admin['id']; ?>">
                        </div>
                        <div class=""></div>
                      </div>
                      <div class="col">
                        <div class="input-group input-group-outline mb-6">
                          <input type="password" name="password" id="password" class="form-control" placeholder="New Password.." required>
                        </div>
                        <div class=""></div>
                      </div>
                      <div class="col">
                        <div class="input-group input-group-outline mb-1">
                          <input type="password" name="confirm_password" id="confirm_password" class="form-control me-2" placeholder="Confirm New Password.." required>
                        </div>
                        <div class=""></div>
                        <span id='message'></span>
                      </div>
                      <div class="col">
                        <button class="btn btn-primary" id="btnSubmitChangePassword" disabled type="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                  <hr class="horizontal gray-light border border-1 my-4">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end Settings -->
      </div>
    </div>
    <!-- toast -->
    <div class="position-fixed bottom-1 end-1 z-index-2">
      <div class="toast fade hide p-2 bg-white border border-success" role="alert" aria-live="assertive" id="successToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-success me-2">
              check
            </i>
            <span class="me-auto font-weight-bold">Add Data </span>
            <small class="text-body"><?= date("d-m-Y") ?></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Data baru berhasil ditambahkan (akan reload dalam 3 detik...)
          </div>
        </div>
        <div class="toast fade hide p-2 bg-white border border-info" role="alert" aria-live="assertive" id="successEditToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-info me-2">
              check
            </i>
            <span class="me-auto font-weight-bold">Edit Data </span>
            <small class="text-body"><?= date("d-m-Y") ?></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Data berhasil diedit atau diupdate (akan reload dalam 3 detik...)
          </div>
        </div>
        <div class="toast fade hide p-2 bg-white border border-danger" role="alert" aria-live="assertive" id="successDeleteToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-danger me-2">
              close
            </i>
            <span class="me-auto font-weight-bold">Delete Data </span>
            <small class="text-body"><?= date("d-m-Y") ?></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Data berhasil dihapus (akan reload dalam 3 detik...)
          </div>
        </div>
        <div class="toast fade hide p-2 mt-2 bg-gradient-info" role="alert" aria-live="assertive" id="infoToast" aria-atomic="true">
          <div class="toast-header bg-transparent border-0">
            <i class="material-icons text-white me-2">
              notifications
            </i>
            <span class="me-auto text-white font-weight-bold">Material Dashboard </span>
            <small class="text-white">11 mins ago</small>
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal light m-0">
          <div class="toast-body text-white">
            Hello, world! This is a notification message.
          </div>
        </div>
        <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="warningToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-warning me-2">
              travel_explore
            </i>
            <span class="me-auto font-weight-bold">Material Dashboard </span>
            <small class="text-body">11 mins ago</small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Hello, world! This is a notification message.
          </div>
        </div>
        <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-danger me-2">
              campaign
            </i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Material Dashboard </span>
            <small class="text-body">11 mins ago</small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Hello, world! This is a notification message.
          </div>
        </div>
      </div>
    <footer class="footer py-4  ">
      <!-- load file footer.php -->
      <?php $this->load->view('template/_partials/footer.php'); ?>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-center text-capitalize ps-3">Edit Profile</h6>
            </div>
          </div>
          <form action="#" class="form_edit" id="form_edit<?=$admin['id']?>" enctype="multipart/form-data">
            <div class="modal-body my-4 px-5">
              <div class="input-group input-group-static mb-4">
                <label class="">Nama Lengkap</label>
                <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                <input type="hidden" name="id_user" value="<?= $id_user ?>">
                <input type="text" name="nama" value="<?= $admin['nama'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap Anda" required>
              </div>
              <div class="help-block form-text mt-n2"></div>
              <div class="input-group input-group-static mb-4">
                <label for="gender" class="ms-0">Gender</label>
                <select class="form-control" name="gender" id="gender">
                  <option value="Pria" <?php if($admin['gender'] == "Pria") echo "selected" ?>>Pria</option>
                  <option value="Wanita" <?php if($admin['gender'] == "Wanita") echo "selected" ?>>Wanita</option>
                </select>
              </div>
              <div class="help-block form-text mt-n2"></div>
              <div class="input-group input-group-static mb-4">
                <label class="">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $admin['email'] ?>" placeholder="Masukkan Email.." required>
              </div>
              <div class="help-block form-text mt-n2"></div>
              <div class="input-group input-group-static mb-4">
                <label class="">Nomor HP</label>
                <input type="text" name="nomor_hp" class="form-control" value="<?= $admin['nomor_telp'] ?>" placeholder="Masukkan Nomor HP" required>
              </div>
              <div class="help-block form-text mt-n2"></div>
              <label class="">Alamat</label>
              <div class="input-group input-group-dynamic mb-4">
                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Anda" spellcheck="false"><?= $admin['alamat'] ?></textarea>
              </div>
              <div class="help-block form-text mt-n2"></div>
              <label class="">Deskripsi Pribadi</label>
              <div class="input-group input-group-dynamic mb-4">
                <textarea class="form-control" name="deskripsi_pribadi" placeholder="Masukkan Deskripsi Pribadi.." spellcheck="false"><?= $admin['deskripsi_pribadi'] ?></textarea>
              </div>
              <div class="help-block form-text mt-n2"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btnSave btn bg-gradient-primary" onclick="save()">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end modal -->
    <!-- modal change foto -->
    <div class="modal fade top-2" id="editFotoProfileModal" tabindex="-1" role="dialog" aria-labelledby="editFotoProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Foto Profile <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit" id="form_edit_foto_profile" action="#" enctype="multipart/form-data">
                    <div class="text-center">
                      <img class="rounded" src="<?= site_url('assets/admin/upload/images/profile/').$admin['gambar'] ?>" class="img-fluid" alt="">
                    </div>
                    <p style="font-weight: 400; font-size: 0.875rem;" class="mb-n3 mt-4">Change Foto Profile</p>
                    <div class="form-group">
                      <div class="input-group input-group-outline my-4">
                        <label for="file-upload2" class="custom-file-upload2" id="custom-file-upload2">
                        <i class="fa fa-cloud-upload"></i> Upload
                        </label>
                        <span id="file-selected2" class="d-inline-block mt-2"></span>
                        <input id="file-upload2" name="foto_profile" type="file"/>
                        <input type="hidden" name="id_user" value="<?= $id_user ?>"/>
                      </div>  
                      <div class="help-block form-text mt-n2"></div>
                    </div>
                    <div class="form-text text-xs mb-6" style="width: 400px">( *File Max Size 3 MB | Max Dimensi (W x H): 3000 x 3000 | File Support: .jpg .jpeg .png )</div> 
                  </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" id="refresh" class="btn btn-outline-secondary" onclick="refresh_form()"><i class="fa fa-sync"></i></button> -->
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal change foto -->
  </div>
  <!-- load file js.php -->
  <?php $this->load->view('template/_partials/js.php'); ?>
</body>

</html>