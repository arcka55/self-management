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

        .custom-file-upload2:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
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
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-1">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Materi</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                
                <br />
                <!-- Button trigger modal -->
                <button type="button" class="btn bg-gradient btn-success" data-bs-toggle="modal" data-bs-target="#addModal" onclick="add('<?=$active?>')"><i class="fas fa-plus"></i> Tambah Materi</button>
                <a href="<?= base_url("admin/$active/$id_user") ?>" class="btn btn-outline-secondary" onclick="reload_table()"><i class="fas fa-sync-alt"></i></a>
                <br />
                <br />
                <table id="tabel" class="display nowrap table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr class="text-center">
                          <th>No.</th>
                          <th>Judul Materi</th>
                          <th>File</th>
                          <th>Action</th>
                          <!-- <th>Tanggal Upload</th> -->
                      </tr>
                  </thead>
                  <tbody id="tabel_body">
                      <?php 
                          $no = 1;
                          foreach($materi as $key) :
                          $filename = $key['file'];
                          
                          $file_extension = get_file_extension($filename);
                          $file_extension_color = "";

                          if($file_extension == "docx") {
                            $file_extension = "word-o";
                            $file_extension_color = "info";
                          } else if($file_extension == "xlsx") {
                              $file_extension = "excel-o";
                              $file_extension_color = "success";
                          } else if($file_extension == "pptx") {
                              $file_extension = "powerpoint-o";
                              $file_extension_color = "primary";
                          } else if($file_extension == "pdf") {
                              $file_extension = "pdf-o";
                              $file_extension_color = "danger";

                          }
                      ?>
                      <tr>
                          <td class="text-center"><?= $no++ ?></td>
                          <td><?= $key['judul_materi'] ?></td>
                          <td><i class="fa fa-file-<?= $file_extension ?> text-<?= $file_extension_color ?>"></i> <?= $key['file'] ?></td>
                          <!-- <td class="text-center"><?= date('d-m-Y H:i:s', strtotime($key['tgl_waktu_upload'])); ?></td> -->
                          <td class="text-center">
                            <!-- <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#readModal"><span class="fa fa-eye"></span> </a>  -->
                            <a href="<?= base_url('assets/admin/upload/files/materi/').$key['file'] ?>" class="btn btn-outline-secondary btn-sm" target="_blank"><span class="fa fa-download"></span> </a> 
                            <!-- modal read -->
                            <!-- <div class="modal fade top-2" id="readModal" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                          <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                                            <h6 class="text-white text-capitalize ps-3">Read Materi <span class="fa fa-eye"></span></h6>
                                          </div>
                                        </div>
                                        <div class="modal-body">
                                          <form id="form_edit" class="form_edit" action="#">
                                              <div class="input-group input-group-outline my-3">
                                                <input type="text" class="form-control" value="<?= $key['judul_materi'] ?>">
                                              </div>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- button edit -->
                            <!-- <a href="javascript:void(0)" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><span class="fa fa-pencil"></span> </a> -->
                            <a href="javascript:;"
                                      data-id="<?php echo $key['id'] ?>"
                                      data-judul_materi="<?php echo $key['judul_materi'] ?>"
                                      data-bs-toggle="modal" data-bs-target="#editMateriModal"
                                      onclick="edit('<?=$active?>', '<?=$key['id']?>')">
                                      <button class="btn btn-outline-info btn-sm"><span class="fa fa-pencil"></span></button>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" onclick="delete_data('<?=$active?>', '<?=$key['id']?>')"><span class="fa fa-trash"></span> </a>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-1">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Log Materi</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                
                <table id="tabel2" class="display nowrap table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th class="text-center">No</th>
                          <th>Judul Materi</th>
                          <th>Didownload Oleh</th>
                          <!-- <th class="text-center">Tanggal didownload</th> -->
                      </tr>
                  </thead>
                  <tbody id="tabel_body">
                      <?php 
                          $no = 1;
                          foreach($materi_log_join as $key => $value) :
                      ?>
                      <tr>
                          <td class="text-center"><?= $no++ ?></td>
                          <td><?= $value['judul_materi'] ?></td>
                          <td><?= $value['downloaded_by'] ?></td>
                          <!-- <td class="text-center"><?= date('d-m-Y H:i:s', strtotime($value['downloaded_datetime'])); ?></td> -->
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
    </div>
  </main>
    <!-- load file js.php -->
    <?php $this->load->view('template/_partials/js.php'); ?>
    <!-- modal add -->
    <div class="modal fade top-2" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Tambah Materi <span class="fa fa-plus"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_add" id="form_add" action="#" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="input-group input-group-outline my-3">
                          <label id="labelMateri" for="judulMateri" class="form-label">Judul Materi</label>
                          <input type="text" name="judulMateri" class="form-control" id="judulMateri" aria-describedby="judulMateriHelp">
                        </div>
                      <div id="judulMateriHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-outline my-4">
                          <label for="file-upload" class="custom-file-upload" id="custom-file-upload">
                          <i class="fa fa-cloud-upload"></i> Upload File
                          </label>
                          <span id="file-selected" class="d-inline-block mt-2"></span>
                          <input id="file-upload" name="fileMateri" type="file"/>
                        </div>  
                        <div id="judulMateriHelp" class="help-block form-text mt-n4"></div>
                      </div>
                      <div class="form-text text-xs">( *File Max Size 10 MB | File Support: .doc .docx .xls .xlsx .ppt .pptx .pdf )</div> 

                      <!-- <span class="help-block"></span> -->
                      <!-- kirim tgl upload -->
                      <input type="hidden" class="form-control" value="<?= date('Y-m-d H:i:s') ?>" name="tglUpload">
                      <input type="hidden" class="form-control" value="<?= $admin['id'] ?>" name="idAdmin">
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="refresh" class="btn btn-outline-secondary" onclick="refresh_form()"><i class="fa fa-sync"></i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal add -->
    <!-- modal edit -->
    <div class="modal fade top-2" id="editMateriModal" tabindex="-1" role="dialog" aria-labelledby="editMateriModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Edit Materi <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm" id="form_edit_materi" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                        <div class="input-group input-group-static my-3">
                          <label>Judul Materi</label>
                          <input type="hidden" name="id" class="form-control" id="id2">
                          <input type="text" name="judulMateri" class="form-control" id="judulMateri2" aria-describedby="judulMateriHelp">
                        </div>
                      <div id="judulMateriHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <span class="text-sm">Change File </span>
                      <div class="form-group">
                        <div class="input-group input-group-outline mt-2 mb-4">
                          <label for="file-upload2" class="custom-file-upload2" id="custom-file-upload2">
                          <i class="fa fa-cloud-upload"></i> Upload File
                          </label>
                          <span id="file-selected2" class="d-inline-block mt-2"></span>
                          <input id="file-upload2" name="fileMateri" type="file"/>
                        </div>
                        <div id="judulMateriHelp2" class="help-block form-text mt-n4"></div>
                      </div>
                      <div class="form-text text-xs">( *File Max Size 10 MB | File Support: .doc .docx .xls .xlsx .ppt .pptx .pdf )</div> 
                      <!-- <span class="help-block"></span> -->
                      <!-- kirim tgl upload -->
                     
                      <input type="hidden" class="form-control" value="<?= $admin['id'] ?>" name="idAdmin">
                      <input type="hidden" class="form-control" value="<?= $id_user ?>" name="id_user">
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit -->

    
</body>

</html>