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
    .btnViewDetail:hover {
      color: #e91e63 !important;
      border: 1px solid;
      border-color: #e91e63;
      background-color: #fff;
      box-shadow: none;
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

    

    /* .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }

    @media (min-width: 600px){
      .card-img-top-startup {
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }
      .card-img-top-product {
        width: 100%;
        height: 15vw;
        object-fit: cover;
      }

      .card-img-top-member {
        width: 100%;
        height: 15vw;
        object-fit: cover;
      }
    } */

    /* @media (min-width: 1200px){ */
     
    /* } */
    
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
                <h6 class="text-white text-capitalize ps-3">List Coachee</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                <div class="table-responsive p-0">
                    <!-- ini adalah test modal nested -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-fw fa-clipboard-list"></i> Index</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-fw fa-notes-medical"></i> Antrian Coachee</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="col-12 my-4 mx-3">
                          <div class="mb-5 ps-3">
                            <h5 class="mb-1">List Startup</h5>
                            <p class="text-sm">Daftar Startup yang dibina : </p>
                          </div>
                          <div class="row">
                            <?php 
                              $exist_antrian = true;
                              foreach($startup as $key => $value) : 
                              if($value['status_pengajuan_coach'] == "disetujui") :
                                $exist_antrian = false;
                            ?>
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-5">
                              <div class="card h-100 card-blog card-plain border-3 mb-5">
                                <div class="card-header p-0 mt-n4 mx-3 text-center">
                                  <a class="d-block shadow-xl border-radius-xl bg-gray-300">
                                    <img src="<?= site_url('assets/startup/profil/').$value['gambar'] ?>" alt="img-blur-shadow" class="img-fluid border-radius-xl">
                                  </a>
                                </div>
                                <div class="card-body p-3">
                                  <p class="mb-0 text-sm"><?= $value['ceo'] ?></p>
                                  <span>
                                    <h5>
                                      <?= $value['nama_startup'] ?>
                                    </h5>
                                  </span>
                                  <p class="mb-4 text-sm">
                                    <?= word_limiter($value['deskripsi'], 15) ?>
                                  </p>
                                  <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" id="btnViewDetail" class="btn btn-outline-info btn-sm mb-0 btnViewDetail" data-bs-toggle="modal" data-bs-target="#readStartupModal<?= $value['id_startup'] ?>">View Detail</button>
                                    <!-- modal startup -->
                                    <div class="modal fade top-2" id="readStartupModal<?= $value['id_startup'] ?>" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                                  <h6 class="text-white text-center text-capitalize ps-3">Detail Startup</h6>
                                                </div>
                                              </div>
                                              <div class="modal-body px-4 form mt-4">
                                                <div class="row p-3 justify-content-center">
                                                  <div class="col-lg-4 text-center justify-content-center d-flex flex-wrap align-items-center rounded">
                                                    <!-- <h3 id="nama_startup3">Judul Startup</h3> -->
                                                    <div>
                                                      <img id="gambar_startup3" src="<?= site_url('assets/startup/profil/').$value['gambar'] ?>" class="img-fluid" alt="">
                                                      <h4 class="mt-2"><?= $value['nama_startup'] ?></h4>
                                                    </div>
                                                  </div>
                                                  <div class="col">
                                                    <form class="form_read" id="form_read" action="#" enctype="multipart/form-data">
                                                      <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><span class="fw-bold">CEO : </span><?= $value['ceo'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Bidang : </span><?= $value['bidang'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Alamat : </span><?= $value['alamat'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Kontak : </span><?= $value['kontak'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Email : </span><?= $value['email'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Ig : </span><?= $value['ig'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Deskripsi : </span><?= $value['deskripsi'] ?></li>
                                                      </ul>
                                                    </form>
                                                  </div>
                                                </div>
                                                <div class="row mb-3">
                                                  <div class="px-4">
                                                    <hr>
                                                  </div>
                                                  <h5 class="text-center mb-5 mt-4">- PRODUK -</h5>
                                                  <div class="card-group">
                                                    <?php
                                                      $exist_product = false;
                                                      $i = 1;
                                                      foreach($produk as $key => $value2) :
                                                        if($value['id_startup'] == $value2['produk_id_startup']) :
                                                          if($i == 4) {
                                                            break;
                                                          }
                                                          $exist_product = true;
                                                    ?>
                                                    <div class="col mb-5">
                                                      <div class="card mx-3 mb-5 h-100">
                                                        <img src="<?= site_url('assets/startup/produk/').$value2['foto_produk'] ?>" class="img-fluid" alt="foto produk">
                                                        <div class="card-body">
                                                          <h5 class="card-title"><?= $value2['nama_produk'] ?></h5>
                                                          <p class="card-text"><?= word_limiter($value2['deskripsi'], 10) ?></p>
                                                        </div>
                                                        <div class="card-footer">
                                                          <small class="text-muted"><?= "Rp. ".rupiah($value2['harga']) ?></small>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <?php 
                                                      $i++;
                                                      endif; 
                                                      endforeach; 

                                                      if(!$exist_product) : ?>
                                                          <div class="col">
                                                            <p class='text-uppercase text-center'>Tidak ada produk untuk di tampilkan.</p>
                                                          </div>
                                                    <?php endif; ?>
                                                  </div>
                                                </div>
                                                <div class="row mb-3">
                                                  <div class="px-4">
                                                    <hr>
                                                  </div>
                                                  <h5 class="text-center mb-5 mt-4">- MEMBER -</h5>
                                                  <div class="card-group">
                                                    <?php
                                                      $exist_member = false;
                                                      foreach($member as $key => $value2) : 
                                                      if($value['id_startup'] == $value2['startup_id']) :
                                                        $exist_member = true;
                                                    ?>
                                                    <div class="col mb-5">
                                                      <div class="card mx-3 mb-5 h-100">
                                                        <img src="<?= site_url('assets/startup/member/').$value2['foto'] ?>" class="card-img-top-member img-fluid" alt="foto member">
                                                        <div class="card-body">
                                                          <h5 class="card-title"><?= $value2['nama_member'] ?></h5>
                                                          <table>
                                                            <tr>
                                                              <td class="w-35">NIK</td>
                                                              <td class="w-10">:</td>
                                                              <td><?= $value2['nik'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Gender</td>
                                                              <td>:</td>
                                                              <td><?= $value2['gender'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Jabatan</td>
                                                              <td>:</td>
                                                              <td><?= $value2['jabatan'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Tugas</td>
                                                              <td>:</td>
                                                              <td><?= $value2['tugas'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Pendidikan</td>
                                                              <td>:</td>
                                                              <td> <?= $value2['pendidikan'] ?></td>
                                                            </tr>  
                                                          </table>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <?php 
                                                      endif; 
                                                      endforeach; 

                                                      if(!$exist_member) : ?>
                                                          <div class="col">
                                                            <p class='text-uppercase text-center'>Tidak ada member untuk di tampilkan.</p>
                                                          </div>
                                                    <?php endif; ?>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="avatar-group mt-2">
                                      <?php
                                        foreach($member as $key3 => $value3) :
                                        if($value['id_startup'] == $value3['startup_id']) : ?>
                                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="modal" data-bs-target="#readMemberModal<?= $value3['id_member'] ?>">
                                        <img class="img-fluid h-100" alt="*" src="<?= site_url('assets/startup/member/').$value3['foto'] ?>">
                                      </a>
                                      <?php endif; endforeach; ?>
                                      <?php foreach($member as $key => $value3) : ?>
                                      <!-- Modal -->
                                      <div class="modal fade readMemberModal" id="readMemberModal<?= $value3['id_member'] ?>" tabindex="-1" role="dialog" aria-labelledby="readMemberModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                                <h6 class="text-white text-center text-capitalize ps-3">Detail Member</h6>
                                              </div>
                                            </div>
                                            <div class="modal-body mb-4">
                                            <div class="container-fluid px-2 px-md-4">
                                              <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('<?= site_url('assets/startup/profil/').$value['gambar'] ?>'); background-size: 200px 200px; background-repeat: no-repeat;">
                                                <!-- <span class="mask  bg-gradient-secondary opacity-6"></span> -->
                                              </div>
                                              <div class="card card-body mx-3 mx-md-4 mt-n6 border-1 border-gray-300">
                                                <div class="row gx-4 mb-2 justify-content-center">
                                                  <div class="col-auto">
                                                    <a href="<?= site_url('assets/startup/member/').$value3['foto'] ?>" target="_blank">
                                                    <div class="avatar avatar-xl position-relative mt-n10">
                                                        <img src="<?= site_url('assets/startup/member/').$value3['foto'] ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm img-fluid h-100 rounded-circle">
                                                      </div>
                                                    </a>
                                                  </div>
                                                </div>
                                                  <div class="row fx-4 mb-2 justify-content-center">
                                                    <div class="col-auto my-auto">
                                                      <div class="h-100">
                                                        <h5 class="mb-1 text-center">
                                                          <?= $value3['nama_member'] ?>
                                                        </h5>
                                                        <p class="mb-0 font-weight-normal text-sm text-center">
                                                          <?= $value3['jabatan'] ?>
                                                        </p>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row mt-3">
                                                    <div class="col">
                                                    <table class="mx-auto">
                                                            <tr>
                                                              <td class="w-35">NIK</td>
                                                              <td class="w-10">:</td>
                                                              <td><?= $value3['nik'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Gender</td>
                                                              <td>:</td>
                                                              <td><?= $value3['gender'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Jabatan</td>
                                                              <td>:</td>
                                                              <td><?= $value3['jabatan'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Tugas</td>
                                                              <td>:</td>
                                                              <td><?= $value3['tugas'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Pendidikan</td>
                                                              <td>:</td>
                                                              <td> <?= $value3['pendidikan'] ?></td>
                                                            </tr>  
                                                          </table>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <?php endforeach; ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php endif; endforeach; 
                              if($exist_antrian) :
                            ?>
                            <div class="col">
                              <p class='text-uppercase text-center'>Tidak ada Coachee untuk di tampilkan.</p>
                            </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="col-12 my-4 mx-3">
                          <div class="mb-5 ps-3">
                            <h5 class="mb-1">Antrian Startup</h5>
                            <p class="text-sm">Daftar Antrian Startup yang butuh persutujuan : </p>
                          </div>
                          <div class="row">
                            <?php 
                              $exist_antrian = true;
                              foreach($startup as $key => $value) : 
                              if($value['status_pengajuan_coach'] == "diproses") :
                                $exist_antrian = false;
                            ?>
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                              <div class="card h-100 card-blog card-plain border-3 mb-5">
                                <div class="card-header p-0 mt-n4 mx-3 text-center">
                                  <a class="d-block shadow-xl border-radius-xl bg-gray-300">
                                    <img src="<?= site_url('assets/startup/profil/').$value['gambar'] ?>" alt="img-blur-shadow" class="img-fluid border-radius-xl">
                                  </a>
                                </div>
                                <div class="card-body p-3">
                                  <div class="row">
                                    <div class="col text-center">
                                      <a id="btnApprove" onclick="return confirm('Approve Startup ?')" href="<?= base_url("coach/status_pengajuan_coach/$id_user/disetujui/").$value['id_startup'] ?>" class="btn btn-icon btn-2 btn-success rounded-circle px-2 py-1 mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                        <span class="btn-inner--icon"><i class="material-icons">check</i></span>
                                      </a>
                                      <span data-bs-toggle="modal" data-bs-target="#messageModal">
                                        <a id="btnReject" href="javascript:;" class="btn btn-icon btn-2 btn-danger rounded-circle  px-2 py-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject">
                                          <span class="btn-inner--icon"><i class="material-icons">close</i></span>
                                        </a>
                                      </span>
                                      <!-- Modal -->
                                      <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="MessageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                                <h6 class="text-white text-center text-capitalize ps-3">Kirim Pesan Penolakan</h6>
                                              </div>
                                            </div>
                                            <form action="<?= base_url("coach/status_pengajuan_coach/$id_user/ditolak/").$value['id_startup'] ?>" method="post">
                                              <div class="modal-body mt-3">
                                                <div class="input-group input-group-outline mb-4">
                                                  <label class="form-label">Pesan</label>
                                                  <input type="text" name="message" class="form-control" required>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-gradient-info">Kirim</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <p class="mb-0 text-sm"><?= $value['ceo'] ?></p>
                                  <span>
                                    <h5>
                                      <?= $value['nama_startup'] ?>
                                    </h5>
                                  </span>
                                  <p class="mb-4 text-sm">
                                    <?= word_limiter($value['deskripsi'], 15) ?>
                                  </p>
                                  <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" id="btnViewDetail" class="btn btn-outline-info btn-sm mb-0 btnViewDetail" data-bs-toggle="modal" data-bs-target="#readStartupModal<?= $value['id_startup'] ?>">View Detail</button>
                                    <!-- modal startup -->
                                    <div class="modal fade top-2" id="readStartupModal<?= $value['id_startup'] ?>" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                                  <h6 class="text-white text-center text-capitalize ps-3">Detail Startup</h6>
                                                </div>
                                              </div>
                                              <div class="modal-body px-4 form mt-4">
                                                <div class="row p-3 justify-content-center">
                                                  <div class="col-lg-4 text-center justify-content-center d-flex flex-wrap align-items-center rounded">
                                                    <!-- <h3 id="nama_startup3">Judul Startup</h3> -->
                                                    <div>
                                                      <img id="gambar_startup3" src="<?= site_url('assets/startup/profil/').$value['gambar'] ?>" class="img-fluid" alt="">
                                                      <h4 class="mt-2"><?= $value['nama_startup'] ?></h4>
                                                    </div>
                                                  </div>
                                                  <div class="col">
                                                    <form class="form_read" id="form_read" action="#" enctype="multipart/form-data">
                                                      <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><span class="fw-bold">CEO : </span><?= $value['ceo'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Bidang : </span><?= $value['bidang'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Alamat : </span><?= $value['alamat'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Kontak : </span><?= $value['kontak'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Email : </span><?= $value['email'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">ig : </span><?= $value['ig'] ?></li>
                                                        <li class="list-group-item"><span class="fw-bold">Deskripsi : </span><?= $value['deskripsi'] ?></li>
                                                      </ul>
                                                    </form>
                                                  </div>
                                                </div>
                                                <div class="row mb-3">
                                                  <div class="px-4">
                                                    <hr>
                                                  </div>
                                                  <h5 class="text-center mb-5 mt-4">- PRODUK -</h5>
                                                  <div class="card-group">
                                                    <?php
                                                      $exist_product = false;
                                                      $i= 1;
                                                      foreach($produk as $key => $value2) :
                                                        if($value['id_startup'] == $value2['produk_id_startup']) :
                                                          if($i == 4) {
                                                            break;
                                                          } 
                                                          $exist_product = true;
                                                    ?>
                                                    <div class="col mb-5">
                                                      <div class="card mx-3 mb-5 h-100">
                                                        <img src="<?= site_url('assets/startup/produk/').$value2['foto_produk'] ?>" class="img-fluid" alt="foto produk">
                                                        <div class="card-body">
                                                          <h5 class="card-title"><?= $value2['nama_produk'] ?></h5>
                                                          <p class="card-text"><?= word_limiter($value2['deskripsi'], 10) ?></p>
                                                        </div>
                                                        <div class="card-footer">
                                                          <small class="text-muted"><?= "Rp. ".rupiah($value2['harga']) ?></small>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <?php 
                                                      $i++; 
                                                      endif;
                                                      endforeach; 

                                                      if(!$exist_product) : ?>
                                                          <div class="col">
                                                            <p class='text-uppercase text-center'>Tidak ada produk untuk di tampilkan.</p>
                                                          </div>
                                                    <?php endif; ?>
                                                  </div>
                                                </div>
                                                <div class="row mb-3">
                                                  <div class="px-4">
                                                    <hr>
                                                  </div>
                                                  <h5 class="text-center mb-5 mt-4">- MEMBER -</h5>
                                                  <div class="card-group">
                                                    <?php
                                                      $exist_member = false;
                                                      foreach($member as $key => $value2) : 
                                                      if($value['id_startup'] == $value2['startup_id']) :
                                                        $exist_member = true;
                                                    ?>
                                                    <div class="col mb-5">
                                                      <div class="card mx-3 mb-5 h-100">
                                                        <img src="<?= site_url('assets/startup/member/').$value2['foto'] ?>" class="img-fluid" alt="foto member">
                                                        <div class="card-body">
                                                          <h5 class="card-title"><?= $value2['nama_member'] ?></h5>
                                                          <table>
                                                            <tr>
                                                              <td class="w-35">NIK</td>
                                                              <td class="w-10">:</td>
                                                              <td><?= $value2['nik'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Gender</td>
                                                              <td>:</td>
                                                              <td><?= $value2['gender'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Jabatan</td>
                                                              <td>:</td>
                                                              <td><?= $value2['jabatan'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Tugas</td>
                                                              <td>:</td>
                                                              <td><?= $value2['tugas'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Pendidikan</td>
                                                              <td>:</td>
                                                              <td> <?= $value2['pendidikan'] ?></td>
                                                            </tr>  
                                                          </table>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <?php 
                                                      endif; 
                                                      endforeach; 

                                                      if(!$exist_member) : ?>
                                                          <div class="col">
                                                            <p class='text-uppercase text-center'>Tidak ada member untuk di tampilkan.</p>
                                                          </div>
                                                    <?php endif; ?>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="avatar-group mt-2">
                                      <?php
                                        foreach($member as $key3 => $value3) :
                                        if($value['id_startup'] == $value3['startup_id']) : ?>
                                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="modal" data-bs-target="#readMemberModal2<?= $value3['id_member'] ?>">
                                        <img class="img-fluid h-100" alt="*" src="<?= site_url('assets/startup/member/').$value3['foto'] ?>">
                                      </a>
                                      <?php endif; endforeach; ?>
                                      <?php foreach($member as $key => $value3) : ?>
                                      <!-- Modal -->
                                      <div class="modal fade readMemberModal2" id="readMemberModal2<?= $value3['id_member'] ?>" tabindex="-1" role="dialog" aria-labelledby="readMemberModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                                <h6 class="text-white text-center text-capitalize ps-3">Detail Member</h6>
                                              </div>
                                            </div>
                                            <div class="modal-body mb-4">
                                            <div class="container-fluid px-2 px-md-4">
                                              <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('<?= site_url('assets/startup/profil/').$value['gambar'] ?>'); background-repeat: no-repeat; background-size: 200px 200px;">
                                                <!-- <span class="mask  bg-gradient-secondary opacity-6"></span> -->
                                              </div>
                                              <div class="card card-body mx-3 mx-md-4 mt-n6 border-1 border-gray-300">
                                                <div class="row gx-4 mb-2 justify-content-center">
                                                  <div class="col-auto">
                                                    <a href="<?= site_url('assets/startup/member/').$value3['foto'] ?>" target="_blank">
                                                    <div class="avatar avatar-xl position-relative mt-n10">
                                                        <img src="<?= site_url('assets/startup/member/').$value3['foto'] ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm img-fluid h-100 rounded-circle">
                                                      </div>
                                                    </a>
                                                  </div>
                                                </div>
                                                  <div class="row fx-4 mb-2 justify-content-center">
                                                    <div class="col-auto my-auto">
                                                      <div class="h-100">
                                                        <h5 class="mb-1 text-center">
                                                          <?= $value3['nama_member'] ?>
                                                        </h5>
                                                        <p class="mb-0 font-weight-normal text-sm text-center">
                                                          <?= $value3['jabatan'] ?>
                                                        </p>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row mt-3">
                                                    <div class="col">
                                                    <table class="mx-auto">
                                                            <tr>
                                                              <td class="w-35">NIK</td>
                                                              <td class="w-10">:</td>
                                                              <td><?= $value3['nik'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Gender</td>
                                                              <td>:</td>
                                                              <td><?= $value3['gender'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Jabatan</td>
                                                              <td>:</td>
                                                              <td><?= $value3['jabatan'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Tugas</td>
                                                              <td>:</td>
                                                              <td><?= $value3['tugas'] ?></td>
                                                            </tr>  
                                                            <tr>
                                                              <td>Pendidikan</td>
                                                              <td>:</td>
                                                              <td> <?= $value3['pendidikan'] ?></td>
                                                            </tr>  
                                                          </table>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <?php endforeach; ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php endif; endforeach; 
                              if($exist_antrian) :
                            ?>
                            <div class="row">
                              <div class="col">
                                <p class='text-uppercase text-center'>Tidak ada Antrian Coachee / Startup untuk di tampilkan.</p>
                              </div>
                            </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end modal -->
                  
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
            <span class="me-auto font-weight-bold">Coachee Approved</span>
            <small class="text-body"><?= date("d-m-Y") ?></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Coachee baru berhasil ditambahkan (akan reload dalam 3 detik...)
          </div>
        </div>
        <div class="toast fade hide p-2 bg-white border border-info" role="alert" aria-live="assertive" id="successEditToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-info me-2">
              check
            </i>
            <span class="me-auto font-weight-bold">Edit Coachee </span>
            <small class="text-body"><?= date("d-m-Y") ?></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Coachee berhasil diedit atau diupdate (akan reload dalam 3 detik...)
          </div>
        </div>
        <div class="toast fade hide p-2 bg-white border border-danger" role="alert" aria-live="assertive" id="successDeleteToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-danger me-2">
              close
            </i>
            <span class="me-auto font-weight-bold">Coachee Rejected</span>
            <small class="text-body"><?= date("d-m-Y") ?></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Coachee berhasil ditolak (akan reload dalam 3 detik...)
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
    
</body>

</html>