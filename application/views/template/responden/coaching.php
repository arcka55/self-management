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

        .report_card {
          transition: all 0.2s ease;
        }

        .report_card:hover {
          opacity: 0.7;
	        transform: scale(1.05) !important;
        }

        .link-opacity {
          opacity: 0.4;
        }

        a.disabled {
          /* Make the disabled links grayish*/
          color: gray !important;
          /* And disable the pointer events */
          pointer-events: none !important;
        }

        

        /* button edit hapus */
        
        
  </style>
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
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Halaman Coaching</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2 mx-6 my-2">
              <div class="col-lg-4 col-md-6 col-sm-11 col-8 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                  <ul class="col-12 nav nav-pills nav-fill p-1" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" id="schedule" role="tab" aria-selected="true">
                        <!-- <i class="material-icons text-lg position-relative">schedule</i> -->
                        <i class="fas fa-clock"></i>
                        <span class="ms-1">Schedule</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" id="report" role="tab" aria-selected="false">
                        <i class="material-icons text-lg position-relative">assignment</i>
                        <span class="ms-1">Report</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div>
                <div class="row">
                  <div class="col">
                    <div id="schedule_div" class="mt-5">
                      <div class="card-body px-0 pb-2">
                        <!-- schedule page -->
                        <div>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn bg-gradient btn-success" data-bs-toggle="modal" data-bs-target="#addModal" onclick="add('<?= $active.'_schedule' ?>')"><i class="fas fa-plus"></i> Tambah Schedule</button>
                          <a href="<?= base_url("coach/$active/$id_user") ?>" class="btn btn-outline-secondary" onclick="reload_table()"><i class="fas fa-sync-alt"></i></a>
                          <br />
                          <br />
                          <table id="tabel" class="display nowrap table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>Jadwal Ke-</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jum'at</th>
                                    <th>Sabtu</th>
                                    <th>Minggu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabel_body">
                                <?php 
                                    $no = 1;
                                    foreach($jadwal_coach as $key) :
                                ?>
                                <tr class="text-center">
                                    <td><?= $no++ ?></td>
                                    <td><?= $key['senin'] ?></td>
                                    <td><?= $key['selasa'] ?></td>
                                    <td><?= $key['rabu'] ?></td>
                                    <td><?= $key['kamis'] ?></td>
                                    <td><?= $key['jumat'] ?></td>
                                    <td><?= $key['sabtu'] ?></td>
                                    <td><?= $key['minggu'] ?></td>
                                    <td class="text-center">
                                      <!-- button edit -->
                                      <!-- <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#readModal<?=$key['id']?>"><span class="fa fa-eye"></span></a> -->
                                      <!--modal read  -->
                                      <!-- <div class="modal fade top-2" id="readModal<?=$key['id']?>" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                    <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                                                      <h6 class="text-white text-capitalize ps-3">Read Materi <span class="fa fa-eye"></span></h6>
                                                    </div>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form id="form_read" class="form_read" action="#">
                                                        <div class="input-group input-group-outline my-3">
                                                          <input type="text" class="form-control" value="<?= $key['selasa'] ?>">
                                                        </div>
                                                    </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div> -->
                                      <!-- modal end read -->
                                      <!-- button edit -->
                                      <a href="javascript:void(0)" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?=$key['id']?>" onclick="edit('<?= $active.'_schedule' ?>', '<?=$key['id']?>')"><span class="fa fa-pencil"></span></a>
                                      <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" onclick="delete_data('<?=$active.'_schedule'?>','<?=$key['id']?>')"><span class="fa fa-trash"></span> </a>

                                      <!--modal edit  -->
                                      <div class="modal editJadwal fade top-2" id="editModal<?=$key['id']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                                      <h6 class="text-white text-capitalize ps-3">Edit Schedule <span class="fa fa-eye"></span></h6>
                                                    </div>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form id="form_edit<?= $key['id'] ?>" class="form_edit<?= $key['id'] ?>" action="#">
                                                        <div class="form-group">
                                                          <div class="input-group input-group-static my-3">
                                                            <label>Senin</label>
                                                            <input type="text" name="senin" readonly='true' class="timepicker form-control" value="<?= $key['senin'] ?>">
                                                          </div>
                                                          <div class="help-block form-text mt-n2"></div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="input-group input-group-static my-3">
                                                            <label>Selasa</label>
                                                            <input type="text" name="selasa" readonly='true' class="timepicker form-control" value="<?= $key['selasa'] ?>">
                                                          </div>
                                                          <div class="help-block form-text mt-n2"></div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="input-group input-group-static my-3">
                                                            <label>Rabu</label>
                                                            <input type="text" name="rabu" readonly='true' class="timepicker form-control" value="<?= $key['rabu'] ?>">
                                                          </div>
                                                          <div class="help-block form-text mt-n2"></div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="input-group input-group-static my-3">
                                                            <label>Kamis</label>
                                                            <input type="text" name="kamis" readonly='true' class="timepicker form-control" value="<?= $key['kamis'] ?>">
                                                          </div>
                                                          <div class="help-block form-text mt-n2"></div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="input-group input-group-static my-3">
                                                            <label>Jumat</label>
                                                            <input type="text" name="jumat" readonly='true' class="timepicker form-control" value="<?= $key['jumat'] ?>">
                                                          </div>
                                                          <div class="help-block form-text mt-n2"></div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="input-group input-group-static my-3">
                                                            <label>Sabtu</label>
                                                            <input type="text" name="sabtu" readonly='true' class="timepicker form-control" value="<?= $key['sabtu'] ?>">
                                                          </div>
                                                          <div class="help-block form-text mt-n2"></div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="input-group input-group-static my-3">
                                                            <label>Minggu</label>
                                                            <input type="text" name="minggu" readonly='true' class="timepicker form-control" value="<?= $key['minggu'] ?>">
                                                          </div>
                                                          <div class="help-block form-text mt-n2"></div>
                                                        </div>
                                                        <input type="hidden" class="form-control" value="<?= $key['id'] ?>" name="id">
                                                        <input type="hidden" class="form-control" value="<?= $coach['id'] ?>" name="idCoach">
                                                        <div class="form-group">
                                                          <div>
                                                            <input type="hidden" class="form-control" name="error_boy">
                                                          </div>
                                                          <div class="help-block form-text mt-n2"></div>
                                                        </div>
                                                    </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" id="refresh" class="btn btn-outline-secondary" onclick="refresh_form()">Clear <i class="fa fa-fw fa-sync"></i></button>
                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close <i class="fa fa-fw fa-close"></i></button>
                                                      <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save <i class="fa fa-fw fa-check"></i></button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal end edit -->
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                      </div>            
                    </div>
                    <div id="report_div" class="mt-6" style="display: none;">
                    <h1>Coachee Report</h1>
                      <div class="row row-cols-1 row-cols-md-4 g-4 my-4">
                        <?php 
                        if($report) {

                        
                          $i=1;
                          foreach($report as $key => $value) : 
                            if($i==25){
                              break;
                            }
                        ?>
                        <a id="report_card<?= $value['id_laporan'] ?>" class="report_card" href="javascript:;"
                              data-id="<?php echo $value['id_laporan'] ?>"
                              data-judul="<?php echo $value['judul'] ?>"
                              data-waktu="<?php echo $value['waktu'] ?>"
                              data-deskripsi="<?php echo $value['report_deskripsi'] ?>"
                              data-idStartup="<?php echo $value['report_idStartup'] ?>"
                              data-file="<?php echo $value['file'] ?>"
                              data-nama_startup="<?php echo $value['nama_startup'] ?>"
                              data-kontak="<?php echo $value['kontak'] ?>"
                              data-email="<?php echo $value['email'] ?>"
                              data-gambar="<?php echo $value['gambar'] ?>"
                              data-bs-toggle="modal" data-bs-target="#readModal">
                              <!-- <button><span></span></button> -->
                          <div class="col mb-5">
                            <div class="card pt-4 border-1 h-100">
                            <div class="position-absolute top-4 end-4">
                            <button type="button" class="btn btn-primary position-relative" data-bs-toggle="tooltip" data-bs-placement="top" title="CEO : <?= $value['ceo'] ?>">
                              <?= word_limiter($value['nama_startup'], 2) ?> <svg width="1em" height="1em" viewBox="0 0 16 16" class="position-absolute top-100 start-50 translate-middle mt-1 bi bi-caret-down-fill" fill="#212529" xmlns="http://www.w3.org/2000/svg"><path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg>
                            </button>
                            </div>
                              <img src="<?= site_url('assets/template/img/icons/report2.png') ?>" class="card-img-top" alt="report icons">
                              <div class="card-body">
                                <h5 class="card-title"><?= word_limiter($value['judul'], 3) ?></h5>
                                <p class="card-text"><?= $value['waktu'] ?></p>
                              </div>
                            </div>
                          </div>
                        </a>
                        <?php $i++; endforeach; } else {?>
                          <div class="col text-center py-5" style="width: 1200px">
                          <i style="font-size: 36px" class="material-icons text-secondary">
                            info
                          </i>
                          <p class='text-uppercase text-center mt-3'>Tidak ada Report untuk di tampilkan.</p>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
        <div class="toast fade hide p-2 mt-2 bg-white border border-info" role="alert" aria-live="assertive" id="infoToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-success me-2">
              check
            </i>
            <span class="me-auto font-weight-bold">Update Data </span>
            <small class="text-white"><?= date("d-m-Y") ?></small>
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal light m-0">
          <div class="toast-body text-white">
            Data Berhasil diupdate
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
    <!-- read modal report -->
    <div class="modal fade top-2" id="readModal" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Detail Report</h6>
                  </div>
                </div>
                <div class="modal-body form mt-4">
                  <div class="row p-3">
                    <div class="col-lg-4 text-center justify-content-center">
                      <img id="gambar_startup3" src="" class="img-fluid" alt="">
                      <h4 id="nama_startup3" class="mt-2">Judul Startup</h4>
                    </div>
                    <div class="col">
                      <form class="form_read" id="form_read" action="#" enctype="multipart/form-data">
                        <ol class="list-group list-group py-3 px-3">
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 mb-3 me-auto">
                              <div class="fw-bold mb-3">Judul :</div>
                              <span id="judul3">Cras justo odio</span>
                            </div>
                            <span id="idLaporan3" class="badge bg-primary rounded-pill position-absolute top-0 start-100 translate-middle">14</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold mb-2">Tanggal dibuat :</div>
                              <span id="waktu3">Cras justo odio</span>
                            </div>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold mb-2">Deskripsi :</div>
                              <span id="deskripsi3">Cras justo odio</span>
                            </div>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold mb-2">Kontak :</div>
                              <span id="kontak3">Cras justo odio</span>
                            </div>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold mb-2">Email :</div>
                              <span id="email3">Cras justo odio</span>
                            </div>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold mb-3">file :</div>
                              <div class="row">
                                <div class="col-3">
                                  <a href="" id="lampiran_file3">
                                    <img id="lampiran_gambar3" src="<?= site_url('assets/template/img/icons/report.png') ?>" alt="" class="img-fluid">
                                  </a>
                                </div>
                                <div class="col">
                                  <span id="lampiran_message3">(*Klik file icon disamping untuk mendownload file)</span>
                                </div>
                              </div>
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
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal add -->
    <div class="modal fade top-2" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Tambah Schedule <span class="fa fa-plus"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_add" id="form_add" action="#" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="input-group input-group-static my-3">
                        <label>Senin</label>
                          <input type="text" name="senin" readonly='true'  class="form-control timepicker" id="senin" aria-describedby="seninHelp">
                        </div>
                        <div id="seninHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-static my-3">
                        <label>Selasa</label>
                          <input type="text" name="selasa" readonly='true'  class="form-control timepicker" id="selasa" aria-describedby="selasaHelp">
                        </div>
                        <div id="selasaHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-static my-3">
                        <label>Rabu</label>
                          <input type="text" name="rabu" readonly='true'  class="form-control timepicker" id="rabu" aria-describedby="rabuHelp">
                        </div>
                        <div id="rabuHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-static my-3">
                        <label>Kamis</label>
                          <input type="text" name="kamis" readonly='true'  class="form-control timepicker" id="kamis" aria-describedby="kamisHelp">
                        </div>
                        <div id="kamisHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-static my-3">
                        <label>Jumat</label>
                          <input type="text" name="jumat" readonly='true'  class="form-control timepicker" id="jumat" aria-describedby="jumatHelp">
                        </div>
                        <div id="jumatHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-static my-3">
                        <label>Sabtu</label>
                          <input type="text" name="sabtu" readonly='true'  class="form-control timepicker" id="sabtu" aria-describedby="sabtuHelp">
                        </div>
                        <div id="sabtuHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-static my-3">
                        <label>Minggu</label>
                          <input type="text" name="minggu" readonly='true'  class="form-control timepicker" id="minggu" aria-describedby="mingguHelp">
                        </div>
                        <div id="mingguHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <input type="hidden" class="form-control" value="<?= $coach['id'] ?>" name="idCoach">
                      <div class="form-group">
                        <div>
                          <input type="hidden" class="form-control" name="error_boy">
                        </div>
                        <div class="help-block form-text mt-n2"></div>
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="refresh" class="btn btn-outline-secondary" onclick="refresh_form()"><i class="fa fa-sync"></i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close <i class="fa fa-close"></i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save <i class="fa fa-check"></i></button>
                </div>
            </div>
        </div>
      </div>
      <!-- end modal add -->
      <!-- notif error -->
      <div class="modal fade" id="modalError" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered z-index-3000" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title font-weight-normal" id="modal-title-notification">Your attention is required</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
              <i class="material-icons h1 text-secondary">
                notifications_active
              </i>
              <h4 class="text-gradient text-danger mt-4">You should read this!</h4>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white">Ok, Got it</button>
            <button type="button" class="btn btn-link text-white ml-auto" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</body>

</html>