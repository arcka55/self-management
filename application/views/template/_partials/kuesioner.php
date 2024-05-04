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
            color: #1a73e8;
            border-radius: 0.5rem;
            background-color: inherit;
        }
        
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #344767;
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

        .list-kuesioner li {
          margin-bottom: 10px;
        }

        .option-list-kuesioner {
          list-style-type: none;
        }
        /* button edit hapus */
        td {
          white-space: normal !important; // To consider whitespace.
        }

        .table tbody tr:last-child td {
            border-width: 0 1px;
        }
        
        h2#swal2-title
        {
          font-family: 'Arial';
        }
        div#swal2-html-container{
          font-family: 'Arial';
        }
        
        a.text-footsweet{
          text-decoration: underline;
        }

        .read-text-p{
          line-height: 1.625;
          font-weight: 300;
        }

        .read-materi dt{
          margin: 10px 0;
        }

        .read-materi dd{
          margin-left: 17px;
        }

        .read-materi ol li {
          padding-left: 5px;
        }
        /* a.text-footsweet:link {
          color: blue;
        }
        a.text-footsweet:visited {
          color: purple;
        } */
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
                <h6 class="text-white text-capitalize ps-3">Kuesioner</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container table-responsive">
                <div class="d-flex align-items-start">
                  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-pretest_kontrol-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pretest_kontrol" type="button" role="tab" aria-controls="v-pills-pretest_kontrol" aria-selected="true">Pretest Kontrol</button>
                    <button class="nav-link" id="v-pills-pretest_intervensi-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pretest_intervensi" type="button" role="tab" aria-controls="v-pills-pretest_intervensi" aria-selected="false">Pretest Intervensi</button>
                    <button class="nav-link <?= isset($applied_kuesioner_responden[0]['pretest_kontrol']) ? ($applied_kuesioner_responden[0]['pretest_kontrol'] == 0 ? 'text-secondary' : '') : 'text-secondary' ?>" <?= isset($applied_kuesioner_responden[0]['pretest_kontrol']) ? ($applied_kuesioner_responden[0]['pretest_kontrol'] == 0 ? 'disabled' : '') : 'disabled' ?> id="v-pills-postest_kontrol-tab" data-bs-toggle="pill" data-bs-target="#v-pills-postest_kontrol" type="button" role="tab" aria-controls="v-pills-postest_kontrol" aria-selected="false">Postest Kontrol</button>
                    <button class="nav-link <?= isset($applied_kuesioner_responden[0]['pretest_intervensi']) ? ($applied_kuesioner_responden[0]['pretest_intervensi'] == 0 ? 'text-secondary' : '') : 'text-secondary' ?>" <?= isset($applied_kuesioner_responden[0]['pretest_intervensi']) ? ($applied_kuesioner_responden[0]['pretest_intervensi'] == 0 ? 'disabled' : '') : 'disabled' ?> id="v-pills-postest_intervensi-tab" data-bs-toggle="pill" data-bs-target="#v-pills-postest_intervensi" type="button" role="tab" aria-controls="v-pills-postest_intervensi" aria-selected="false">Postest Intervensi</button>
                  </div>
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-pretest_kontrol" role="tabpanel" aria-labelledby="v-pills-pretest_kontrol-tab">
                      <form role="form" action="<?= base_url('responden/kuesioner_pretest_kontrol/'.$kuesioner_responden_pretest_kontrol[0]['id_responden']) ?>" method="post" class="text-start">
                        <div class="container border border-1 mb-4">
                          <div class="card-header my-4 p-0">
                              <div class="row justify-content-center">
                                  <div class="col-md-8 d-flex align-items-center">
                                      <h6 class="mb-0 text-center">Self Management Hipertensi Pada Ibu Hamil Puskesmas Masamba Tahun 2023 (Pretest Kontrol)</h6>
                                  </div>
                                  <!-- <div class="col-md-4 text-end">
                                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#about_visimisiModal" onclick="edit('about_visimisi', '1')">
                                      <i class="fas fa-edit text-info text-md" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                  </a>
                                  </div> -->
                              </div>
                          </div>
                          <div class="container">
                            <?php if($this->session->flashdata('flash')) : ?>
                              <div class="flash-data" data-kuesioner="Pretest Kontrol" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
                            <?php endif; ?>
                            <div class="row mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                              <div class="col-md-7">
                                <h6 class="data_demografi1">A. Data Demografi</h6>
                                <ol id="list-kuesioner" class="list-kuesioner">
                                  <li>
                                    <div class="form-group mb-4">
                                      <div class="input-group input-group-static my-3">
                                        <label id="label_nama" for="nama1"><?= $kuesioner_pretest_kontrol[0]['pertanyaan'] ?></label>
                                        <input type="text" name="nama1" class="form-control" value="<?= $kuesioner_responden_pretest_kontrol[0]['qk1_d'] ?>" id="nama1" required>
                                      </div>
                                    <div class="help-block form-text mt-n2"></div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="form-group mb-4">
                                      <div class="input-group input-group-static my-3">
                                        <label id="usia1" for="usia1"><?= $kuesioner_pretest_kontrol[1]['pertanyaan'] ?></label>
                                        <input type="number" name="usia1" class="form-control" value="<?= $kuesioner_responden_pretest_kontrol[0]['qk2_d'] ?>" id="usia1" required>
                                      </div>
                                    <div class="help-block form-text mt-n2"></div>
                                    </div>
                                  </li>
                                  <!-- Pendidikan -->
                                  <li><?= $kuesioner_pretest_kontrol[2]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_kontrol[2]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="pendidikan1" id="pendidikan_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[2]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_kontrol[2]['jawaban'.$i] == $kuesioner_responden_pretest_kontrol[0]['qk3_d']) ? "checked" : "" ?> required>
                                        <label for="pendidikan_jawaban1<?= $i ?>"><?= $kuesioner_pretest_kontrol[2]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- pekerjaan -->
                                  <li><?= $kuesioner_pretest_kontrol[3]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_kontrol[3]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="pekerjaan1" id="pekerjaan_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[3]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_kontrol[3]['jawaban'.$i] == $kuesioner_responden_pretest_kontrol[0]['qk4_d']) ? "checked" : "" ?> required>
                                        <label for="pekerjaan_jawaban1<?= $i ?>"><?= $kuesioner_pretest_kontrol[3]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- riwayat merokok -->
                                  <li><?= $kuesioner_pretest_kontrol[4]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_kontrol[4]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="riwayat_merokok1" id="riwayat_merokok_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[4]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_kontrol[4]['jawaban'.$i] == $kuesioner_responden_pretest_kontrol[0]['qk5_d']) ? "checked" : "" ?> required>
                                        <label for="riwayat_merokok_jawaban1<?= $i ?>"><?= $kuesioner_pretest_kontrol[4]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- konsumsi alkohol -->
                                  <li><?= $kuesioner_pretest_kontrol[5]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_kontrol[5]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="konsumsi_alkohol1" id="konsumsi_alkohol_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[5]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_kontrol[5]['jawaban'.$i] == $kuesioner_responden_pretest_kontrol[0]['qk6_d']) ? "checked" : "" ?> required>
                                        <label for="konsumsi_alkohol_jawaban1<?= $i ?>"><?= $kuesioner_pretest_kontrol[5]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- penyakit -->
                                  <li><?= $kuesioner_pretest_kontrol[6]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_kontrol[6]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="penyakit1" id="penyakit_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[6]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_kontrol[6]['jawaban'.$i] == substr($kuesioner_responden_pretest_kontrol[0]['qk7_d'],0,2)) ? "checked" : ($kuesioner_pretest_kontrol[6]['jawaban'.$i] == $kuesioner_responden_pretest_kontrol[0]['qk7_d'] ? "checked" : "") ?> required>
                                        <label for="penyakit_jawaban1<?= $i ?>"><?= $kuesioner_pretest_kontrol[6]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          if($kuesioner_pretest_kontrol[6]['jawaban'.$i] == "Ya") :
                                        ?>
                                        <div class="div_desc_penyakit1 form-group mb-4" id="div_desc_penyakit1" style="display: <?= (substr($kuesioner_responden_pretest_kontrol[0]['qk7_d'],0,2) == "Ya") ? "block" : "none" ?>">
                                          <div class="input-group input-group-static my-3">
                                            <input type="text" name="desc_penyakit1" class="form-control" id="desc_penyakit1" placeholder="Masukkan deskripsi penyakit.." value="<?= (substr($kuesioner_responden_pretest_kontrol[0]['qk7_d'],0,2) == "Ya") ? substr($kuesioner_responden_pretest_kontrol[0]['qk7_d'],4) : "" ?>" <?= (substr($kuesioner_responden_pretest_kontrol[0]['qk7_d'],0,2) == "Ya") ? "required" : "" ?>>
                                          </div>
                                        <div class="help-block form-text"></div>
                                        </div>
                                        <?php
                                          endif;
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- Tekanan Darah -->
                                  <li><?= $kuesioner_pretest_kontrol[7]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <?php
                                      $exist = false;
                                      if(isset($kuesioner_responden_pretest_kontrol[0]['qk8_d']) && !empty($kuesioner_responden_pretest_kontrol[0]['qk8_d'])) :
                                        $exist = true;
                                        $tekanan_darah = explode(',', $kuesioner_responden_pretest_kontrol[0]['qk8_d']);
                                      endif;
                                      ?>
                                      <li>
                                        Sistolik <?= ($exist)  ? $tekanan_darah[0] : "?" ?> mmHg (diisi oleh peneliti)
                                      </li>
                                      <li>
                                        Diastolik <?= ($exist)  ? $tekanan_darah[1] : "?" ?> mmHg (diisi oleh peneliti)
                                      </li>
                                    </ul>
                                  </li>
                                </ol>
                              </div>
                              <div class="col-md-12 mt-5">
                                <h6 class="self_management1">B. Self Management</h6>
                                <p>
                                  Kuesioner ini bertujuan untuk menilai seberapa sering anda melakukan aktifitas untuk mengontrol hipertensi dalam beberapa bulan terakhir. Tidak ada jawaban benar atau salah. Karenanya, jawablah secara jujur pada masing-masing pernyataan untuk menggambarkan perilaku anda yang sebenarnya dengan memberikan tanda silang (√) pada kolom yang sesuai. Gunakan 4 pilihan jawaban sebagai berikut :
                                  <br> 
                                  1 = Tidak pernah
                                  <br>
                                  2 = Jarang
                                  <br>
                                  3 = Kadang-kadang
                                  <br>
                                  4 = Selalu
                                </p>
                                <!-- integrasi diri -->
                                <h6 class="mt-4">Integrasi Diri</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $temp = 0;
                                      $temp_qk = 9;
                                      for ($i=0; $i < 10; $i++) :
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_kontrol[8+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="integrasi_diri_error1<?= $i+1 ?>" id="integrasi_diri_error1<?= $i+1 ?>" >
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri1<?= ++$temp ?>" name="integrasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri1<?= ++$temp ?>" name="integrasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri1<?= ++$temp ?>" name="integrasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri1<?= ++$temp ?>" name="integrasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- regulasi diri -->
                                <h6 class="mt-4">Regulasi Diri</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_kontrol[18+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="regulasi_diri_error1<?= $i+1 ?>" id="regulasi_diri_error1<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri1<?= ++$temp ?>" name="regulasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri1<?= ++$temp ?>" name="regulasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri1<?= ++$temp ?>" name="regulasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri1<?= ++$temp ?>" name="regulasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Interaksi dengan tenaga kesehatan dan lainnya -->
                                <h6 class="mt-4">Interaksi dengan tenaga kesehatan dan lainnya</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_kontrol[28+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="idtk_error1<?= $i+1 ?>" id="itdk_error1<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk1<?= ++$temp ?>" name="idtk1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk1<?= ++$temp ?>" name="idtk1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk1<?= ++$temp ?>" name="idtk1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk1<?= ++$temp ?>" name="idtk1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                    $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Pemantauan tekanana darah -->
                                <h6 class="mt-4">Pemantauan Tekanana Darah</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_kontrol[38+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="ptd_error1<?= $i+1 ?>" id="ptd_error1<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd1<?= ++$temp ?>" name="ptd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd1<?= ++$temp ?>" name="ptd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd1<?= ++$temp ?>" name="ptd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd1<?= ++$temp ?>" name="ptd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Kepatuhan terhadap aturan yang dianjurkan -->
                                <h6 class="mt-4">Kepatuhan terhadap aturan yang dianjurkan</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_kontrol[48+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="ktayd_error1<?= $i+1 ?>" id="ktayd_error1<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd1<?= ++$temp ?>" name="ktayd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd1<?= ++$temp ?>" name="ktayd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd1<?= ++$temp ?>" name="ktayd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd1<?= ++$temp ?>" name="ktayd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn bg-gradient-info" id="btnSubmit1">Submit</button>
                        </div>
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                      </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-pretest_intervensi" role="tabpanel" aria-labelledby="v-pills-pretest_intervensi-tab">
                      <form role="form" action="<?= base_url('responden/kuesioner_pretest_intervensi/'.$kuesioner_responden_pretest_intervensi[0]['id_responden']) ?>" method="post" class="text-start">
                        <div class="container border border-1 mb-4">
                          <div class="card-header my-4 p-0">
                              <div class="row justify-content-center">
                                  <div class="col-md-8 d-flex align-items-center">
                                      <h6 class="mb-0 text-center">Self Management Hipertensi Pada Ibu Hamil Puskesmas Masamba Tahun 2023 (Pretest Intervensi)</h6>
                                  </div>
                                  <!-- <div class="col-md-4 text-end">
                                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#about_visimisiModal" onclick="edit('about_visimisi', '1')">
                                      <i class="fas fa-edit text-info text-md" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                  </a>
                                  </div> -->
                              </div>
                          </div>
                          <div class="container">
                            <?php if($this->session->flashdata('flash2')) : ?>
                              <div class="flash-data" data-kuesioner="Pretest Intervensi" data-flashdata="<?= $this->session->flashdata('flash2') ?>"></div>
                            <?php endif; ?>
                            <div class="row mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                              <div class="col-md-7">
                                <h6 class="data_demografi1">A. Data Demografi</h6>
                                <ol id="list-kuesioner2" class="list-kuesioner">
                                  <li>
                                    <div class="form-group mb-4">
                                      <div class="input-group input-group-static my-3">
                                        <label id="label_nama2" for="nama2"><?= $kuesioner_pretest_intervensi[0]['pertanyaan'] ?></label>
                                        <input type="text" name="nama2" class="form-control" value="<?= $kuesioner_responden_pretest_intervensi[0]['qk1_d'] ?>" id="nama2" required>
                                      </div>
                                    <div class="help-block form-text mt-n2"></div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="form-group mb-4">
                                      <div class="input-group input-group-static my-3">
                                        <label id="label_usia2" for="usia2"><?= $kuesioner_pretest_intervensi[1]['pertanyaan'] ?></label>
                                        <input type="number" name="usia2" class="form-control" value="<?= $kuesioner_responden_pretest_intervensi[0]['qk2_d'] ?>" id="usia2" required>
                                      </div>
                                    <div class="help-block form-text mt-n2"></div>
                                    </div>
                                  </li>
                                  <!-- Pendidikan -->
                                  <li><?= $kuesioner_pretest_intervensi[2]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_intervensi[2]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="pendidikan2" id="pendidikan_jawaban2<?= $i ?>" value="<?= $kuesioner_pretest_intervensi[2]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_intervensi[2]['jawaban'.$i] == $kuesioner_responden_pretest_intervensi[0]['qk3_d']) ? "checked" : "" ?> required>
                                        <label for="pendidikan_jawaban2<?= $i ?>"><?= $kuesioner_pretest_intervensi[2]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- pekerjaan -->
                                  <li><?= $kuesioner_pretest_intervensi[3]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_intervensi[3]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="pekerjaan2" id="pekerjaan_jawaban2<?= $i ?>" value="<?= $kuesioner_pretest_intervensi[3]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_intervensi[3]['jawaban'.$i] == $kuesioner_responden_pretest_intervensi[0]['qk4_d']) ? "checked" : "" ?> required>
                                        <label for="pekerjaan_jawaban2<?= $i ?>"><?= $kuesioner_pretest_intervensi[3]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- riwayat merokok -->
                                  <li><?= $kuesioner_pretest_intervensi[4]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_intervensi[4]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="riwayat_merokok2" id="riwayat_merokok_jawaban2<?= $i ?>" value="<?= $kuesioner_pretest_intervensi[4]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_intervensi[4]['jawaban'.$i] == $kuesioner_responden_pretest_intervensi[0]['qk5_d']) ? "checked" : "" ?> required>
                                        <label for="riwayat_merokok_jawaban2<?= $i ?>"><?= $kuesioner_pretest_intervensi[4]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- konsumsi alkohol -->
                                  <li><?= $kuesioner_pretest_intervensi[5]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_intervensi[5]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="konsumsi_alkohol2" id="konsumsi_alkohol_jawaban2<?= $i ?>" value="<?= $kuesioner_pretest_intervensi[5]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_intervensi[5]['jawaban'.$i] == $kuesioner_responden_pretest_intervensi[0]['qk6_d']) ? "checked" : "" ?> required>
                                        <label for="konsumsi_alkohol_jawaban2<?= $i ?>"><?= $kuesioner_pretest_intervensi[5]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- penyakit -->
                                  <li><?= $kuesioner_pretest_intervensi[6]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_pretest_intervensi[6]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="penyakit1" id="penyakit_jawaban2<?= $i ?>" value="<?= $kuesioner_pretest_intervensi[6]['jawaban'.$i] ?>" <?= ($kuesioner_pretest_intervensi[6]['jawaban'.$i] == substr($kuesioner_responden_pretest_intervensi[0]['qk7_d'],0,2)) ? "checked" : ($kuesioner_pretest_intervensi[6]['jawaban'.$i] == $kuesioner_responden_pretest_intervensi[0]['qk7_d'] ? "checked" : "") ?> required>
                                        <label for="penyakit_jawaban2<?= $i ?>"><?= $kuesioner_pretest_intervensi[6]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          if($kuesioner_pretest_intervensi[6]['jawaban'.$i] == "Ya") :
                                        ?>
                                        <div class="div_desc_penyakit1 form-group mb-4" id="div_desc_penyakit2" style="display: <?= (substr($kuesioner_responden_pretest_intervensi[0]['qk7_d'],0,2) == "Ya") ? "block" : "none" ?>">
                                          <div class="input-group input-group-static my-3">
                                            <input type="text" name="desc_penyakit1" class="form-control" id="desc_penyakit2" placeholder="Masukkan deskripsi penyakit.." value="<?= (substr($kuesioner_responden_pretest_intervensi[0]['qk7_d'],0,2) == "Ya") ? substr($kuesioner_responden_pretest_intervensi[0]['qk7_d'],4) : "" ?>" <?= (substr($kuesioner_responden_pretest_intervensi[0]['qk7_d'],0,2) == "Ya") ? "required" : "" ?>>
                                          </div>
                                        <div class="help-block form-text"></div>
                                        </div>
                                        <?php
                                          endif;
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- Tekanan Darah -->
                                  <li><?= $kuesioner_pretest_intervensi[7]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <?php
                                      $exist = false;
                                      if(isset($kuesioner_responden_pretest_intervensi[0]['qk8_d']) && !empty($kuesioner_responden_pretest_intervensi[0]['qk8_d'])) :
                                        $exist = true;
                                        $tekanan_darah = explode(',', $kuesioner_responden_pretest_intervensi[0]['qk8_d']);
                                      endif;
                                      ?>
                                      <li>
                                        Sistolik <?= ($exist)  ? $tekanan_darah[0] : "?" ?> mmHg (diisi oleh peneliti)
                                      </li>
                                      <li>
                                        Diastolik <?= ($exist)  ? $tekanan_darah[1] : "?" ?> mmHg (diisi oleh peneliti)
                                      </li>
                                    </ul>
                                  </li>
                                </ol>
                              </div>
                              <!-- b. self management -->
                              <div class="col-md-12 mt-5">
                                <h6 class="self_management1">B. Self Management</h6>
                                <p>
                                  Kuesioner ini bertujuan untuk menilai seberapa sering anda melakukan aktifitas untuk mengontrol hipertensi dalam beberapa bulan terakhir. Tidak ada jawaban benar atau salah. Karenanya, jawablah secara jujur pada masing-masing pernyataan untuk menggambarkan perilaku anda yang sebenarnya dengan memberikan tanda silang (√) pada kolom yang sesuai. Gunakan 4 pilihan jawaban sebagai berikut :
                                  <br> 
                                  1 = Tidak pernah
                                  <br>
                                  2 = Jarang
                                  <br>
                                  3 = Kadang-kadang
                                  <br>
                                  4 = Selalu
                                </p>
                                <!-- integrasi diri -->
                                <h6 class="mt-4">Integrasi Diri</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $temp = 0;
                                      $temp_qk = 9;
                                      for ($i=0; $i < 10; $i++) :
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_intervensi[8+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="integrasi_diri_error2<?= $i+1 ?>" id="integrasi_diri_error2<?= $i+1 ?>" >
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri2<?= ++$temp ?>" name="integrasi_diri2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri2<?= ++$temp ?>" name="integrasi_diri2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri2<?= ++$temp ?>" name="integrasi_diri2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri2<?= ++$temp ?>" name="integrasi_diri2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- regulasi diri -->
                                <h6 class="mt-4">Regulasi Diri</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_intervensi[18+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="regulasi_diri_error2<?= $i+1 ?>" id="regulasi_diri_error2<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri2<?= ++$temp ?>" name="regulasi_diri2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri2<?= ++$temp ?>" name="regulasi_diri2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri2<?= ++$temp ?>" name="regulasi_diri2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri2<?= ++$temp ?>" name="regulasi_diri2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Interaksi dengan tenaga kesehatan dan lainnya -->
                                <h6 class="mt-4">Interaksi dengan tenaga kesehatan dan lainnya</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_intervensi[28+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="idtk_error2<?= $i+1 ?>" id="itdk_error2<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk2<?= ++$temp ?>" name="idtk2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk2<?= ++$temp ?>" name="idtk2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk2<?= ++$temp ?>" name="idtk2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk2<?= ++$temp ?>" name="idtk2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                    $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Pemantauan tekanana darah -->
                                <h6 class="mt-4">Pemantauan Tekanana Darah</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_intervensi[38+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="ptd_error2<?= $i+1 ?>" id="ptd_error2<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd2<?= ++$temp ?>" name="ptd2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd2<?= ++$temp ?>" name="ptd2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd2<?= ++$temp ?>" name="ptd2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd2<?= ++$temp ?>" name="ptd2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Kepatuhan terhadap aturan yang dianjurkan -->
                                <h6 class="mt-4">Kepatuhan terhadap aturan yang dianjurkan</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_pretest_intervensi[48+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="ktayd_error2<?= $i+1 ?>" id="ktayd_error2<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd2<?= ++$temp ?>" name="ktayd2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd2<?= ++$temp ?>" name="ktayd2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd2<?= ++$temp ?>" name="ktayd2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd2<?= ++$temp ?>" name="ktayd2<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_pretest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn bg-gradient-info" id="btnSubmit2">Submit</button>
                        </div>
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                      </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-postest_kontrol" role="tabpanel" aria-labelledby="v-pills-postest_kontrol-tab">
                      <form role="form" action="<?= base_url('responden/kuesioner_postest_kontrol/'.$kuesioner_responden_postest_kontrol[0]['id_responden']) ?>" method="post" class="text-start">
                        <div class="container border border-1 mb-4">
                          <div class="card-header my-4 p-0">
                              <div class="row justify-content-center">
                                  <div class="col-md-8 d-flex align-items-center">
                                      <h6 class="mb-0 text-center">Self Management Hipertensi Pada Ibu Hamil Puskesmas Masamba Tahun 2023 (Postest Kontrol)</h6>
                                  </div>
                                  <!-- <div class="col-md-4 text-end">
                                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#about_visimisiModal" onclick="edit('about_visimisi', '1')">
                                      <i class="fas fa-edit text-info text-md" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                  </a>
                                  </div> -->
                              </div>
                          </div>
                          <div class="container">
                            <?php if($this->session->flashdata('flash3')) : ?>
                              <div class="flash-data" data-kuesioner="Postest Kontrol" data-flashdata="<?= $this->session->flashdata('flash3') ?>"></div>
                            <?php endif; ?>
                            <div class="row mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                              <div class="col-md-7">
                                <h6 class="data_demografi1">A. Data Demografi</h6>
                                <ol id="list-kuesioner3" class="list-kuesioner">
                                  <li>
                                    <div class="form-group mb-4">
                                      <div class="input-group input-group-static my-3">
                                        <label id="label_nama3" for="nama3"><?= $kuesioner_postest_kontrol[0]['pertanyaan'] ?></label>
                                        <input type="text" name="nama3" class="form-control" value="<?= $kuesioner_responden_postest_kontrol[0]['qk1_d'] ?>" id="nama3" required>
                                      </div>
                                    <div class="help-block form-text mt-n2"></div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="form-group mb-4">
                                      <div class="input-group input-group-static my-3">
                                        <label id="label_usia3" for="usia3"><?= $kuesioner_postest_kontrol[1]['pertanyaan'] ?></label>
                                        <input type="number" name="usia3" class="form-control" value="<?= $kuesioner_responden_postest_kontrol[0]['qk2_d'] ?>" id="usia3" required>
                                      </div>
                                    <div class="help-block form-text mt-n2"></div>
                                    </div>
                                  </li>
                                  <!-- Pendidikan -->
                                  <li><?= $kuesioner_postest_kontrol[2]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_kontrol[2]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="pendidikan3" id="pendidikan_jawaban3<?= $i ?>" value="<?= $kuesioner_postest_kontrol[2]['jawaban'.$i] ?>" <?= ($kuesioner_postest_kontrol[2]['jawaban'.$i] == $kuesioner_responden_postest_kontrol[0]['qk3_d']) ? "checked" : "" ?> required>
                                        <label for="pendidikan_jawaban3<?= $i ?>"><?= $kuesioner_postest_kontrol[2]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- pekerjaan -->
                                  <li><?= $kuesioner_postest_kontrol[3]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_kontrol[3]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="pekerjaan3" id="pekerjaan_jawaban3<?= $i ?>" value="<?= $kuesioner_postest_kontrol[3]['jawaban'.$i] ?>" <?= ($kuesioner_postest_kontrol[3]['jawaban'.$i] == $kuesioner_responden_postest_kontrol[0]['qk4_d']) ? "checked" : "" ?> required>
                                        <label for="pekerjaan_jawaban3<?= $i ?>"><?= $kuesioner_postest_kontrol[3]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- riwayat merokok -->
                                  <li><?= $kuesioner_postest_kontrol[4]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_kontrol[4]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="riwayat_merokok3" id="riwayat_merokok_jawaban3<?= $i ?>" value="<?= $kuesioner_postest_kontrol[4]['jawaban'.$i] ?>" <?= ($kuesioner_postest_kontrol[4]['jawaban'.$i] == $kuesioner_responden_postest_kontrol[0]['qk5_d']) ? "checked" : "" ?> required>
                                        <label for="riwayat_merokok_jawaban3<?= $i ?>"><?= $kuesioner_postest_kontrol[4]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- konsumsi alkohol -->
                                  <li><?= $kuesioner_postest_kontrol[5]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_kontrol[5]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="konsumsi_alkohol3" id="konsumsi_alkohol_jawaban3<?= $i ?>" value="<?= $kuesioner_postest_kontrol[5]['jawaban'.$i] ?>" <?= ($kuesioner_postest_kontrol[5]['jawaban'.$i] == $kuesioner_responden_postest_kontrol[0]['qk6_d']) ? "checked" : "" ?> required>
                                        <label for="konsumsi_alkohol_jawaban3<?= $i ?>"><?= $kuesioner_postest_kontrol[5]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- penyakit -->
                                  <li><?= $kuesioner_postest_kontrol[6]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_kontrol[6]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="penyakit1" id="penyakit_jawaban3<?= $i ?>" value="<?= $kuesioner_postest_kontrol[6]['jawaban'.$i] ?>" <?= ($kuesioner_postest_kontrol[6]['jawaban'.$i] == substr($kuesioner_responden_postest_kontrol[0]['qk7_d'],0,2)) ? "checked" : ($kuesioner_postest_kontrol[6]['jawaban'.$i] == $kuesioner_responden_postest_kontrol[0]['qk7_d'] ? "checked" : "") ?> required>
                                        <label for="penyakit_jawaban3<?= $i ?>"><?= $kuesioner_postest_kontrol[6]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          if($kuesioner_postest_kontrol[6]['jawaban'.$i] == "Ya") :
                                        ?>
                                        <div class="div_desc_penyakit1 form-group mb-4" id="div_desc_penyakit3" style="display: <?= (substr($kuesioner_responden_postest_kontrol[0]['qk7_d'],0,2) == "Ya") ? "block" : "none" ?>">
                                          <div class="input-group input-group-static my-3">
                                            <input type="text" name="desc_penyakit1" class="form-control" id="desc_penyakit3" placeholder="Masukkan deskripsi penyakit.." value="<?= (substr($kuesioner_responden_postest_kontrol[0]['qk7_d'],0,2) == "Ya") ? substr($kuesioner_responden_postest_kontrol[0]['qk7_d'],4) : "" ?>" <?= (substr($kuesioner_responden_postest_kontrol[0]['qk7_d'],0,2) == "Ya") ? "required" : "" ?>>
                                          </div>
                                        <div class="help-block form-text"></div>
                                        </div>
                                        <?php
                                          endif;
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- Tekanan Darah -->
                                  <li><?= $kuesioner_postest_kontrol[7]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <?php
                                      $exist = false;
                                      if(isset($kuesioner_responden_postest_kontrol[0]['qk8_d']) && !empty($kuesioner_responden_postest_kontrol[0]['qk8_d'])) :
                                        $exist = true;
                                        $tekanan_darah = explode(',', $kuesioner_responden_postest_kontrol[0]['qk8_d']);
                                      endif;
                                      ?>
                                      <li>
                                        Sistolik <?= ($exist)  ? $tekanan_darah[0] : "?" ?> mmHg (diisi oleh peneliti)
                                      </li>
                                      <li>
                                        Diastolik <?= ($exist)  ? $tekanan_darah[1] : "?" ?> mmHg (diisi oleh peneliti)
                                      </li>
                                    </ul>
                                  </li>
                                </ol>
                              </div>
                              <!-- b. self management -->
                              <div class="col-md-12 mt-5">
                                <h6 class="self_management1">B. Self Management</h6>
                                <p>
                                  Kuesioner ini bertujuan untuk menilai seberapa sering anda melakukan aktifitas untuk mengontrol hipertensi dalam beberapa bulan terakhir. Tidak ada jawaban benar atau salah. Karenanya, jawablah secara jujur pada masing-masing pernyataan untuk menggambarkan perilaku anda yang sebenarnya dengan memberikan tanda silang (√) pada kolom yang sesuai. Gunakan 4 pilihan jawaban sebagai berikut :
                                  <br> 
                                  1 = Tidak pernah
                                  <br>
                                  2 = Jarang
                                  <br>
                                  3 = Kadang-kadang
                                  <br>
                                  4 = Selalu
                                </p>
                                <!-- integrasi diri -->
                                <h6 class="mt-4">Integrasi Diri</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $temp = 0;
                                      $temp_qk = 9;
                                      for ($i=0; $i < 10; $i++) :
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_kontrol[8+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="integrasi_diri_error3<?= $i+1 ?>" id="integrasi_diri_error3<?= $i+1 ?>" >
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri3<?= ++$temp ?>" name="integrasi_diri3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri3<?= ++$temp ?>" name="integrasi_diri3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri3<?= ++$temp ?>" name="integrasi_diri3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri3<?= ++$temp ?>" name="integrasi_diri3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- regulasi diri -->
                                <h6 class="mt-4">Regulasi Diri</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_kontrol[18+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="regulasi_diri_error3<?= $i+1 ?>" id="regulasi_diri_error3<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri3<?= ++$temp ?>" name="regulasi_diri3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri3<?= ++$temp ?>" name="regulasi_diri3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri3<?= ++$temp ?>" name="regulasi_diri3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri3<?= ++$temp ?>" name="regulasi_diri3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Interaksi dengan tenaga kesehatan dan lainnya -->
                                <h6 class="mt-4">Interaksi dengan tenaga kesehatan dan lainnya</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_kontrol[28+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="idtk_error3<?= $i+1 ?>" id="itdk_error3<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk3<?= ++$temp ?>" name="idtk3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk3<?= ++$temp ?>" name="idtk3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk3<?= ++$temp ?>" name="idtk3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk3<?= ++$temp ?>" name="idtk3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                    $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Pemantauan tekanana darah -->
                                <h6 class="mt-4">Pemantauan Tekanana Darah</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_kontrol[38+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="ptd_error3<?= $i+1 ?>" id="ptd_error3<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd3<?= ++$temp ?>" name="ptd3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd3<?= ++$temp ?>" name="ptd3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd3<?= ++$temp ?>" name="ptd3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd3<?= ++$temp ?>" name="ptd3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Kepatuhan terhadap aturan yang dianjurkan -->
                                <h6 class="mt-4">Kepatuhan terhadap aturan yang dianjurkan</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_kontrol[48+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="ktayd_error3<?= $i+1 ?>" id="ktayd_error3<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd3<?= ++$temp ?>" name="ktayd3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd3<?= ++$temp ?>" name="ktayd3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd3<?= ++$temp ?>" name="ktayd3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd3<?= ++$temp ?>" name="ktayd3<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_kontrol[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn bg-gradient-info" id="btnSubmit3">Submit</button>
                        </div>
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                      </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-postest_intervensi" role="tabpanel" aria-labelledby="v-pills-postest_intervensi-tab">
                      <form role="form" action="<?= base_url('responden/kuesioner_postest_intervensi/'.$kuesioner_responden_postest_intervensi[0]['id_responden']) ?>" method="post" class="text-start">
                        <div class="container border border-1 mb-4">
                          <div class="card-header my-4 p-0">
                              <div class="row justify-content-center">
                                  <div class="col-md-8 d-flex align-items-center">
                                      <h6 class="mb-0 text-center">Self Management Hipertensi Pada Ibu Hamil Puskesmas Masamba Tahun 2023 (Postest Intervensi)</h6>
                                  </div>
                                  <!-- <div class="col-md-4 text-end">
                                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#about_visimisiModal" onclick="edit('about_visimisi', '1')">
                                      <i class="fas fa-edit text-info text-md" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                  </a>
                                  </div> -->
                              </div>
                          </div>
                          <div class="container">
                            <?php if($this->session->flashdata('flash4')) : ?>
                              <div class="flash-data" data-kuesioner="Postest Intervensi" data-flashdata="<?= $this->session->flashdata('flash4') ?>"></div>
                            <?php endif; ?>
                            <div class="row mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                              <div class="col-md-7">
                                <h6 class="data_demografi1">A. Data Demografi</h6>
                                <ol id="list-kuesioner4" class="list-kuesioner">
                                  <li>
                                    <div class="form-group mb-4">
                                      <div class="input-group input-group-static my-3">
                                        <label id="label_nama4" for="nama4"><?= $kuesioner_postest_intervensi[0]['pertanyaan'] ?></label>
                                        <input type="text" name="nama4" class="form-control" value="<?= $kuesioner_responden_postest_intervensi[0]['qk1_d'] ?>" id="nama4" required>
                                      </div>
                                    <div class="help-block form-text mt-n2"></div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="form-group mb-4">
                                      <div class="input-group input-group-static my-3">
                                        <label id="label_usia4" for="usia4"><?= $kuesioner_postest_intervensi[1]['pertanyaan'] ?></label>
                                        <input type="number" name="usia4" class="form-control" value="<?= $kuesioner_responden_postest_intervensi[0]['qk2_d'] ?>" id="usia4" required>
                                      </div>
                                    <div class="help-block form-text mt-n2"></div>
                                    </div>
                                  </li>
                                  <!-- Pendidikan -->
                                  <li><?= $kuesioner_postest_intervensi[2]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_intervensi[2]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="pendidikan4" id="pendidikan_jawaban4<?= $i ?>" value="<?= $kuesioner_postest_intervensi[2]['jawaban'.$i] ?>" <?= ($kuesioner_postest_intervensi[2]['jawaban'.$i] == $kuesioner_responden_postest_intervensi[0]['qk3_d']) ? "checked" : "" ?> required>
                                        <label for="pendidikan_jawaban4<?= $i ?>"><?= $kuesioner_postest_intervensi[2]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- pekerjaan -->
                                  <li><?= $kuesioner_postest_intervensi[3]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_intervensi[3]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="pekerjaan4" id="pekerjaan_jawaban4<?= $i ?>" value="<?= $kuesioner_postest_intervensi[3]['jawaban'.$i] ?>" <?= ($kuesioner_postest_intervensi[3]['jawaban'.$i] == $kuesioner_responden_postest_intervensi[0]['qk4_d']) ? "checked" : "" ?> required>
                                        <label for="pekerjaan_jawaban4<?= $i ?>"><?= $kuesioner_postest_intervensi[3]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- riwayat merokok -->
                                  <li><?= $kuesioner_postest_intervensi[4]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_intervensi[4]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="riwayat_merokok4" id="riwayat_merokok_jawaban4<?= $i ?>" value="<?= $kuesioner_postest_intervensi[4]['jawaban'.$i] ?>" <?= ($kuesioner_postest_intervensi[4]['jawaban'.$i] == $kuesioner_responden_postest_intervensi[0]['qk5_d']) ? "checked" : "" ?> required>
                                        <label for="riwayat_merokok_jawaban4<?= $i ?>"><?= $kuesioner_postest_intervensi[4]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- konsumsi alkohol -->
                                  <li><?= $kuesioner_postest_intervensi[5]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_intervensi[5]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="konsumsi_alkohol4" id="konsumsi_alkohol_jawaban4<?= $i ?>" value="<?= $kuesioner_postest_intervensi[5]['jawaban'.$i] ?>" <?= ($kuesioner_postest_intervensi[5]['jawaban'.$i] == $kuesioner_responden_postest_intervensi[0]['qk6_d']) ? "checked" : "" ?> required>
                                        <label for="konsumsi_alkohol_jawaban4<?= $i ?>"><?= $kuesioner_postest_intervensi[5]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- penyakit -->
                                  <li><?= $kuesioner_postest_intervensi[6]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <li>
                                        <?php 
                                          for ($i=1; $i <= 5; $i++) :
                                            if (empty($kuesioner_postest_intervensi[6]['jawaban'.$i])) {
                                              break;
                                            }
                                        ?>
                                        <input type="radio" name="penyakit1" id="penyakit_jawaban4<?= $i ?>" value="<?= $kuesioner_postest_intervensi[6]['jawaban'.$i] ?>" <?= ($kuesioner_postest_intervensi[6]['jawaban'.$i] == substr($kuesioner_responden_postest_intervensi[0]['qk7_d'],0,2)) ? "checked" : ($kuesioner_postest_intervensi[6]['jawaban'.$i] == $kuesioner_responden_postest_intervensi[0]['qk7_d'] ? "checked" : "") ?> required>
                                        <label for="penyakit_jawaban4<?= $i ?>"><?= $kuesioner_postest_intervensi[6]['jawaban'.$i] ?></label>
                                        <br>
                                        <?php 
                                          if($kuesioner_postest_intervensi[6]['jawaban'.$i] == "Ya") :
                                        ?>
                                        <div class="div_desc_penyakit1 form-group mb-4" id="div_desc_penyakit4" style="display: <?= (substr($kuesioner_responden_postest_intervensi[0]['qk7_d'],0,2) == "Ya") ? "block" : "none" ?>">
                                          <div class="input-group input-group-static my-3">
                                            <input type="text" name="desc_penyakit1" class="form-control" id="desc_penyakit4" placeholder="Masukkan deskripsi penyakit.." value="<?= (substr($kuesioner_responden_postest_intervensi[0]['qk7_d'],0,2) == "Ya") ? substr($kuesioner_responden_postest_intervensi[0]['qk7_d'],4) : "" ?>" <?= (substr($kuesioner_responden_postest_intervensi[0]['qk7_d'],0,2) == "Ya") ? "required" : "" ?>>
                                          </div>
                                        <div class="help-block form-text"></div>
                                        </div>
                                        <?php
                                          endif;
                                          endfor;
                                        ?>
                                      </li>
                                    </ul>
                                    <div class="help-block form-text"></div>
                                  </li>
                                  <!-- Tekanan Darah -->
                                  <li><?= $kuesioner_postest_intervensi[7]['pertanyaan'] ?>
                                    <ul class="option-list-kuesioner">
                                      <?php
                                      $exist = false;
                                      if(isset($kuesioner_responden_postest_intervensi[0]['qk8_d']) && !empty($kuesioner_responden_postest_intervensi[0]['qk8_d'])) :
                                        $exist = true;
                                        $tekanan_darah = explode(',', $kuesioner_responden_postest_intervensi[0]['qk8_d']);
                                      endif;
                                      ?>
                                      <li>
                                        Sistolik <?= ($exist)  ? $tekanan_darah[0] : "?" ?> mmHg (diisi oleh peneliti)
                                      </li>
                                      <li>
                                        Diastolik <?= ($exist)  ? $tekanan_darah[1] : "?" ?> mmHg (diisi oleh peneliti)
                                      </li>
                                    </ul>
                                  </li>
                                </ol>
                              </div>
                              <!-- b. self management -->
                              <div class="col-md-12 mt-5">
                                <h6 class="self_management1">B. Self Management</h6>
                                <p>
                                  Kuesioner ini bertujuan untuk menilai seberapa sering anda melakukan aktifitas untuk mengontrol hipertensi dalam beberapa bulan terakhir. Tidak ada jawaban benar atau salah. Karenanya, jawablah secara jujur pada masing-masing pernyataan untuk menggambarkan perilaku anda yang sebenarnya dengan memberikan tanda silang (√) pada kolom yang sesuai. Gunakan 4 pilihan jawaban sebagai berikut :
                                  <br> 
                                  1 = Tidak pernah
                                  <br>
                                  2 = Jarang
                                  <br>
                                  3 = Kadang-kadang
                                  <br>
                                  4 = Selalu
                                </p>
                                <!-- integrasi diri -->
                                <h6 class="mt-4">Integrasi Diri</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $temp = 0;
                                      $temp_qk = 9;
                                      for ($i=0; $i < 10; $i++) :
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_intervensi[8+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="integrasi_diri_error4<?= $i+1 ?>" id="integrasi_diri_error4<?= $i+1 ?>" >
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri4<?= ++$temp ?>" name="integrasi_diri4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri4<?= ++$temp ?>" name="integrasi_diri4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri4<?= ++$temp ?>" name="integrasi_diri4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="integrasi_diri4<?= ++$temp ?>" name="integrasi_diri4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- regulasi diri -->
                                <h6 class="mt-4">Regulasi Diri</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_intervensi[18+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="regulasi_diri_error4<?= $i+1 ?>" id="regulasi_diri_error4<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri4<?= ++$temp ?>" name="regulasi_diri4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri4<?= ++$temp ?>" name="regulasi_diri4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri4<?= ++$temp ?>" name="regulasi_diri4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="regulasi_diri4<?= ++$temp ?>" name="regulasi_diri4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Interaksi dengan tenaga kesehatan dan lainnya -->
                                <h6 class="mt-4">Interaksi dengan tenaga kesehatan dan lainnya</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_intervensi[28+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="idtk_error4<?= $i+1 ?>" id="itdk_error4<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk4<?= ++$temp ?>" name="idtk4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk4<?= ++$temp ?>" name="idtk4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk4<?= ++$temp ?>" name="idtk4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="idtk4<?= ++$temp ?>" name="idtk4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                    $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Pemantauan tekanana darah -->
                                <h6 class="mt-4">Pemantauan Tekanana Darah</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_intervensi[38+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="ptd_error4<?= $i+1 ?>" id="ptd_error4<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd4<?= ++$temp ?>" name="ptd4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd4<?= ++$temp ?>" name="ptd4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd4<?= ++$temp ?>" name="ptd4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ptd4<?= ++$temp ?>" name="ptd4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                                <!-- Kepatuhan terhadap aturan yang dianjurkan -->
                                <h6 class="mt-4">Kepatuhan terhadap aturan yang dianjurkan</h6>
                                <table class="table table-striped table-bordered text-center">
                                  <thead>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>TP</th>
                                    <th>JR</th>
                                    <th>KK</th>
                                    <th>SS</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                      for ($i=0; $i < 10; $i++) : 
                                    ?>
                                    <tr>
                                      <td><?= $i+1 ?></td>
                                      <td class="text-start" style="word-wrap: break-word;min-width: 400px;max-width: 400px;">
                                        <?= $kuesioner_postest_intervensi[48+$i]['pertanyaan'] ?>
                                        <div class="form-group" style="display: none">
                                          <div>
                                            <input type="hidden" name="ktayd_error4<?= $i+1 ?>" id="ktayd_error4<?= $i+1 ?>">
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd4<?= ++$temp ?>" name="ktayd4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                        </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd4<?= ++$temp ?>" name="ktayd4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd4<?= ++$temp ?>" name="ktayd4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                      <td class="align-middle">
                                        <div class="form-group">
                                          <div>
                                            <input type="radio" id="ktayd4<?= ++$temp ?>" name="ktayd4<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($kuesioner_responden_postest_intervensi[0]['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
                                          </div>
                                          <div class="help-block form-text mt-n2"></div>
                                        </div>
                                      </td>
                                    </tr>
                                    <?php
                                      $temp_qk++; 
                                      endfor;
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn bg-gradient-info" id="btnSubmit4">Submit</button>
                        </div>
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                      </form>
                    </div>
                  </div>
                </div>
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
    <!-- modal add -->
    <div class="modal fade top-2" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Tambah User <span class="fa fa-user-plus"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_add" id="form_add" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                        <div class="input-group input-group-outline my-3">
                          <label id="label_username" for="username" class="form-label">Username</label>
                          <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                      <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <div class="input-group input-group-outline my-3">
                          <label id="label_email" for="email" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                      <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <div class="input-group input-group-outline my-3">
                          <label id="label_password" for="password" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                      <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mb-4 col-lg-4">
                        <div class="input-group input-group-outline form-select mb-4">
                          <select class="form-control me-2" name="role_id" id="role_id">
                          <option value="" selected disabled>Pilih Role..</option>
                            <option value="1">Admin</option>
                            <option value="2">Coach</option>
                            <option value="3">Startup</option>
                          </select>
                        </div>
                        <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <div class="input-group input-group-outline my-3" id="fieldNama" style="display: none;">
                          <label id="labelNama" for="nama" class="form-label">Nama Admin</label>
                          <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div>
                        <div>
                          <input type="hidden" class="form-control" value="<?= $admin['id'] ?>" name="id_admin">
                        </div>
                        <div class="help-block form-text mt-n2"></div>
                      </div>
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
                          <label id="label_email" for="email" class="">Email</label>
                          <input type="email" name="email" class="form-control" id="email2" required>
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
    <!-- modal read -->
    <div class="modal fade top-2" id="readModal" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
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
                      <li>Mengurangkonsumsi lemak jenuh</li>
                      <li>Mempertimbangkan efek pada tekanan darah ketika membuat pilihan makanan untuk dikonsumsi</li>
                      <li>Menghindari minum alkohol</li>
                      <li>Mengkonsi umsi makanan rendah garam atau menggunakan sedikit garam ketika membumbui masakan</li>
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