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
<?php require_once(APPPATH . 'libraries/function.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- load file head.php -->
  <?php $this->load->view("template/_partials/head"); ?>
  <style>
    div.dataTables_filter input {
      background: none;
      border: 1px solid #d2d6da;
      border-radius: 0.375rem;
      border-top-left-radius: 0.375rem !important;
      border-bottom-left-radius: 0.375rem !important;
      padding: 0.625rem 0.75rem !important;
      line-height: 1.3 !important;
    }

    div.dataTables_filter input:focus {
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

    .custom-file-upload:hover {
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

    .custom-file-upload2:hover {
      background-color: #fff !important;
      color: #4CAF50 !important;
      border: 1px solid #4CAF50 !important;
    }

    .read-text-p {
      line-height: 1.625;
      font-weight: 300;
    }

    .read-materi dt {
      margin: 10px 0;
    }

    .read-materi dd {
      margin-left: 17px;
    }

    .read-materi ol li {
      padding-left: 5px;
    }



    /* button edit hapus */
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
                <h6 class="text-white text-capitalize ps-3">Materi Kuesioner</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                <div class="row my-4">
                  <?php
                  foreach ($materi as $key => $value) :
                  ?>
                    <div class="col-md-4">
                      <div class="card h-100 border-1" data-animation="true">
                        <div class="btn text-start mb-6 mt-2">
                          <span class="badge badge-sm badge-circle badge-danger text-warning border border-gray-300 border-2">File Materi</span>
                        </div>
                        <div class="card-header p-0 position-relative mt-n4 mx-4 z-index-2">
                          <a class="d-block blur-shadow-image text-center">
                            <img src="<?= base_url('assets/template/img/icons/report2_2.png'); ?>" alt="img-blur-shadow" class="img-fluid border-radius-lg">
                          </a>
                          <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('assets/template/img/icons/report2_2.png') ?>&quot;);"></div>
                        </div>
                        <div class="card-body text-center">
                          <div class="mt-n6 mx-auto">
                            <?php
                            foreach ($materi as $keysm => $valuesm) {
                              if ($valuesm['judul_materi'] == 'Self Management') {
                            ?>
                                <span data-bs-toggle="modal" data-bs-target="#readModal">
                                  <a href="#" class="btn btn-link text-info ms-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Read">
                                    <i class="material-icons" style="font-size: 25px">visibility</i>
                                  </a>
                                </span>
                            <?php

                              }
                            }
                            ?>
                            <a href="<?= base_url('responden/download_materi/' . $value["id"] . '/') . $id_user ?>" class="btn btn-link text-success ms-auto border-0" onclick="return confirm('Download File Materi ?')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Download">
                              <i class="material-icons" style="font-size: 25px">download</i>
                            </a>

                          </div>
                          <h5 class="font-weight-normal mt-3">
                            <a><?= $value['judul_materi'] ?></a>
                          </h5>
                          <p class="mb-0">
                            <?= $value['file'] ?>
                          </p>
                        </div>
                      </div>
                    </div>
                </div>
              <?php
                  endforeach;
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- toast -->
      <div class="position-fixed bottom-1 end-1 z-index-1">
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
                <input id="file-upload" name="fileMateri" type="file" />
              </div>
              <div id="judulMateriHelp" class="help-block form-text mt-n4"></div>
            </div>
            <div class="form-text text-xs">( *File Max Size 10 MB | File Support: .doc .docx .xls .xlsx .ppt .pptx .pdf )</div>

            <!-- <span class="help-block"></span> -->
            <!-- kirim tgl upload -->
            <input type="hidden" class="form-control" value="<?= date('Y-m-d H:i:s') ?>" name="tglUpload">
            <input type="hidden" class="form-control" value="<?= $responden['id'] ?>" name="idresponden">
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
                <input id="file-upload2" name="fileMateri" type="file" />
              </div>
              <div id="judulMateriHelp2" class="help-block form-text mt-n4"></div>
            </div>
            <div class="form-text text-xs">( *File Max Size 10 MB | File Support: .doc .docx .xls .xlsx .ppt .pptx .pdf )</div>
            <!-- <span class="help-block"></span> -->
            <!-- kirim tgl upload -->

            <input type="hidden" class="form-control" value="<?= $responden['id'] ?>" name="idresponden">
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
  <!-- modal read -->
  <div class="modal fade top-2" id="readModal" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-info shadow-info border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3 text-center">Self Management</h6>
          </div>
        </div>
        <div class="modal-body text-start read-materi px-5">
          <dl>
            <dt>
              1. Integrasi Diri
            </dt>
            <dd>
              Integrasi Diri Mengacu pada kemampuan pasien untuk mengintegrasikan layanan kesehatan dalam kehidupan sehari-hari mereka melalui kegiatan seperti diet yang tepat, olahraga dan kontrol berat badan. Penderita hipertensi harus mampu :
              <ol type="a">
                <li>Mengelola porsi dan pilihan makanan ketika makan </li>
                <li>Makan lebih banyak buah, sayuran, biji-bijian dan kacangkacangan</li>
                <li>Mengurangi konsumsi lemak jenuh</li>
                <li>Mempertimbangkan efek pada tekanan darah ketika membuat pilihan makanan untuk dikonsumsi</li>
                <li>Menghindari minum alkohol</li>
                <li>Mengkonsumsi makanan rendah garam atau menggunakan sedikit garam ketika membumbui masakan</li>
                <li>Mengurangi berat badan secara efektif</li>
                <li>Latihan/olahraga untuk mengontrol tekanan darah dan berat badan dengan berjalan kaki, jogging atau bersepeda selama 30-60 menit setiap hari</li>
                <li>Berhenti merokok</li>
                <li>Mengontrol stres dengan mendengarkan musik, istirahat dan berbicara dengan anggota keluarga.</li>
              </ol>
            </dd>
            <dt>
              2. Regulasi Diri
            </dt>
            <dd>
              Mencerminkan perilaku mereka melalui memonitor diri tandatanda dan gejala tubuh (yang mengidentifikasi situasi kehidupan dan penyebab terkait dengan perubahan tekanan darah dan mengambil tindakan berdasarkan pada pengamatan ini/ regulasi diri). Perilaku regulasi diri mencakup :
              <ol type="a">
                <li>Mengetahui penyebab berubahnya tekanan darah</li>
                <li>Mengenali tanda dan gejala tekanan darah tinggi dan rendah</li>
                <li>Bertindak dalam menanggapi gejala</li>
                <li>Membuat keputusan berdasarkan pengalaman</li>
                <li>Mengetahui situasi yang dapat mempengaruhi tekanan darah</li>
                <li>Membandingkan perbedaan antara tingkat tekanan darah</li>
              </ol>
            </dd>
            <dd>
            <dt>
              3. Interaksi Dengan Tenaga Kesehatan dan Lainnya
            </dt>
            <dd>
              Interaksi dengan tenaga kesehatan dan yang terkait lainnya Didasarkan pada konsep bahwa perawatan kesehatan yang baik melibatkan kolaborasi dengan penyedia layanan kesehatan dan terkait lainnya yang tercermin sebagai berikut :
              <ol type="a">
                <li>Nyaman ketika mendiskusikan rencana pengobatan dengan penyedia layanan kesehatan</li>
                <li>Nyaman ketika menyarankan perubahan rencana perawatan kepada penyedia layanan kesehatan</li>
                <li>Nyaman ketika bertanya kepada penyedia layanan kesehatan terkait hal yang tidak dipahami</li>
                <li>Berkolaborasi dengan penyedia layanan kesehatan untuk mengidentifikasi alasan berubahnya tingkat tekanan darah</li>
                <li>Meminta orang lain membantu dalam mengontrol tekanan darah</li>
                <li>Nyaman ketika bertanya pada orang lain terkait teknik manajemen yang dilakukan untuk menurunkan tekanan darah</li>
              </ol>
            </dd>
            <dt>
              4. Pemantaun Tekanan Darah
            </dt>
            <dd>
              Dilakukan untuk mendeteksi tingkat tekanan darah sehingga klien dapat menyesuaikan tindakan yang akan dilakukan dalam self management. Perilaku pemantauan tekanan darah meliputi :
              <ol type="a">
                <li>Memeriksa tekanan darah saat merasa sakit</li>
                <li>Memeriksa tekanan darah ketika mengalami gejala tekanan darah rendah</li>
                <li>Memeriksa tekanan darah untuk membantu membuat keputusan dalam perawatan diri terkait dengan hipertensi.</li>
              </ol>
            </dd>
            <dt>
              5. Kepatuhan Terhadap Aturan yang Dianjurkan
            </dt>
            <dd>
              Mengacu pada kepatuhan pasien terhadap konsumsi obat antihipertensi dan kunjungan klinik. Komponen ini juga melibatkan konsumsi obat sesuai dosis yang telah ditentukan, waktu yang ditentukan untuk minum obat dan kunjungan klinik rutin setiap 1-3 bulan.
            </dd>
          </dl>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end of modal read -->


</body>

</html>