  <!-- Modal Logout-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Logout</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Anda yaking ingin Keluar dari portal ini ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
            <a type="button" class="btn bg-gradient-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
  <?php
    $active_controller = $this->router->fetch_class();
    $active_method = $this->router->fetch_method();
  ?>
  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="<?= site_url('assets/template/js/core/popper.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/plugins/chartjs.min.js') ?>"></script>
  <script src="<?= site_url('assets/template/js/plugins/moment.min.js') ?>"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= site_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
  <script src="<?= site_url('assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')?>"></script>
  <script src="<?= site_url('assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.fr.js')?>"></script>
  <!-- <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.js');?>"></script> -->
    <script src="<?php echo base_url('assets/template/js/core/bootstrap.bundle.min.js');?>"></script>
    <!-- <script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script> -->
    <script src="<?php echo base_url('assets/plugin-berita/modules/ckeditor/ckeditor.js');?>"></script>
    <!-- <script src="modules/ckeditor/ckeditor.js"></script> -->
 
  <!-- script for materi -->
  <script>
    
    var save_method; //for save method string
    var table;
    var active;
    var active_method = "<?=$active_method?>";
    var editModalId;

    let $old_value;

    $(document).ready(function() {

      $("#role_id").change(function () {
          var val = $(this).val();
          if(val === "1"){
            $('#labelNama').text("Nama Admin");
            $('#fieldNama').show();

            // $('#nama').attr("placeholder", "Masukkan Nama Admin...");
          }else if(val === "2"){
            $('#labelNama').text("Nama Coach");
            $('#fieldNama').show();
            // $('#nama').attr("placeholder", "Masukkan Nama Coach...");
          }else if(val === "3"){
            $('#labelNama').text("Nama Startup");
            $('#fieldNama').show();
            // $('#nama').attr("placeholder", "Masukkan Nama Startup...");
          }else{
            $('#fieldNama').hide();
          }
      });

      if ( $('#checkOther').is(":checked") ) {
        $('#checkOtherField').show();

      } else {
          $('#checkOtherField').hide();
      }

      $('#openBtn').click(() => $('#myModal').modal({
        show: true
      }));

      $(document).on('show.bs.modal', '.modal', function() {
        const zIndex = 1040 + 10 * $('.modal:visible').length;
        $(this).css('z-index', zIndex);
        setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack'));
      });

      $('.btnEditBerita').click(function() {
          
        $('#contentBtnTambahBerita').hide();
        $('#form-tambah-berita').hide();
        $('#data-table').hide();
        $('#edit-form-tambah-berita').show();
        
          return false;
      });

      // Untuk sunting
      // $('#edit').on('show.bs.modal', function (event) {
      //       var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
      //       var modal          = $(this)

      //       // Isi nilai pada field
      //       modal.find('#title').attr("value",div.data('title'));
      //       modal.find('#category').attr("value",div.data('category'));
      //       modal.find('#ckeditor2').html(div.data('post'));
      //       modal.find('#file-upload').attr("value",div.data('picture'));
      //       modal.find('#file-selected2').html(div.data('picture'));
      //       modal.find('#datetime_created').attr("value",div.data('datetime_created'));
      //       modal.find('#idAdmin').attr("value",div.data('id_admin'));
            
      //   });
        
      $('#readModal').on('show.bs.modal', function (event) {
            // for (instance in CKEDITOR.instances) {
            //   CKEDITOR.instances[instance].updateElement();
            // }
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            if(active_method == "berita") {

              CKEDITOR.instances["ckeditor3"].setData(div.data('post'));
              
              // Isi nilai pada field
              // $('#id').attr('src', 'newImage.jpg');
              modal.find('#link-file-upload3').attr("href","<?= site_url('assets/admin/upload/images/berita/') ?>"+div.data('picture'));
              modal.find('#file-upload3').attr("src","<?= site_url('assets/admin/upload/images/berita/') ?>"+div.data('picture'));
              modal.find('#idBerita3').html(div.data('id'));
              modal.find('#title3').html(div.data('title'));
              modal.find('#category3').html(div.data('category'));
              modal.find('#ckeditor3').html(div.data('post'));
              modal.find('#nama3').html(div.data('nama'));
              // modal.find('#file-upload').attr("value",div.data('picture'));
            
              // convert date format
              var datetime_created = moment(div.data('datetime_created')).format("DD-MM-YYYY HH:mm:ss");
              modal.find('#datetime_created3').html(datetime_created);
              modal.find('#idAdmin3').html(div.data('id_admin'));
              
            }else if(active_method == "coaching") {
              modal.find('#nama_startup3').html(div.data('nama_startup'));
              modal.find('#judul3').html(div.data('judul'));
              modal.find('#idLaporan3').html(div.data('id'));
              modal.find('#waktu3').html(div.data('waktu'));
              modal.find('#deskripsi3').html(div.data('deskripsi'));
              modal.find('#kontak3').html(div.data('kontak'));
              modal.find('#email3').html(div.data('email'));
              if(!div.data('file')) {
                modal.find('#lampiran_message3').html(`(*Tidak Ada Lampiran File.)`);
                modal.find('#lampiran_file3').addClass('disabled');
                modal.find('#lampiran_gambar3').addClass('link-opacity');
                console.log(div.data('file'));
              }else {
                // modal.find('#lampiran_file3').addClass('disabled');
                modal.find('#lampiran_message3').html(`(*Klik file icon disamping untuk mendownload file)`);
                modal.find('#lampiran_file3').removeClass('disabled');
                modal.find('#lampiran_file3').attr("href", "<?= site_url('assets/startup/report/') ?>"+div.data('file'));
                modal.find('#lampiran_gambar3').removeClass('link-opacity');

              }
              modal.find('#gambar_startup3').attr("src","<?= site_url('assets/startup/profil/') ?>"+div.data('gambar'));
              // modal.find('#file-upload3').attr("src","<?= site_url('upload/') ?>"+div.data('picture'));
              // modal.find('#idBerita3').html(div.data('id'));
              // modal.find('#title3').html(div.data('title'));
              // modal.find('#category3').html(div.data('category'));
              // modal.find('#ckeditor3').html(div.data('post'));
              // modal.find('#nama3').html(div.data('nama'));
            }
            
            
      });

      $('#editModal').on('show.bs.modal', function (event) {
            // for (instance in CKEDITOR.instances) {
            //   CKEDITOR.instances[instance].updateElement();
            // }
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            if(active_method == "user") {

              modal.find('#username2').attr("value",div.data('username'));
              modal.find('#email2').attr("value",div.data('user_email'));
              modal.find('#password2').attr("value",div.data('password'));
              modal.find('#role_id2').attr("value",div.data('role_id'));
              modal.find('#id_user2').attr("value",div.data('id'));
              
            }else if(active_method == "coaching") {
              modal.find('#nama_startup3').html(div.data('nama_startup'));
              modal.find('#judul3').html(div.data('judul'));
              modal.find('#idLaporan3').html(div.data('id'));
              modal.find('#waktu3').html(div.data('waktu'));
              modal.find('#deskripsi3').html(div.data('deskripsi'));
              modal.find('#kontak3').html(div.data('kontak'));
              modal.find('#email3').html(div.data('email'));
              if(!div.data('file')) {
                modal.find('#lampiran_message3').html(`(*Tidak Ada Lampiran File.)`);
                modal.find('#lampiran_file3').addClass('disabled');
                modal.find('#lampiran_gambar3').addClass('link-opacity');
                console.log(div.data('file'));
              }else {
                // modal.find('#lampiran_file3').addClass('disabled');
                modal.find('#lampiran_message3').html(`(*Klik file icon disamping untuk mendownload file)`);
                modal.find('#lampiran_file3').removeClass('disabled');
                modal.find('#lampiran_gambar3').removeClass('link-opacity');

              }
              modal.find('#gambar_startup3').attr("src","<?= site_url('assets/startup/profil/') ?>"+div.data('gambar'));
              // modal.find('#file-upload3').attr("src","<?= site_url('upload/') ?>"+div.data('picture'));
              // modal.find('#idBerita3').html(div.data('id'));
              // modal.find('#title3').html(div.data('title'));
              // modal.find('#category3').html(div.data('category'));
              // modal.find('#ckeditor3').html(div.data('post'));
              // modal.find('#nama3').html(div.data('nama'));
            }
            
            
        });

      $('#editTestimonialModal').on('show.bs.modal', function (event) {
            // for (instance in CKEDITOR.instances) {
            //   CKEDITOR.instances[instance].updateElement();
            // }
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

              modal.find('#id2').attr("value",div.data('id'));
              modal.find('#id_admin2').attr("value",div.data('id_admin'));
              modal.find('#nama2').attr("value",div.data('nama'));
              modal.find('#profesi2').attr("value",div.data('profesi'));
              modal.find('#testimonial2').html(div.data('testimonial'));

            
        });

      $('#editServicesModal').on('show.bs.modal', function (event) {
            // for (instance in CKEDITOR.instances) {
            //   CKEDITOR.instances[instance].updateElement();
            // }
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

              modal.find('#id2').attr("value",div.data('id'));
              modal.find('#id_admin2').attr("value",div.data('id_admin'));
              modal.find('#font2').attr("value",div.data('font'));
              modal.find('#layanan2').attr("value",div.data('layanan'));
              modal.find('#deskripsi_layanan2').html(div.data('deskripsi_layanan'));

            
        });

      $('#editPartnersModal').on('show.bs.modal', function (event) {
            // for (instance in CKEDITOR.instances) {
            //   CKEDITOR.instances[instance].updateElement();
            // }
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

              modal.find('#id5').attr("value",div.data('id'));
              modal.find('#id_admin5').attr("value",div.data('id_admin'));
              modal.find('#nama5').attr("value",div.data('nama'));

            
        });

      $('#editcarouselModal').on('show.bs.modal', function (event) {
            // for (instance in CKEDITOR.instances) {
            //   CKEDITOR.instances[instance].updateElement();
            // }
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

              modal.find('#id6').attr("value",div.data('id'));
              modal.find('#id_admin6').attr("value",div.data('id_admin'));
              modal.find('#title6').attr("value",div.data('title'));
              modal.find('#deskripsi6').html(div.data('deskripsi'));
            
        });

      $('#editZoomRequestModal').on('show.bs.modal', function (event) {
            // for (instance in CKEDITOR.instances) {
            //   CKEDITOR.instances[instance].updateElement();
            // }
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

              modal.find('#id2').attr("value",div.data('id'));
              modal.find('#link2').attr("value",div.data('link'));
            
        });

      $('#editMateriModal').on('show.bs.modal', function (event) {
            // for (instance in CKEDITOR.instances) {
            //   CKEDITOR.instances[instance].updateElement();
            // }
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

              modal.find('#id2').attr("value",div.data('id'));
              modal.find('#judulMateri2').attr("value",div.data('judul_materi'));
            
      });

      $('#editLinksModal').on('show.bs.modal', function (event) {
            // for (instance in CKEDITOR.instances) {
            //   CKEDITOR.instances[instance].updateElement();
            // }
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

              modal.find('#id2').attr("value",div.data('id'));
              modal.find('#title_link2').attr("value",div.data('title_link'));
              modal.find('#link2').attr("value",div.data('link'));
            
      });
        
        // reset form edit website features
        $('.webFeatures').on('hidden.bs.modal', function () {
          // location.reload();
          $('.resetForm')[0].reset();
          $('.resetForm2')[0].reset();
          $('.resetForm3')[0].reset();
          $('.resetForm4')[0].reset();
          $('.resetForm5')[0].reset();
          $('.resetForm6')[0].reset();
          $('.resetForm7')[0].reset();
          $('.resetForm8')[0].reset();
        });

        // reset form edit user
        $('#editModal').on('hidden.bs.modal', function () {
          // location.reload();
          $('.resetForm')[0].reset();
        });

        // reset form edit zoom request
        $('#editZoomRequestModal').on('hidden.bs.modal', function () {
          // location.reload();
          $('.resetForm')[0].reset();
        });

        // reset form edit jadwal
        $('.editJadwal').on('hidden.bs.modal', function () {
          location.reload();
          // $('.resetForm')[0].reset();
        });

        // reset form edit materi
        $('#editMateriModal').on('hidden.bs.modal', function () {
          // location.reload();
          $('.resetForm')[0].reset();

          $('#custom-file-upload2').css({
              'background-color': '#4CAF50',
              'color': '#fff',
              'border': '1px solid #4CAF50'
          }),
          
          $('#file-selected2').html('');
        });

      //  reset warna jika tekan refresh
      $('#refresh').click(function() {
          $('#custom-file-upload').css({
              'background-color': '#4CAF50',
              'color': '#fff',
              'border': '1px solid #4CAF50'
          }),

          $('#file-selected').html('');
          $('#file-selected2').html('');
      });

      $('#openAddCoacheeModal').click(function() {
        // $('#addCoacheeMessage').modal('hide');
        // $('#addCoachee').modal('show'); 
        // $('body').removeClass('modal-open');
        //   $('.modal-backdrop').remove();
        // $('#addCoachee').modal('show');
      });

      
      $('#file-upload').bind('change', function() { 
          
          // menghilangkan fakepath
          var fileName = ''; 
          fileName = $(this).val().replace(/^C:\\fakepath\\/, "");
          $('#file-selected').html(fileName);

          if(fileName == '') {
            $('#custom-file-upload').css({
              'background-color': '#4CAF50',
              'color': '#fff',
              'border': '1px solid #4CAF50'
            });
          } else {
            $('#custom-file-upload').css({
              'background-color': '#fff',
              'color': '#4CAF50',
              'border': '1px solid #4CAF50'
            });
          }
      });

      // button upload (eddit)
      $('#file-upload2').bind('change', function() { 
          var fileName = ''; 
          fileName = $(this).val().replace(/^C:\\fakepath\\/, "");
          $('#file-selected2').html(fileName);

          if(fileName == '') {
            $('#custom-file-upload2').css({
              'background-color': '#4CAF50',
              'color': '#fff',
              'border': '1px solid #4CAF50'
            });
          } else {
            $('#custom-file-upload2').css({
              'background-color': '#fff',
              'color': '#4CAF50',
              'border': '1px solid #4CAF50'
            });
          }
      });

      // button upload (eddit)
      $('.file-upload3').bind('change', function() { 
          var fileName = ''; 
          fileName = $(this).val().replace(/^C:\\fakepath\\/, "");
          $('.file-selected3').html(fileName);

          if(fileName == '') {
            $('.custom-file-upload3').css({
              'background-color': '#4CAF50',
              'color': '#fff',
              'border': '1px solid #4CAF50'
            });
          } else {
            $('.custom-file-upload3').css({
              'background-color': '#fff',
              'color': '#4CAF50',
              'border': '1px solid #4CAF50'
            });
          }
      });

      // button upload (eddit)
      $('#file-upload4').bind('change', function() { 
          var fileName = ''; 
          fileName = $(this).val().replace(/^C:\\fakepath\\/, "");
          $('#file-selected4').html(fileName);

          if(fileName == '') {
            $('#custom-file-upload4').css({
              'background-color': '#4CAF50',
              'color': '#fff',
              'border': '1px solid #4CAF50'
            });
          } else {
            $('#custom-file-upload4').css({
              'background-color': '#fff',
              'color': '#4CAF50',
              'border': '1px solid #4CAF50'
            });
          }
      });

      // button upload (eddit)
      $('#file-upload5').bind('change', function() { 
          var fileName = ''; 
          fileName = $(this).val().replace(/^C:\\fakepath\\/, "");
          $('#file-selected5').html(fileName);

          if(fileName == '') {
            $('#custom-file-upload5').css({
              'background-color': '#4CAF50',
              'color': '#fff',
              'border': '1px solid #4CAF50'
            });
          } else {
            $('#custom-file-upload5').css({
              'background-color': '#fff',
              'color': '#4CAF50',
              'border': '1px solid #4CAF50'
            });
          }
      });

      // button upload (eddit)
      $('#file-upload6').bind('change', function() { 
          var fileName = ''; 
          fileName = $(this).val().replace(/^C:\\fakepath\\/, "");
          $('#file-selected6').html(fileName);

          if(fileName == '') {
            $('#custom-file-upload6').css({
              'background-color': '#4CAF50',
              'color': '#fff',
              'border': '1px solid #4CAF50'
            });
          } else {
            $('#custom-file-upload6').css({
              'background-color': '#fff',
              'color': '#4CAF50',
              'border': '1px solid #4CAF50'
            });
          }
      });
      // button upload (eddit)
      $('#file-upload7').bind('change', function() { 
          var fileName = ''; 
          fileName = $(this).val().replace(/^C:\\fakepath\\/, "");
          $('#file-selected7').html(fileName);

          if(fileName == '') {
            $('#custom-file-upload7').css({
              'background-color': '#4CAF50',
              'color': '#fff',
              'border': '1px solid #4CAF50'
            });
          } else {
            $('#custom-file-upload7').css({
              'background-color': '#fff',
              'color': '#4CAF50',
              'border': '1px solid #4CAF50'
            });
          }
      });

      // button upload(EDIT)

      table = $('#tabel').DataTable({
          language: {
            paginate: {
              next: '&#8594;', // or '→'
              previous: '&#8592;' // or '←' 
            }
          },
          "scrollX": true,
          aLengthMenu: [
              [5, 10, 25, 50, -1],
              [5, 10, 25, 50, "All"]
          ],
          iDisplayLength: -1
        });
      
        table2 = $('#tabel2').DataTable({
          language: {
            paginate: {
              next: '&#8594;', // or '→'
              previous: '&#8592;' // or '←' 
            }
          },
          "scrollX": true,
          aLengthMenu: [
              [5, 10, 25, 50, -1],
              [5, 10, 25, 50, "All"]
          ],
          iDisplayLength: 10
        });

      //datepicker
      $('.timepicker').datetimepicker({
        pickDate: false,
        minuteStep: 15,
        pickerPosition: 'bottom-right',
        format: 'hh:ii',
        autoclose: true,
        showMeridian: false,
        startView: 1,
        maxView: 1,
      });
      $(".timepicker").find('thead th').remove();
      $(".timepicker").find('thead').append($('<th class="switch">').text('Pick Time'));
      $('.switch').css('width','190px');


      //set input/textarea/select event when change value, remove class error and remove text help block 
      
      // reset modal
      $("input").change(function(){
          $(this).parent().parent().removeClass('has-error');
          $(this).parent().next().empty();
      });

      $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).parent().next().empty();
      });

      $("select").change(function(){
          $(this).parent().parent().removeClass('has-error');
          $(this).parent().next().empty();
      });

      $('#password, #confirm_password').on('keyup', function () {
        if($('#password').val() == '' && $('#confirm_password').val() == ''){
          $('#message').html('');
        }
        else if ($('#password').val() == $('#confirm_password').val()) {
          $('#message').html('Matching').css('color', 'green');
          $('#btnSubmitChangePassword').attr('disabled', false);
        } else {
          $('#message').html('Not Matching').css('color', 'red');
          $('#btnSubmitChangePassword').attr('disabled', true);
        }
      });

    });

    // fire cancel button on file upload
    // cara 1:
    // var file_upload = document.getElementById('file-upload');

    // Define a function to be called
    // when the input is focused
    // function initialize() {
    //   document.body.onfocus = checkIt;
    //   console.log('initializing');
    // }
      
    // // Define a function to check if
    // // the user failed to upload file
    // function checkIt() {
    //   // Check if the number of files
    //   // is not zero
    //   if (file_upload.value.length) {
    //   alert('Files Loaded');
    //   }
    //   // Alert the user if the number
    //   // of file is zero
    //   else {
    //   alert('Cancel clicked');
    //   }
    //   document.body.onfocus = null;
    //   console.log('checked');
    // }
    
    // Defining a global variable to persist data
    

    // if input field id is file and its inside a div which has id file-wrapper
    // $('#file_wrapper').on('change', '#file-upload', function() {
    //     const img = this.files[0];

    //     // If image selected
    //     if (img) {
    //       // Change thumbnail or what your want

    //       // Cloning the input filed value for future
    //       old_value = $(this).clone();
    //     } else {
    //       // If no file selected or canceled and previously selected an image
    //       if (old_value) {
    //           $(this).remove();
    //           let new_img = $('#file_wrapper').append("old_img");
    //           old_img = new_img.clone();
    //       }
    //     }
    // });


    function add(params)
    {
        
        active = params;
        save_method = 'add';
        // $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        // $('#modal_form').modal('show'); // show bootstrap modal
        // $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit(params, id)
    {
        active = params;
        save_method = 'update';
        edit_id = id;
        // console.log("CKEDITOR.version ==",CKEDITOR.version);

        // for (instance in CKEDITOR.instances) {
        //   CKEDITOR.instances[instance].updateElement();
        // }

        // $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        
        if(active == "berita") {

          var id_berita = $("#btnEditBerita"+id).attr("data-id");
          var title = $("#btnEditBerita"+id).attr("data-title");
          var category = $("#btnEditBerita"+id).attr("data-category");
          var post = $("#btnEditBerita"+id).attr("data-post");
          var filePreview = $("#btnEditBerita"+id).attr("data-picture");
          // console.log(filePreview);
          // modal.find('#link-file-upload3').attr("href","<?= site_url('upload/') ?>".data('picture'));
          
          // set data ckeditor3
          CKEDITOR.instances["ckeditor2"].setData(post);
          // var div = $("#btnEditBerita"+id).attr("data-title");
          // var div = $("#btnEditBerita"+id).attr("data-title");
          // var div = $("#btnEditBerita"+id).attr("data-title");
          // var div = $("#btnEditBerita"+id).attr("data-title");
  
          // $("#title2").html("tes");
          $('#id_berita2').attr("value", id_berita);
          $('#title2').attr("value", title);
          $('#category2').attr("value", category);
          $('#ckeditor2').html(post);
          $('#link-file-preview2').attr("href", "<?= site_url('assets/admin/upload/images/berita/') ?>"+filePreview);
          $('#file-preview2').attr("src", "<?= site_url('assets/admin/upload/images/berita/') ?>"+filePreview);
          // $('#custom-file-upload2').attr("value", "<?= site_url('upload/') ?>"+filePreview);
          // $('#file-upload2').html("value", "<?= site_url('upload/') ?>"+filePreview);
          // $('#file-selected2').html("<?= site_url('upload/') ?>"+filePreview);
        //   $('#file-upload3').attr("src","<?= site_url('upload/') ?>"+div.data('picture'));
        //       $('#title3').html(div.data('title'));
        //       $('#category3').html(div.data('category'));
        //      $('#ckeditor3').html(div.data('post'));
        //       $('#nama3').html(div.data('nama'));
        //  console.log(div);
        }
    
        //Ajax Load data from ajax
        // $.ajax({
        //     url : "<?php echo site_url('coach/ajax_edit')?>/" + active,
        //     type: "GET",
        //     dataType: "JSON",
        //     success: function(data)
        //     {
    
        //         $('[name="judulMateri]').val(data.judulMateri);
        //         $('[name="fileMateri"]').val(data.file);
        //         // $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        //         // $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title
    
        //         // $('#photo-preview').show(); // show photo preview modal
        //     },
        //     error: function (jqXHR, textStatus, errorThrown)
        //     {
        //         alert('Error get data from ajax');
        //     }
        // });
    }

    function reload_table()
    {
        // table.ajax.reload(); //reload datatable ajax
        // $("#tabel_body").load(location.href+" #tabel_body>*","");

        location.reload();
        return false;
        
    }

    function delete_data(active, id, role_id = "") {
      if(confirm('Are you sure delete this data?'))
      {
          // ajax delete data to database
          $.ajax({
              url : "<?php echo base_url("$active_controller/ajax_delete")?>/"+active+"/"+id+"/"+role_id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  //if success reload ajax table
                  // $('#modal_form').modal('hide');
                  $('#successDeleteToast').toast('show');
                    window.setTimeout(function(){location.reload()},3000)
                  // reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });
  
      }

    }

    function refresh_form()
    {
      if(save_method == 'add') {
        if(active == "berita") {
          $('.form_add')[0].reset();
          CKEDITOR.instances.ckeditor.setData('');
        }else if(active == 'user') {
          $('.form_add')[0].reset();
        }else if(active == 'services') {
          $('#form_add_services')[0].reset();
        }else if(active == 'partners') {
          $('#form_add_partners')[0].reset();
        }else if(active == 'links') {
          $('#form_add_links')[0].reset();
        }else{
          $('.form_add')[0].reset();
        }
      } 
      else 
      {
        if(active == "coaching_schedule") {
          $('[name="senin"]').val('');
          $('[name="selasa"]').val('');
          $('[name="rabu"]').val('');
          $('[name="kamis"]').val('');
          $('[name="jumat"]').val('');
          $('[name="sabtu"]').val('');
          $('[name="minggu"]').val('');
        }
        else if(active == "berita")
        {
          $('[name="title"]').val('');
          $('[name="category"]').val('');
          
          CKEDITOR.instances.ckeditor2.setData('');
          $('#remove_photo').prop('checked', false);
          $('[name="picture"]').val('');
          // $('.form_edit')[0].reset();
        }else if(active == "user"){
          $('#username2').val('');
          $('#email2').val('');
          $('#password2').val('');
        }else {
          $('.form_edit'+edit_id+'')[0].reset();
        }
      }
        // $('form :input').val('');
        // $('#labelMateri').html("Judul Materi");
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
    }
    

    function save()
    {
        $('.btnSave').text('saving...'); //change button text
        $('.btnSave').attr('disabled',true); //set button disable

        var url, form;

        if(active == 'berita') {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }

        if(save_method == 'add') {
          if(active == "berita") {
            form = $('#form_add')[0];
          }else if(active == "testimonial"){
            form = $('#form_add_testimonial')[0];
          }else if(active == "services"){
            form = $('#form_add_services')[0];
          }else if(active == "partners"){
            form = $('#form_add_partners')[0];
          }else if(active == "links"){
            form = $('#form_add_links')[0];
          }else{
            form = $('#form_add')[0];
          }
          url = "<?php echo base_url("$active_controller/ajax_add")?>/"+active;
        } else {
          if(active == "berita") {
            form = $('#form_edit')[0];
          }else if(active == "user") {
            form = $('#form_edit')[0];
          }else if((active == "about_visimisi") || (active == "about_struktur")) {
            if(active == "about_visimisi"){
              form = $('#form_edit_visimisi')[0];
            }else{
              form = $('#form_edit_struktur')[0];
            }
          }else if(active == "testimonial") {
            form = $('#form_edit_testimonial')[0];
          }else if(active == "contact") {
            form = $('#form_edit_contact')[0];
          }else if(active == "services") {
            form = $('#form_edit_services')[0];
          }else if(active == "partners") {
            form = $('#form_edit_partners')[0];
          }else if(active == "zoom_request") {
            form = $('#form_edit')[0];
          }else if(active == "carousel") {
            form = $('#form_edit_carousel')[0];
          }else if(active == "edit_foto_profile") {
            form = $('#form_edit_foto_profile')[0];
          }else if(active == "logo") {
            form = $('#form_edit_logo')[0];
          }else if(active == "materi") {
            form = $('#form_edit_materi')[0];
          }else if(active == "links") {
            form = $('#form_edit_links')[0];
          }else {
            form = $('#form_edit'+edit_id+'')[0];
          }
            url = "<?php echo base_url("$active_controller/ajax_update")?>/"+active;
        }
        
        var formData = new FormData(form);

        // console.log(form);

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                  if(save_method == 'add') {
                    $('#addModal').modal('hide');
                    $('.modal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    // ('#editModal'.editModalId).modal('hide');
                    $('#successToast').toast('show');
                    window.setTimeout(function(){location.reload()},3000)
                  } else {
                    if(active == "profile") {
                      $('#editProfileModal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else if(active == "berita") {
                      $('#editModal'+edit_id+'').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else if(active == "user") {
                      $('#editModal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else if((active == "about_visimisi") || (active == "about_struktur")){
                      $('.modal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else if(active == "testimonial"){
                      $('.modal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else if(active == "contact"){
                      $('.modal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else if(active == "services"){
                      $('.modal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else if(active == "partners"){
                      $('.modal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else if(active == "zoom_request"){
                      $('.modal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else if(active == "carousel"){
                      $('.modal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }else{
                      $('.modal').modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                      $('#successEditToast').toast('show');
                      window.setTimeout(function(){location.reload()},3000)
                    }
                  }
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                      if(save_method == 'add') {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                      } else {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string

                      }
                    }
                    $('.btnSave').html(`save <i class="fa fa-check"></i>`); //change button text
                    $('.btnSave').attr('disabled',false); //set button enable 
                }


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('.btnSave').html(`save <i class="fa fa-check"></i>`); //change button text
                $('.btnSave').attr('disabled',false); //set button enable 

            }
        });
    }
    
  </script>
  <!-- <script type="text/javascript">

    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?= base_url("coach/$active/$id_user")?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],

        });



        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,  
        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });



    function add()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url("coach/$active/$id_user/edit")?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id"]').val(data.id);
                $('[name="firstName"]').val(data.firstName);
                $('[name="lastName"]').val(data.lastName);
                $('[name="gender"]').val(data.gender);
                $('[name="address"]').val(data.address);
                $('[name="dob"]').datepicker('update',data.dob);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('person/ajax_add')?>";
        } else {
            url = "<?php echo site_url('person/ajax_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            }
        });
    }

    function delete_person(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('person/ajax_delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }

  </script> -->
  <!-- script for coaching -->
  <script type="text/javascript"> 
    $(function() {
        $('#schedule').click(function() {
            $('#report_div').hide();
            $('#schedule_div').show();
            return false;
        }); 
        
        $('#report').click(function() {
            $('#schedule_div').hide();
            $('#report_div').show();
            return false;
        });
        
        $('#btnBasicInfo').click(function() {
            $('#settings_profile').hide();
            $('#basic_info').show();
            return false;
        });

        $('#btnSettings').click(function() {
            $('#basic_info').hide();
            $('#settings_profile').show();
            return false;
          });
          
          $("#checkOther").click(function() {
            // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
            if($(this).is(":checked")) // "this" refers to the element that fired the event
            {
              $('#checkOtherField').show();
            }else{
              $('#checkOtherField').hide();
            }
        });

        // $('#btnApprove').click(function() {
        //   $('#successToast').toast('show');
        //   window.setTimeout(function(){location.reload()},3000)
        //     // return false;
        // });
        
        // $('#btnReject').click(function() {
        //   $('#successDeleteToast').toast('show');
        //   window.setTimeout(function(){location.reload()},3000)
        //     // return false;
        // });

        $('#btnTambahBerita').click(function() {
            // $(this).text(function(i, text){
            //     return text === "PUSH ME" ? "DON'T PUSH ME" : "PUSH ME";
            // }
            // console.log($("#btnTambahBerita").html().find(".fas"));
            $(this).find('i').toggleClass('fa-plus-circle fa-minus-circle');
            $(this).toggleClass('btn-success btn-outline-success');
            $('#data-table').toggle();
            $('#form-tambah-berita').toggle();
            return false;
        });

        
    });
  </script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= site_url('assets/template/js/material-dashboard.min.js?v=3.0.0') ?>"></script>