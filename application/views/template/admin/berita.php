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

        fieldset.scheduler-border {
          border: 1px groove #ddd !important;
          padding: 0 1.4em 1.4em 1.4em !important;
          margin: 0 0 1.5em 0 !important;
          -webkit-box-shadow:  0px 0px 0px 0px #000;
                  box-shadow:  0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            width:inherit !important; /* Or auto */
            padding:0 10px !important; /* To give a bit of padding on the left and right */
            border-bottom:none;
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
        }

        .form-switch .form-check-input:checked {
            background-position: right center;
        }

        .form-check-input:checked[type="checkbox"] {
            background-image: linear-gradient(195deg, #03a9f4 0%, #03a9f4 100%);
        }

        /* .image > .img-fluid {
            height: 100% !important;
        } */

        /* .holder {   
          width: auto;
          display: inline-block;    
        }

        .holder img {
          width: 30%;
          height: auto;    
        }​ */


        

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
                <h6 class="text-white text-capitalize ps-3">Tabel Berita</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                
                <br />
                <!-- Button trigger modal -->
                <div id="contentBtnTambahBerita">
                  <button type="button" class="btn bg-gradient btn-success" id="btnTambahBerita" onclick="add('<?=$active?>')"><span></span><i class="fas fa-plus-circle"></i> Tambah Berita</button>
                  <a href="<?= base_url("admin/$active/$id_user") ?>" class="btn btn-outline-secondary" onclick="reload_table()"><i class="fas fa-sync-alt"></i></a>
                </div>
                <div id="form-tambah-berita" style="display: none;" class="mt-5">
                  <form class="form_add" id="form_add" action="#" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Title</label>
                          <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp">
                        </div>
                        <div id="titleHelp" class="help-block form-text mt-3 mb-4"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">category</label>
                          <input type="text" class="form-control" name="category" id="category" aria-describedby="categoryHelp">
                        </div>
                        <div id="categoryHelp" class="help-block form-text mt-3 mb-4"></div>
                      </div>
                      <div class="form-group">
                        <div>
                          <label for="ckeditor" class="form-label">Post</label>
                          <textarea name="content" class="form-control" id="ckeditor" required></textarea>
                        </div>
                        <div id="ckeditorHelp" class="help-block form-text mt-3 mb-4"></div>
                      </div>
                          <!-- <input type="text" class="form-control" name="post" id="post" aria-describedby="postHelp"> -->
                      <div class="form-group">
                        <div class="input-group input-group-outline mt-4">
                          <label for="file-upload" class="custom-file-upload" id="custom-file-upload">
                          <i class="fa fa-cloud-upload"></i> Picture
                          </label>
                          <span id="file-selected" class="d-inline-block mt-2"></span>
                          <input id="file-upload" name="picture" type="file"/>
                        </div>  
                        <div id="pictureHelp" class="help-block form-text mb-2"></div>
                      </div>
                      <div class="form-text text-xs mb-6">( *File Max Size 3 MB | Max Dimensi (W x H): 3000 x 3000 | File Support: .jpg .jpeg .png )</div> 

                      
                      <!-- <span class="help-block"></span> -->
                      <!-- kirim tgl upload -->
                      <input type="hidden" class="form-control" value="<?= $admin['id'] ?>" name="idAdmin">
                      <div class="modal-footer">
                        <button type="button" id="refresh" class="btn btn-outline-secondary" onclick="refresh_form()"><i class="fa fa-sync"></i></button>
                        <button type="button" id="btnSave" class="btn bg-gradient-primary btnSave" onclick="save()">Save <i class="fa fa-check"></i></button>

                      </div>
                  </form>
                </div>
                <div id="edit-form-tambah-berita" style="display: none;" class="mt-n6">
                  <form class="form_edit" id="form_edit" action="#" enctype="multipart/form-data">
                    <div class="mt-6">
                      <a href="<?= base_url("admin/$active/$id_user") ?>" class="btn btn-outline-secondary" onclick="reload_table()"><i class="fas fa-arrow-left"></i></a>
                    </div>
                      <h4 class="text-center mt-4 mb-5">- Form Edit Berita -</h4>
                      <input type="hidden" name="id_berita" id="id_berita2">
                      <div class="form-group">
                        <div class="input-group input-group-static mb-4">
                          <label>Title</label>
                          <input type="text" class="form-control" name="title" id="title2" aria-describedby="titleHelp">
                        </div>
                        <div id="title2Help" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mt-5">
                        <div class="input-group input-group-static mb-4">
                          <label>category</label>
                          <input type="text" class="form-control" name="category" id="category2" aria-describedby="categoryHelp">
                        </div>
                        <div id="category2Help" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mt-5">
                        <div>
                          <label for="ckeditor2">Post</label>
                          <textarea name="content" id="ckeditor2" required></textarea>
                        </div>
                        <div id="ckeditor2Help" class="help-block form-text mt-3"></div>
                      </div>
                      <div>
                        <div class="col-lg-3">
                          <h6 class="mt-5 mb-3 fw-normal text-muted">Thumbnail : </h6>
                              <!-- <input type="text" class="form-control" name="post" id="post" aria-describedby="postHelp"> -->
                          <a id="link-file-preview2" href="" target="_blank"><img id="file-preview2" src ="" class="img-fluid rounded-3" alt="No Picture"/></a>
                        </div>
                        <div id="file-preview2Help" class="help-block form-text mt-3"></div>
                      </div>
                      <div class="mb-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" name="remove_photo" id="remove_photo">
                          <label class="form-check-label" for="remove_photo">Remove Photo</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <h6 class="mb-1 fw-normal text-muted">Change Thumbnail : </h6>
                        <div class="input-group input-group-outline mt-3 mb-4">
                          <label for="file-upload2" class="custom-file-upload2" id="custom-file-upload2">
                          <i class="fa fa-cloud-upload"></i> Picture
                          </label>
                          <span id="file-selected2" class="d-inline-block mt-2 break-all"></span>
                          <input id="file-upload2" name="picture" type="file"/>
                        </div>  
                        <div id="file-upload2Help" class="help-block form-text mt-n4 mb-2"></div>
                      </div>
                      <div class="form-text text-xs mb-6">( *File Max Size 3 MB | Max Dimensi (W x H): 3000 x 3000 | File Support: .jpg .jpeg .png )</div> 
                      <!-- <span class="help-block"></span> -->
                      <!-- kirim tgl upload -->
                      <input type="hidden" class="form-control" value="<?= $admin['id'] ?>" name="idAdmin" id="idAdmin2">
                      <div class="modal-footer">
                      <a href="<?= base_url("admin/$active/$id_user") ?>" class="btn btn-outline-secondary" onclick="reload_table()"><i class="fas fa-arrow-left"></i></a>
                        <button type="button" id="refresh" class="btn btn-outline-secondary" onclick="refresh_form()"><i class="fa fa-sync"></i></button>
                        <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save <i class="fa fa-check"></i></button>
                      </div>
                  </form>
                </div>
                <br />
                <br />
                <div id="data-table">
                  <table id="tabel" class="display nowrap table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal Post</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_body">
                        <?php 
                            $no = 1;
                            foreach($berita as $key) :
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= word_limiter($key['title'], 3) ?></td>
                            <td><?= $key['category'] ?></td>
                            <td><?= date("d-m-Y H:i:s",strtotime($key['datetime_created'])) ?></td>
                            <td class="text-center"><?= $key['nama'] ?></td>
                            <td class="text-center">
                              <!-- <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#readModal"><span class="fa fa-eye"></span> </a>  -->
                              <!-- <a href="<?= base_url('upload/').$key['file'] ?>" class="btn btn-outline-secondary btn-sm" taget="_blank"><span class="fa fa-download"></span> </a>  -->
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
                              <!-- <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm"><span class="fa fa-eye"></span> </a>  -->
                              <!-- <a href="javascript:void(0)" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><span class="fa fa-pencil"></span> </a> -->
                              <a href="javascript:;"
                                      data-id="<?php echo $key['id'] ?>"
                                      data-title="<?php echo $key['title'] ?>"
                                      data-picture="<?php echo $key['picture'] ?>"
                                      data-category="<?php echo $key['category'] ?>"
                                      data-post="<?php echo htmlentities($key['post']) ?>"
                                      data-datetime_created="<?php echo $key['datetime_created'] ?>"
                                      data-nama="<?php echo $key['nama'] ?>"
                                      data-id_admin="<?php echo $admin['id'] ?>"
                                      data-bs-toggle="modal" data-bs-target="#readModal">
                                      <button class="btn btn-outline-secondary btn-sm"><span class="fa fa-eye"></span></button>
                                      <!-- <button  data-toggle="modal" data-bs-target="#read2Modal" class="btn btn-outline-secondary btn-sm"><span class="fa fa-eye"></span></button> -->
                              </a>
                              <a href="javascript:;"
                                      data-id="<?php echo $key['id'] ?>"
                                      data-title="<?php echo $key['title'] ?>"
                                      data-picture="<?php echo $key['picture'] ?>"
                                      data-category="<?php echo $key['category'] ?>"
                                      data-post="<?php echo htmlentities($key['post']) ?>"
                                      data-datetime_created="<?php echo $key['datetime_created'] ?>"
                                      data-nama="<?php echo $key['nama'] ?>"
                                      data-id_admin="<?php echo $admin['id'] ?>"
                                      class="btnEditBerita" 
                                      id="btnEditBerita<?=$key['id']?>"
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
    <!-- <div class="modal fade top-2" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Tambah Berita <span class="fa fa-plus"></span></h6>
                  </div>
                </div>
                <div class="modal-body form mt-4">
                  <form class="form_add" id="form_add" action="#" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="input-group input-group-dynamic mb-4">
                          <label>Title</label>
                          <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp">
                        </div>
                        <div id="titleHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-dynamic mb-4">
                          <label>category</label>
                          <input type="text" class="form-control" name="category" id="category" aria-describedby="categoryHelp">
                        </div>
                        <div id="categoryHelp" class="help-block form-text mt-n2"></div>
                      </div>
                          <label for="ckeditor">Post</label>
                          <textarea name="content" id="ckeditor" required></textarea>
                      <div class="form-group">
                        <div class="input-group input-group-outline my-4">
                          <label for="file-upload" class="custom-file-upload" id="custom-file-upload">
                          <i class="fa fa-cloud-upload"></i> Picture
                          </label>
                          <span id="file-selected" class="d-inline-block mt-2"></span>
                          <input id="file-upload" name="picture" type="file"/>
                        </div>  
                        <div id="pictureHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <input type="hidden" class="form-control" value="<?= date('Y-m-d H:i:s') ?>" name="datetime_created">
                      <input type="hidden" class="form-control" value="<?= $admin['id'] ?>" name="idAdmin">
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="refresh" class="btn btn-outline-secondary" onclick="refresh()"><i class="fa fa-sync"></i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end modal add -->
    <!-- modal read -->
    <div class="modal fade top-2" id="readModal" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">View Berita</h6>
                  </div>
                </div>
                <div class="modal-body form mt-4">
                  <form class="form_read" id="form_read" action="#" enctype="multipart/form-data">
                    <ol class="list-group list-group py-3 px-5">
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 mb-3 me-auto">
                          <div class="fw-bold mb-3">Thumbnail :</div>
                          <a id="link-file-upload3" href="" target="_blank"><img id="file-upload3" src ="" class="img-fluid rounded-3"/></a>
                          <!-- <img id="file-upload3" src="" class="img-fluid" alt="..."> -->
                        </div>
                        <span id="idBerita3" class="badge bg-info rounded-pill position-absolute top-0 start-100 translate-middle">14</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold mb-2">Judul :</div>
                          <span id="title3">Cras justo odio</span>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold mb-2">Kategori :</div>
                          <span id="category3">Cras justo odio</span>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold mb-2">Tanggal Di Post :</div>
                          <span id="datetime_created3">Cras justo odio</span>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold mb-2">Author :</div>
                          <span id="nama3">Cras justo odio</span>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="ms-2">
                          <div class="fw-bold mb-3">Post :</div>
                          <textarea name="content" id="ckeditor3" required readonly></textarea>
                        </div>
                      </li>
                      <!-- <input type="hidden" name="idAdmin" id="idAdmin3"> -->
                    </ol>
                          <!-- <div class="form-group">
                            <div class="input-group input-group-outline my-4">
                              <label for="file-upload" class="custom-file-upload" id="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Picture
                              </label>
                              <span id="file-selected" class="d-inline-block mt-2"></span>
                              <input id="file-upload" name="picture" type="file"/>
                            </div>  
                            <div id="pictureHelp" class="help-block form-text mt-n2"></div>
                          </div> -->
                          <!-- <input type="text" class="form-control" id="datetime_created3" name="datetime_created">
                          <input type="text" class="form-control" id="idAdmin3" name="idAdmin"> -->
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal read -->
    <!-- modal edit -->
    <!-- <div class="modal fade top-2" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Tambah Berita <span class="fa fa-plus"></span></h6>
                  </div>
                </div>
                <div class="modal-body form mt-4">
                  <form class="form_edit" id="form_edit" action="#" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="input-group input-group-static mb-4">
                          <label>Title</label>
                          <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp">
                        </div>
                        <div id="titleHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-static mb-4">
                          <label>category</label>
                          <input type="text" class="form-control" name="category" id="category" aria-describedby="categoryHelp">
                        </div>
                        <div id="categoryHelp" class="help-block form-text mt-n2"></div>
                      </div>
                          <label for="ckeditor2">Post</label>
                          <textarea name="content" id="ckeditor2" required></textarea>
                      <div class="form-group">
                        <div class="input-group input-group-outline my-4">
                          <label for="file-upload2" class="custom-file-upload2" id="custom-file-upload2">
                          <i class="fa fa-cloud-upload"></i> Picture
                          </label>
                          <span id="file-selected2" class="d-inline-block mt-2"></span>
                          <input id="file-upload2" name="picture" type="file"/>
                        </div>  
                        <div id="pictureHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <input type="hidden" class="form-control" id="datetime_created" value="<?= date('Y-m-d H:i:s') ?>" name="datetime_created">
                      <input type="hidden" class="form-control" id="idAdmin" value="<?= $admin['id'] ?>" name="idAdmin">
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="refresh" class="btn btn-outline-secondary" onclick="refresh()"><i class="fa fa-sync"></i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end modal edit -->

    <script>
        var baseUrl = "<?php echo base_url(); ?>";
        // ckeditor
        $(function () {
        CKEDITOR.replace('ckeditor',{
            extraPlugins : 'uploadimage,image2,embed,autoembed',
          //   filebrowserBrowseUrl : '<?php echo base_url('assets/plugin-berita/kcfinder/browse.php?opener=CKEditor&type=files&responseType=json');?>',
          //   filebrowserImageBrowseUrl: '<?php echo base_url('assets/plugin-berita/kcfinder/browse.php?opener=CKEditor&type=images&responseType=json'); ?>',
          //   filebrowserFlashBrowseUrl: '<?php echo base_url('assets/plugin-berita/kcfinder/browse.php?opener=CKEditor&type=flash&responseType=json'); ?>',
          // //   filebrowserUploadMethod: "form",
          //   filebrowserUploadUrl: '<?php echo base_url('assets/plugin-berita/kcfinder/upload.php?opener=CKEditor&type=files&responseType=json'); ?>',
          //   filebrowserImageUploadUrl: '<?php echo base_url('assets/plugin-berita/kcfinder/upload.php?opener=CKEditor&type=images&responseType=json'); ?>',
          //   filebrowserFlashUploadUrl: '<?php echo base_url('assets/plugin-berita/kcfinder/upload.php?opener=CKEditor&type=flash&responseType=json'); ?>',
          //   imageUploadUrl: '<?php echo base_url('assets/plugin-berita/kcfinder/upload.php?opener=CKEditor&type=images'); ?>',
            
            height: '400px'
        });

            CKEDITOR.instances.ckeditor.on('change', function() { 
                $("#ckeditor").parent().parent().removeClass('has-error');
                $("#ckeditor").parent().next().empty();
            });
            
        });
        
        $(function () {
            CKEDITOR.replace('ckeditor2',{
              extraPlugins : 'uploadimage,image2,embed,autoembed',
              // extraPlugins : 'uploadimage,image2,embed,autoembed',
              
                height: '400px'             
            });

            CKEDITOR.instances.ckeditor2.on('change', function() { 
                $("#ckeditor2").parent().parent().removeClass('has-error');
                $("#ckeditor2").parent().next().empty();
            });
            
        });
        
        $(function () {
            CKEDITOR.replace('ckeditor3',{
              // filebrowserBrowseUrl : '<?php echo base_url('assets/kcfinder/browse.php');?>',
              //   filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php?type=Images'); ?>',
              //   filebrowserUploadMethod: "form",
              //   filebrowserUploadUrl: '<?php echo base_url('assets/kcfinder/upload.php'); ?>',
              //   filebrowserImageUploadUrl: '<?php echo base_url('assets/kcfinder/upload.php?type=Images'); ?>',
                // filebrowserUploadUrl: '<?php echo base_url('assets/kcfinder/uploader/upload.php'); ?>',
                // filebrowserImageUploadUrl: '<?php echo base_url('assets/kcfinder/uploader/upload.php?type=Images'); ?>',
                height: '400px'        
            });
        });
    </script>
</body>

</html>