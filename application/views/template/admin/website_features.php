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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
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

        .custom-file-upload3:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
        }
        
        .custom-file-upload4 {
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

        .custom-file-upload4:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
        }

        .custom-file-upload5 {
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

        .custom-file-upload5:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
        }

        .custom-file-upload6 {
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

        .custom-file-upload6:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
        }

        .custom-file-upload7 {
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

        .custom-file-upload7:hover{
          background-color: #fff !important;
          color: #4CAF50 !important;
          border: 1px solid #4CAF50 !important;
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            background-repeat: no-repeat;
            background-position: 50%;
            background-size: 100% 100%;
            background-color: #7b809a;
            border-radius: 50%;
            
        }

        .overlay {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
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
                <h6 class="text-white text-capitalize ps-3">Website Features Settings</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                <div class="row mt-3">
                    <div class="col mb-4">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill flex-column p-1" role="tablist">
                                <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#about" role="tab" aria-controls="preview" aria-selected="true">
                                    <span class="material-icons align-middle mb-1">
                                        info
                                    </span>
                                    About
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#services" role="tab" aria-controls="code" aria-selected="false">
                                    <span class="material-icons align-middle mb-1">
                                        assistant
                                    </span>
                                    Services
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#carousel" role="tab" aria-controls="code" aria-selected="false">
                                    <span class="material-icons align-middle mb-1">
                                        camera_front
                                    </span>
                                    Carousel
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#testimonial" role="tab" aria-controls="code" aria-selected="false">
                                    <span class="material-icons align-middle mb-1">
                                        face
                                    </span>
                                    Testimonial
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="code" aria-selected="false">
                                    <span class="material-icons align-middle mb-1">
                                        contacts
                                    </span>
                                    Contact
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#links" role="tab" aria-controls="code" aria-selected="false">
                                    <span class="material-icons align-middle mb-1">
                                        link
                                    </span>
                                    Links
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#partners" role="tab" aria-controls="code" aria-selected="false">
                                    <span class="material-icons align-middle mb-1">
                                        people
                                    </span>
                                    Partners
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#logo" role="tab" aria-controls="code" aria-selected="false">
                                    <span class="material-icons align-middle mb-1">
                                    style
                                    </span>
                                    Logo
                                </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <!-- about -->
                                <div class="container border border-1 mb-4">
                                    <div class="card-header my-4 p-0">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0 text-center text-secondary">Visi dan Misi (IPKB)</h6>
                                            </div>
                                            <div class="col-md-4 text-end">
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#about_visimisiModal" onclick="edit('about_visimisi', '1')">
                                                <i class="fas fa-edit text-info text-md" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                                            <div class="col-7">
                                            <h3 class="visimisi">Visi</h3>
                                            <p><?= $about_data['visi'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                            <div class="col-7">
                                            <h3 class="visimisi">Misi</h3>
                                            <p><?= nl2br($about_data['misi']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- struktur -->
                                <div class="container border border-1 mb-5">
                                    <div class="card-header my-4 p-0">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0 text-center text-secondary">Struktur Organisasi (IPKB)</h6>
                                            </div>
                                            <div class="col-md-4 text-end">
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#about_strukturModal" onclick="edit('about_struktur', '1')">
                                                <i class="fas fa-edit text-info text-md" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col px-5 pt-3 pb-5">
                                            <img src="<?= site_url('assets/admin/upload/images/about/').$about_data['struktur_organisasi'] ?>" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                                <!-- services -->
                                <div class="container border px-6 pb-6 mb-5 border-1">
                                    <div class="card-header my-4 p-0">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0 text-center text-secondary">Services (IPKB)</h6>
                                            </div>
                                            <div class="col-md-4 text-end">
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addServicesModal" onclick="add('services')">
                                                <i class="fas fa-plus text-success text-md" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Create" aria-label="Create"></i><span class="sr-only">Create</span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
                                        <?php foreach($services as $key => $value) : ?>
                                        <div class="col aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                                            <div class="card border-1 h-100">
                                                <div class="card-body text-center">
                                                    <i class="<?= $value['font'] ?> service-icon mb-3"></i>
                                                    <h5 class="card-title"><?= $value['layanan'] ?></h5>
                                                    <p class="card-text text-start"><?= $value['deskripsi_layanan'] ?></p>
                                                    <a 
                                                        class="mt-3 mb-3 ms-3 me-1" 
                                                        href="javascript:;"
                                                        data-id="<?php echo $value['id'] ?>"
                                                        data-font="<?php echo $value['font'] ?>"
                                                        data-layanan="<?php echo $value['layanan'] ?>"
                                                        data-deskripsi_layanan="<?php echo htmlentities($value['deskripsi_layanan']) ?>"
                                                        data-id_admin="<?php echo $admin['id'] ?>"
                                                        onclick="edit('services', '<?=$value['id']?>')"
                                                        data-bs-toggle="modal" data-bs-target="#editServicesModal">
                                                    <i class="text-info fas fa-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                                    </a>
                                                    <a href="javascript:;" onclick="delete_data('services', '<?= $value['id'] ?>')">
                                                        <i class="text-danger fas fa-trash text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Delete" aria-label="Delete"></i><span class="sr-only">Delete</span>
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="testimonial" role="tabpanel" aria-labelledby="testimonial-tab">
                                <!-- testimonial -->
                                <div class="container border border-1 mb-5">
                                <div class="card-header my-4 p-0">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0 text-center text-secondary">Testimonial Bisnis (IPKB)</h6>
                                        </div>
                                        <div class="col-md-4 text-end">
                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#testimonialModal" onclick="add('testimonial')">
                                            <i class="fas fa-plus-circle text-success text-secondary text-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Create" aria-label="Create"></i><span class="sr-only">Create</span>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                <section class="testi" id="testi">
                                    <div class="container">
                                    <div class="testimonial-view aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">
                                        <div class="carousel slide" id="testimonialCarousel" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <!-- Testi 1 -->
                                            <?php 
                                                $i = 0;
                                                foreach($testimonial as $key => $value) : 
                                            ?>
                                            <div class="carousel-item <?php if($i == 0) echo "active"?>">
                                                
                                            <div class="block py-4 px-4 pe-2 mb-5 border border-1">
                                                
                                                <div class="row">
                                                <div class="col-md-5">
                                                    <div class="user justify-content-center text-center">
                                                    <div class="image">
                                                        <img src="<?= site_url('assets/admin/upload/images/testimonial/').$value['foto'] ?>" class="rounded-circle" alt="testi1">
                                                    </div>
                                                    <div class="info">
                                                        <h3 class="user-name"><?= $value['nama'] ?></h3>
                                                        <h5><?= $value['profesi'] ?></h5>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="content"><?= $value['testimonial'] ?></div>
                                                </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col text-end mx-8">
                                                        <a 
                                                            class="mt-3 mb-3 ms-3 me-1" 
                                                            href="javascript:;"
                                                            data-id="<?php echo $value['id'] ?>"
                                                            data-nama="<?php echo $value['nama'] ?>"
                                                            data-profesi="<?php echo $value['profesi'] ?>"
                                                            data-testimonial="<?php echo htmlentities($value['testimonial']) ?>"
                                                            data-id_admin="<?php echo $admin['id'] ?>"
                                                            onclick="edit('testimonial', '<?=$value['id']?>')"
                                                            data-bs-toggle="modal" data-bs-target="#editTestimonialModal">
                                                        <i class="text-info fas fa-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                                        </a>
                                                        <a href="javascript:;" onclick="delete_data('testimonial', '<?= $value['id'] ?>')">
                                                            <i class="text-danger fas fa-trash text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Delete" aria-label="Delete"></i><span class="sr-only">Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <?php $i++; endforeach; ?>
                                        </div>
                                        <a href="#testimonialCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a href="#testimonialCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="background-box"></div>
                                </section>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="carousel" role="tabpanel" aria-labelledby="carousel-tab">
                                <!-- carousel -->
                                <div class="container border border-1 pb-5 mb-5">
                                <div class="card-header my-4 p-0">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0 text-center text-secondary">Carousel Timeline (IPKB)</h6>
                                        </div>
                                    </div>
                                </div>
                                <section class="carousel">
                                    <div class="container">
                                    <div id="carousel_sec" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php 
                                            $i = 0;
                                            foreach($carousel as $key => $value) : 
                                        ?>
                                        <div class="carousel-item <?php if($i == 0) echo "active"?>">
                                            <div class="overlay"></div>
                                            <img src="<?= site_url('assets/admin/upload/images/carousel/').$value['foto'] ?>" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block pb-5">
                                                <h5 class="text-warning"><?= $value['title'] ?></h5>
                                                <p><?= $value['deskripsi'] ?></p>
                                                <div class="row mt-3">
                                                    <div class="col text-center">
                                                        <a 
                                                            class="mt-3 mb-3 ms-3 me-1" 
                                                            href="javascript:;"
                                                            data-id="<?php echo $value['id'] ?>"
                                                            data-title="<?php echo $value['title'] ?>"
                                                            data-deskripsi="<?php echo $value['deskripsi'] ?>"
                                                            data-id_admin="<?php echo $admin['id'] ?>"
                                                            onclick="edit('carousel', '<?=$value['id']?>')"
                                                            data-bs-toggle="modal" data-bs-target="#editcarouselModal">
                                                        <i class="text-info fas fa-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                                        </a>
                                                        <!-- <a href="javascript:;" onclick="delete_data('carousel', '<?= $value['id'] ?>')">
                                                            <i class="text-danger fas fa-trash text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Delete" aria-label="Delete"></i><span class="sr-only">Delete</span>
                                                        </a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            $i++; endforeach; 
                                        ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel_sec" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel_sec" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    </div>
                                    </div>
                                    <div class="background-box"></div>
                                </section>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <!-- contact -->
                                <div class="container border border-1 mb-4 pb-5">
                                    <div class="card-header my-4 p-0">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0 text-center text-secondary">Contact (IPKB)</h6>
                                            </div>
                                            <div class="col-md-4 text-end">
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#contactModal" onclick="edit('contact', '1')">
                                                <i class="fas fa-edit text-info text-md" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row mb-2">
                                            <h3 class="footer-title"><?= $contact['title'] ?></h3>
                                            <ul>
                                            <li class="list-unstyled">
                                                <a href="mailto:upkb@mail.com" class="link-dark text-decoration-none"><?= $contact['email'] ?></a>
                                            </li>
                                            <li class="list-unstyled"><?= $contact['nomor_telp'] ?></li>
                                            <li class="list-unstyled"><?= $contact['alamat'] ?></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <a href="https://web.facebook.com/<?=$contact['sosmed_fb']?>" class="text-black" target="_blank"><i class="fab fa-facebook-f me-2 icon-style"></i></a>
                                            <a href="https://www.instagram.com/<?=$contact['sosmed_ig']?>" class="text-black" target="_blank"><i class="fab fa-instagram me-2 icon-style"></i></a>
                                            <a href="<?=$contact['sosmed_yt']?>" class="text-black" target="_blank"><i class="fab fa-youtube me-2 icon-style"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end contact -->
                            </div>
                            <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="contact-tab">
                                <!-- links -->
                                <div class="container border border-1 mb-4 pb-5">
                                    <div class="card-header my-4 p-0">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0 text-center text-secondary">Important Links (IPKB)</h6>
                                            </div>
                                            <div class="col-md-4 text-end">
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addLinksModal" onclick="add('links')">
                                                <i class="fas fa-plus-circle text-success text-secondary text-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Create" aria-label="Create"></i><span class="sr-only">Create</span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row mb-2">
                                            <?php foreach($links as $key => $value) : ?>
                                            <div class="col-md-12">
                                                <a target="_blank" href="<?= $value['link'] ?>"><?= $value['title_link'] ?> </a>
                                                <a 
                                                    class="mt-3 mb-3 ms-3 me-1" 
                                                    href="javascript:;"
                                                    data-id="<?php echo $value['id'] ?>"
                                                    data-link="<?php echo $value['link'] ?>"
                                                    data-title_link="<?php echo $value['title_link'] ?>"
                                                    onclick="edit('links', '<?=$value['id']?>')"
                                                    data-bs-toggle="modal" data-bs-target="#editLinksModal">
                                                <i class="text-info fas fa-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                                </a>
                                                <a href="javascript:;" onclick="delete_data('links', '<?= $value['id'] ?>')">
                                                    <i class="text-danger fas fa-trash text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Delete" aria-label="Delete"></i><span class="sr-only">Delete</span>
                                                </a>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- end links -->
                            </div>
                            <div class="tab-pane fade" id="partners" role="tabpanel" aria-labelledby="partnes-tab">
                                <!-- partners -->
                                <div class="container border border-1 mb-5">
                                    <div class="card-header my-4 p-0">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0 text-center text-secondary">Partners (IPKB)</h6>
                                            </div>
                                            <div class="col-md-4 text-end">
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addPartnersModal" onclick="add('partners')">
                                                <i class="fas fa-plus-circle text-success text-secondary text-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Create" aria-label="Create"></i><span class="sr-only">Create</span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center px-5 py-6">
                                        <?php foreach($partners as $key => $value) : ?>
                                        <div class="col-md-4 mb-5 col-sm-12 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                                        <div class="card h-100 border-1 border-secondary mb-4">
                                            <div class="card-body text-center">
                                                <img src="<?= site_url('assets/admin/upload/images/partners/').$value['logo'] ?>" class="img-fluid mb-2 mt-2" alt="unhas">
                                                <h4 class="card-title mt-2"><?= $value['nama'] ?></h4>
                                                <a 
                                                    class="mt-3 mb-3 ms-3 me-1" 
                                                    href="javascript:;"
                                                    data-id="<?php echo $value['id'] ?>"
                                                    data-nama="<?php echo $value['nama'] ?>"
                                                    data-logo="<?php echo $value['logo'] ?>"
                                                    data-id_admin="<?php echo $admin['id'] ?>"
                                                    onclick="edit('partners', '<?=$value['id']?>')"
                                                    data-bs-toggle="modal" data-bs-target="#editPartnersModal">
                                                <i class="text-info fas fa-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                                </a>
                                                <a href="javascript:;" onclick="delete_data('partners', '<?= $value['id'] ?>')">
                                                    <i class="text-danger fas fa-trash text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Delete" aria-label="Delete"></i><span class="sr-only">Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="partnes-tab">
                                <!-- logo -->
                                <div class="container border border-1 mb-5">
                                    <div class="card-header my-4 p-0">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0 text-center text-secondary">Logo (IPKB)</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center px-5 py-6">
                                        <div class="col-md-4 mb-5 col-sm-12 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                                            <div class="card h-100 border-1 border-secondary mb-4">
                                                <div class="card-body text-center">
                                                    <img src="<?= site_url('assets/admin/upload/images/logo/').$logo['logo'] ?>" class="img-fluid mb-2 mt-2" alt="unhas">
                                                    <a 
                                                        class="mt-3 mb-3 ms-3 me-1" 
                                                        href="javascript:;"
                                                        data-id="<?php echo $logo['id'] ?>"
                                                        data-logo="<?php echo $logo['logo'] ?>"
                                                        data-id_admin="<?php echo $admin['id'] ?>"
                                                        onclick="edit('logo', '<?=$logo['id']?>')"
                                                        data-bs-toggle="modal" data-bs-target="#editLogoModal">
                                                    <i class="text-info fas fa-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit" aria-label="Edit"></i><span class="sr-only">Edit</span>
                                                    </a>
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
    <!-- modal about_visimisi -->
    <div class="modal webFeatures fade top-2" id="about_visimisiModal" tabindex="-1" role="dialog" aria-labelledby="about_visimisiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Visi dan Misi <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm" id="form_edit_visimisi" action="#" enctype="multipart/form-data">
                      <div class="form-group mt-3">
                        <label class="">Visi</label>
                        <div class="input-group input-group-dynamic mb-4">
                            <textarea class="form-control" rows="5" name="visi" placeholder="Masukkan Visi IPKB.." spellcheck="false"><?= $about_data['visi'] ?></textarea>
                        </div>
                        <div id="visiHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-group">
                        <label class="">Misi</label>
                        <div class="input-group input-group-dynamic mb-4">
                            <textarea class="form-control" rows="12" name="misi" placeholder="Masukkan Misi IPKB.." spellcheck="false"><?= $about_data['misi'] ?></textarea>
                            <input type="hidden" value="<?= $about_data['id'] ?>" name="id"/>
                        </div>
                        <div id="misiHelp" class="help-block form-text mt-n2"></div>
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal about_visimisi -->
    <!-- modal struktur -->
    <div class="modal webFeatures fade top-2" id="about_strukturModal" tabindex="-1" role="dialog" aria-labelledby="about_strukturModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Struktur Organisisasi <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm py-3" id="form_edit_struktur" action="#" enctype="multipart/form-data">
                      <label class="">Upload Struktur Organisasi</label>
                      <div class="form-group mt-1">
                        <div class="input-group input-group-outline">
                          <label for="file-upload" class="custom-file-upload" id="custom-file-upload">
                          <i class="fa fa-cloud-upload"></i> Upload
                          </label>
                          <span id="file-selected" class="d-inline-block mt-2"></span>
                          <input id="file-upload" name="struktur_organisasi" type="file"/>
                          <input type="hidden" value="<?= $about_data['id'] ?>" name="id"/>
                          <input type="hidden" value="<?= $admin['id'] ?>" name="id_admin"/>
                        </div>  
                        <div id="judulMateriHelp" class="help-block form-text mt-n2"></div>
                      </div>
                      <div class="form-text text-xs mb-6" style="width: 400px">( *File Max Size 10 MB | Max Dimensi (W x H): 4000 x 4000 | File Support: .jpg .jpeg .png )</div> 
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal struktur -->
    <!-- modal add testimonial -->
    <div class="modal fade top-2" id="testimonialModal" tabindex="-1" role="dialog" aria-labelledby="testimonialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Testimonial <span class="fa fa-fw fa-plus"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_add" id="form_add_testimonial" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                          <div class="input-group input-group-outline">
                              <label class="form-label">Nama</label>
                              <input type="text" name="nama" class="form-control" required>
                              <input type="hidden" name="id_admin" value="<?= $admin['id'] ?>">
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-outline">
                              <label class="form-label">Profesi</label>
                              <input type="text" name="profesi" class="form-control" required>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <label class="">Testimonial</label>
                        <div class="input-group input-group-dynamic">
                            <textarea class="form-control" rows="5" name="testimonial" placeholder="Masukkan Testimonial.." spellcheck="false"></textarea>
                        </div>
                        <div id="visiHelp" class="help-block form-text mt-2"></div>
                      </div>
                      <label class="">Upload Foto</label>
                      <div class="form-group mt-1">
                        <div class="input-group input-group-outline">
                          <label for="file-upload2" class="custom-file-upload2" id="custom-file-upload2">
                          <i class="fa fa-cloud-upload"></i> Upload
                          </label>
                          <span id="file-selected2" class="d-inline-block mt-2"></span>
                          <input id="file-upload2" name="foto" type="file"/>
                        </div>  
                        <div id="judulMateriHelp" class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-text text-xs mb-6" style="width: 400px">( *File Max Size 3 MB | Max Dimensi (W x H): 3000 x 3000 | File Support: .jpg .jpeg .png )</div> 
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
    <!-- end modal add testimonial -->
    <!-- modal edit testimonial -->
    <div class="modal webFeatures fade top-2" id="editTestimonialModal" tabindex="-1" role="dialog" aria-labelledby="editTestimonialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Testimonial <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm2" id="form_edit_testimonial" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Nama</label>
                              <input type="text" name="nama" id="nama2" class="form-control" placeholder="Masukkan Nama Testimonial" required>
                              <input type="hidden" name="id" id="id2" >
                              <input type="hidden" name="id_admin" id="id_admin2">
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Profesi</label>
                              <input type="text" name="profesi" id="profesi2" class="form-control" placeholder="Masukkan Profesi Testimonial" required>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <label class="">Testimonial</label>
                        <div class="input-group input-group-dynamic">
                            <textarea class="form-control" rows="5" name="testimonial" id="testimonial2" placeholder="Masukkan Testimonial.." spellcheck="false"></textarea>
                        </div>
                        <div id="visiHelp" class="help-block form-text mt-2"></div>
                      </div>
                      <label class="">Change Foto</label>
                      <div class="form-group mt-1">
                        <div class="input-group input-group-outline">
                          <label for="file-upload3" class="custom-file-upload3" id="custom-file-upload3">
                          <i class="fa fa-cloud-upload"></i> Upload
                          </label>
                          <span id="file-selected3" class="file-selected3" class="d-inline-block mt-2"></span>
                          <input id="file-upload3" class="file-upload3" name="foto" type="file"/>
                        </div>  
                        <div id="judulMateriHelp" class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-text text-xs mb-6" style="width: 400px">( *File Max Size 3 MB | Max Dimensi (W x H): 3000 x 3000 | File Support: .jpg .jpeg .png )</div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit testimonial -->
    <!-- modal contact -->
    <div class="modal webFeatures fade top-2" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Contact <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm3" id="form_edit_contact" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">title</label>
                              <input type="text" name="title" value="<?= $contact['title'] ?>" class="form-control" placeholder="Masukkan Titile Contact.." required>
                              <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Email</label>
                              <input type="text" name="email" value="<?= $contact['email'] ?>" class="form-control" placeholder="Masukkan Email.." <?= $contact['email'] ?> required>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <label class="">Alamat</label>
                        <div class="input-group input-group-dynamic">
                            <textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="Masukkan alamat.." spellcheck="false"><?= $contact['alamat'] ?></textarea>
                        </div>
                        <div id="visiHelp" class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Nomor Telp</label>
                              <input type="text" name="nomor_telp" placeholder="Masukkan Nomor Telp.." class="form-control" value="<?= $contact['nomor_telp'] ?>" required>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Facebook</label>
                              <input type="text" name="sosmed_fb" class="form-control" placeholder="Masukkan akun facebook.." value="<?= $contact['sosmed_fb'] ?>" required>
                              <div class="form-text text-xs">Contoh: genkaku55</div>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Instagram</label>
                              <input type="text" name="sosmed_ig" class="form-control" placeholder="Masukkan akun instagram.." value="<?= $contact['sosmed_ig'] ?>" required>
                              <div class="form-text text-xs">Contoh: genkaku55</div>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Youtube</label>
                              <input type="text" name="sosmed_yt" class="form-control" placeholder="Masukkan link URL akun youtube.." value="<?= $contact['sosmed_yt'] ?>" required>
                              <div class="form-text text-xs">Contoh: https://www.youtube.com/c/UniversitasHasanuddin</div>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                     
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal contact -->
    <!-- modal add services -->
    <div class="modal fade top-2" id="addServicesModal" tabindex="-1" role="dialog" aria-labelledby="addServicesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Services <span class="fa fa-fw fa-plus"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_add" id="form_add_services" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                          <div class="input-group input-group-outline">
                              <label class="form-label">Font</label>
                              <input type="text" name="font" class="form-control" required>
                              <div class="form-text text-xs">Contoh: 'fa-solid fa-desktop' | untuk List font kunjungi font awesome : https://fontawesome.com/icons</div>
                              <!-- <input type="hidden" name="id_admin"> -->
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-outline">
                              <label class="form-label">Layanan</label>
                              <input type="text" name="layanan" class="form-control" required>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <label class="">Deskripsi Layanan</label>
                        <div class="input-group input-group-dynamic">
                            <textarea class="form-control" rows="5" name="deskripsi_layanan" placeholder="Masukkan deskripsi layanan.." spellcheck="false"></textarea>
                        </div>
                        <div id="visiHelp" class="help-block form-text mt-2"></div>
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
    <!-- end modal add services -->
    <!-- modal edit services -->
    <div class="modal webFeatures fade top-2" id="editServicesModal" tabindex="-1" role="dialog" aria-labelledby="editServicesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Services <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm4" id="form_edit_services" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Font</label>
                              <input type="text" name="font" id="font2" class="form-control" required>
                              <div class="form-text text-xs">Contoh: 'fa-solid fa-desktop' | untuk List font kunjungi font awesome : https://fontawesome.com/icons</div>
                              <input type="hidden" id="id2" name="id">
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Layanan</label>
                              <input type="text" name="layanan" id="layanan2" class="form-control" required>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <label class="">Deskripsi Layanan</label>
                        <div class="input-group input-group-dynamic">
                            <textarea class="form-control" rows="5" id="deskripsi_layanan2" name="deskripsi_layanan" placeholder="Masukkan deskripsi layanan.." spellcheck="false"></textarea>
                        </div>
                        <div id="visiHelp" class="help-block form-text mt-2"></div>
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit services -->
    <!-- modal add partners -->
    <div class="modal fade top-2" id="addPartnersModal" tabindex="-1" role="dialog" aria-labelledby="addPartnersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Partners <span class="fa fa-fw fa-plus"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_add" id="form_add_partners" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                          <div class="input-group input-group-outline">
                              <label class="form-label">Nama</label>
                              <input type="text" name="nama" class="form-control" required>
                              <input type="hidden" name="id_admin" value="<?= $admin['id'] ?>">
                              <!-- <div class="form-text text-xs">Contoh: 'fa-solid fa-desktop' | untuk List font kunjungi font awesome : https://fontawesome.com/icons</div> -->
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <label class="">Change Logo</label>
                      <div class="form-group mt-1">
                        <div class="input-group input-group-outline">
                          <label for="file-upload4" class="custom-file-upload4" id="custom-file-upload4">
                          <i class="fa fa-cloud-upload"></i> Upload
                          </label>
                          <span id="file-selected4" class="file-selected4" class="d-inline-block mt-2"></span>
                          <input id="file-upload4" class="file-upload4" name="logo" type="file"/>
                        </div>  
                        <div id="logoHelp" class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-text text-xs mb-6" style="width: 400px">( *File Max Size 3 MB | Max Dimensi (W x H): 3000 x 3000 | File Support: .jpg .jpeg .png )</div> 
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
    <!-- end modal add services -->
    <!-- modal edit partners -->
    <div class="modal webFeatures fade top-2" id="editPartnersModal" tabindex="-1" role="dialog" aria-labelledby="editPartnersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Partners <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm5" id="form_edit_partners" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Nama</label>
                              <input type="text" name="nama" id="nama5" class="form-control" required>
                              <input type="hidden" name="id" id="id5">
                              <input type="hidden" name="id_admin" id="id_admin5">
                              <!-- <div class="form-text text-xs">Contoh: 'fa-solid fa-desktop' | untuk List font kunjungi font awesome : https://fontawesome.com/icons</div> -->
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <label class="">Change Logo</label>
                      <div class="form-group mt-1">
                        <div class="input-group input-group-outline">
                          <label for="file-upload5" class="custom-file-upload5" id="custom-file-upload5">
                          <i class="fa fa-cloud-upload"></i> Upload
                          </label>
                          <span id="file-selected5" class="file-selected5" class="d-inline-block mt-2"></span>
                          <input id="file-upload5" class="file-upload5" name="logo" type="file"/>
                        </div>  
                        <div id="logoHelp" class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-text text-xs mb-6" style="width: 400px">( *File Max Size 3 MB | Max Dimensi (W x H): 3000 x 3000 | File Support: .jpg .jpeg .png )</div> 
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit partners -->
    <!-- modal edit carousel -->
    <div class="modal webFeatures fade top-2" id="editcarouselModal" tabindex="-1" role="dialog" aria-labelledby="editcarouselModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Carousel <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm6" id="form_edit_carousel" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                          <div class="input-group input-group-static">
                              <label class="">Title</label>
                              <input type="text" name="title" id="title6" class="form-control" placeholder="Masukkan Title.." required>
                              <input type="hidden" name="id" id="id6">
                              <input type="hidden" name="id_admin" id="id_admin6">
                              <!-- <div class="form-text text-xs">Contoh: 'fa-solid fa-desktop' | untuk List font kunjungi font awesome : https://fontawesome.com/icons</div> -->
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                        <label class="">Deskripsi</label>
                        <div class="input-group input-group-dynamic">
                            <textarea class="form-control" rows="5" id="deskripsi6" name="deskripsi" placeholder="Masukkan deskripsi .." spellcheck="false"></textarea>
                        </div>
                        <div id="visiHelp" class="help-block form-text mt-2"></div>
                      </div>
                      <label class="">Change Carousel Foto</label>
                      <div class="form-group mt-1">
                        <div class="input-group input-group-outline">
                          <label for="file-upload6" class="custom-file-upload6" id="custom-file-upload6">
                          <i class="fa fa-cloud-upload"></i> Upload
                          </label>
                          <span id="file-selected6" class="file-selected6" class="d-inline-block mt-2"></span>
                          <input id="file-upload6" class="file-upload6" name="foto" type="file"/>
                        </div>  
                        <div id="foto6Help" class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-text text-xs mb-6" style="width: 400px">( *File Max Size 3 MB | Max Dimensi (W x H): 3000 x 3000 | File Support: .jpg .jpeg .png )</div> 
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit carousel -->
    <!-- modal edit logo -->
    <div class="modal webFeatures fade top-2" id="editLogoModal" tabindex="-1" role="dialog" aria-labelledby="editLogoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Logo <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm7" id="form_edit_logo" action="#" enctype="multipart/form-data">
                      <label class="">Change Logo</label>
                      <div class="form-group mt-1">
                        <div class="input-group input-group-outline">
                          <label for="file-upload7" class="custom-file-upload7" id="custom-file-upload7">
                          <i class="fa fa-cloud-upload"></i> Upload
                          </label>
                          <span id="file-selected7" class="file-selected7" class="d-inline-block mt-2"></span>
                          <input id="file-upload7" class="file-upload7" name="logo" type="file"/>
                          <input type="hidden" name="id" value="<?= $logo['id'] ?>" id="id7">
                          <input type="hidden" name="id_admin" value="<?= $admin['id'] ?>" id="id_admin7">
                        </div>  
                        <div id="logoHelp" class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-text text-xs mb-6" style="width: 400px">( *File Max Size 3 MB | Max Dimensi (W x H): 3000 x 3000 | File Support: .jpg .jpeg .png )</div> 
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit logo -->
    <!-- modal add links -->
    <div class="modal fade top-2" id="addLinksModal" tabindex="-1" role="dialog" aria-labelledby="addLinksModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Links <span class="fa fa-fw fa-plus"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_add" id="form_add_links" action="#" enctype="multipart/form-data">
                      <div class="form-group mb-4">
                          <div class="input-group input-group-outline">
                              <label class="form-label">Title Link</label>
                              <input type="text" name="title_link" id="title_link" class="form-control" required>
                          </div>
                          <div class="help-block form-text mt-2"></div>
                      </div>
                      <div class="form-group mb-4">
                          <div class="input-group input-group-outline">
                              <label class="form-label">Link</label>
                              <input type="text" name="link" id="link" class="form-control" required>
                          </div>
                          <div class="help-block form-text mt-2"></div>
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
    <!-- end modal add services -->
    <!-- modal edit Links -->
    <div class="modal webFeatures fade top-2" id="editLinksModal" tabindex="-1" role="dialog" aria-labelledby="editLinksModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-center text-capitalize ps-3">Links <span class="fa fa-fw fa-pencil"></span></h6>
                  </div>
                </div>
                <div class="modal-body form">
                  <form class="form_edit resetForm8" id="form_edit_links" action="#" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <div class="input-group input-group-static">
                            <label class="">Title Link</label>
                            <input type="text" name="title_link" id="title_link2" class="form-control" required>
                            <input type="hidden" name="id" id="id2">
                        </div>
                        <div class="help-block form-text mt-2"></div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group input-group-static">
                            <label class="">Link</label>
                            <input type="text" name="link" id="link2" class="form-control" required>
                        </div>
                        <div class="help-block form-text mt-2"></div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</i></button>
                    <button type="button" id="btnSave" class="btnSave btn bg-gradient-primary" onclick="save()">Save</i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit partners -->
    
</body>

</html>