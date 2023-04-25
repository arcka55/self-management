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

        /* untuk ubah warn pagination */

        /* .pagination .page-item.active .page-link {
            background-color: #03a9f4 !important;
            border: none;
            color: white !important;

        }
        
        .page-link {
            color: #7b809a !important;
        }

        .page-link:focus {
            box-shadow: none !important;
            border-color: #03a9f4 !important;
        } */
        
        .modal-dialog-scrollable .modal-body {
            overflow-y: hidden !important;
        }

        .modal-dialog-scrollable .modal-body:hover {
            overflow-y: auto !important;
        }

        .dataTables_paginate {
            margin-top: 20px !important;
            margin-bottom: 10px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            margin-top: 15px;
            margin-bottom: 10px !important;

        }

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

        .custom-file-upload:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
        }

        .nav.nav-pills .nav-link {
            z-index: 3;
            color: #e91e63;
            border-radius: 0.5rem;
            background-color: inherit;
        }
        
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #344767;
            background-color: #fff;
        }

        
        #btnApprove:hover {
          color: #4caf50 !important;
          border-color: #4caf50;
          background-color: #fff;
        }

        #btnReject:hover {
          color: #f44335 !important;
          border-color: #f44335 !important;
          background-color: #fff;
        }

        /* button edit hapus */
        
        
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <!-- load file sidebar.php -->
    <?php $this->load->view('template/admin/_partials_admin/sidebar.php', $name_explode); ?>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <!-- load file navbar.php -->
      <?php $this->load->view('template/admin/_partials_admin/navbar.php'); ?>
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
                <h6 class="text-white text-capitalize ps-3">Tabel User</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                  
                  <table id="tabel" class="display nowrap table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                          <th class="text-center">Action</th>
                            <th class="text-center">No.</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <!-- <th class="text-center">Date Created</th> -->
                            <th>Author</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_body">
                        <?php 
                            $no = 1;
                            foreach($user_role_admin as $key) :
                        ?>
                        <tr>
                          <td class="text-center">
                            <!-- button edit -->
                            <a href="javascript:;"
                                  data-id="<?php echo $key['user_id'] ?>"
                                  data-username="<?php echo $key['username'] ?>"
                                  data-user_email="<?php echo $key['user_email'] ?>"
                                  data-password="<?php echo $key['password'] ?>"
                                  data-role_id="<?php echo $key['role_id'] ?>"
                                  data-bs-toggle="modal" data-bs-target="#editModal"
                                  onclick="edit('<?=$active?>', '<?=$key['id']?>')">
                                  <button class="btn btn-outline-info btn-sm"><span class="fa fa-pencil"></span></button>
                          </a>
                          </td>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $key['username'] ?></td>
                            <td><?= $key['user_email'] ?></td>
                            <td><?= $key['password'] ?></td>
                            <td><?= $key['role'] ?></td>
                            <!-- <td class="text-center"><?= date('d-m-Y H:i:s', strtotime($key['date_created'])); ?></td> -->
                            <td class="text-center"><?= $key['nama_admin'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- toast -->
      <div class="position-fixed bottom-1 end-1 z-index-10">
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
    </div>
  </main>
    <!-- load file js.php -->
    <?php $this->load->view('template/_partials/js.php'); ?>
    
    <!-- modal edit -->
    <div class="modal fade top-2" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Edit User <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm" id="form_edit" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                        <div class="input-group input-group-static my-3">
                          <label id="label_username" for="username" class="">Username</label>
                          <input type="text" name="username" class="form-control" id="username2" required>
                        </div>
                      <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <div class="input-group input-group-static my-3">
                          <label id="label_password" for="password" class="">Password</label>
                          <input type="password" name="password" class="form-control" id="password2" required>
                        </div>
                      <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <div class="form-check ms-n4">
                          <input class="form-check-input" type="checkbox" onclick="showPassword()" id="show-password">
                          <label class="custom-control-label" for="customCheck1">Show Password</label>
                        </div>
                        <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div>
                        <div>
                          <input type="hidden" name="role_id" id="role_id2">
                          <input type="hidden" name="id_user" id="id_user2">
                        </div>
                        <div class="help-block form-text mt-n2"></div>
                      </div>
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
    <!-- end modal edit -->
    
    
</body>

</html>