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

        a.disabled {
          pointer-events: none;
          cursor: default;
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
            z-index: 1;
            color: #e91e63;
            border-radius: 0.5rem;
            background-color: inherit;
        }
        .page-item.active .page-link {
              z-index: 1;
              color: #fff;
              background-color: #e91e63;
              border-color: #e91e63;
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

        .btn-cus{
          background-color: #9A208C;
          color: white;
        }

        .btn-cus:hover{
          color: white;
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
                <h6 class="text-white text-capitalize ps-3">Tabel Responden</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
              <?php if($this->session->flashdata('flashDataEmail')) : ?>
                <div class="flash-data-email" data-flashdataemail="<?= $this->session->flashdata('flashDataEmail') ?>"></div>
              <?php endif; ?>
              <br />
                <!-- Button trigger modal -->
                <?php if($responden){ ?>

                  <button type="button" class="btn bg-gradient btn-success" data-bs-toggle="modal" data-bs-target="#addModal" onclick="add('<?=$active?>')"><i class="fas fa-fw fa-paper-plane"></i> Send Remainder</button>
                <?php } ?>
                <br />
                <br />
                  <table id="tabel" class="display nowrap table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama</th>
                            <th class="text-center">Usia</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th class="text-center">Gender</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_body">
                        <?php 
                            $no = 1;
                            foreach($responden as $key => $value) :
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td class="text-center"><?= $value['usia'] ?></td>
                            <td><?= $value['pendidikan'] ?></td>
                            <td><?= $value['pekerjaan'] ?></td>
                            <td class="text-center"><?= $value['gender'] ?></td>
                            <td><?= $value['email'] ?></td>
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
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Tabel Kuesioner Responden</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-pretestKontrol-tab" data-bs-toggle="tab" data-bs-target="#nav-pretestKontrol" type="button" role="tab" aria-controls="nav-pretestKontrol" aria-selected="true">Pretest Kontrol</button>
                  <button class="nav-link" id="nav-pretestIntervensi-tab" data-bs-toggle="tab" data-bs-target="#nav-pretestIntervensi" type="button" role="tab" aria-controls="nav-pretestIntervensi" aria-selected="false">Pretest Intervensi</button>
                  <button class="nav-link" id="nav-postestKontrol-tab" data-bs-toggle="tab" data-bs-target="#nav-postestKontrol" type="button" role="tab" aria-controls="nav-postestKontrol" aria-selected="false">Postest Kontrol</button>
                  <button class="nav-link" id="nav-postestIntervensi-tab" data-bs-toggle="tab" data-bs-target="#nav-postestIntervensi" type="button" role="tab" aria-controls="nav-postestIntervensi" aria-selected="false">Postest Intervensi</button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-pretestKontrol" role="tabpanel" aria-labelledby="nav-pretestKontrol-tab">
                  <br>
                  <table class="tabel-data display nowrap table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">No.</th>
                            <th class="align-middle">Nama</th>
                            <th class="align-middle">Tekanan Darah<br>Sistolik (mmHg)</th>
                            <th class="align-middle">Tekanan Darah<br>Diastolik (mmHg)</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $td_exist = false;
                            foreach($kuesioner_responden_pretest_kontrol as $key => $value) :
                             if($value['qk8_d']) {
                              $tekanan_darah = explode(',', $value['qk8_d']);
                              $td_exist = true;
                            }else{
                              $td_exist = false;
                            }
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['qk1_d'] ?></td>
                            <td class="text-center"><?= ($td_exist) ? $tekanan_darah[0] : '' ?></td>
                            <td class="text-center"><?= ($td_exist) ? $tekanan_darah[1] : '' ?></td>
                            <td class="text-center">
                              <!-- detail -->
                              <a class="<?php
                                    $pretest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['pretest_kontrol'] == 0) ? 'disabled' : '';
                                        $pretest_kontrol_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$pretest_kontrol_exist){
                                      echo 'disabled';
                                    }
                                    ?>" 
                                    href="javascript:;"
                                    data-id="<?= $value['id'] ?>"
                                    data-sistolik="<?= ($td_exist) ? $tekanan_darah[0] : '' ?>"
                                    data-diastolik="<?= ($td_exist) ? $tekanan_darah[1] : '' ?>"
                                    data-idresponden="<?= $value['id_responden'] ?>"
                                    data-iduser="<?= $id_user ?>"
                                    data-kuesioner="<?= 'pretest_kontrol' ?>"
                                    data-responden="<?php echo htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8'); ?>"
                                    data-bs-toggle="modal" data-bs-target="#readModal"
                                    onclick="edit('<?=$active?>', '<?=$value['id']?>')">
                                    <button class="btn btn-<?php
                                    $pretest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){ 
                                      if($value['id_responden'] == $value2['id_responden']){
                                        echo ($value2['pretest_kontrol'] == 0) ? 'secondary' : 'cus';
                                        $pretest_kontrol_exist = true;
                                        break; 
                                      }  
                                    }
                                    
                                    if(!$pretest_kontrol_exist){
                                      echo 'secondary';
                                    }
                                    ?> btn-sm 
                                    <?php
                                    $pretest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['pretest_kontrol'] == 0) ? 'disabled' : '';
                                        $pretest_kontrol_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$pretest_kontrol_exist){
                                      echo 'disabled';
                                    }
                                    ?>"><span class="fa fa-eye"></span></button>
                                    
                              </a>
                              <a class="<?php
                                    $pretest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['pretest_kontrol'] == 0) ? 'disabled' : '';
                                        $pretest_kontrol_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$pretest_kontrol_exist){
                                      echo 'disabled';
                                    }
                                    ?>" 
                                    href="javascript:;"
                                    data-id="<?= $value['id'] ?>"
                                    data-sistolik="<?= ($td_exist) ? $tekanan_darah[0] : '' ?>"
                                    data-diastolik="<?= ($td_exist) ? $tekanan_darah[1] : '' ?>"
                                    data-idresponden="<?= $value['id_responden'] ?>"
                                    data-iduser="<?= $id_user ?>"
                                    data-kuesioner="<?= 'pretest_kontrol' ?>"
                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                    onclick="edit('<?=$active?>', '<?=$value['id']?>')">
                                    <button class="btn btn-<?php
                                    $pretest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){ 
                                      if($value['id_responden'] == $value2['id_responden']){
                                        echo ($value2['pretest_kontrol'] == 0) ? 'secondary' : 'info';
                                        $pretest_kontrol_exist = true;
                                        break; 
                                      }  
                                    }
                                    
                                    if(!$pretest_kontrol_exist){
                                      echo 'secondary';
                                    }
                                    ?> btn-sm 
                                    <?php
                                    $pretest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['pretest_kontrol'] == 0) ? 'disabled' : '';
                                        $pretest_kontrol_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$pretest_kontrol_exist){
                                      echo 'disabled';
                                    }
                                    ?>"><span class="fa fa-pencil"></span></button>
                              </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="nav-pretestIntervensi" role="tabpanel" aria-labelledby="nav-pretestIntervensi-tab">
                  <br>
                  <table class="tabel-data display nowrap table table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">No.</th>
                            <th class="align-middle">Nama</th>
                            <th class="align-middle">Tekanan Darah<br>Sistolik (mmHg)</th>
                            <th class="align-middle">Tekanan Darah<br>Diastolik (mmHg)</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $td_exist = false;
                            foreach($kuesioner_responden_pretest_intervensi as $key => $value) :
                             if($value['qk8_d']) {
                              $tekanan_darah = explode(',', $value['qk8_d']);
                              $td_exist = true;
                            }else{
                              $td_exist = false;
                            }
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['qk1_d'] ?></td>
                            <td class="text-center"><?= ($td_exist) ? $tekanan_darah[0] : '' ?></td>
                            <td class="text-center"><?= ($td_exist) ? $tekanan_darah[1] : '' ?></td>
                            <td class="text-center">
                              <!-- detail -->
                              <a class="<?php
                                    $pretest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['pretest_intervensi'] == 0) ? 'disabled' : '';
                                        $pretest_intervensi_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$pretest_intervensi_exist){
                                      echo 'disabled';
                                    }
                                    ?>" 
                                    href="javascript:;"
                                    data-id="<?= $value['id'] ?>"
                                    data-sistolik="<?= ($td_exist) ? $tekanan_darah[0] : '' ?>"
                                    data-diastolik="<?= ($td_exist) ? $tekanan_darah[1] : '' ?>"
                                    data-idresponden="<?= $value['id_responden'] ?>"
                                    data-iduser="<?= $id_user ?>"
                                    data-kuesioner="<?= 'pretest_intervensi' ?>"
                                    data-responden="<?php echo htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8'); ?>"
                                    data-bs-toggle="modal" data-bs-target="#readModal"
                                    onclick="edit('<?=$active?>', '<?=$value['id']?>')">
                                    <button class="btn btn-<?php
                                    $pretest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){ 
                                      if($value['id_responden'] == $value2['id_responden']){
                                        echo ($value2['pretest_intervensi'] == 0) ? 'secondary' : 'cus';
                                        $pretest_intervensi_exist = true;
                                        break; 
                                      }  
                                    }
                                    
                                    if(!$pretest_intervensi_exist){
                                      echo 'secondary';
                                    }
                                    ?> btn-sm 
                                    <?php
                                    $pretest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['pretest_intervensi'] == 0) ? 'disabled' : '';
                                        $pretest_intervensi_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$pretest_intervensi_exist){
                                      echo 'disabled';
                                    }
                                    ?>"><span class="fa fa-eye"></span></button>
                                    
                              </a>
                              <a class="<?php
                                    $pretest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['pretest_intervensi'] == 0) ? 'disabled' : '';
                                        $pretest_intervensi_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$pretest_intervensi_exist){
                                      echo 'disabled';
                                    }
                                    ?>" 
                                    href="javascript:;"
                                    data-id="<?= $value['id'] ?>"
                                    data-sistolik="<?= ($td_exist) ? $tekanan_darah[0] : '' ?>"
                                    data-diastolik="<?= ($td_exist) ? $tekanan_darah[1] : '' ?>"
                                    data-idresponden="<?= $value['id_responden'] ?>"
                                    data-iduser="<?= $id_user ?>"
                                    data-kuesioner="<?= 'pretest_intervensi' ?>"
                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                    onclick="edit('<?=$active?>', '<?=$value['id']?>')">
                                    <button class="btn btn-<?php
                                    $pretest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){ 
                                      if($value['id_responden'] == $value2['id_responden']){
                                        echo ($value2['pretest_intervensi'] == 0) ? 'secondary' : 'info';
                                        $pretest_intervensi_exist = true;
                                        break; 
                                      }  
                                    }
                                    
                                    if(!$pretest_intervensi_exist){
                                      echo 'secondary';
                                    }
                                    ?> btn-sm 
                                    <?php
                                    $pretest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['pretest_intervensi'] == 0) ? 'disabled' : '';
                                        $pretest_intervensi_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$pretest_intervensi_exist){
                                      echo 'disabled';
                                    }
                                    ?>"><span class="fa fa-pencil"></span></button>
                              </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="nav-postestKontrol" role="tabpanel" aria-labelledby="nav-postestKontrol-tab">
                  <br>
                  <table class="tabel-data display nowrap table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">No.</th>
                            <th class="align-middle">Nama</th>
                            <th class="align-middle">Tekanan Darah<br>Sistolik (mmHg)</th>
                            <th class="align-middle">Tekanan Darah<br>Diastolik (mmHg)</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $td_exist = false;
                            foreach($kuesioner_responden_postest_kontrol as $key => $value) :
                             if($value['qk8_d']) {
                              $tekanan_darah = explode(',', $value['qk8_d']);
                              $td_exist = true;
                            }else{
                              $td_exist = false;
                            }
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['qk1_d'] ?></td>
                            <td class="text-center"><?= ($td_exist) ? $tekanan_darah[0] : '' ?></td>
                            <td class="text-center"><?= ($td_exist) ? $tekanan_darah[1] : '' ?></td>
                            <td class="text-center">
                               <!-- detail -->
                               <a class="<?php
                                    $postest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['postest_kontrol'] == 0) ? 'disabled' : '';
                                        $postest_kontrol_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$postest_kontrol_exist){
                                      echo 'disabled';
                                    }
                                    ?>" 
                                    href="javascript:;"
                                    data-id="<?= $value['id'] ?>"
                                    data-sistolik="<?= ($td_exist) ? $tekanan_darah[0] : '' ?>"
                                    data-diastolik="<?= ($td_exist) ? $tekanan_darah[1] : '' ?>"
                                    data-idresponden="<?= $value['id_responden'] ?>"
                                    data-iduser="<?= $id_user ?>"
                                    data-kuesioner="<?= 'postest_kontrol' ?>"
                                    data-responden="<?php echo htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8'); ?>"
                                    data-bs-toggle="modal" data-bs-target="#readModal"
                                    onclick="edit('<?=$active?>', '<?=$value['id']?>')">
                                    <button class="btn btn-<?php
                                    $postest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){ 
                                      if($value['id_responden'] == $value2['id_responden']){
                                        echo ($value2['postest_kontrol'] == 0) ? 'secondary' : 'cus';
                                        $postest_kontrol_exist = true;
                                        break; 
                                      }  
                                    }
                                    
                                    if(!$postest_kontrol_exist){
                                      echo 'secondary';
                                    }
                                    ?> btn-sm 
                                    <?php
                                    $postest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['postest_kontrol'] == 0) ? 'disabled' : '';
                                        $postest_kontrol_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$postest_kontrol_exist){
                                      echo 'disabled';
                                    }
                                    ?>"><span class="fa fa-eye"></span></button>
                                    
                              </a>
                              <a class="<?php
                                    $postest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['postest_kontrol'] == 0) ? 'disabled' : '';
                                        $postest_kontrol_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$postest_kontrol_exist){
                                      echo 'disabled';
                                    }
                                    ?>" 
                                    href="javascript:;"
                                    data-id="<?= $value['id'] ?>"
                                    data-sistolik="<?= ($td_exist) ? $tekanan_darah[0] : '' ?>"
                                    data-diastolik="<?= ($td_exist) ? $tekanan_darah[1] : '' ?>"
                                    data-idresponden="<?= $value['id_responden'] ?>"
                                    data-iduser="<?= $id_user ?>"
                                    data-kuesioner="<?= 'postest_kontrol' ?>"
                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                    onclick="edit('<?=$active?>', '<?=$value['id']?>')">
                                    <button class="btn btn-<?php
                                    $postest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){ 
                                      if($value['id_responden'] == $value2['id_responden']){
                                        echo ($value2['postest_kontrol'] == 0) ? 'secondary' : 'info';
                                        $postest_kontrol_exist = true;
                                        break; 
                                      }  
                                    }
                                    
                                    if(!$postest_kontrol_exist){
                                      echo 'secondary';
                                    }
                                    ?> btn-sm 
                                    <?php
                                    $postest_kontrol_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['postest_kontrol'] == 0) ? 'disabled' : '';
                                        $postest_kontrol_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$postest_kontrol_exist){
                                      echo 'disabled';
                                    }
                                    ?>"><span class="fa fa-pencil"></span></button>
                              </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="nav-postestIntervensi" role="tabpanel" aria-labelledby="nav-postestIntervensi-tab">
                  <br>
                  <table class="tabel-data display nowrap table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">No.</th>
                            <th class="align-middle">Nama</th>
                            <th class="align-middle">Tekanan Darah<br>Sistolik (mmHg)</th>
                            <th class="align-middle">Tekanan Darah<br>Diastolik (mmHg)</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $td_exist = false;
                            foreach($kuesioner_responden_postest_intervensi as $key => $value) :
                             if($value['qk8_d']) {
                              $tekanan_darah = explode(',', $value['qk8_d']);
                              $td_exist = true;
                            }else{
                              $td_exist = false;
                            }
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['qk1_d'] ?></td>
                            <td class="text-center"><?= ($td_exist) ? $tekanan_darah[0] : '' ?></td>
                            <td class="text-center"><?= ($td_exist) ? $tekanan_darah[1] : '' ?></td>
                            <td class="text-center">
                              <!-- detail -->
                              <a class="<?php
                                    $postest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['postest_intervensi'] == 0) ? 'disabled' : '';
                                        $postest_intervensi_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$postest_intervensi_exist){
                                      echo 'disabled';
                                    }
                                    ?>" 
                                    href="javascript:;"
                                    data-id="<?= $value['id'] ?>"
                                    data-sistolik="<?= ($td_exist) ? $tekanan_darah[0] : '' ?>"
                                    data-diastolik="<?= ($td_exist) ? $tekanan_darah[1] : '' ?>"
                                    data-idresponden="<?= $value['id_responden'] ?>"
                                    data-iduser="<?= $id_user ?>"
                                    data-kuesioner="<?= 'postest_intervensi' ?>"
                                    data-responden="<?php echo htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8'); ?>"
                                    data-bs-toggle="modal" data-bs-target="#readModal"
                                    onclick="edit('<?=$active?>', '<?=$value['id']?>')">
                                    <button class="btn btn-<?php
                                    $postest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){ 
                                      if($value['id_responden'] == $value2['id_responden']){
                                        echo ($value2['postest_intervensi'] == 0) ? 'secondary' : 'cus';
                                        $postest_intervensi_exist = true;
                                        break; 
                                      }  
                                    }
                                    
                                    if(!$postest_intervensi_exist){
                                      echo 'secondary';
                                    }
                                    ?> btn-sm 
                                    <?php
                                    $postest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['postest_intervensi'] == 0) ? 'disabled' : '';
                                        $postest_intervensi_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$postest_intervensi_exist){
                                      echo 'disabled';
                                    }
                                    ?>"><span class="fa fa-eye"></span></button>
                                    
                              </a>
                              <!-- edit -->
                              <a class="<?php
                                    $postest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['postest_intervensi'] == 0) ? 'disabled' : '';
                                        $postest_intervensi_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$postest_intervensi_exist){
                                      echo 'disabled';
                                    }
                                    ?>" 
                                    href="javascript:;"
                                    data-id="<?= $value['id'] ?>"
                                    data-sistolik="<?= ($td_exist) ? $tekanan_darah[0] : '' ?>"
                                    data-diastolik="<?= ($td_exist) ? $tekanan_darah[1] : '' ?>"
                                    data-idresponden="<?= $value['id_responden'] ?>"
                                    data-iduser="<?= $id_user ?>"
                                    data-kuesioner="<?= 'postest_intervensi' ?>"
                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                    onclick="edit('<?=$active?>', '<?=$value['id']?>')">
                                    <button class="btn btn-<?php
                                    $postest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){ 
                                      if($value['id_responden'] == $value2['id_responden']){
                                        echo ($value2['postest_intervensi'] == 0) ? 'secondary' : 'info';
                                        $postest_intervensi_exist = true;
                                        break; 
                                      }  
                                    }
                                    
                                    if(!$postest_intervensi_exist){
                                      echo 'secondary';
                                    }
                                    ?> btn-sm 
                                    <?php
                                    $postest_intervensi_exist = false; 
                                    foreach ($applied_kuesioner_responden as $key2 => $value2){
                                      if($value['id_responden'] == $value2['id_responden']) {
                                        echo ($value2['postest_intervensi'] == 0) ? 'disabled' : '';
                                        $postest_intervensi_exist = true;
                                        break;
                                      }
                                    }

                                    if(!$postest_intervensi_exist){
                                      echo 'disabled';
                                    }
                                    ?>"><span class="fa fa-pencil"></span></button>
                              </a>
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
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3"><span class="fa fa-fw fa-paper-plane"></span> Send Remainder</h6>
                  </div>
                </div>
                <div class="modal-body form py-4 px-3">
                  <form action="<?= base_url('admin/send_email/').$id_user ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                        <label id="label_subject" for="subject">Subject</label>
                        <div class="input-group input-group-outline">
                          <input type="text" name="subject" class="form-control" id="subject" placeholder="Masukkan subject.." value="Self Management Kuesioner" required>
                        </div>
                        <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <label for="message" class="">Pesan</label>
                        <div class="input-group input-group-outline mb-4">
                          <textarea class="form-control" name="message" placeholder="Masukkan isi pesan.." spellcheck="false" rows="6" id="message" required>Halo kak, Gimana kabarnya kak? baik kan hehe, mimin mau mengingatkan nih untuk Jangan lupa mengisi kuesioner di website Self Management yah dan membaca materi self management-nya, materinya bisa di akses atau di download di website, okedeh kak sekian dan terimakasih..
                          </textarea>
                          <!-- <input type="hidden" name="id_responden" value=""> -->
                        </div>
                        <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div>
                        <div>
                          <input type="hidden" class="form-control" value="<?= $admin['id'] ?>" name="id_admin">
                        </div>
                        <div class="help-block form-text mt-n2"></div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                      <button type="submit" id="btnSave" onclick="return sendMessage();" class="btnSave btn bg-gradient-primary">Save</i></button>
                    </div>
                  </form>
                  </div>
        </div>
    </div>
    <!-- end modal add -->
    <!-- modal read -->
    <div class="modal fade top-2" id="readModal" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3 text-center">View Data Kuesioner <span class="fa fa-fw fa-eye"></span></h6>
                </div>
              </div>
              <div class="modal-body text-start">
                <form action="#">
                <div class="container border border-1 mb-4 table-responsive">
                        <div class="card-header my-4 p-0">
                            <div class="row justify-content-center">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0 text-center">Self Management Hipertensi Pada Ibu Hamil Puskesmas Masamba Tahun 2023 (<span id="read-judul-kuesioner"></span>)</h6>
                                </div>
                                <!-- <div class="col-md-4 text-end">
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#about_visimisiModal" onclick="edit('about_visimisi', '1')">
                                    <i class="fas fa-edit text-info text-md" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                </a>
                                </div> -->
                            </div>
                        </div>
                        <div class="container">
                          <div class="row mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                            <div class="col-md-7">
                              <h6 class="data_demografi1">A. Data Demografi</h6>
                              <ol id="list-kuesioner" class="list-kuesioner">
                                <li>
                                  <div class="form-group mb-4">
                                    <div class="input-group input-group-static my-3">
                                      <label id="label_nama" for="nama1"><?= $kuesioner_pretest_kontrol[0]['pertanyaan'] ?></label>
                                      <input type="text" name="nama1" class="form-control" value="" id="nama1" readonly>
                                    </div>
                                  <div class="help-block form-text mt-n2"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="form-group mb-4">
                                    <div class="input-group input-group-static my-3">
                                      <label id="label_usia1" for="usia1"><?= $kuesioner_pretest_kontrol[1]['pertanyaan'] ?></label>
                                      <input type="number" name="usia1" class="form-control" value="" id="usia1" readonly>
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
                                      <input type="radio" name="pendidikan1" id="pendidikan_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[2]['jawaban'.$i] ?>">
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
                                      <input type="radio" name="pekerjaan1" id="pekerjaan_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[3]['jawaban'.$i] ?>">
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
                                      <input type="radio" name="riwayat_merokok1" id="riwayat_merokok_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[4]['jawaban'.$i] ?>">
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
                                      <input type="radio" name="konsumsi_alkohol1" id="konsumsi_alkohol_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[5]['jawaban'.$i] ?>">
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
                                      <input type="radio" name="penyakit1" id="penyakit_jawaban1<?= $i ?>" value="<?= $kuesioner_pretest_kontrol[6]['jawaban'.$i] ?>">
                                      <label for="penyakit_jawaban1<?= $i ?>"><?= $kuesioner_pretest_kontrol[6]['jawaban'.$i] ?></label>
                                      <br>
                                      <?php 
                                        if($kuesioner_pretest_kontrol[6]['jawaban'.$i] == "Ya") :
                                      ?>
                                      <div class="div_desc_penyakit1 form-group mb-4" id="div_desc_penyakit1" style="display:none;">
                                        <div class="input-group input-group-static my-3">
                                          <input type="text" name="desc_penyakit1" class="form-control" id="desc_penyakit1" placeholder="Masukkan deskripsi penyakit.." value="" readonly>
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
                                    <li>
                                      Sistolik <span id="sistolik">?</span> mmHg (diisi oleh peneliti)
                                    </li>
                                    <li>
                                      Diastolik <span id="diastolik">?</span> mmHg (diisi oleh peneliti)
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
                                    <td class="text-start">
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
                                          <input type="radio" id="integrasi_diri1<?= ++$temp ?>" name="integrasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah">
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                      </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="integrasi_diri1<?= ++$temp ?>" name="integrasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang">
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="integrasi_diri1<?= ++$temp ?>" name="integrasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang">
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="integrasi_diri1<?= ++$temp ?>" name="integrasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu">
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
                                    <td class="text-start">
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
                                          <input type="radio" id="regulasi_diri1<?= ++$temp ?>" name="regulasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($value['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                      </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="regulasi_diri1<?= ++$temp ?>" name="regulasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($value['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="regulasi_diri1<?= ++$temp ?>" name="regulasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($value['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="regulasi_diri1<?= ++$temp ?>" name="regulasi_diri1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($value['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
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
                                    <td class="text-start">
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
                                          <input type="radio" id="idtk1<?= ++$temp ?>" name="idtk1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($value['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                      </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="idtk1<?= ++$temp ?>" name="idtk1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($value['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="idtk1<?= ++$temp ?>" name="idtk1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($value['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="idtk1<?= ++$temp ?>" name="idtk1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($value['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
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
                                    <td class="text-start">
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
                                          <input type="radio" id="ptd1<?= ++$temp ?>" name="ptd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($value['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                      </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="ptd1<?= ++$temp ?>" name="ptd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($value['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="ptd1<?= ++$temp ?>" name="ptd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($value['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="ptd1<?= ++$temp ?>" name="ptd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($value['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
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
                                    <td class="text-start">
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
                                          <input type="radio" id="ktayd1<?= ++$temp ?>" name="ktayd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Pernah" value="Tidak Pernah" required <?= ($value['qk'.$temp_qk.'_sm'] == "Tidak Pernah") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                      </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="ktayd1<?= ++$temp ?>" name="ktayd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Jarang" value="Jarang" <?= ($value['qk'.$temp_qk.'_sm'] == "Jarang") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="ktayd1<?= ++$temp ?>" name="ktayd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Kadang-kadang" value="Kadang-kadang" <?= ($value['qk'.$temp_qk.'_sm'] == "Kadang-kadang") ? "checked" : "" ?>>
                                        </div>
                                        <div class="help-block form-text mt-n2"></div>
                                      </div>
                                    </td>
                                    <td class="align-middle">
                                      <div class="form-group">
                                        <div>
                                          <input type="radio" id="ktayd1<?= ++$temp ?>" name="ktayd1<?= $i+1 ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Selalu" value="Selalu" <?= ($value['qk'.$temp_qk.'_sm'] == "Selalu") ? "checked" : "" ?>>
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
                </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  <!-- end of modal read -->
    <!-- modal edit -->
    <div class="modal fade top-2" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Edit Tekanan Darah <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm" id="form_edit" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                        <div class="input-group input-group-static my-3">
                          <label id="label_sistolik" for="sistolik" class="">Sistolik</label>
                          <input type="text" name="sistolik" class="form-control" id="sistolik" required>
                        </div>
                      <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <div class="input-group input-group-static my-3">
                          <label id="label_diastolik" for="diastolik" class="">Diastolik</label>
                          <input type="text" name="diastolik" class="form-control" id="diastolik" required>
                        </div>
                      <div class="help-block form-text mt-n2"></div>
                      </div>
                      <div>
                        <div>
                          <input type="hidden" name="id_responden" id="id_responden">
                          <input type="hidden" name="id_user" id="id_user">
                          <input type="hidden" name="kuesioner" id="kuesioner">
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
    

    <script type="text/javascript">
      function sendMessage() {
        
        var showLoading = function() {
          Swal.fire({
                  title: 'Please Wait !',
                  html: 'Sending..',// add html attribute if you want or remove
                  allowOutsideClick: false,
                  showConfirmButton: false,
                  willOpen: () => {
                      Swal.showLoading()
                  },
              });
              // return confirm('Kamu akan mengirim pesan ke email responden secara massal, kamu yakin?');
            }
            showLoading();
      }

        $(':radio:not(:checked)').attr('disabled', true);


      // $(':radio:(:checked)').attr('disabled', );
      </script>
</body>

</html>