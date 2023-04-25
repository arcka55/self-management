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
    .nav.nav-pills-test {
        background: #f8f9fa;
        border-radius: 0.75rem;
        position: relative;
    }

    .nav.nav-pills-test .nav-link.active {
      color: #e91e63 !important;
    }

    .nav.nav-pills-test .nav-link:hover {
      color: #e91e63 !important;
    }

    .nav.nav-pills-test .nav-link.active {
    -webkit-animation: 0.2s ease;
    animation: 0.2s ease;
    }
    .nav.nav-pills-test .nav-link {
        z-index: 3;
        color: #344767;
        border-radius: 0.5rem;
        background-color: inherit;
    }
    .nav-pills-test .nav-link.active, .nav-pills .show > .nav-link {
        color: #344767;
        background-color: none;
    }
    .nav-pills-test .nav-link {
        background: none;
        border: 0;
        border-radius: 0.75rem;
    }

    
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
                <h6 class="text-white text-capitalize ps-3">Approve Zoom Request</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                <div class="table-responsive p-0">

              <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills-test me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <button class="nav-link active" id="v-pills-index-tab" data-bs-toggle="pill" data-bs-target="#v-pills-index" type="button" role="tab" aria-controls="v-pills-index" aria-selected="true">
                    <i class="fa fa-fw fa-list"></i> Index</button>
                  <button class="nav-link" id="v-pills-request-tab" data-bs-toggle="pill" data-bs-target="#v-pills-request" type="button" role="tab" aria-controls="v-pills-request" aria-selected="false"><i class="fa fa-fw fa-video"></i> Request</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                  <!-- index -->
                  <div class="tab-pane fade show active" id="v-pills-index" role="tabpanel" aria-labelledby="v-pills-index-tab">
                  <div class="row mx-3">
                      <?php
                          $i=1;
                          $data_exist = false; 
                          foreach($zoom_request as $key => $value) : 
                            if($value['status'] == 'disetujui') :
                              if($i==19){
                                break;
                              }
                              $data_exist = true;
                      ?>
                      <div class="col-md-4 mb-5">
                        <div class="card h-100 border-1" data-animation="true">
                          <div class="btn text-start mb-6 mt-2">
                            <span class="badge badge-sm badge-circle badge-danger text-success border border-gray-300 border-2">Approved</span>
                          </div>
                          <div class="card-header p-0 position-relative mt-n4 mx-4 z-index-2">
                            <a class="d-block blur-shadow-image">
                              <img src="<?= site_url('assets/template/img/products/zoom-logo2.png') ?>" alt="img-blur-shadow" class="img-fluid border-radius-lg">
                            </a>
                            <div class="colored-shadow" style="background-image: url(&quot;<?= site_url('assets/template/img/products/zoom-logo2.png') ?>&quot;);"></div>
                          </div>
                          <div class="card-body text-center">
                            <div class="d-flex mt-n6 mx-auto">
                              <div class="text-center">
                                <?php if(!empty($value['link'])) : ?>
                                <a href="<?= $value['link'] ?>" target="_blank" class="btn btn-link text-success ms-auto border-0 word-wrap word-break" onclick="return confirm('Akan ditautkan ke link zoom, anda yakin ?')">
                                  <i class="material-icons opacity-10 text-warning">link</i>
                                  https://zoom.us/...
                                </a>
                                <?php else : ?>
                                  <div class="text-center text-sm text-warning mb-3">
                                    <i class="fa fa-fw fa-info"></i>
                                    </i>Link Zoom, Menunggu persetujuan admin 
                                  </div>
                                <?php endif; ?>
                              </div>
                              <!-- Modal -->
                              <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="MessageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="card-header p-0 position-relative mt-n1 mx-3 z-index-2">
                                      <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-center text-capitalize ps-3">Kirim Pesan Penolakan</h6>
                                      </div>
                                    </div>
                                    <form action="<?= base_url("coach/status_zoom_request/$id_user/ditolak/{$value['id_startup']}/").$value['id']?>" method="post">
                                      <div class="modal-body">
                                        <div class="input-group input-group-outline mb-4">
                                          <label class="form-label">Pesan</label>
                                          <input type="text" name="message" class="form-control" required>
                                          <input type="hidden" name="nama_startup" value="<?= $value['requested_by'] ?>">
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
                            <h5 class="font-weight-normal mt-4">
                              <a><?= $value['judul_meeting'] ?></a>
                            </h5>
                            <p class="mb-0">
                              <?= $value['deskripsi'] ?>
                            </p>
                          </div>
                          <hr class="dark horizontal my-0">
                          <div class="card-footer d-flex">
                            <p class="font-weight-normal my-auto"><?= date("d-m-Y | H:i:s", strtotime($value['datetime'])) ?></p>
                            <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">person</i>
                            <a href="javascript:;" class="text-sm my-auto pe-auto" data-bs-toggle="modal" data-bs-target="#readStartupModal<?= $value['id_startup'] ?>"><span data-bs-toggle="tooltip" data-bs-placement="top" title="Requested By"><?= $value['requested_by'] ?></span></a>
                          </div>
                        </div>
                      </div>
                      <!-- modal startup -->
                      <?php 
                        foreach($startup as $key => $value2) : 
                        if($value['id_startup'] == $value2['id_startup']) :
                      ?>
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
                                        <img id="gambar_startup3" src="<?= site_url('assets/startup/profil/').$value2['gambar'] ?>" class="img-fluid" alt="">
                                        <h4 class="mt-2"><?= $value2['nama_startup'] ?></h4>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <form class="form_read" id="form_read" action="#" enctype="multipart/form-data">
                                        <ul class="list-group list-group-flush">
                                          <li class="list-group-item"><span class="fw-bold">CEO : </span><?= $value2['ceo'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Bidang : </span><?= $value2['bidang'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Alamat : </span><?= $value2['alamat'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Kontak : </span><?= $value2['kontak'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Email : </span><?= $value2['email'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Ig : </span><?= $value2['ig'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Deskripsi : </span><?= $value2['deskripsi'] ?></li>
                                        </ul>
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
                      <?php
                          endif; endforeach; 
                          $i++; endif; endforeach;
                      if(!$data_exist) : ?>
                        <div class="col text-center px-5 py-4 ms-lg-11">
                          <i style="font-size: 36px" class="material-icons text-secondary">
                            info
                          </i>
                          <p class='text-uppercase text-center mt-3'>Tidak ada Zoom Approved untuk di tampilkan.</p>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <!-- request -->
                  <div class="tab-pane fade" id="v-pills-request" role="tabpanel" aria-labelledby="v-pills-request-tab">
                    <div class="row mx-3">
                      <?php
                          $a = 0;
                          $data_exist = false; 
                          foreach($zoom_request as $key => $value) : 
                            if($value['status'] == 'diproses') :
                              
                              $data_exist = true;
                      ?>
                      <div class="col-md-4 mb-5">
                        <div class="card h-100 border-1" data-animation="true">
                        <div class="btn text-start mb-6 mt-2">
                            <span class="badge badge-sm badge-circle badge-danger text-warning border border-gray-300 border-2">Requested</span>
                          </div>
                          <div class="card-header p-0 position-relative mt-n4 mx-4 z-index-2">
                            <a class="d-block blur-shadow-image">
                              <img src="<?= site_url('assets/template/img/products/zoom-logo2.png') ?>" alt="img-blur-shadow" class="img-fluid border-radius-lg">
                            </a>
                            <div class="colored-shadow" style="background-image: url(&quot;<?= site_url('assets/template/img/products/zoom-logo2.png') ?>&quot;);"></div>
                          </div>
                          <div class="card-body text-center">
                            <div class="d-flex mt-n6 mx-auto">
                              <a href="<?= base_url("coach/status_zoom_request/$id_user/disetujui/{$value['id_startup']}/").$value['id']?>" class="btn btn-link text-success ms-auto border-0" onclick="return confirm('Approve Zoom Request ?')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Approve">
                                <i class="material-icons text-lg">check</i>
                              </a>
                              <button class="btn btn-link text-danger me-auto border-0" data-bs-toggle="modal" data-bs-target="#message_zoom_reject_modal<?= $value['id'] ?>">
                                  <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Reject">
                                  <i class="material-icons text-lg">close</i>
                                </span>
                              </button>
                              <!-- Modal -->
                              <div class="modal fade" id="message_zoom_reject_modal<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="MessageModalLabel<?= $value['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="card-header p-0 position-relative mt-n1 mx-3 z-index-2">
                                      <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-center text-capitalize ps-3">Kirim Pesan Penolakan</h6>
                                      </div>
                                    </div>
                                    <form action="<?= base_url("coach/status_zoom_request/$id_user/ditolak/{$value['id_startup']}/").$value['id']?>" method="post">
                                      <div class="modal-body">
                                        <div class="input-group input-group-outline mb-4">
                                          <label class="form-label">Pesan</label>
                                          <input type="text" name="message" class="form-control" required>
                                          <input type="hidden" name="nama_startup" value="<?= $value['requested_by'] ?>">
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
                            <h5 class="font-weight-normal mt-3">
                              <a><?= $value['judul_meeting'] ?></a>
                            </h5>
                            <p class="mb-0">
                              <?= $value['deskripsi'] ?>
                            </p>
                          </div>
                          <hr class="dark horizontal my-0">
                          <div class="card-footer d-flex">
                            <p class="font-weight-normal my-auto"><?= date("d-m-Y | H:i:s", strtotime($value['datetime'])) ?></p>
                            <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">person</i>
                            <a href="javascript:;" class="text-sm my-auto pe-auto" data-bs-toggle="modal" data-bs-target="#readStartupModal2<?= $value['id_startup'] ?>"><span data-bs-toggle="tooltip" data-bs-placement="top" title="Requested By"><?= $value['requested_by'] ?></span></a>
                          </div>
                        </div>
                      </div>
                      <!-- modal startup -->
                      <?php 
                        foreach($startup as $key => $value2) : 
                        if($value['id_startup'] == $value2['id_startup']) :
                      ?>
                      <div class="modal fade top-2" id="readStartupModal2<?= $value['id_startup'] ?>" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
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
                                        <img id="gambar_startup3" src="<?= site_url('assets/startup/profil/').$value2['gambar'] ?>" class="img-fluid" alt="">
                                        <h4 class="mt-2"><?= $value2['nama_startup'] ?></h4>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <form class="form_read" id="form_read" action="#" enctype="multipart/form-data">
                                        <ul class="list-group list-group-flush">
                                          <li class="list-group-item"><span class="fw-bold">CEO : </span><?= $value2['ceo'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Bidang : </span><?= $value2['bidang'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Alamat : </span><?= $value2['alamat'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Kontak : </span><?= $value2['kontak'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Email : </span><?= $value2['email'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Ig : </span><?= $value2['ig'] ?></li>
                                          <li class="list-group-item"><span class="fw-bold">Deskripsi : </span><?= $value2['deskripsi'] ?></li>
                                        </ul>
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
                      <?php
                         endif; endforeach; 
                         endif; endforeach;
                      if(!$data_exist) : ?>
                        <div class="col text-center px-5 py-4 ms-lg-11">
                          <i style="font-size: 36px" class="material-icons text-secondary">
                            info
                          </i>
                          <p class='text-uppercase text-center mt-3'>Tidak ada Zoom Request untuk di tampilkan.</p>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
               
              </div>
            </div>
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